<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessModule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'access_modules';
    protected $fillable = [
        'modules',
        'description',
        'crud'
    ];


}
