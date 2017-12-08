<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Returned extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'returns';
    protected $fillable = [
        'subscriber_id',
        'location_id',
        'dr_no',
        'po_no',
        'product_id',
        'qty',
    ];

    public function location(){
        return $this->belongsTo('App\Location');
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
