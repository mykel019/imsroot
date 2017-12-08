<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class ProductBundleItem extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'product_bundle_items';
    protected $fillable = [
        'subscriber_id',
        'product_id',
        'product_bundle_id',
        'qty'
    ];



    public function scopeSubscriber($query){
        return $query->where($this->table.'.subscriber_id',Auth::User()->subscriber_id);
    }

    public function product(){
        return $this->belongsTo('\App\Product');
    }
}
