<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Subscription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'subscriptions';
    protected $fillable = [
        'subscriber_id',
        'module',
        'allowed',
    ];

}