<?php
/**
 * Created by PhpStorm.
 * User: toqua
 * Date: 3/17/2018
 * Time: 11:55 AM
 */

namespace App\Repositories;
use App\Models\Category;
use App\Models\Topic;
use App\Repositories\BaseRepository;


class TopicsRepository extends BaseRepository
{
    public function model()
    {
        return Topic::class;
    }
    public function getAllColection(){
        return $this->model->all()->sortByDesc("id");
    }
    public function getCategory($id){
        $item = Category::find($id);
        return $item;
    }

}