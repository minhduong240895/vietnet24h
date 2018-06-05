<?php
/**
 * Created by PhpStorm.
 * User: toqua
 * Date: 3/17/2018
 * Time: 11:55 AM
 */

namespace App\Repositories;
use App\Models\News;
use App\Models\Topic;
use App\Models\Types;
use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;


class NewsRepository extends BaseRepository
{
    public function model()
    {
        return News::class;
    }
    public function getAllColection(){
        return $this->model->where('id', '>', 0)->orderBy('id', 'desc');
    }
    public function getAllColectionOfCurrentUser(){
        $user = Auth::user();
        return News::where('user_id', $user->id)->orderBy('id', 'desc');
    }
    public function getAllColectionNotPublic(){
        return News::where('status', '', 5)->orderBy('id', 'desc');
    }
    public function getAuthor($id)
    {
        $item = User::find($id);
        return $item;
    }
    public function getType($id){
        $item = Types::find($id);
        return $item;
    }
    public function getTopic($id){
        $item = Topic::find($id);
        return $item;
    }

}