<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnDetail extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'return_details';
    protected $fillable = [
        'subscriber_id',
        'location_id',
        'product_id',
        'pos_invd_id',
        'pos_transaction_id',
        'qty',
        'total',
        'is_percentage',
        'discount_value',
        'vat',
        'vat_sale',
        'vat_exempt',
        'vat_exempt_sale',
        'zero_rated_sale',
        'required_fields',
        'return_total',
        'return_qty',
        'transaction_created'

    ];


}
