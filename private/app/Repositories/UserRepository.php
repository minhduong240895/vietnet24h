<?php
/**
 * Created by PhpStorm.
 * User: toqua
 * Date: 3/17/2018
 * Time: 11:55 AM
 */

namespace App\Repositories;
use App\Models\User;
use App\Models\Group;
use App\Repositories\BaseRepository;


class UserRepository extends BaseRepository
{
    public function model()
    {
        return User::class;
    }
    public function getGroup($id){
        $item = Group::find($id);
        return $item;
    }
}