<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'subscribers';
    protected $fillable = [
        'company_name',
        'contact_person',
        'contact_no',
        'addr1',
        'addr2',
        'city',
        'province',
        'postal',
        'country'
    ];

}
