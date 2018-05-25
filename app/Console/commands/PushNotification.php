<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Notification;
use App\Models\Member;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class PushNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifi:push';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Push notificaiton in DB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $data = Notification::where('date', date('d M Y'))->where('status', 0)->get();
        
        if (!empty($data)) {
            foreach ($data as $push) {
                if($push->type == 0){
                    $this->pushNotification($push->title, $push->short_description, $push->description);
                    $push->update(['status' => 1]);
                }else{
                    $arrMemberID = explode("|", $push->members);
                    $arrDeviceToken = '';
                    foreach ($arrMemberID as $id){
                        $member = Member::find($id);
                        $arrDeviceToken[] = $member->device_token;
                    }
                    $this->pushNotifiPrivate($arrDeviceToken, $push);
                    $push->update(['status' => 1]);
                }
            }
        }
    }

    public function pushNotification($title = 'motel', $short_content, $content)
    {
        $bodyPost = array(
            'to' => '/topics/motel',
            'priority' => 'high',
            'notification' => array(
                'body' => $short_content,
                'title' => $title,
                'sound' => true,
            ),
            'data' => array(
                'short_description' => $short_content,
                'full_desc' => $content,
                'title' => $title,
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
    public function pushNotifiPrivate($listToken, $notifi)
    {
        foreach ($listToken as $device_token){
            $bodyPost = array(
                'to' => $device_token,
                'priority' => 'high',
                'notification' => array(
                    'body' => $notifi->short_description,
                    'title' => $notifi->description,
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
    }
}
