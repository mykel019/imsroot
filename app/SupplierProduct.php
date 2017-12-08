<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
class SupplierProduct extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'supplier_products';
    protected $fillable = [
        'subscriber_id',
        'product_id',
        'supplier_id',
        'supplier_code',
        'cost'
       
    ];


    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }

    public function scopeSubscriber($query){
        return $query->where($this->table.'.subscriber_id',Auth::User()->subscriber_id);
    }


    public function products(){
        return $this->belongsTo('App\Product', 'product_id');
    }


}
