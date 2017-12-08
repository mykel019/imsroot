<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Crypt;

class AccessTypesRequest extends Request
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

        // dd($this->get('subscriber_id'));
        $rules =  [
            'name'  => 'required|unique_with:access_types,subscriber_id',
        ];

        if($this->get('id')){
            $id = Crypt::decrypt($this->get('id'));
            $rules['name'] = 'required|unique_with:access_types,subscriber_id,'.$id;
        }
        return $rules;
    }

    public function messages(){
        $messages =  [

        ];

        return $messages;
    }
}
