<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class News extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'capo',
        'image',
        'description',
        'related_news',
        'sibling_news',
        'status',
        'public_time',
        'type_id',
        'source',
        'user_id',
        'nickname',
        'price',
        'hot',
        'views',
        'topic_id',
        'seo_title',
        'seo_keyword',
        'seo_description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function topic()
    {
        return $this->belongsTo('App\Models\Topic', 'topic_id', 'id');
    }
    public function type()
    {
        return $this->belongsTo('App\Models\Types', 'type_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
