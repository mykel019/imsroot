<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
abstract class Request extends FormRequest
{
    //

    protected function getValidatorInstance()
    {

        // Add new data field before it gets sent to the validator
        $this->merge(array('subscriber_id' => Auth::User()->subscriber_id));

        // OR: Replace ALL data fields before they're sent to the validator
        // $this->replace(array('date_of_birth' => 'test'));
        // Fire the parent getValidatorInstance method
        return parent::getValidatorInstance();

    }

}
