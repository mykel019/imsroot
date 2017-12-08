<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class PosManager extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'pos_manager';
    protected $fillable = [
        'subscriber_id',
        'location_id',
        'serial',
        'tenure',
        'terminal_no',
        'date_started',
        'deleted_by',
    ];


    public function scopeSubscriber($query){
        $query->where('subscriber_id',Auth::User()->subscriber_id);
    }


}
