<?php

namespace App\Http\Controllers\CMS;

use App\Models\Category;
use App\Models\MapNewsTag;
use App\Models\News;
use App\Models\Tag;
use App\Models\Types;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use App\Repositories\NewsRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\DataTables;
use App\Models\Topic;
use Illuminate\Support\Str;

class NewsController extends BaseController
{
    public function __construct(NewsRequest $request, NewsRepository $repository, ResponseFactory $response)
    {
        parent::__construct($request, $repository, $response);
    }

    public function index()
    {
        return $this->response->view($this->getViewName('index'));
    }
    public function getData()
    {
        $user = Auth::user();
        if($user->group_id == 4){
            return Datatables::of($this->repository->getAllColectionOfCurrentUser())
                ->addColumn('author', function ($data) {
                    if ($item = $this->repository->getAuthor($data->user_id)){
                        return $item->name;
                    }else{
                        return null;
                    }
                })
                ->addColumn('topic', function ($data) {
                    if ($item = $this->repository->getTopic($data->user_id)){
                        return $item->name;
                    }else{
                        return null;
                    }
                })
                ->addColumn('type', function ($data) {
                    if ($item = $this->repository->getType($data->type_id)){
                        return $item->name;
                    }else{
                        return null;
                    }
                })
                ->addColumn('actions', function ($data) {
                    return view('partials/actions', ['route' => $this->getRouteName(), 'id' => $data->id, 'type' => 'all']);
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        if($user->group_id == 3){
            return Datatables::of($this->repository->getAllColectionNotPublic())
                ->addColumn('author', function ($data) {
                    if ($item = $this->repository->getAuthor($data->user_id)){
                        return $item->name;
                    }else{
                        return null;
                    }
                })
                ->addColumn('topic', function ($data) {
                    if ($item = $this->repository->getTopic($data->user_id)){
                        return $item->name;
                    }else{
                        return null;
                    }
                })
                ->addColumn('type', function ($data) {
                    if ($item = $this->repository->getType($data->type_id)){
                        return $item->name;
                    }else{
                        return null;
                    }
                })
                ->addColumn('actions', function ($data) {
                    return view('partials/actions', ['route' => $this->getRouteName(), 'id' => $data->id, 'type' => 'all']);
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return Datatables::of($this->repository->getAllColection())
            ->addColumn('author', function ($data) {
                if ($item = $this->repository->getAuthor($data->user_id)){
                    return $item->name;
                }else{
                    return null;
                }
            })
            ->addColumn('topic', function ($data) {
                if ($item = $this->repository->getTopic($data->user_id)){
                    return $item->name;
                }else{
                    return null;
                }
            })
            ->addColumn('type', function ($data) {
                if ($item = $this->repository->getType($data->type_id)){
                    return $item->name;
                }else{
                    return null;
                }
            })
            ->addColumn('actions', function ($data) {
                return view('partials/actions', ['route' => $this->getRouteName(), 'id' => $data->id, 'type' => 'all']);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    public function show($id)
    {
        $item = $this->repository->findOrFail($id);
        $user = Auth::user();
        if($user->group_id == 4){
            if($item->user_id != $user->id){
                return redirect('home')->with('status', 'Bạn không có quyền xem bài viết này!');
            }
        }
        if($item->topic){
            $topic = $item->topic;
        }else{
            $topic = "";
        }
        if($item->topic && $item->topic->category){
            $category = $item->topic->category;
        }else{
            $category = "";
        }
        if($item->type){
            $type = $item->type;
        }else{
            $type = "";
        }
        if($item->user){
            $user = $item->user;
        }else{
            $user = "";
        }
        $related_news = explode('|', $item->related_news);
        $related_news = News::whereIn('id', $related_news)->get();
        $sibling_news = explode('|', $item->sibling_news);
        $sibling_news = News::whereIn('id', $sibling_news)->get();
        $sibling_news = News::whereIn('id', $sibling_news)->get();
        $map = MapNewsTag::where('news_id', $id)->get();
        $tags = [];
        if(count($map) > 0){
            foreach ($map as $m){
                $tag = Tag::find($m->tag_id);
                if($tag){
                    $tags[] = $tag->name;
                }
            }
        }
        $tags = implode(", ", $tags);
        return $this->response->view($this->getViewName('show'), ['data' => $item, 'type' => $type->name, 'tags' => $tags, 'related_news' => $related_news, 'sibling_news' => $sibling_news, 'topic' => $topic->name, 'category' => $category->name, 'category' => $category->name]);
    }

    public function create(){
        $tags = Tag::all();
        $types = Types::all();
        $categories = Category::all();
        return $this->response->view($this->getViewName('create'), ['tags' => $tags, 'types' => $types, 'categories' => $categories]);
    }
    public function store()
    {
        $data = $this->request->all();
        //Image
        $image = '';
        if ($this->request->hasFile('image')) {
            $image = $this->repository->saveImage($this->request->file('image'), $this->getViewsFolder(), true,  ['width' => 550, 'height' => 330]);
            if (!$image) {
                return redirect()->back()->withError('Could not save image');
            }
        }
        $data['image'] = $image;
        if($data['slug'] == null){
            $data['slug'] = Str::slug($data['title'], '-');
        }
        $data['user_id'] = Auth::user()->id;
        $data['views'] = 0;
        $type = Types::find($data['type_id']);
        $data['price'] = $type->price;
        $data['public_time'] = '';
        if(isset($data['sibling_news'])){
            $data['sibling_news'] = implode("|", $data['sibling_news']);
        }
        if(isset($data['related_news'])){
            $data['related_news'] = implode("|", $data['related_news']);
        }
        $data['status'] = 1;

        $item = $this->repository->create($data);

        foreach ($data['tags'] as $tag_id){
            MapNewsTag::create([
                'tag_id' => $tag_id,
                'news_id' => $item->id,
            ]);
        }
        return $this->redirectTo('index');
    }
    public function edit($id)
    {
        $item = $this->repository->findOrFail($id);
        $user = Auth::user();
        $arrStatus = [
            1 => 'Bài nháp',
            2 => 'Chờ biên tập',
            3 => 'Cần chỉnh sửa',
            4 => 'Chờ xuất bản',
            5 => 'Đã xuất bản'
        ];
        if($user->group_id == 4){
            $arrStatus = [
                1 => 'Bài nháp',
                2 => 'Chờ biên tập',
                3 => 'Cần chỉnh sửa',
            ];
            if($item->user_id != $user->id){
                return redirect('home')->with('status', 'Bạn không có quyền chỉnh sửa bài viết này!');
            }else{
                if($item->status != 3 && $item->status != 1){
                    return redirect('home')->with('status', 'Bạn không có quyền chỉnh sửa bài viết này!');
                }
            }
        }
        if($user->group_id == 3){
            $arrStatus = [
                1 => 'Bài nháp',
                2 => 'Chờ biên tập',
                3 => 'Cần chỉnh sửa',
                4 => 'Chờ xuất bản',
            ];
            if($item->status == 5){
                return redirect('home')->with('status', 'Bạn không có quyền chỉnh sửa bài viết này!');
            }
        }
        return $this->response->view($this->getViewName('edit'), ['data' => $item, 'arrStatus' => $arrStatus]);
    }
    public function update($id)
    {
        $validatedData = $this->validateRequest();
        $item = $this->repository->findOrFail($id);
        $data = $this->request->all();
        //Image
        $image = '';
        if ($this->request->hasFile('image')) {
            $this->repository->deleteImage($item->image);
            $image = $this->repository->saveImage($this->request->file('image'), $this->getViewsFolder(), true, ['width' => 550, 'height' => 330]);
            if (!$image) {
                return redirect()->back()->withError('Could not save image');
            }
        }else{
            $image = $item->image;
        }
        $data['image'] = $image;
        $data['description'] =  $data['description'];
        $data['status'] =  $data['status'];
        if($data['status'] == 5){
            $data['public_time'] =  date('H:i:s d-m-Y', time());
        }
        $item->fill($data)->save();
        return $this->redirectTo('index');
    }

    public function validateRequest()
    {
        $rules = $this->request->rules();
        return $this->request->validate($rules);
    }
    public function destroy($id)
    {
        $item = $this->repository->findOrFail($id);
        $user = Auth::user();
        if($user->group_id == 4){
            if($item->user_id != $user->id){
                return redirect('home')->with('status', 'Bạn không có quyền xóa bài viết này!');
            }else{
                if($item->status != 1){
                    return redirect('home')->with('status', 'Bạn không có quyền xóa bài viết này!');
                }
            }
        }
        $this->repository->deleteImage($item->image);
        $item->delete();

        return $this->redirectTo('index');
    }


    public function getDataTopicStatistic($topicID )
    {
        $news = News::where([
            ['topic_id', '=', $topicID],
            ['status', '=', '5'],
        ])->orderBy('id', 'desc');
        return Datatables::of($news)
            ->addColumn('author', function ($data) {
                if ($item = $this->repository->getAuthor($data->user_id)){
                    return $item->name;
                }else{
                    return null;
                }
            })
            ->addColumn('topic', function ($data) {
                if ($item = $this->repository->getTopic($data->user_id)){
                    return $item->name;
                }else{
                    return null;
                }
            })
            ->addColumn('type', function ($data) {
                if ($item = $this->repository->getType($data->type_id)){
                    return $item->name;
                }else{
                    return null;
                }
            })
            ->addColumn('actions', function ($data) {
                return view('partials/actions', ['route' => $this->getRouteName(), 'id' => $data->id, 'type' => 'none']);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    public function getDataUserStatistic($userID )
    {
        $news = News::where([
            ['user_id', '=', $userID],
            ['status', '=', '5'],
        ])->orderBy('id', 'desc');
        return Datatables::of($news)
            ->addColumn('author', function ($data) {
                if ($item = $this->repository->getAuthor($data->user_id)){
                    return $item->name;
                }else{
                    return null;
                }
            })
            ->addColumn('topic', function ($data) {
                if ($item = $this->repository->getTopic($data->user_id)){
                    return $item->name;
                }else{
                    return null;
                }
            })
            ->addColumn('type', function ($data) {
                if ($item = $this->repository->getType($data->type_id)){
                    return $item->name;
                }else{
                    return null;
                }
            })
            ->addColumn('actions', function ($data) {
                return view('partials/actions', ['route' => $this->getRouteName(), 'id' => $data->id, 'type' => 'none']);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
