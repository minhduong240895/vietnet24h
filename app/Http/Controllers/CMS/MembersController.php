<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Requests\MembersRequest;
use App\Repositories\MemberRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth;

class MembersController extends BaseController
{
    public function __construct(MembersRequest $request, MemberRepository $repository, ResponseFactory $response)
    {
        parent::__construct($request, $repository, $response);
    }

    public function index()
    {
        return $this->response->view($this->getViewName('index'));
    }

    public function viewProfile($id)
    {

        return $this->response->view($this->getViewName('profile'));
    }

    function logout(){
        Auth::logout();
        return redirect('login');
    }

    public function createUser(){
        return $this->response->view($this->getViewName('create'));
    }
    public function store()
    {
        $data = $this->request->all();
        unset($data['_token']);

        unset($data['comfirm_password']);
        //avatar
        $avatar = '';
        if ($this->request->hasFile('avatar')) {
            $avatar = $this->repository->saveImage($this->request->file('avatar'), $this->getViewsFolder(), ['width' => 200, 'height' => 300]);
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

    public function update($id)
    {
        $validatedData = $this->validateMember();
        $item = $this->repository->findOrFail($id);
        $data = $this->request->all();
        //Avatar
        $avatar = '';
        if ($this->request->hasFile('avatar')) {
            $this->repository->deleteImage($item->avatar);
            $avatar = $this->repository->saveImage($this->request->file('avatar'), $this->getViewsFolder(), ['width' => 200, 'height' => 300]);
            if (!$avatar) {
                return redirect()->back()->withError('Could not save image');
            }
        }else{
            $avatar = $item->avatar;
        }
        $dataSave['avatar'] = $avatar;
        $dataSave['name'] =  $data['name'];
        $dataSave['phone_number'] =  $data['phone_number'];
        if (array_key_exists('change_password', $data)){
            $dataSave['password'] = Hash::make($data['password']);
        }

        $item->fill($dataSave)->save();

        return $this->redirectTo('index');
    }

    public function validateMember()
    {
        $rules = $this->request->rules();
        return $this->request->validate($rules);
    }
    public function destroy($id)
    {
        $item = $this->repository->findOrFail($id);
        $this->repository->deleteImage($item->avatar);
        $item->delete();

        return $this->redirectTo('index');
    }
}
