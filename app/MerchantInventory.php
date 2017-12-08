<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class MerchantInventory extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'merchant_inventories';
    protected $fillable = [
        'subscriber_id',
        'manager',
        'location_id',
        'product_id',
        'merchant_id',
        'begin_inv_cases',
        'begin_inv_pcs',
        'delivery_cases',
        'delivery_pcs',
        'ending_inv_cases',
        'ending_inv_pcs',
        'returns_inv_cases',
        'returns_inv_pcs',
        'offtake_cases',
        'offtake_pcs',
        'osa_mon',
        'osa_tue',
        'osa_wed',
        'osa_thu',
        'osa_fri',
        'osa_sat',
        'osa_sun',
        'total_osa',
        'exp_m1',
        'exp_m2',
        'exp_m3',
        'exp_m4',
        'exp_m5',
        'exp_m6',
        'srp',
        'app_created',
        'app_modified'
    ];

    public function scopeSubscriber($query){
        return $query->where('subscriber_id',Auth::User()->subscriber_id);
    }

    public function location(){
        return $this->belongsTo('App\Location');
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }

}
