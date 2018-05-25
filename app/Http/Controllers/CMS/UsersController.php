<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\DataTables;
use  App\Models\Group;

class UsersController extends BaseController
{

    public function __construct(UsersRequest $request, UserRepository $repository, ResponseFactory $response)
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
            ->addColumn('group', function ($data) {
                if ($item = $this->repository->getGroup($data->group_id)){
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

    function logout(){
        Auth::logout();
        return redirect('login');
    }
    public function createUser(){
        $listGroup = Group::all();
        return $this->response->view($this->getViewName('create'), ['listGroup' => $listGroup]);
    }
    public function store()
    {
        $data = $this->request->all();
        //avatar
        $avatar = '';
        if ($this->request->hasFile('avatar')) {
            $avatar = $this->repository->saveImage($this->request->file('avatar'), $this->getViewsFolder(), ['width' => 500, 'height' => 500]);
            if (!$avatar) {
                return redirect()->back()->withError('Could not save image');
            }
        }else{
            $avatar = 'assets\img\profiles\user.png';
        }
        $data['avatar'] = $avatar;


        $data['password'] = Hash::make($data['password']);

        $this->repository->create($data);

        return $this->redirectTo('index');
    }
    public function edit($id)
    {

        $listGroup = Group::all();
        $item = $this->repository->findOrFail($id);
        return $this->response->view($this->getViewName('edit'), ['data' => $item, 'listGroup' => $listGroup]);
    }
    public function update($id)
    {
        $item = $this->repository->findOrFail($id);
        $data = $this->request->all();

        if ($this->request->hasFile('avatar')) {
            $this->repository->deleteImage($item->image_1);
            $avatar = $this->repository->saveImage($this->request->file('avatar'), $this->getViewsFolder(), ['width' => 500, 'height' => 500]);
            if (!$avatar) {
                return redirect()->back()->withError('Could not save image');
            }
        }else{
            $avatar = $item->avatar;
        }
        $data['avatar'] = $avatar;
        if (array_key_exists('change_password', $data)){
            $data['password'] = Hash::make($data['password']);
        }

        $item->fill($data)->save();

        return $this->redirectTo('index');
    }

    public function validateUser()
    {
            $rules = $this->request->rules();
            return $this->request->validate($rules);
    }
    public function validateEditUser()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $this->route()->parameter('id') . ',id|email',
        ];
        return $this->request->validate($rules);
    }
}
