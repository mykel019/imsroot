<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setup extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'setup';
    protected $fillable = [
        'subscriber_id',
        'step',
    ];

}
