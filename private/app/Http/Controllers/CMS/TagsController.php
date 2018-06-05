<?php

namespace App\Http\Controllers\CMS;

use App\Models\MapNewsTag;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Requests\TagsRequest;
use App\Repositories\TagsRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\DataTables;

class TagsController extends BaseController
{
    public function __construct(TagsRequest $request, TagsRepository $repository, ResponseFactory $response)
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
            ->addColumn('actions', function ($data) {
                return view('partials/actions', ['route' => $this->getRouteName(), 'id' => $data->id, 'type' => 'edit-delete']);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    public function getListNews()
    {
        $arrTagsID = $this->request->idArr;
        $listMap = MapNewsTag::whereIn('tag_id', $arrTagsID)->get();
        $arrNewsID = [];
        $arrNews = [];
        foreach ($listMap as $item){
            $arrNewsID[] = $item->news_id;
        }
        $arrNewsID = array_unique($arrNewsID);

        $arrNews = News::whereIn('id', $arrNewsID)->get();
        return $arrNews;
    }
    public function show($id)
    {
        $item = $this->repository->findOrFail($id);
        return $this->response->view($this->getViewName('show'), ['data' => $item]);
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

    public function update($id)
    {
        $item = $this->repository->findOrFail($id);
        $data = $this->request->all();
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
