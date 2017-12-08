<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
class Category extends Model
{

    use SoftDeletes;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'categories';
    protected $fillable = [
        'subscriber_id',
        'name',
        'description',
        'custom_fields',
        'parent_category_id',
        'deleted_by'
    ];

     protected $dates = ['deleted_at'];


    public function products(){
        return $this->hasMany('App\Product');
    }


    public function scopeSubscriber($query){
        return $query->where('subscriber_id',Auth::User()->subscriber_id);
    }


}
