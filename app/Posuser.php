<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
class Posuser extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'pos_users';
    protected $fillable = [
        'subscriber_id',
        'username',
        'password',
        'firstname',
        'middlename',
        'lastname',
        'addr1',
        'addr2',
        'city',
        'province',
        'postal',
        'country',
        'position_id',
        'location_id'
    ];

    public function scopeSubscriber($query){
        return $query->where($this->table.'.subscriber_id',Auth::User()->subscriber_id);
    }


    public function location(){
        return $this->belongsTo('\App\Location');
    }

}
