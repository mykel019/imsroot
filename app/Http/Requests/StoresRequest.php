<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Crypt;

class StoresRequest extends Request
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
            'manager'  => 'required',
            'addr1'    => 'required',
            'addr2'    => 'required',
            'city'     => 'required',
            'province' => 'required',
            'postal'   => 'required',
            'country'  => 'required',
        ];

        if($this->get('id')){
            $id = Crypt::decrypt($this->get('id'));
            $rules['name'] = 'required|unique:stores,id,'.$id;
        }
        return $rules;
    }

    public function messages(){
        $messages =  [

        ];

        return $messages;
    }
}
