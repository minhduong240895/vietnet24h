<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Requests\BannersRequest;
use App\Repositories\BannersRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\DataTables;
use Illuminate\Support\Str;

class BannersController extends BaseController
{
    public function __construct(BannersRequest $request, BannersRepository $repository, ResponseFactory $response)
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

    public function create(){
        return $this->response->view($this->getViewName('create'));
    }
    public function store()
    {
        $data = $this->request->all();
        //Image
        $image = '';
        if ($this->request->hasFile('image')) {
            $image = $this->repository->saveImage($this->request->file('image'), $this->getViewsFolder(), false, false);
            if (!$image) {
                return redirect()->back()->withError('Could not save image');
            }
        }
        $data['image'] = $image;
        $this->repository->create($data);
        return $this->redirectTo('index');
    }

    public function update($id)
    {
        $item = $this->repository->findOrFail($id);
        $data = $this->request->all();
        //Image
        $image = '';
        if ($this->request->hasFile('image')) {
            $this->repository->deleteImage($item->image);
            $image = $this->repository->saveImage($this->request->file('image'), $this->getViewsFolder(), false, false);
            if (!$image) {
                return redirect()->back()->withError('Could not save image');
            }
        }else{
            $image = $item->image;
        }
        if ($this->request->position != '') {
            $data['position'] = $this->request->position;
        }else{
            $data['position'] = $item->position;
        }
        $data['image'] = $image;
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
