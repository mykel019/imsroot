<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Crypt;

class PurchaseOrdersRequest extends Request
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
            'supplier_id'  => 'required',
            'po_date'      => 'required|date',
            'supplier_po_no' =>  'required|unique_with:purchase_orders,subscriber_id',
            'product' => 'required',
            'po_no'    => 'unique:purchase_orders'
            // 'order_status' => 'required'
        ];


        if($this->get('id')){
            $id = Crypt::decrypt($this->get('id'));
            $rules['supplier_po_no'] = 'required|unique_with:purchase_orders,subscriber_id,'.$id;
        }

        return $rules;
    }

    public function messages(){
        $messages =  [
            'supplier_po_no.unique_with' => 'Supplier PO Number already exists'
        ];

        return $messages;
    }
}
