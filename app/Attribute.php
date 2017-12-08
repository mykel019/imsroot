<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'attributes';
    protected $fillable = [
        'subscriber_id',
        'name',
        'attr_type',
        'attr_value'
    ];


}
