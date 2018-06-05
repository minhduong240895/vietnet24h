<?php
/**
 * Created by PhpStorm.
 * User: toqua
 * Date: 3/17/2018
 * Time: 11:55 AM
 */

namespace App\Repositories;
use App\Models\Category;
use App\Repositories\BaseRepository;


class CategoriesRepository extends BaseRepository
{
    public function model()
    {
        return Category::class;
    }
    public function getAllColection(){
        return $this->model->all()->sortByDesc("id");
    }

}