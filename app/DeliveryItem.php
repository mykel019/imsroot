<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class DeliveryItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'delivery_items';
    protected $fillable = [
        'subscriber_id',
        'delivery_id',
        'product_id',
        'qty',
        'qty_received',
    ];


    public function scopeSubscriber($query){
        return $query->where('subscriber_id',Auth::User()->subscriber_id);
    }

    public function delivery(){
        return $this->belongsTo('App\Delivery');
    }


    public function product(){
        return $this->belongsTo('App\Product');
    }

    public function inventory(){
        return $this->belongsTo('App\Inventory');
    }


}
