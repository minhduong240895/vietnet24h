<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Requests\CommentsRequest;
use App\Repositories\CommentsRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\DataTables;

class CommentsController extends BaseController
{
    public function __construct(CommentsRequest $request, CommentsRepository $repository, ResponseFactory $response)
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

        return Datatables::of($this->repository->getAllColection())
            ->addColumn('actions', function ($data) {
                return view('partials/actions', ['route' => $this->getRouteName(), 'id' => $data->id, 'type' => 'show-delete']);
            })
            ->addColumn('news', function ($data) {
                if ($item = $this->repository->getnews($data->news_id)){
                    return $item->title;
                }else{
                    return 'không tìm thấy bài viết';
                }
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    public function show($id)
    {
        $item = $this->repository->findOrFail($id);
        $news = $this->repository->getnews($id);
        if($news){
            $news = $news->title;
        }else{
            $news = '';
        }
        return $this->response->view($this->getViewName('show'), ['route' => $this->getRouteName(), 'data' => $item, 'news' => $news]);
    }
    public function changestatus($id, $value){
        $item = $this->repository->findOrFail($id);

        $dataSave['status'] =  $value;
        $item->fill($dataSave)->save();
        return $this->show($id);
    }
    public function create(){
        return $this->response->view($this->getViewName('create'));
    }
    public function store()
    {
        $data = $this->request->all();
        $this->repository->create($data);
        return $this->redirectTo('index');
    }
    public function destroy($id)
    {
        $item = $this->repository->findOrFail($id);
        $item->delete();

        return $this->redirectTo('index');
    }
}
