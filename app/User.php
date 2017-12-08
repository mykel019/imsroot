<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use App\Setup;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subscriber_id', 'email', 'password','title','fname','mname','lname','suffix','birthdate','contact_details','position_id','access_type_id','location_id',
    ];

    /*
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function isSetup(){
        $InitialSetup = Setup::where('subscriber_id',Auth::User()->subscriber_id)->first();
        if($InitialSetup->steps == 3 || $InitialSetup->steps == 4){
            return true;
        }
    } 
}
