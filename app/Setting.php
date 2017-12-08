<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'settings';
    protected $fillable = [
        'subscriber_id',
        'module',
        'options'
    ];

    public function scopeSubscriber($query){
        return $query->where($this->table.'.subscriber_id',Auth::User()->subscriber_id);
    }


}
