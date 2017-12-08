<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
class Client extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'clients';
    protected $fillable = [
        'subscriber_id',
        'company',
        'name',
        'email',
        'account_manager',
        'phone',
        'fax',
        'contact_person',
        'payment_terms',
        'bill_addr1',
        'bill_addr2',
        'bill_city',
        'bill_province',
        'bill_postal',
        'bill_country',
        'ship_addr1',
        'ship_addr2',
        'ship_city',
        'ship_province',
        'ship_postal',
        'ship_country',
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
