<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Requests\GroupsRequest;
use App\Repositories\GroupsRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\DataTables;

class GroupsController extends BaseController
{
    public function __construct(Request $request, GroupsRepository $repository, ResponseFactory $response)
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
                return view('partials/actions', ['route' => $this->getRouteName(), 'id' => $data->id, 'type' => 'none']);
            })
            ->rawColumns(['actions'])
            ->make(true);
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
