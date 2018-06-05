<?php

namespace App\Http\Controllers\CMS;

use App\Models\Category;
use App\Models\News;
use App\Models\Topic;
use App\Repositories\NewsRepository;
use Illuminate\Http\Request;
use App\Http\Requests\TopicsRequest;
use App\Repositories\TopicsRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\DataTables;
use Illuminate\Support\Str;

class TopicsController extends BaseController
{
    public function __construct(TopicsRequest $request, TopicsRepository $repository, ResponseFactory $response)
    {
        parent::__construct($request, $repository, $response);
    }

    public function index()
    {
        return $this->response->view($this->getViewName('index'));
    }
    public function getData()
    {
        //var_dump($this->repository->getAll());
        //die();

        return Datatables::of($this->repository->getAll())
            ->addColumn('category', function ($data) {
                if ($item = $this->repository->getCategory($data->category_id)){
                    return $item->name;
                }else{
                    return null;
                }
            })
            ->addColumn('actions', function ($data) {
                return view('partials/actions', ['route' => $this->getRouteName(), 'id' => $data->id, 'type' => 'edit-delete']);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    public function getstatistic()
    {
        return Datatables::of($this->repository->getAll())
            ->addColumn('category', function ($data) {
                if ($item = $this->repository->getCategory($data->category_id)){
                    return $item->name;
                }else{
                    return null;
                }
            })
            ->addColumn('actions', function ($data) {
                return view($this->getRouteName().'/actions', ['route' => $this->getRouteName(), 'id' => $data->id]);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    public function listTopic(){
        return $this->response->view($this->getViewName('list'));
    }

    public function statistic($topicID){
        $news = News::where([
            ['topic_id', '=', $topicID],
            ['status', '=', '5'],
        ])->get();
        $total = 0;
        foreach ($news as $n){
            $total += $n->price;
        }
        $topic = $this->repository->find($topicID);
        return $this->response->view($this->getViewName('statistic'), ['id' => $topicID, 'total' => $total, 'topic' => $topic->name]);
    }
    public function show($id)
    {
        $item = $this->repository->findOrFail($id);
        return $this->response->view($this->getViewName('show'), ['data' => $item]);
    }

    public function create(){
        $categories = Category::all();
        return $this->response->view($this->getViewName('create'), ['categories' => $categories]);
    }
    public function store()
    {
        $data = $this->request->all();
        if($data['slug'] == null){
            $data['slug'] = Str::slug($data['name'], '-');
        }
        $this->repository->create($data);
        return $this->redirectTo('index');
    }
    public function edit($id){
        $categories = Category::all();
        $item = $this->repository->findOrFail($id);
        return $this->response->view($this->getViewName('edit'), ['data' => $item, 'categories' => $categories]);
    }
    public function update($id)
    {
        $item = $this->repository->findOrFail($id);
        $data = $this->request->all();
        if($data['slug'] == null){
            $data['slug'] = Str::slug($data['name'], '-');
        }
        $item->fill($data)->save();
        return $this->redirectTo('index');
    }

    public function destroy($id)
    {
        $item = $this->repository->findOrFail($id);
        $item->delete();

        return $this->redirectTo('index');
    }
}
