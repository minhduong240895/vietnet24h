<?php
namespace App\Transformers;
use App\Models\Notification;
use League\Fractal;
use League\Fractal\TransformerAbstract;
class NotificationTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var  array
     */
    protected $availableIncludes = [];
    /**
     * List of resources to automatically include
     *
     * @var  array
     */
    protected $defaultIncludes = [];
    /**
     * Transform object into a generic array
     *
     * @SWG\Definition(
     *      definition="Notification",
     *      required={"id", "title", "message", "members", "status"},
     *       @SWG\Property(
     *          property="id",
     *          type="integer",
     *          format="int32",
     *          example=1,
     *          description=" id"
     *      ),
     *      @SWG\Property(
     *          property="title",
     *          type="string",
     *          example="this is a title",
     *          description=" title of notification"
     *      ),
     *      @SWG\Property(
     *          property="message",
     *          type="string",
     *          example="this is a test message",
     *          description="description of notification"
     *      ),
     *      @SWG\Property(
     *          property="members",
     *          type="string",
     *          example="1|2|3",
     *          description="list id of members, who will receive notification"
     *      ),
     *      @SWG\Property(
     *          property="status",
     *          type="integer",
     *          example="1:private|2:public",
     *          description="Status"
     *      ),
     *  )
     * @param  $notification
     * @return array
     */
    public function transform($notification)
    {
        $data = [
            'id'        => $notification->id,
            'title'      => $notification->title,
            'message'    => $notification->message,
            'status'    => $notification->status,
            'members'   => $notification->members,
        ];
        return $data;
    }
}