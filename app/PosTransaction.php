<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class PosTransaction extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'pos_transactions';
    protected $fillable = [
        'subscriber_id',
        'location_id',
        'user_id',
        'terminal',
        'customer_name',
        'or_number',
        'tr_number',
        'rt_number',
        'ref_or_number',
        'ref_rt_number',
        'total_tender',
        'total_due',
        'total_return',
        'discount_id',
        'discount_amount',
        'vat',
        'vat_sale',
        'vat_exempt',
        'vat_exempt_sale',
        'zero_rated_sale',
        'transaction_type',
        'transaction_date',
        'remarks',
        'transaction_type_text'
    ];

    public function scopeSubscriber($query){
        return $query->where($this->table.'.subscriber_id',Auth::User()->subscriber_id);
    }

    public function PaymentDetails(){
        return $this->hasMany('App\PaymentDetail');
    }

    public function InvoiceDetails(){
        return $this->hasMany('App\InvoiceDetail');
    }

    // *********** meron siyang id kay pos_transactions ***************

    // public function DiscountTypes(){
    //     return $this->belongsTo('App\Discounttype','id');
    // }

    public function PosDiscountTypes(){
        return $this->belongsTo('App\Discounttype','discount_id');
    }

    public function PosUsers(){
        return $this->belongsTo('App\Posuser','user_id');
    }
    // ****************************************************************


}
