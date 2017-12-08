<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Auth;
use Crypt;

class UsersRequest extends Request
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
            'email'     => 'required|email|unique:users,email',
            'fname'    => 'required',
            'position_id'    => 'required',
            'mname'    => 'required',
            'lname'    => 'required'
        ];

        if($this->get('id')){
            $id = Crypt::decrypt($this->get('id'));
            $rules['email'] = 'required|email|unique:users,email,'.$id;
            if($this->get('password')){
                $rules['password'] = 'required';
            }
        }else{
            $rules['password'] = 'required';
        }
        return $rules;
    }

    public function messages(){
        $messages =  [

        ];

        return $messages;
    }
}
