<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
class Distributor extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'distributors';
    protected $fillable = [
        'subscriber_id',
        'name',
        'company',
        'contact_person',
        'payment_terms',
        'addr1',
        'addr2',
        'city',
        'province',
        'postal',
        'contact_no',
        'country',
        'manager'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public function scopeSubscriber($query){
        return $query->where($this->table.'.subscriber_id',Auth::User()->subscriber_id);
    }


}
