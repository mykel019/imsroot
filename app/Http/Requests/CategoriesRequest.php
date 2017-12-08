<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Crypt;

class CategoriesRequest extends Request
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
            'name'        => 'required|unique_with:categories,subscriber_id',
        ];

        $cf = $this->get('custom_fields');
        if(count($cf) > 0){
            foreach ($cf as $key => $value) {
                $rules['custom_fields.'.$key] = 'required';
            }
        }


        $sc = $this->get('sub_category_id');
        if(count($sc) > 0){
            foreach ($sc as $key => $value) {
                $rules['sub_category_id.'.$key] = 'required';
            }
        }

        if($this->get('id')){
            $id = Crypt::decrypt($this->get('id'));
            $rules['name'] = 'required|unique_with:categories,subscriber_id,'.$id;
        }

        return $rules;
    }


    public function messages(){
        // $messages =  [
        //     'custom_fields[].required' => 'Custom fields must not be empty',
        //     // 'sub_category_id[].required' => 'Sub-Category fields must not be empty',
        // ];
        $messages = [];

        $cf = $this->get('custom_fields');
        if(count($cf) > 0){
            foreach ($cf as $key => $value) {
                $messages['custom_fields.'.$key.'.required'] = 'must not be empty';
            }
        }

        $sc = $this->get('sub_category_id');
        if(count($sc) > 0){
            foreach ($sc as $key => $value) {
                $messages['sub_category_id.'.$key.'.required'] = 'must not be empty';
            }
        }

        return $messages;
    }
}
