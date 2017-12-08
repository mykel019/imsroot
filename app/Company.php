<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'Companies';
    protected $fillable = [
        'subscriber_id',
        'name',
        'biz_nature',
        'tin_no',
        'contact_details',
        'vat_reg',
        'biz_type',
        'logo',
        'addr1',
        'addr2',
        'city',
        'province',
        'postal',
        'country'
    ];

}
