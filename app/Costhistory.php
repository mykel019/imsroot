<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Costhistory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'cost_history';
    protected $fillable = [
        'subscriber_id',
        'product_id',
        'cost',
        'changed_by'
    ];

    public function scopeSubscriber($query){
        return $query->where($this->table.'.subscriber_id',Auth::User()->subscriber_id);
    }

}
