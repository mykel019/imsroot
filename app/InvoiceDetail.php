<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class InvoiceDetail extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'invoice_details';
    protected $fillable = [
        'subscriber_id',
        'location_id',
        'product_id',
        'pos_invd_id',
        'pos_transaction_id',
        'qty',
        'total',
        'is_percentage',
        'discount_id',
        'discount_value',
        'vat',
        'vat_sale',
        'vat_exempt',
        'vat_exempt_sale',
        'zero_rated_sale',
        'required_fields',
        'transaction_created'

    ];

    public function scopeSubscriber($query){
        return $query->where($this->table.'.subscriber_id',Auth::User()->subscriber_id);
    }

    public function PosTransaction(){
        return $this->belongsTo('App\PosTransaction','pos_transaction_id');
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }

}
