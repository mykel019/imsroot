<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class AccessType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'access_types';
    protected $fillable = [
        'subscriber_id',
        'name'
    ];

    public function scopeSubscriber($query){
        return $query->where($this->table.'.subscriber_id',Auth::User()->subscriber_id);
    }

    public function accessRights(){
        return $this->hasMany('App\AccessRight');
    }


}
