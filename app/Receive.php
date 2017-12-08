<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Receive extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'received';
    protected $fillable = [
        'subscriber_id',
        'location_id',
        'dr_no',
        'po_no',
        'supplier_id',
        'invoice_no',
    ];


    public function scopeSubscriber($query){
        return $query->where('subscriber_id',Auth::User()->subscriber_id);
    }

    public function location(){
        return $this->belongsTo('App\Location');
    }

    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }

    public function receiveditems(){
        return $this->hasMany('App\ReceiveItem');
    }
    public function returned(){
        return $this->hasMany('App\Returned');
    }
}