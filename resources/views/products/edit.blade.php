@extends('app')

@section('sidemenu')
@endsection

@section('content')
<div class="container body">
    <div class="main_container">
        @include('elements/nav')
        @include('elements/sidemenu')
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-10 col-sm-12 col-xs-12">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>{{ $title }}</h3>
                        </div>

                    </div>

                    <div class="x_panel">
                        <div class='x_title'>
                            <div class="row">
                                <a href="{{ url($module) }}" class="btn btn-app"><i class="fa fa-long-arrow-left"></i> Return</a>
                                <a class="btn btn-app product-submit"><i class="glyphicon glyphicon-floppy-disk"></i> Save </a>
                                <!-- <a class="btn btn-app clear-form"><i class="glyphicon glyphicon-erase"></i> Clear </a> -->
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1" id="product-tab" role="tab" data-toggle="tab" aria-expanded="true">Product</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="pricing-tab" data-toggle="tab" aria-expanded="false">Pricing</a>
                                    </li>
                                    <!-- <li role="presentation" class=""><a href="#tab_content3" role="tab" id="inventory-tab" data-toggle="tab" aria-expanded="false">Inventory</a>
                                    </li> -->
                                    <li role="presentation" class=""><a href="#tab_content4" role="tab" id="supplier-tab" data-toggle="tab" aria-expanded="false">Supplier</a>
                                    </li>
                                </ul>
                                <form method="POST" action="{{ url('/').'/'.$module.'/update'}}" onsubmit="return false" id="form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{{ Crypt::encrypt($result->id) }}">
                                    <div id="myTabContent" class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="product-tab">
                                            <div class="col-xs-12 col-md-4 ">
                                                <div class="inner-panel">
                                                    <?php if ( !empty($result->photo)): ?>
                                                    <img src="{{ asset('uploads/product_photos/'.$result->photo) }}" class="img-responsive image-upload" alt="">
                                                    <?php else: ?>
                                                    <img src="{{ asset('img/default-item.png') }}" class="img-responsive image-upload" alt="">
                                                    <?php endif ?>
                                                    <img src="{{ asset('img/photo-loader.gif') }}" class="img-loader" alt="">
                                                    <input type="hidden" name="photo" value="{{ $result->photo }}">
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-md-4 ">
                                                <div class="inner-panel">
                                                    <div class="ip-title">Categorization</div>
                                                    <div class="ip-body">
                                                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                            <label>Product Name</label>
                                                            <input type='text' name='name' value="{{ $result->name }}"  class='form-control'>
                                                        </div>

                                                        <div class="form-group {{ $errors->has('department_id') ? ' has-error' : '' }}">
                                                            <label>Department</label>
                                                            <select name='department_id' value="$result->department_id" class='form-control'>
                                                            </select>
                                                        </div>

                                                        <div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                                                            <label>Category</label>
                                                            <select name='category_id'  class='form-control'>
                                                                <option value="">Select Category</option>
                                                                <?php foreach ($categories as $key => $value): ?>
                                                                    <?php 
                                                                        $selected = '';
                                                                        if ($result->category_id == $value->id){
                                                                            $selected = 'selected';
                                                                        } 

                                                                    ?>
                                                                    <option value="{{ $value->id }}" {{ $selected }} >{{ $value->name }}</option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group {{ $errors->has('brand_id') ? ' has-error' : '' }}">
                                                            <label>Brand</label>
                                                            <select name='brand_id' class='form-control'>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Pack By</label>
                                                            <select name='packing_list_id' class='packing_list_id form-control'>
                                                            </select>
                                                        </div>

                                                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                                            <label>Description</label>
                                                            <textarea name='description'  class='form-control'>{{ $result->description }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-md-4">
                                                <div class="inner-panel">
                                                    <div class="ip-title">Additional Fields</div>
                                                    <div class="ip-body">
                                                        <label>POS Fields  </label>
                                                        {{ $result->pos_requied_fields }}
                                                        <input type="text" name="pos_required_fields" value="{{ $result->pos_required_fields }}" class="form-control">
                                                        <div class="prf-chk-wrap"></div>
                                                        <hr>
                                                        <div class="custom-fields"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-md-4">
                                                <div class="inner-panel">
                                                    <div class="ip-title">Product Identifier</div>
                                                    <div class="ip-body">
                                                        <?php 
                                                            // dd($settings);
                                                            if($settings !== null){
                                                                (@$settings->sku) ? $setting_sku = true : $setting_sku = false;
                                                                (@$settings->stock_code) ? $setting_stock_code = true : $setting_stock_code = false;
                                                                (@$settings->supplier_code) ? $setting_supplier_code = true : $setting_supplier_code = false;
                                                                (@$settings->bar_code) ? $setting_bar_code = true : $setting_bar_code = false;
                                                                (@count($settings->custom_fields) > 0) ? $setting_custom_fields = true : $setting_custom_fields = false;
                                                                (@$settings->enable_price_channel) ? $setting_price_channel = true : $setting_price_channel = false;
                                                            }else{
                                                                $setting_stock_code = true;
                                                                $setting_supplier_code = true;
                                                                $setting_bar_code = true;
                                                                $setting_sku = true;
                                                                $setting_custom_fields = false;
                                                                $setting_price_channel = false;
                                                            }
                                                        ?>

                                                        
                                                        <?php if ($setting_sku): ?>
                                                        <div class="form-group {{ $errors->has('sku') ? ' has-error' : '' }}">
                                                            <label>SKU <span class="required">*</span></label>
                                                            <input type='text' name='sku' value="{{ $result->sku }}"  class='form-control'>
                                                        </div>
                                                        <?php endif ?>
                                                        
                                                        <?php if ($setting_stock_code): ?>
                                                        <div class="form-group {{ $errors->has('stock_code') ? ' has-error' : '' }}">
                                                            <label>Stock Code <span class="required">*</span></label>
                                                            <input type='text' name='stock_code' value="{{ $result->stock_code }}"  class='form-control'>
                                                        </div>
                                                        <?php endif ?>

                                                        <?php if ($setting_supplier_code): ?>
                                                        <div class="form-group {{ $errors->has('supplier_code') ? ' has-error' : '' }}">
                                                            <label>Supplier Code <span class="required">*</span></label>
                                                            <input type='text' name='supplier_code' value="{{ $result->supplier_code }}"  class='form-control'>
                                                        </div>
                                                        <?php endif ?>
                                                        
                                                        <?php if ($setting_bar_code): ?>
                                                        <div class="form-group {{ $errors->has('barcode') ? ' has-error' : '' }}">
                                                            <label>Bar Code <span class="required">*</span></label>
                                                            <input type='text' name='barcode' value="{{ $result->barcode }}"  class='form-control'>
                                                        </div>
                                                        <?php endif ?>

                                                        <?php if ($setting_custom_fields): ?>
                                                            <?php foreach ($settings->custom_fields as $key => $value): ?>
                                          
                                                                <div class="form-group">
                                                                    <label>{{ ucwords($value) }}</label>
                                                                    <input type='text' name='adtl_product_code[{{ $value }}]' value="{{ $value }}"  class='form-control'>
                                                                </div>
                                                            <?php endforeach ?>

                                                        <?php endif ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="pricing-tab">
                                            <div class="col-xs-12 col-md-4">
                                                <div class="inner-panel">
                                                    <div class="ip-title">Inventory & Pricing</div>
                                                    <div class="ip-body">
                                                        <div class="form-group">
                                                            <label>Unit Cost</label>
                                                            <?php 
                                                                $checked = '';
                                                                if($result->unit_cost_chk == 1) $checked = 'checked';
                                                             ?>
                                                            <label class="pull-right"><input type="checkbox" name="unit_cost_chk" {{ $checked }} class="enable-unit-cost flat" > Enable</label> 
                                                            <div class="unit-cost-wrapper">
                                                                <?php if ($checked == ''): ?>
                                                                    <input type="text" name="unit_cost" disabled value="{{ $result->unit_cost }}" class="form-control numberinput">
                                                                <?php else: ?>
                                                                    <input type="text" name="unit_cost" value="{{ $result->unit_cost }}" class="form-control numberinput">
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group {{ $errors->has('unitofmeasure_id') ? ' has-error' : '' }}">
                                                            <label>Unit of Measures</label>
                                                            <?php $disable= 'disabled'; if($result->unit_cost_chk == 1) $disable = ''; ?>
                                                            <select name='unitofmeasure_id' value="{{ $result->unitofmeasure_id }}" {{$disable}} class="form-control">
                                                            </select>
                                                        </div>


                                                         <div class="form-group">
                                                            <label>Value per Unit Cost</label>
                                                            <!-- <input type="text" name="unitofmeasure_value" class="form-control" /> -->
                                                            <div class="input-group">
                                                                <input type="text" name="unitofmeasure_value" disabled value="{{ $result->unitofmeasure_value }}" class="form-control numberinput" aria-describedby="basic-addon3">
                                                                <span class="input-group-addon uom_v" id="basic-addon3"></span>
                                                            </div>
                                                        </div>


                                                        <div class="form-group {{ $errors->has('cost') ? ' has-error' : '' }}">
                                                            <label>Cost</label>
                                                            <input type='text' name='cost' value="{{ $result->cost }}" {{ ($checked == 'checked') ? 'disabled' : '' }} class='form-control numberinput'>
                                                          
                                                        </div>


                                                        <div class="form-group {{ $errors->has('price_default') ? ' has-error' : '' }}">
                                                            <label>Default Selling Price</label>
                                                            <input type='text' name='price_default' {{ ($checked == 'checked') ? 'disabled' : '' }} value="{{ $result->price_default }}"  class='form-control numberinput'>
                                                           
                                                        </div>

                                                        <div class="form-group {{ $errors->has('zero_rated') ? ' has-error' : '' }}">
                                                            <label>Tax Scheme</label>
                                                            <select name='zero_rated'  class='form-control'>
                                                                <option value="0" {{ ($result->zero_rated == 0) ? "selected":"" }} >Taxable</option>
                                                                <option value="1" {{ ($result->zero_rated == 1) ? "selected":"" }}  >Non Taxable</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Discount Type</label> 
                                                            <select  class='form-control' name="discount_type_id">
                                                                    <option value="">Select Discount</option>
                                                                <?php foreach ($discount_types as $key => $value): ?>
                                                                    <?php ($value->percentage == 1)  ? $curr='%' : $curr = ''; ?>
                                                                    <?php $selected = ''; if($value->id == $result->discount_type_id) $selected = 'selected'; ?>
                                                                    <option value="{{ $value->id }}" {{ $selected }}> {{ $value->name." ( ".$value->disc_value.$curr." )" }}</option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if ($setting_price_channel): ?>
                                            <div class="col-xs-12 col-md-8">
                                                <div class="inner-panel">
                                                    <div class="ip-title">Pricing Channel</div>
                                                    <div class="ip-body">
                                                        <div class="row">
                                                            <div class="channel-wrapper">
                                                                <input type="hidden" name="price_details" class="price_details">
                                                                <input type="hidden" name="price_removed" class="price_removed">
                                                                <div class="well col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Price Channel Name</label>
                                                                        <input type='text' class='form-control pc_name'>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Client</label>
                                                                        <select class='form-control client_id'>
                                                                            <option value="">Select Client</option>
                                                                            <?php foreach ($clients as $key => $value): ?>
                                                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Price</label>
                                                                        <input type='text' class='numberinput form-control pc_price'>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Discount Type</label> 
                                                                        <select  class='form-control discount_type_id'>
                                                                                <option value="">Select Discount</option>
                                                                            <?php foreach ($discount_types as $key => $value): ?>
                                                                                <?php ($value->percentage == 1)  ? $curr='%' : $curr = ''; ?>
                                                                                <option value="{{ $value->id }}"> {{ $value->name." ( ".$value->disc_value.$curr." )" }}</option>
                                                                            <?php endforeach ?>
                                                                        </select>
                                                                    </div>
                                                                    <a class="btn btn-round btn-success pull-right channel-btn"> + Add Price Channel </a>
                                                                </div>

                                                                <div class="col-md-8">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <th>Name</th>
                                                                            <th>Client</th>
                                                                            <th>Price</th>
                                                                            <th>Discount </th>
                                                                            <th></th>
                                                                        </thead>
                                                                        <tbody class="price-wrapper">
                                                                            
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif ?>
                                        </div>

                                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="inventory-tab">
                                            <div class="well col-md-4 inv-siblings">
                                                <input type="hidden" name="inventory_details">
                                                <div class="form-group {{ $errors->has('location_id') ? ' has-error' : '' }}">
                                                    <label>Location</label>
                                                    <select   class='form-control location_id'>
                                                    </select>
                                                </div>
                                                <div class="form-group {{ $errors->has('zone_id') ? ' has-error' : '' }}">
                                                    <label>Zone</label>
                                                    <select type='text'  class='zone_id form-control'>
                                                    </select>
                                                </div>
                                                <div class="form-group {{ $errors->has('qty') ? ' has-error' : '' }}">
                                                    <label>Qty / Weight</label>
                                                    <input type='text' value="{{ old('qty') }}"  class='qty form-control numberinput'>
                                                </div>

                                                <a class="btn btn-round btn-success pull-right inventory-btn"> + Add Inventory </a>
                                            </div>
                                            <div class="col-md-8">
                                                <table class='table'>
                                                    <thead>
                                                        <th>Location</th>
                                                        <th>Zone</th>
                                                        <th>Qty</th>
                                                        <th></th>
                                                    </thead>
                                                    <tbody class="inventory-wrapper">
                                                        
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                        <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="supplier-tab">
                                            <div class="well col-md-4">
                                                <input type="hidden" name="supplier_details">
                                                <input type="hidden" name="supplier_removed" class="supplier_removed">
                                                <div class="form-group {{ $errors->has('supplier_id') ? ' has-error' : '' }}">
                                                    <label>Supplier</label>
                                                    <select value="{{ old('supplier_id') }}" class='supplier_id form-control'>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Supplier Code</label>
                                                    <input type='text'  class='supplier_code form-control'>
                                                </div>
                                                <div class="form-group {{ $errors->has('cost') ? ' has-error' : '' }}">
                                                    <label>Cost</label>
                                                    <input type='text' value="0"  class='cost form-control numberinput'>
                                                </div>
                                                <a class="btn btn-round btn-success pull-right supplier-btn"> + Add Supplier </a>
                                            </div>
                                            <div class="col-md-8">
                                                <table class='table'>
                                                    <thead>
                                                        <th>Supplier</th>
                                                        <th>Supplier Code</th>
                                                        <th>Cost</th>
                                                        <th></th>
                                                    </thead>
                                                    <tbody class="supplier-wrapper">
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
            <br />
        </div>
        <!-- /page content -->

        <form id="photoUpload" action="{{ url('/products/photoupload') }}" method="post" enctype="multipart/form-data" style="display:none">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="file" name="file" id="photo">
        </form>

        @include('elements/footer')
    </div>
</div>
@endsection



@section('js-logic1')
<script>
    $(document).ready(function(){

        var cf = '<?=$result->custom_fields ?>';
        var product_id = {!! $result->id !!}

        if(cf != ''){
            var cf = JSON.parse('<?=$result->custom_fields  ?>');
        }

        var unitcost = "{{$result->unit_cost}}";

        if(unitcost == 0){
            $('.enable-unit-cost').attr('checked', false);
            $('.enable-unit-cost').prop('checked', false);
            $('.enable-unit-cost').iCheck('uncheck');
            
                $("input[name=cost]").attr('disabled',false).val(0);
                $("input[name=price_default]").attr('disabled',false).val(0);
                $("input[name=unit_cost]").attr('disabled',true).val(0);
                $("input[name=unitofmeasure_value]").attr('disabled',true).val(0);
                unitofmeasureSelectize[0].selectize.disable();

        } else {

            $('.enable-unit-cost').attr('checked', true);
            $(".enable-unit-cost").prop("checked",true);
            $(".enable-unit-cost").iCheck('update')[0].checked;

                $("input[name=cost]").attr('disabled',true).val(0);
                $("input[name=price_default]").attr('disabled',true).val(0);
                $("input[name=unit_cost]").attr('disabled',false);
                $("input[name=unitofmeasure_value]").attr('disabled',false);
                unitofmeasureSelectize[0].selectize.enable();
        }


        var brands = {!! $brands !!};
        var departments = {!! $departments !!};
        var suppliers = {!! $suppliers !!};
        var unitofmeasures = {!! $unitofmeasures !!};
        var priceChannels = {!! $priceChannels !!};
        var supplierProducts = {!! $supplierProducts !!};
        var packinglists = {!! $packinglists !!};
        var locations = {!! $locations !!};
        var prf = '<?=$result->pos_required_fields ?>';
        var prchk = '<?=$result->pos_required_chk ?>';
        // console.log(prf)


        var brandSelectize =    $("select[name=brand_id]").selectize({
                                    create:true,
                                    valueField: 'description',
                                    labelField: 'description',
                                    searchField: 'description',
                                });

        var packSelectize =    $("select[name=packing_list_id]").selectize({
                                    create:true,
                                    valueField: 'packs',
                                    labelField: 'packs',
                                    searchField: 'packs',
                                });


        var departmentSelectize =  $("select[name=department_id]").selectize({
                                        create:true,
                                        valueField: 'description',
                                        labelField: 'description',
                                        searchField: 'description',
                                    });


        var supplierSelectize = $(".supplier_id").selectize({
                                    create:true,
                                    valueField: 'name',
                                    labelField: 'name',
                                    searchField: 'name',
                                });

        var clientSelectize = $(".client_id").selectize({
                                  
                                    valueField: 'id',
                                    labelField: 'name',
                                    searchField: 'name',
                                });

        var unitofmeasureSelectize = $("select[name=unitofmeasure_id]").selectize({
                                        create:true,
                                        valueField: 'description',
                                        labelField: 'description',
                                        searchField: 'description',
                                        onChange:function(data){
                                            $(".uom_v").html(data)
                                            if(data == ''){
                                                $("input[name=unitofmeasure_value]").attr('disabled',true);
                                            }else{
                                                $("input[name=unitofmeasure_value]").attr('disabled',false);
                                            }
                                        }
                                    });

        // var locationSelectize = $("select[name=location_id]").selectize({
        //                             create:true,
        //                             valueField: 'id',
        //                             labelField: 'name',
        //                             searchField: 'name',
        //                             onChange:function(data){
        //                                 $.get(base_url+module+'/zones',{locid:data},function(data){
        //                                     zoneSelectize[0].selectize.addOption(JSON.parse(data))
        //                                     zoneSelectize[0].selectize.setValue(JSON.parse('<?=json_encode((old("zone_id")) ? old("zone_id") : $result->zone_id)  ?>'));
        //                                 })
        //                             }
        //                         });

        // var zoneSelectize = $("select[name=zone_id]").selectize({
        //                                 // create:true,
        //                                 valueField: 'id',
        //                                 labelField: 'name',
        //                                 searchField: 'name',
        //                             });


        var posreqSelectize = $("input[name=pos_required_fields]").selectize({
                                        delimiter: ',',
                                        plugins: ['remove_button'],
                                        persist: false,
                                        create: function(input) {
                                            return {
                                                value: input,
                                                text: input
                                            }
                                        },
                                        onChange:function(data){
                                            if(data == '') { $('.prf-chk-wrap').html(''); return false; }
                                            chk = '';
                                            value = '';
 
                                            if(prchk == 1){ chk='checked'; }
                                            content = '<label></a><input type="checkbox" class="flat" '+chk+'  name="pos_required_chk"> Check to require</label>';
                                            $('.prf-chk-wrap').html(content)
                                        }
                                    });



        if(brands){
            brandSelectize[0].selectize.addOption(brands)
        }

        if(packinglists){
            packSelectize[0].selectize.addOption(packinglists)
            packSelectize[0].selectize.setValue('<?=$result->packs ?>')
        }

        if(departments){
            departmentSelectize[0].selectize.addOption(departments)
        }

        if(suppliers){
            supplierSelectize[0].selectize.addOption(suppliers)
        }

        if(unitofmeasures){
            unitofmeasureSelectize[0].selectize.addOption(unitofmeasures)
        }

        // if(locations){
        //     locationSelectize[0].selectize.addOption(locations)
        // }
        // console.log(prf)
        if(prf){
            // posreqSelectize[0].selectize.setValue()
        }


        /*SET OLD VALUES*/

        brandSelectize[0].selectize.setValue(JSON.parse('<?=json_encode((old("brand_id")) ? old("brand_id") : $result->brand_id)  ?>'));
        departmentSelectize[0].selectize.setValue(JSON.parse('<?=json_encode((old("department_id")) ? old("department_id") : $result->department_id)  ?>'));
        supplierSelectize[0].selectize.setValue(JSON.parse('<?=json_encode((old("supplier_id")) ? old("supplier_id") : $result->supplier_id)  ?>'));
        unitofmeasureSelectize[0].selectize.setValue(JSON.parse('<?=json_encode((old("unitofmeasure_id")) ? old("unitofmeasure_id") : $result->unitofmeasure_id)  ?>'));
        // locationSelectize[0].selectize.setValue(JSON.parse('<?=json_encode((old("location_id")) ? old("location_id") : $result->location_id)  ?>'));
        

        var categorySelectize = $('select[name=category_id]').selectize({
                                    onChange:function(data){ 

                                        $.get(base_url+module+'/customfields',{id:data},function(data){
                                            fields = '';
                                            if(data){
                                                par = JSON.parse(data);
                                                console.log(par)
                                                $.each(par,function(k,v){
                                                    if(cf){
                                                        cfVal = cf[v];
                                                    }else{
                                                        cfVal = '';
                                                    }

                                                    fields +=   '<div class="form-group">'+
                                                                    '<label style="text-transform:capitalize">'+v+'</label>'+
                                                                    '<input type="text" name="custom_fields[]" value="'+cfVal+'" class="form-control">'+
                                                                '</div>';
                                                });
                                            }

                                            $(".custom-fields").html(fields);
                                        })
                                    }
                                });

            category = categorySelectize[0].selectize.getValue();
            categorySelectize[0].selectize.setValue(category)

    
    var invArr =Array();
    var supArr =Array();
    var priceArr =Array();


    if(priceChannels){
        $.each(priceChannels,function(k,v){
            priceArr.push({id:v.id, client_id:v.client_id, clientName:v.client_name, price:v.price, discount_id:v.discount_type_id, discountName:v.discount_name, name:v.name})
        })
        addedPrice(priceArr)
    }

    if(supplierProducts){
        $.each(supplierProducts,function(k,v){
            supArr.push({id:v.id, supplierId:v.supplier_id, cost:v.cost, supplierCode:v.supplier_code, supplierName:v.supplier_name})
        })

        addedSupplier(supArr)
    }

    $('.inventory-btn').click(function(){
        locationId = locationSelectize[0].selectize.getValue();
        zoneId = zoneSelectize[0].selectize.getValue();
        locationName = $(".location_id .item").text();
        zoneName = $(".zone_id .item").text();
        qty = $(".qty").val();

        var exist = false;
        if(locationId == '' || zoneId == '' || qty == '' || qty == 0) return false;
        if(invArr.length > 0){
            $.each(invArr, function(k, v){
                if(v.location_id == locationId && v.zone_id == zoneId){
                    exist = true;
                }
            })

            if(exist == false){
              invArr.push({location_id:locationId, zone_id:zoneId, qty:qty, locationName:locationName, zoneName:zoneName})
               addedInventory(invArr)
            }

        }else{
            invArr.push({location_id:locationId, zone_id:zoneId, qty:qty, locationName:locationName, zoneName:zoneName})
            addedInventory(invArr)
        }

    });

    
    $('.supplier-btn').click(function(){
        supplierId = supplierSelectize[0].selectize.getValue();
        supplierName = $(".supplier_id .item").text();
        cost = $(".cost").val();
        supplierCode = $(".supplier_code").val();

        var exist = false;
        if(supplierId == '') return false;
        if(supArr.length > 0){
            $.each(supArr, function(k, v){
                if(v.supplierId == supplierId){
                    exist = true;
                }
            })

            if(exist == false){
              supArr.push({supplierId:supplierId, cost:cost, supplierCode:supplierCode, supplierName:supplierName})
               addedSupplier(supArr)
            }

        }else{
            supArr.push({supplierId:supplierId, cost:cost, supplierCode:supplierCode, supplierName:supplierName})
            addedSupplier(supArr)
        }

    })

    
    $('.channel-btn').click(function(){
        clientId = clientSelectize[0].selectize.getValue();
        clientName = $(".client_id .item").text();
        channelName = $(".pc_name").val();
        price = $(".pc_price").val();
        discountId = $(".discount_type_id").val();
        discountName = $(".discount_type_id option:selected").text();

        if(discountId  == ''){
            discountName = '';
        }

        var exist = false;
        if(clientId == '' && channelName == '' && price == '') return false;
        if(priceArr.length > 0){
            $.each(priceArr, function(k, v){
                if(v.client_id == clientId && v.name == channelName){
                    exist = true;
                }
            })

            if(exist == false){
              priceArr.push({client_id:clientId, clientName:clientName, price:price, discount_id:discountId, discountName:discountName, name:channelName})
               addedPrice(priceArr)
            }

        }else{
            priceArr.push({client_id:clientId, clientName:clientName, price:price, discount_id:discountId, discountName:discountName, name:channelName})
            addedPrice(priceArr)
        }

    })
    
    function addedPrice(priceArr){

        content = '';
        console.log(priceArr)
        $.each(priceArr, function(k,v){
            if(v.discountName === null) v.discountName = '';
            if(v.clientName === null) v.clientName = '';
            
            content += '<tr>'+
                            '<td>'+v.name+'</td>'+
                            '<td>'+v.clientName+'</td>'+
                            '<td>'+v.price+'</td>'+
                            '<td>'+v.discountName+'</td>'+
                            '<td style="text-align:right"><a class="btn btn-danger btn-xs btn-round remove-price" data-index="'+k+'"><i class="fa fa-remove"></i> Remove</a></td>'+
                        '</tr>';
        })
        $(".price-wrapper").html(content)
        $('input[name=price_details]').val(JSON.stringify(priceArr));
    }

    function addedSupplier(supArr){

        content = '';
        console.log(supArr)
        $.each(supArr, function(k,v){
            
            content += '<tr>'+
                            '<td>'+v.supplierName+'</td>'+
                            '<td>'+v.supplierCode+'</td>'+
                            '<td>'+v.cost+'</td>'+
                            '<td style="text-align:right"><a class="btn btn-danger btn-xs btn-round remove-supplier" data-index="'+k+'"><i class="fa fa-remove"></i> Remove</a></td>'+
                        '</tr>';
        })
        $(".supplier-wrapper").html(content)
        $('input[name=supplier_details]').val(JSON.stringify(supArr));
    }

    function addedInventory(invArr){

        content = '';
        console.log(invArr)
        $.each(invArr, function(k,v){
            
            content += '<tr>'+
                            '<td>'+v.locationName+'</td>'+
                            '<td>'+v.zoneName+'</td>'+
                            '<td>'+v.qty+'</td>'+
                            '<td style="text-align:right"><a class="btn btn-danger btn-sm btn-round remove-inventory" data-index="'+k+'"><i class="fa fa-remove"></i> Remove</a></td>'+
                        '</tr>';
        })
        $(".inventory-wrapper").html(content)
        $('input[name=inventory_details]').val(JSON.stringify(invArr));
    }


    $.getPriceChannels = function(){
        priceArr = Array();
        $.ajax({
            url:base_url+module+'/pricechannels',
            data:{product_id: product_id},
            dataType:'JSON',
            success:function(data){
                if(data){
                    $.each(data,function(k,v){
                        priceArr.push({id:v.id, client_id:v.client_id, clientName:v.client_name, price:v.price, discount_id:v.discount_type_id, discountName:v.discount_name, name:v.name})
                    })
                    addedPrice(priceArr)
                }
            }
        })
    }

    $.getSupplierProducts = function(){
        supArr = Array();
        $.ajax({
            url:base_url+module+'/supplierproducts',
            data:{product_id: product_id},
            dataType:'JSON',
            success:function(data){
                if(data){
                    $.each(data,function(k,v){
                        supArr.push({id:v.id, supplierId:v.supplier_id, cost:v.cost, supplierCode:v.supplier_code, supplierName:v.supplier_name})
                    })
                    addedSupplier(supArr);
                }
            }
        })
    }

    $(this).on('click','.remove-inventory',function(){
        index = $(this).data('index');
        invArr.splice(index, 1)
        addedInventory(invArr)
    })
    
    var supplierRemovedArr = Array();
    $(this).on('click','.remove-supplier',function(){
        index = $(this).data('index');
         supplierRemovedArr.push(supArr[index])
         $(".supplier_removed").val(JSON.stringify(supplierRemovedArr))
        supArr.splice(index, 1)
        addedSupplier(supArr)
    })

    var priceRemovedArr = Array();
    $(this).on('click','.remove-price',function(){
        index = $(this).data('index');
        priceRemovedArr.push(priceArr[index])
        $(".price_removed").val(JSON.stringify(priceRemovedArr))
        priceArr.splice(index, 1)
        addedPrice(priceArr)
        // console.log(priceRemovedArr)
    })


    $(this).off('click',".product-submit").on('click',".product-submit",function(){
        var btn = $(this);

        $("#form").ajaxForm({
            // dataType: 'JSON',
            beforeSend:function(){
                btn.button('loading')
            },
            success:function(data){

                par  =  JSON.parse(data);

                if(par.status){
                    $('.alert-notification-success').show();
                    $('.notif-msg').html(par.response);
                    $('.alert-notification-failed').hide();
                    $('.alert').delay(2000).fadeOut(500)
                    // alert(par.response);     
                    $(".error-msg").remove();
                    $('input[type="text"], select').popover('destroy');

                    $.getPriceChannels();
                    $.getSupplierProducts();
                    supplierRemovedArr = Array();
                    priceRemovedArr = Array();
                    $(".supplier_removed").val('');
                    $(".price_removed").val('');


                    $('body').animate({
                            scrollTop: $('.alert').offset().top - 130
                        }, 500);
                    // path = base_url+module;
                    // window.location.href = path;
                }else{
                    $('.alert-notification-success').hide();
                    $('.alert-notification-failed').show();
                    $('.notif-msg').html(par.response);
                    $(".error-msg").remove();
                    $('input[type="text"], select').popover('destroy');

                }

                btn.button('reset');
            },
            error:function(data){
                
                $error = data.responseJSON;
                /*reset popover*/   
                $('input[type="text"], select').popover('destroy');
                $('.alert-notification-failed').show();
                $('.notif-msg').html('Errors found on required and unique fields.');
                $('.alert').delay(5000).fadeOut(500)
                /*add popover*/
                block = 0;
                $(".error-msg").remove();
                $.each($error,function(k,v){
                    var messages = v.join(', ');
                    msg = '<div class="error-msg err-'+k+'" ><i class="fa fa-exclamation-circle" style="color:rgb(255, 184, 0)"></i> '+messages+'</div>';
                    $('input[name="'+k+'"], textarea[name="'+k+'"], select[name="'+k+'"]').before(msg).attr('data-content',messages);
                    if(block == 0){
                        try{
                            $('html, body').animate({
                                scrollTop: $('.alert').offset().top - 130
                            }, 500);
                        }catch(e){
                            console.log('error')
                        }
                        block++;
                    }
                })
                btn.button('reset');
            },
            always:function(){
                btn.button('reset');

            }
        }).submit();

    });
            
})

</script>
@endsection



@section('js-logic3')
<script>

    $(".image-upload").click(function(){
        $('#photo').trigger('click')
    });

    $('#photo').change(function(){              

            $("#photoUpload").ajaxForm({
                beforeSend:function(){
                    $(".img-loader").show();
                },
                success:function(data){
                    par = JSON.parse(data);
                    console.log(par)
                    if(par.status){
                        img = base_url+'/uploads/product_photos/'+par.photo;
                        $('input[name=photo]').val(par.photo);
                        $('img.image-upload').attr('src',img);
                        $(".img-loader").hide();
                    }
                },
                error:function(data){
                    $error = data.responseJSON;
                    // swal({   
                    //         title: "Upload Failed!",   
                    //         text: $error.file[0],  
                    //         type: "error",     
                    //     });
                    $(".img-loader").hide();
                },
                always:function(){
                    $(".img-loader").hide();

                }
            }).submit();
        })
</script>
@endsection