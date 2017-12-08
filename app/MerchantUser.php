<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class MerchantUser extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'merchant_users';
    protected $fillable = [
        'subscriber_id',
        'username',
        'password',
        'firstname',
        'middlename',
        'lastname',
        'manager'
    ];

    public function scopeSubscriber($query){
        return $query->where('subscriber_id',Auth::User()->subscriber_id);
    }


    public function merchantLocations(){
        return $this->hasMany('\App\MerchantLocation');
    }

}
