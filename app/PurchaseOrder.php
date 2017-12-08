<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class PurchaseOrder extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'purchase_orders';
    protected $fillable = [
        'subscriber_id',
        'location_id',
        'po_no',
        'supplier_po_no',
        'supplier_id',
        'terms',
        'note',
        'po_date',
        'date_sent',
        'date_received',
        'order_status',
        'proforma_invoice',
        'commercial_invoice'
    ];


    public function scopeSubscriber($query){
        return $query->where('subscriber_id',Auth::User()->subscriber_id);
    }

    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }

    public function location(){
        return $this->belongsTo('App\Location');
    }

    public function purchaseOrderItems(){
        return $this->hasMany('App\PurchaseOrderItem');
    }


}
