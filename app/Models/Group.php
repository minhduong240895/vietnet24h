<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Group extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

}
