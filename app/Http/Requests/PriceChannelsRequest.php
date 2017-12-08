<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Crypt;

class PriceChannelsRequest extends Request
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
            'name'     => 'required|unique_with:price_channels,subscriber_id',
            'price'  => 'required',
        ];

        if($this->get('id')){
            $id = Crypt::decrypt($this->get('id'));
            $rules['name'] = 'required|unique:price_channels,subscriber_id,'.$id;
        }
        return $rules;
    }

    public function messages(){
        $messages =  [

        ];

        return $messages;
    }
}
