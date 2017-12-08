<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
class Discounttype extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'discount_types';
    protected $fillable = [
        'subscriber_id',
        'code',
        'name',
        'disc_value',
        'is_active',
        'percentage',
        'disc_target',
        'include_tax',
        'open_disc',
        'effectivity_start',
        'effectivity_end'
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
}
