<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Inventory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'inventories';
    protected $fillable = [
        'subscriber_id',
        'product_id',
        'location_id',
        'zone_id',
        'qty',
        'threshold_limit',
        'price_channel_id',
        'reorder_qty'
    ];

    public function scopeSubscriber($query){
        return $query->where($this->table.'.subscriber_id',Auth::User()->subscriber_id);
    }


    public function product(){
        return $this->belongsTo('App\Product');
    }



}
