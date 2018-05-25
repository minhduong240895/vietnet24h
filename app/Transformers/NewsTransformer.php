<?php
namespace App\Transformers;
use App\Models\News;
use League\Fractal;
use League\Fractal\TransformerAbstract;
class NewsTransformer extends TransformerAbstract
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
     *      definition="News",
     *      required={"id", "title", "image", "description", "status"},
     *       @SWG\Property(
     *          property="id",
     *          type="integer",
     *          format="int32",
     *          example=1,
     *          description="event id"
     *      ),
     *      @SWG\Property(
     *          property="title",
     *          type="string",
     *          example="title of the event",
     *          description="title"
     *      ),
     *      @SWG\Property(
     *          property="image",
     *          type="string",
     *          example="\uploads\fakers\ffc29d8697d186482b01a07729e6948f.jpg",
     *          description="path of image"
     *      ),
     *      @SWG\Property(
     *          property="description",
     *          type="string",
     *          example="this is a description",
     *          description="description"
     *      ),
     *      @SWG\Property(
     *          property="status",
     *          type="integer",
     *          example="1, 2",
     *          description="status of event"
     *      )
     *  )
     * @param News $item
     * @return array
     */
    public function transform($item)
    {
        $data = [
            'id'        => $item->id,
            'title'      => $item->title,
            'image'    => $item->image,
            'description'    => $item->description,
            'status'    => $item->status,
        ];
        return $data;
    }
}