<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
class Location extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'locations';
    protected $fillable = [
        'subscriber_id',
        'name',
        'code',
        'business_name',
        'addr1',
        'addr2',
        'city',
        'province',
        'postal',
        'country',
        'longitude',
        'latitude'
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public function scopeSubscriber($query){
        return $query->where($this->table.'.subscriber_id',Auth::User()->subscriber_id);
    }


    public function zones(){
        return $this->hasMany('App\Zone','location_id');
    }

}
