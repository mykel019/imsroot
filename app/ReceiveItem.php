<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class ReceiveItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'receive_items';
    protected $fillable = [
        'subscriber_id',
        'received_id',
        'product_id',
        'qty',
        'date_received',
    ];


    public function scopeSubscriber($query){
        return $query->where('subscriber_id',Auth::User()->subscriber_id);
    }

    public function receive(){
        return $this->belongsTo('App\Receive');
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }


}