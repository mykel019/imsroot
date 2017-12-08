<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Crypt;

class ReceivedRequest extends Request
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
            // 'dr_no' => 'unique:received',
            // 'po_no' => 'unique:received',

        ];


        return $rules;
    }

    public function messages(){
        $messages =  [
        
             // 'dr_no.unique' => 'Existing Delivery Number',
             // 'po_no.unique' => 'Existing Purchase Order Number',
        ];

        return $messages;
    }
}
