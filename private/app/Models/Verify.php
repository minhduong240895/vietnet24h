<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property mixed token
 * @property mixed member_id
 */
class Verify extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'token',
        'member_id',
    ];
    protected $table = 'verify_codes';

    public function member()
    {
        return $this->belongsTo('App\Models\Member', 'member_id', 'id');
    }
}
