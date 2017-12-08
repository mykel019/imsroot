<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Delivery extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'deliveries';
    protected $fillable = [
        'subscriber_id',
        'location_id',
        'dr_no',
        'or_no',
        'si_no',
        'tf_no',
        'status',
        'delivery_date',
        'branch_destination_id',
    ];


    public function scopeSubscriber($query){
        return $query->where('subscriber_id',Auth::User()->subscriber_id);
    }

    public function location(){
        return $this->belongsTo('App\Location');
    }

    public function deliveryitems(){
        return $this->hasMany('App\DeliveryItem');
    }
}
