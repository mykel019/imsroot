<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Crypt;

class ProductsRequest extends Request
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

        $settings = \App\Setting::subscriber()->where('module','product')->select('options')->get()->first();
        $setting = @json_decode($settings->options);   

        // dd($setting);
            if($setting !== null){
                if(@$setting->code){
                    $rules['code'] = 'required|unique_with:products,subscriber_id';
                }
                if(@$setting->sku){
                    $rules['sku'] = 'required|unique_with:products,subscriber_id';
                }
                if(@$setting->stock_code){
                    $rules['stock_code'] = 'required|unique_with:products,subscriber_id';
                }
                // if(@$setting->supplier_code){
                //     $rules['supplier_code'] = 'required|unique_with:products,subscriber_id';
                // }
                if(@$setting->bar_code){
                    $rules['barcode'] = 'required|unique_with:products,subscriber_id';
                }
            }else{
                $rules['code']          = 'required|unique_with:products,subscriber_id';
                $rules['sku']           = 'required|unique_with:products,subscriber_id';
                $rules['stock_code']    = 'required|unique_with:products,subscriber_id';
                // $rules['supplier_code'] = 'required|unique_with:products,subscriber_id';
                $rules['barcode']       = 'required|unique_with:products,subscriber_id';
            }



        // dd($this->get('pc_name'));

         
         //ALLOW DUPLICATE CODES IF CODE IS MARK AS DELETED   
        $verifyDeletedProduct = $this->verifyDeletedProduct($rules);
        if($verifyDeletedProduct && $verifyDeletedProduct->deleted_at != null){
            $rules = Array();
        }

        // if($this->get('cost') == 0)  $this->merge(array('cost' => null));
        // dd($this->get('cost'));

        if($this->get('unit_cost_chk') == 'on'){
            $rules['unitofmeasure_id'] = 'required';
            $rules['unit_cost'] = 'required';
            $rules['unitofmeasure_value'] = 'required';
        }

        // $rules['location_id']  = 'required';
        $rules['name']  = 'required';
        // $rules['cost']  = 'required';
        if($this->get('price_default')){
            $rules['price_default']  = 'required';
        }




        if($this->get('id')){
            $id = Crypt::decrypt($this->get('id'));

            if($this->get('code')) $rules['code'] = 'required|unique_with:products,subscriber_id,'.$id;
            if($this->get('sku')) $rules['sku'] = 'required|unique_with:products,subscriber_id,'.$id;
            if($this->get('stock_code')) $rules['stock_code'] = 'required|unique_with:products,subscriber_id,'.$id;
            // if($this->get('supplier_code')) $rules['supplier_code'] = 'required|unique_with:products,subscriber_id,'.$id;
            if($this->get('barcode')) $rules['barcode'] = 'required|unique_with:products,subscriber_id,'.$id;
            unset($rules['qty']);
            unset($rules['location_id']);
        }
        // dd($rules);
        return $rules;
    }

    public function messages(){
        $messages =  [
            'name.required' => 'The Product Name field is required.',
            'unitofmeasure_id.required' => 'The Unit of Measure field is required.',
            'unitofmeasure_value.required' => 'The Unit of Measure Value is required.',
            'code.unique_with' => 'The code has already been taken.',
            'sku.unique_with' => 'The SKU has already been taken.',
            'sku.required' => 'The SKU field is required.',
        ];

        return $messages;
    }


    private function verifyDeletedProduct($rules){

        $query = \App\Product::withTrashed()->subscriber();
            if(@$rules['code']) $query =   $query->where('code','LIKE','%'.$this->get('code').'%');
                
            if(@$rules['sku'])    $query  =   $query->where('sku','LIKE','%'.$this->get('sku').'%');
            if(@$rules['stock_code'])    $query =   $query->where('stock_code','LIKE','%'.$this->get('stock_code').'%');
            if(@$rules['barcode'])    $query    =   $query->where('barcode','LIKE','%'.$this->get('barcode').'%');
            $query =   $query->orderBy('created_at','DESC')
                            ->get()->first();

    }
}
