<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapNewsTag extends Model
{
    protected $table = 'map_news_tag';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tag_id',
        'news_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
