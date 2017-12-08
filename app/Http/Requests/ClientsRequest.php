<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Crypt;

class ClientsRequest extends Request
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
            'name'            => 'required',
            'email'           => 'required|unique_with:clients,subscriber_id',
            'company'         => 'required',
            'account_manager' => 'required',
            'phone'           => 'required',
            'contact_person'  => 'required',
            'payment_terms'   => 'required',
            'bill_addr1'      => 'required',
            'bill_addr2'      => 'required',
            'bill_city'       => 'required',
            'bill_province'   => 'required',
            'bill_postal'     => 'required',
            'bill_country'    => 'required',
            'ship_addr1'      => 'required',
            'ship_addr2'      => 'required',
            'ship_city'       => 'required',
            'ship_province'   => 'required',
            'ship_postal'     => 'required',
            'ship_country'    => 'required',
        ];

        if($this->get('id')){
            $id = Crypt::decrypt($this->get('id'));
            $rules['email'] = 'required|required|unique_with:clients,subscriber_id,'.$id;
        }


        return $rules;
    }

    public function messages(){
        $messages =  [

        ];

        return $messages;
    }
}
