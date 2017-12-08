<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Crypt;

class LocationsRequest extends Request
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {


        $rules =  [
            'name'     => 'required',
            'code'     => 'required|unique_with:locations,subscriber_id',
            'business_name'  => 'required',
            // 'addr1'    => 'required',
            // 'addr2'    => 'required',
            // 'city'     => 'required',
            // 'province' => 'required',
            // 'postal'   => 'required',
            // 'country'  => 'required'
        ];

        // if($this->get('os'))

        if($this->get('id')){
            $id = Crypt::decrypt($this->get('id'));
            $rules['code'] = 'required|unique_with:locations,subscriber_id,'.$id;
        }
        return $rules;
    }

    public function messages(){
        $messages =  [

        ];

        return $messages;
    }
}
