<?php
/**
 * Created by PhpStorm.
 * User: toqua
 * Date: 3/17/2018
 * Time: 11:55 AM
 */

namespace App\Repositories;
use App\Models\News;
use App\Repositories\BaseRepository;
use App\Models\Group;


class GroupsRepository extends BaseRepository
{
    public function model()
    {
        return Group::class;
    }
    public function getAllColection(){
        return $this->model->all()->sortByDesc("id");
    }

}