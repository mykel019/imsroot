<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class PaymentDetail extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'payment_details';
    protected $fillable = [
        'subscriber_id',
        'location_id',
        'amount',
        'payment_type',
        'payment_method_id',
        'pos_transaction_id',
        'payment_field'
    
    ];



    public function scopeSubscriber($query){
        return $query->where('subscriber_id',Auth::User()->subscriber_id);
    }

    public function postransaction(){
        return $this->belongsTo('App\PosTrasaction','pos_transaction_id');
    }

}
