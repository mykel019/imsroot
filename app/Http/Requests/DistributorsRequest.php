<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Crypt;

class DistributorsRequest extends Request
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
            'name'           => 'required|unique:distributors',
            'company'        => 'required',
            // 'contact_person' => 'required',
            // 'payment_terms'  => 'required',
            // 'addr1'          => 'required',
            // 'addr2'          => 'required',
            // 'city'           => 'required',
            // 'province'       => 'required',
            // 'postal'         => 'required',
            // 'country'        => 'required',
        ];

        if($this->get('id')){
            $id = Crypt::decrypt($this->get('id'));
            $rules['name'] = 'required|unique:distributors,name,'.$id;
        }
        return $rules;
    }

    public function messages(){
        $messages =  [

        ];

        return $messages;
    }
}
