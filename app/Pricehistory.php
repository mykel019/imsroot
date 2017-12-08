<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Pricehistory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'price_history';
    protected $fillable = [
        'subscriber_id',
        'product_id',
        'price',
        'unit_cost',
        'unitofmeasure_value',
        'price_channel_id',
        'changed_by'
    ];

    public function scopeSubscriber($query){
        return $query->where($this->table.'.subscriber_id',Auth::User()->subscriber_id);
    }

}
