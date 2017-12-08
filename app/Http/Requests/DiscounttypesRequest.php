<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Crypt;

class DiscounttypesRequest extends Request
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
            'code'     => 'required',
            'name'  => 'required',
            'disc_value'  => 'required',
            'disc_target'  => 'required',
            'effectivity_start'  => 'required',
            'effectivity_end'  => 'required',
        ];

        if($this->get('id')){
            $id = Crypt::decrypt($this->get('id'));
            $rules['code'] = 'required|unique:discount_types,id,'.$id;
        }
        return $rules;
    }

    public function messages(){
        $messages =  [

        ];

        return $messages;
    }
}
