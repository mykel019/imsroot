<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Auth;
use Crypt;

class PosusersRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


     /** 
     * Extend the default getValidatorInstance method
     * so fields can be modified or added before validation
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules =  [
            'username'     => 'required|unique_with:pos_users,subscriber_id',
            'password'  => 'required',
            'firstname'    => 'required',
            'position_id'    => 'required',
            'middlename'    => 'required',
            'lastname'    => 'required',
            'location_id'      =>'required'
            // 'addr1'    => 'required',
            // 'addr2'    => 'required',
            // 'city'    => 'required',    
            // 'province'    => 'required',
            // 'postal'    => 'required',
            // 'country'    => 'required'
        ];

        if($this->get('id')){
            $id = Crypt::decrypt($this->get('id'));
            $rules['username'] = 'required|unique_with:pos_users,subscriber_id,'.$id;
            if(!$this->get('password')){
                unset($rules['password']);
            }
        }
        return $rules;
    }

    public function messages(){
        $messages =  [

        ];

        return $messages;
    }
}
