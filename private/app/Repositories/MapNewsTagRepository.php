<?php
/**
 * Created by PhpStorm.
 * User: toqua
 * Date: 3/17/2018
 * Time: 11:55 AM
 */

namespace App\Repositories;
use App\Models\MapNewsTag;
use App\Repositories\BaseRepository;


class MapNewsTagRepository extends BaseRepository
{
    public function model()
    {
        return MapNewsTag::class;
    }
    public function getAllColection(){
        return $this->model->all()->sortByDesc("id");
    }

}