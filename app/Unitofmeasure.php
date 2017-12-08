<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unitofmeasure extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'unitofmeasures';
    protected $fillable = [
        'subscriber_id',
        'description'
    ];


}
