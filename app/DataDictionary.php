<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class DataDictionary extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'data_dictionary';
    protected $fillable = [
        'subscriber_id',
        'original',
        'custom'
    ];


    public function scopeSubscriber($query){
        $query->where('subscriber_id',Auth::User()->subscriber_id);
    }


}
