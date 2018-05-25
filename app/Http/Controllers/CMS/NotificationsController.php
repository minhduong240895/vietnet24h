<?php

namespace App\Http\Controllers\CMS;

use App\Models\Member;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests\GroupsRequest;
use App\Repositories\NotificationRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\DataTables;
use GuzzleHttp\Client;

class NotificationsController extends BaseController
{
    public function __construct(GroupsRequest $request, NotificationRepository $repository, ResponseFactory $response)
    {
        parent::__construct($request, $repository, $response);
    }

    public function index()
    {
        return $this->response->view($this->getViewName('index'));
    }
    public function getData()
    {
        return $data =  Datatables::of($this->repository->getAllColection())
            ->addColumn('actions', function ($data) {
                return view('partials/actions', ['route' => $this->getRouteName(), 'id' => $data->id, 'type' => 'only-show']);
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    public function show($id)
    {
        $notification = $this->repository->findOrFail($id);
        $arrMemberName = [];
        if($notification->members != null){
            $arrMemberID = explode("|", $notification->members);
            foreach ($arrMemberID as $key => $id){
                $member = Member::find($id);
                $arrMemberName[$member->id] = $member->name;
            }
        }
        return $this->response->view($this->getViewName('show'),['data'=>$notification, 'arrMemberName' => $arrMemberName]);
    }
    public function create()
    {
        $members = Member::all();
        return $this->response->view($this->getViewName('create'),['members' => $members]);
    }
    public function store()
    {
        $validatedData = $this->validateNotification();
        $data = $this->request->all();
        if($this->request->members){
            $arrMember = $data['members'];
            $members = implode("|", $arrMember);
        }else{
            $members = null;
        }
        $item = $this->repository->create([
          'title' => $data['title'],
          'short_description' => $data['short_description'],
          'description' => $data['description'],
          'time' => $this->request->time,
          'date' => date('d M Y', strtotime($this->request->date)),
          'type' => $data['type'],
          'status' => 0,
          'members' => $members,
        ]);
        if ($this->request->sendNow == true) {
            if($this->request->type == 0){
                try {
                    $item->status = 1;
                    $item->save();
                    $this->pushNotifi($item);
                } catch (Exception $e) {
                }
            }else{
                try {
                    $item->status = 1;
                    $item->save();
                    $arrDeviceToken = '';
                    foreach ($arrMember as $id){
                        $member = Member::find($id);
                        $this->pushNotifiPrivate($member->device_token, $item);
                    }
                } catch (Exception $e) {
                }
            }
        }
        return $this->redirectTo('index');
    }
    public function pushNotifi($notifi)
    {
        $bodyPost = array(
            'to' => '/topics/motel',
            'priority' => 'high',
            'notification' => array(
                'body' => $notifi->short_description,
                'title' => $notifi->title,
                'sound' => true,
            ),
            'data' => array(
                'short_description' => $notifi->short_description,
                'full_desc' => $notifi->description,
                'title' => $notifi->title,
            ),
        );
        $client = new Client(['base_uri' => 'https://fcm.googleapis.com/fcm/','verify'=>false]);
        $client->post('send',[
            'headers' =>[
                'Content-Type'=>'application/json',
                'Authorization' => 'key='.config('app.fcm_key')
            ],
            'body' => json_encode($bodyPost)
        ]);
    }
    public function pushNotifiPrivate($device_token, $notifi)
    {
        $bodyPost = array(
            'to' => '/topics/motel',
            'priority' => 'high',
            'notification' => array(
                'body' => $notifi->short_description,
                'title' => $notifi->title,
                'sound' => true,
            ),
            'data' => array(
                'short_description' => $notifi->short_description,
                'full_desc' => $notifi->description,
                'title' => $notifi->title,
            ),
        );

        $client = new Client(['base_uri' => 'https://fcm.googleapis.com/fcm/','verify'=>false]);
        $client->post('send',[
            'headers' =>[
                'Content-Type'=>'application/json',
                'Authorization' => 'key='.config('app.fcm_key')
            ],
            'body' => json_encode($bodyPost)
        ]);
    }
    public function edit($id)
    {
        $item = $this->repository->findOrFail($id);
        $members = Member::all();

        if($item->members){
            $ArrID = explode("|", $item->members);
            $listMember = [];
            foreach ($ArrID as $id){
                $member = Member::find($id);
                $listMember[] = $member->name;
            }
            $listMemberName = implode("|", $listMember);
        }else{
            $listMemberName = null;
        }

        return $this->response->view($this->getViewName('edit'), ['data' => $item, 'listMemberName' => $listMemberName, 'members' => $members]);
    }
    public function update($id)
    {
        $validatedData = $this->validateNotification();
        $item = $this->repository->findOrFail($id);
        $data = $this->request->all();
        if($data['status'] == 1){
            if (count($data['members']) > 0){
                $arrMember = $data['members'];
                $members = implode("|", $arrMember);
            }else{
                $members = $item->members;
            }
        }else{
            $members = null;
        }
        $dataSave =[
            'title' => $data['title'],
            'short_description' => $data['short_description'],
            'description' => $data['description'],
            'time' => $data['time'],
            'date' => $data['date'],
            'type' => $data['type'],
            'members' => $members,
        ];
        $item->fill($dataSave)->save();
        return $this->redirectTo('index');
    }
//
    public function validateNotification()
    {
        $rules = $this->request->rules();
        return $this->request->validate($rules);
    }
    public function destroy($id)
    {
        $item = $this->repository->findOrFail($id);
        $item->delete();

        return $this->redirectTo('listbill', ['id' => $item->member_id]);
    }
}
