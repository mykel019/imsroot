<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Crypt;

class EmployeesRequest extends Request
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
            'fname'            => 'required',
            'lname'            => 'required',
            'mname'            => 'required',
            'employee_no'      => 'required|unique_with:employees,subscriber_id'
        ];

        if($this->get('id')){
            $id = Crypt::decrypt($this->get('id'));
            $rules['employee_no'] = 'required|unique_with:employees,subscriber_id,'.$id;
        }

        return $rules;
    }

    public function messages(){
        $messages =  [

        ];

        return $messages;
    }
}
