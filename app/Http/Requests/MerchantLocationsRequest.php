<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Auth;
use Crypt;

class MerchantLocationsRequest extends Request
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
            'location_id'   => 'required|unique_with:merchant_locations,subscriber_id',
            'merchan_user_id'       => 'required',
        ];

        if($this->get('id')){
            $id = Crypt::decrypt($this->get('id'));
            $rules['location_id'] = 'required|unique_with:merchant_locations,subscriber_id,'.$id;
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
