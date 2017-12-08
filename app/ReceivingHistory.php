<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class ReceivingHistory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'receiving_histories';
    protected $fillable = [
        'subscriber_id',
        'location_id',
        'dr_no',
        'po_no',
        'product_id',
        'qty',
        'received_qty',
        'delivery_date',
        'date_received',
    ];

    public function location(){
        return $this->belongsTo('App\Location');
    }


    public function delivery(){
        return $this->belongsTo('App\Delivery');
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
