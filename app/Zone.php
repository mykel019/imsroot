<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Zone extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'zones';
    protected $fillable = [
        'subscriber_id',
        'name',
        'description',
        'location_id'
    ];

    public function scopeSubscriber($query){
        return $query->where($this->table.'.subscriber_id',Auth::User()->subscriber_id);
    }


    public function location(){
        return $this->belongsTo('App\Location');
    }

}
