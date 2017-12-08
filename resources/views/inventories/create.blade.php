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
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                                <a href="{{ url($module) }}" class="btn btn-default"><i class="fa fa-long-arrow-left"></i> Return to {{ $title }} List</a>
                            </h3>
                        </div>

                    </div>
                    <div class='x_panel'>
                        <div class='x_title'>
                            <h2>
                                {{ $title }}
                                <small>
                                    Some examples to get you started
                                </small>
                            </h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class='x_content'>
                            <form method="POST" action="{{ url('/').'/'.$module.'/store'}}" id="form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class='panel panel-default'>
                                    <div class='panel-heading'>
                                        <i class='icon-edit icon-large'></i>
                                        Product Info
                                    </div>
                                    <div class='panel-body'>
                                        <section>
                                            <div class="section-body">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                            <label>Product Name</label>
                                                            <input type='text' name='name' value="{{ old('name') }}"  class='form-control'>
                                                            @if ($errors->has('name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                                                            <label>Category</label>
                                                            <select name='category_id' value="{{ old('category_id') }}"  class='form-control'>
                                                                <option value="">Select Category</option>
                                                                <?php foreach ($categories as $key => $value): ?>
                                                                    <?php 
                                                                        $selected = '';
                                                                        if (old('category_id') == $value->id){
                                                                            $selected = 'selected';
                                                                        } 

                                                                    ?>
                                                                    <option value="{{ $value->id }}" {{ $selected }} >{{ $value->name }}</option>
                                                                <?php endforeach ?>
                                                            </select>
                                                            @if ($errors->has('category_id'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('category_id') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                                            <label>Description</label>
                                                            <textarea name='description'  class='form-control'>{{ old('description') }}</textarea>
                                                            @if ($errors->has('description'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('description') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row"><hr></div>
                                                
                                                <div class="row">
                                                
                                                    <div class="col-md-3">

                                                        <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                                                            <label>Product Code <span class="required">*</span></label>
                                                            <input type='text' name='code' value="{{ old('code') }}"  class='form-control'>
                                                            @if ($errors->has('code'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('code') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>


                                                        <div class="form-group {{ $errors->has('sku') ? ' has-error' : '' }}">
                                                            <label>SKU</label>
                                                            <input type='text' name='sku' value="{{ old('sku') }}"  class='form-control'>
                                                            @if ($errors->has('sku'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('sku') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>


                                                        <div class="form-group {{ $errors->has('stock_code') ? ' has-error' : '' }}">
                                                            <label>Stock Code</label>
                                                            <input type='text' name='stock_code' value="{{ old('stock_code') }}"  class='form-control'>
                                                            @if ($errors->has('stock_code'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('stock_code') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>


                                                        <div class="form-group {{ $errors->has('supplier_code') ? ' has-error' : '' }}">
                                                            <label>Supplier Code</label>
                                                            <input type='text' name='supplier_code' value="{{ old('supplier_code') }}"  class='form-control'>
                                                            @if ($errors->has('supplier_code'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('supplier_code') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>


                                                        <div class="form-group {{ $errors->has('barcode') ? ' has-error' : '' }}">
                                                            <label>Bar Code</label>
                                                            <input type='text' name='barcode' value="{{ old('barcode') }}"  class='form-control'>
                                                            @if ($errors->has('barcode'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('barcode') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    
                                                    </div>

                                                    <div class="col-md-3">

                                                        <div class="form-group {{ $errors->has('brand_id') ? ' has-error' : '' }}">
                                                            <label>Brand</label>
                                                            <select name='brand_id' value="{{ old('brand_id') }}" class='form-control'>
                                                            </select>
                                                            @if ($errors->has('brand_id'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('brand_id') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>


                                                        <div class="form-group {{ $errors->has('department_id') ? ' has-error' : '' }}">
                                                            <label>Department</label>
                                                            <select name='department_id' class='form-control'>
                                                            </select>
                                                            @if ($errors->has('department_id'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('department_id') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>


                                                        <div class="form-group {{ $errors->has('supplier_id') ? ' has-error' : '' }}">
                                                            <label>Supplier</label>
                                                            <select name='supplier_id' value="{{ old('supplier_id') }}" class='form-control'>
                                                            </select>
                                                            @if ($errors->has('supplier_id'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('supplier_id') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>


                                                        

                                                        <div class="form-group {{ $errors->has('location_id') ? ' has-error' : '' }}">
                                                            <label>Location</label>
                                                            <select name='location_id'  class='form-control'>
                                                            </select>
                                                            @if ($errors->has('location_id'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('location_id') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group {{ $errors->has('zone_id') ? ' has-error' : '' }}">
                                                            <label>Zone</label>
                                                            <select type='text' name='zone_id'  class='form-control'>
                                                            </select>
                                                            @if ($errors->has('zone_id'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('zone_id') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>


                                                        

                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group {{ $errors->has('unitofmeasure_id') ? ' has-error' : '' }}">
                                                            <label>Unit of Measures</label>
                                                            <select name='unitofmeasure_id' value="{{ old('unitofmeasure_id') }}" class="form-control">
                                                            </select>
                                                            @if ($errors->has('unitofmeasure_id'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('unitofmeasure_id') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group {{ $errors->has('qty') ? ' has-error' : '' }}">
                                                            <label>Qty</label>
                                                            <input type='text' name='qty' value="{{ old('qty') }}"  class='form-control'>
                                                            @if ($errors->has('qty'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('qty') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group {{ $errors->has('cost') ? ' has-error' : '' }}">
                                                            <label>Cost</label>
                                                            <input type='text' name='cost' value="{{ old('cost') }}"  class='form-control'>
                                                            @if ($errors->has('cost'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('cost') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group {{ $errors->has('price_default') ? ' has-error' : '' }}">
                                                            <label>Default Selling Price</label>
                                                            <input type='text' name='price_default' value="{{ old('price_default') }}"  class='form-control'>
                                                            @if ($errors->has('price_default'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('price_default') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group {{ $errors->has('zero_rated') ? ' has-error' : '' }}">
                                                            <label>Tax Scheme</label>
                                                            <select name='zero_rated' value="{{ old('zero_rated') }}"  class='form-control'>
                                                                <option value="0">Taxable</option>
                                                                <option value="1">Non Taxable</option>
                                                            </select>
                                                            @if ($errors->has('zero_rated'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('zero_rated') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                
                                                    </div>

                                                    <div class="col-md-3 custom-fields">
                                                          
                                                    </div>

                                                </div>

                                                <div class="row"><hr></div>

                                                <div class="row col-md-12">
                                                <label for="">POS Required Fields</label>
                                                 <input type="text" name="pos_required_fields" value="{{ old('pos_required_fields') }}" class="form-control">
                                                </div>

                                            </div>

                                        </section>
                                    </div>
                                </div>



                                <div class="row" style="text-align: center">
                                    <button class="btn btn-success">Save New {{ $title }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br />
        </div>
        <!-- /page content -->

        @include('elements/footer')
    </div>
</div>
@endsection


@section('js-logic1')
<script>
    $(document).ready(function(){

        var cf = JSON.parse('<?=json_encode(old("custom_fields"))  ?>');
        var brands = JSON.parse('<?=$brands ?>');
        var departments = JSON.parse('<?=$departments ?>');
        var suppliers = JSON.parse('<?=$suppliers ?>');
        var unitofmeasures = JSON.parse('<?=$unitofmeasures ?>');
        var locations = JSON.parse('<?=$locations ?>');
        // console.log(brands)

        var brandSelectize =    $("select[name=brand_id]").selectize({
                                    create:true,
                                    valueField: 'description',
                                    labelField: 'description',
                                    searchField: 'description',
                                });


        var departmentSelectize =  $("select[name=department_id]").selectize({
                                        create:true,
                                        valueField: 'description',
                                        labelField: 'description',
                                        searchField: 'description',
                                    });


        var supplierSelectize = $("select[name=supplier_id]").selectize({
                                    create:true,
                                    valueField: 'name',
                                    labelField: 'name',
                                    searchField: 'name',
                                });

        var unitofmeasureSelectize = $("select[name=unitofmeasure_id]").selectize({
                                        create:true,
                                        valueField: 'description',
                                        labelField: 'description',
                                        searchField: 'description',
                                    });

        var locationSelectize = $("select[name=location_id]").selectize({
                                        create:true,
                                        valueField: 'id',
                                        labelField: 'full_loc_name',
                                        searchField: 'full_loc_name',
                                        onChange:function(data){
                                            $.get(base_url+module+'/zones',{locid:data},function(data){
                                                zoneSelectize[0].selectize.addOption(JSON.parse(data))
                                                zoneSelectize[0].selectize.setValue(JSON.parse('<?=json_encode(old("zone_id"))  ?>'));
                                            })
                                        }
                                    });

        var zoneSelectize = $("select[name=zone_id]").selectize({
                                        // create:true,
                                        valueField: 'id',
                                        labelField: 'name',
                                        searchField: 'name',
                                    });


        var posreqSelectize = $("input[name=pos_required_fields]").selectize({
                                        delimiter: ',',
                                        plugins: ['remove_button'],
                                        persist: false,
                                        create: function(input) {
                                            return {
                                                value: input,
                                                text: input
                                            }
                                        }
                                          
                                    });



        if(brands){
            brandSelectize[0].selectize.addOption(brands)
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

        if(locations){
            locationSelectize[0].selectize.addOption(locations)
        }


        /*SET OLD VALUES*/
        brandSelectize[0].selectize.setValue(JSON.parse('<?=json_encode(old("brand_id"))  ?>'));
        departmentSelectize[0].selectize.setValue(JSON.parse('<?=json_encode(old("department_id"))  ?>'));
        supplierSelectize[0].selectize.setValue(JSON.parse('<?=json_encode(old("supplier_id"))  ?>'));
        unitofmeasureSelectize[0].selectize.setValue(JSON.parse('<?=json_encode(old("unitofmeasure_id"))  ?>'));
        locationSelectize[0].selectize.setValue(JSON.parse('<?=json_encode(old("location_id"))  ?>'));
        

        
        // console.log(JSON.parse('<?=json_encode(old("pos_required_fields"))  ?>'))




        var categorySelectize = $('select[name=category_id]').selectize({
                                    onChange:function(data){ 

                                        $.get(base_url+module+'/customfields',{id:data},function(data){
                                            fields = '';
                                            if(data){
                                                par = JSON.parse(data);
                                                $.each(par,function(k,v){
                                                    if(cf){
                                                        if(cf[k]){
                                                            cfVal = cf[k];
                                                        }else{
                                                            cfVal = "";
                                                        }
                                                    }else{
                                                        cfVal = "";
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



            
    })
</script>
@endsection