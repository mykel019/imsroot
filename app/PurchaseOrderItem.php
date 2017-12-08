<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class PurchaseOrderItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'purchase_order_items';
    protected $fillable = [
        'subscriber_id',
        'purchase_order_id',
        'product_id',
        'qty',
        'qty_received',
        'cost',
        'discount',
        'weight',
    ];


    public function scopeSubscriber($query){
        return $query->where('subscriber_id',Auth::User()->subscriber_id);
    }

    public function purchaseOrder(){
        return $this->belongsTo('App\PurchaseOrder');
    }


    public function product(){
        return $this->belongsTo('App\Product');
    }


}
