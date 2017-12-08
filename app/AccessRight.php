<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class AccessRight extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'access_rights';
    protected $fillable = [
        'subscriber_id',
        'access_type_id',
        'access_module_id',
        'to_view',
        'to_add',
        'to_edit',
        'to_delete',
        'to_import',
        'to_export',
    ];


    public function scopeSubscriber($query){
        return $query->where($this->table.'.subscriber_id',Auth::User()->subscriber_id);
    }

    public function accessType(){
        return $this->belongsTo('App\AccessType');
    }

}
