<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
class Product extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'products';
    protected $fillable = [
        'subscriber_id',
        'photo',
        'code',
        'sku',
        'stock_code',
        'supplier_code',
        'barcode',
        'adtl_product_code',
        'name',
        'category_id',
        'brand_id',
        'department_id',
        'description',
        'packing_list_id',
        'supplier_id',
        'unitofmeasure_id',
        'unitofmeasure_value',
        'cost',
        'unit_cost',
        'unit_cost_chk',
        'custom_fields',
        'product_model_id',
        'association',
        'color',
        'size',
        'price_default',
        'discount_type_id',
        'zero_rated',
        'pos_required_fields',
        'pos_required_chk',
        'is_active',
        'deleted_by'
    ];


    public function inventories(){
        return $this->hasMany('App\Inventory');
    }

    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }

    public function brand(){
        return $this->belongsTo('App\Brand');
    }

    public function department(){
        return $this->belongsTo('App\Department');
    }

    public function scopeSubscriber($query){
        return $query->where($this->table.'.subscriber_id',Auth::User()->subscriber_id);
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function location(){
        return $this->belongsTo('App\Category');
    }

    public function priceChannels(){
        return $this->hasMany('App\Pricechannel');
    }



    public function unitofmeasure(){
        return $this->belongsTo('App\Unitofmeasure');
    }

    public function discounttype(){
        return $this->belongsTo('App\Discounttype');
    }





}
