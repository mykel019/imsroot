<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Brand extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'brands';
    protected $fillable = [
        'subscriber_id',
        'description'
    ];


    public function scopeSubscriber($query){
        $query->where('subscriber_id',Auth::User()->subscriber_id);
    }


}
