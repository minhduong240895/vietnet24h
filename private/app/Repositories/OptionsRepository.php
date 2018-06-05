<?php
/**
 * Created by PhpStorm.
 * User: toqua
 * Date: 3/17/2018
 * Time: 11:55 AM
 */

namespace App\Repositories;
use App\Models\Option;
use App\Repositories\BaseRepository;


class OptionsRepository extends BaseRepository
{
    public function model()
    {
        return Option::class;
    }
    public function getAllColection(){
        return $this->model->all()->sortByDesc("id");
    }

}