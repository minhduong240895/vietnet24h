<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use App\Repositories\NewsRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\DataTables;
use App\Models\Member;

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
        $validatedData = $this->validateRequest();
        $data = $this->request->all();
        unset($data['_token']);
        //Image
        $image = '';
        if ($this->request->hasFile('image')) {
            $image = $this->repository->saveImage($this->request->file('image'), $this->getViewsFolder(), ['width' => 200, 'height' => 200]);
            if (!$image) {
                return redirect()->back()->withError('Could not save image');
            }
        }
        $data['image'] = $image;
        $data['status'] = 1;
        $this->repository->create($data);
        return $this->redirectTo('index');
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
            $image = $this->repository->saveImage($this->request->file('image'), $this->getViewsFolder(), ['width' => 400, 'height' => 200]);
            if (!$image) {
                return redirect()->back()->withError('Could not save image');
            }
        }else{
            $image = $item->image;
        }
        $dataSave['image'] = $image;
        $dataSave['description'] =  $data['description'];
        $dataSave['status'] =  $data['status'];
        $item->fill($dataSave)->save();
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
        $this->repository->deleteImage($item->image);
        $item->delete();

        return $this->redirectTo('index');
    }
}
