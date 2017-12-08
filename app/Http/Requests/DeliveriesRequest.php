<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Crypt;

class DeliveriesRequest extends Request
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
            // 'dr_no'  => 'required',
            // 'or_no'  => 'required',
            // 'si_no'  => 'required',
            // 'tf_no'  => 'required',
            'delivery_date'      => 'required|date',
            // 'product' => 'required'
            // 'order_status' => 'required'
        ];


        if($this->get('id')){
            $id = Crypt::decrypt($this->get('id'));
            $rules['dr_no'] = 'required|unique_with:deliveries,subscriber_id,'.$id;
        }

        return $rules;
    }

    public function messages(){
        $messages =  [
            'dr_no.unique_with' => 'Delivery Number already exists'
           
        ];

        return $messages;
    }
}
