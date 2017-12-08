<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Auth;

class MerchantLocation extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'merchant_locations';
    protected $fillable = [
        'subscriber_id',
        'merchant_user_id',
        'location_id'
    ];


    public function scopeSubscriber($query){
        return $query->where('subscriber_id',Auth::User()->subscriber_id);
    }



    public function location(){
        return $this->belongsTo('\App\Location');
    }
}
