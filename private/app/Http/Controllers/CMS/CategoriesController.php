<?php

namespace App\Http\Controllers\CMS;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriesRequest;
use App\Repositories\CategoriesRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\DataTables;
use Illuminate\Support\Str;

class CategoriesController extends BaseController
{
    public function __construct(CategoriesRequest $request, CategoriesRepository $repository, ResponseFactory $response)
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
    public function show($id)
    {
        $item = $this->repository->findOrFail($id);
        return $this->response->view($this->getViewName('show'), ['data' => $item]);
    }
    public function getListTopic()
    {
        $id = $this->request->id;
        $topics = Topic::where('category_id', $id)->get();
        return $topics;
    }

    public function create(){
        return $this->response->view($this->getViewName('create'));
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