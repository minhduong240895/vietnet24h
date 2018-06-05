<?php
namespace App\Transformers;
use App\Models\Member;
use League\Fractal;
use League\Fractal\TransformerAbstract;
class MemberTransformer extends TransformerAbstract
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
     *      definition="Member",
     *      required={"id", "name", "avatar", "email", "phone_number", "rental", "advanced", "ultility", "tenancy_time"},
     *       @SWG\Property(
     *          property="id",
     *          type="integer",
     *          format="int32",
     *          example=1,
     *          description="member id"
     *      ),
     *      @SWG\Property(
     *          property="name",
     *          type="string",
     *          example="qui",
     *          description="member name"
     *      ),
     *      @SWG\Property(
     *          property="avatar",
     *          type="string",
     *          example="\uploads/fakers\21360a04a592809ed2638c00536522dd.jpg",
     *          description="avatar"
     *      ),
     *      @SWG\Property(
     *          property="email",
     *          type="string",
     *          example="john#gmail.com",
     *          description="member email"
     *      ),
     *      @SWG\Property(
     *          property="phone_number",
     *          type="string",
     *          example="0986668886",
     *          description="member phone number"
     *      ),
     *      @SWG\Property(
     *          property="rental",
     *          type="string",
     *          example="200",
     *          description="retal money per month"
     *      ),
     *      @SWG\Property(
     *          property="security",
     *          type="string",
     *          example="15",
     *          description="2 month security deposit"
     *      ),
     *      @SWG\Property(
     *          property="ultility",
     *          type="string",
     *          example="10",
     *          description="1/2 month ultility deposit"
     *      ),
     *      @SWG\Property(
     *          property="tenancy_time",
     *          type="string",
     *          example="10",
     *          description="2018/3/5 - 2020/2/5"
     *      ),
     *  )
     * @param member $member
     * @return array
     */
    public function transform($member)
    {
        $data = [
            'id'        => $member->id,
            'name'      => $member->name,
            'avatar'    => $member->avatar,
            'email'     => $member->email,
            'phone_number'   => $member->phone_number,
            'rental'   => $member->rental,
            'security'   => $member->security,
            'ultility'   => $member->ultility,
            'tenancy_time'   => $member->tenancy_time,
        ];
        return $data;
    }
}