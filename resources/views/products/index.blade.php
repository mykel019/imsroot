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

                <div class="col-md-9 col-sm-12 col-xs-12 product-wrapper" >
                    <div class="page-title">
                        <div class="title_left">
                           <h3>
                            {{$title}}
                           </h3>
                        </div>

                        <div class="title_right">
                        </div>
                    </div>
                         <?php 

                            $_add = '';
                            $_import = '';
                            $_export = '';

                            foreach($accessrightsmodule as $key => $value){

                                if($value->module == $module){
                                    $_add = $value->to_add;
                                    $_import = $value->to_import;
                                    $_export = $value->to_export;
                                }


                            }
                        ?>
                    <div class='x_panel'>
                        <div class='x_title'>
                            <div class="row">
                                @if($_add == '1' || Auth::User()->position_id == '0')
                                  <a href="{{ URL::to($module.'/create') }}" class="btn btn-app" style="float:left"> <i class="fa fa-plus"></i> New</a>
                                @endif
                                <div class="input-group search-wrapper">
                                    <span class="input-group-btn">
                                        <button class="btn btn-app  search-btn" type="button"><i class="fa fa-search"></i> Search</button>
                                    </span>
                                    <input type="text" style="" class="form-control search" placeholder="Enter keyword">
                                </div>
                            </div>

                            <!-- <a class="btn btn-app search-btn"> <i class="fa fa-search"></i> Search</a> -->
                            <div class="clearfix"></div>
                        </div>

                        <div class='x_content'>
                            <div class="sub-panel">
                                {!! $controller->getDatatable() !!}
                            
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-12 col-xs-12 product-import" style="display: none">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                                Product Column Mapping
                            </h3>
                        </div>
                        <div class="title_right">
                        </div>
                    </div>
                    <div class='x_panel'>
                        <div class="col-md-4">
                            <form action="{{ url($module.'/import') }}" onSubmit="return false;" method="POST" id="map-form">
                                <table class="table">
                                    <thead>
                                        <th>Excel Columns</th>
                                        <th>Map to</th>
                                    </thead>
                                    <tbody class="product-mapping">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <div style="text-align:center">
                                <button class="btn btn-success import-validate" data-loading-text="Processing..."><i class="fa fa-upload "></i> Validate and Upload</button>
                            </div>
                        </div>

                        <div class="col-md-8">

                            <div class="progress">
                              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                0%
                              </div>
                            </div>

                            <!-- <hr> -->
                            
                            <div id="failed-import-wrapper" style="display:none; height:500px;">
                                <h3>Failed Import</h3>
                                <form action="{{ url($module.'/errorimport') }}" onSubmit="return false;" method="POST" id="error-form">
                                    <table class="table table-bordered">
                                        <thead id="ie-thead"></thead>
                                        <tbody id="import-errors" ></tbody>
                                    </table>
                                    <div style="text-align:center">   
                                         <button class="btn btn-success error-submit"><i class="fa fa-send"></i> Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12 widgets-wrapper">
                    <div class="x_panel">
                        <h4>Products Statistics</h4>
                        <div class="x_content widget-statistics">

                        <form id="form-filters">
                            <div class="form-group">
                                <select class="form-control" name="productstatus" id="productstatus">
                                    <option value="1">All Product </option>
                                    <option value="2">Active Product </option>
                                    <option value="3">InActive Product </option>
                                 </select>
                            </div>
                        </form>

                            <table class="table">
                                <tr>
                                    <td class="title">Active Products</td>
                                    <td class="amount"><span class="badge active-badge">{{number_format(count($total_active))}}</td>
                                    
                                </tr>
                                <tr>
                                    <td class="title">Inactive Products</td>
                                 <td class="amount"><span class="badge inactive-badge">{{number_format(count($total_inactive))}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="x_panel">
                        <h4><i class="fa fa-cogs"></i> Product Migration</h4>
                        <hr>
                        <div class="x_content">
                            @if($_import == '1' || Auth::User()->position_id == '0')
                            <a  class="btn btn-success btn-round btn-block import"> <i class="fa fa-upload"></i> Import {{ $title }}</a>
                            @endif
                            @if($_export == '1' || Auth::User()->position_id == '0')
                            <a href="{{ URL::to('/products/export') }}"  class="btn btn-success btn-round btn-block export"> <i class="fa fa-download"></i> Export {{ $title }}</a>
                            @endif
                        </div>
                    </div>
                    <?php if(Auth::User()->subscriber_id == 2): ?>
                    <div class="x_panel">
                        <h4><i class="fa fa-cogs"></i> Mapping Legends</h4>
                        <hr>
                        <div class="x_content">
                           <table class="table">
                               <thead>
                                   <th>BTB Terms</th>
                                   <th>IMS Terms</th>
                               </thead>
                               <tbody>
                                   <tr>
                                       <td>UPC Code</td>
                                       <td>Bar Code</td>
                                   </tr>
                                   <tr>
                                       <td>Item Description</td>
                                       <td>Product Name</td>
                                   </tr>
                                   <tr>
                                       <td>Brand Description</td>
                                       <td>Brand</td>
                                   </tr>

                                   <tr>
                                       <td>Stock #</td>
                                       <td>Stock Code</td>
                                   </tr>

                                   <tr>
                                       <td>Model</td>
                                       <td>Model</td>
                                   </tr>

                                   <tr>
                                       <td>Association</td>
                                       <td>Association</td>
                                   </tr>

                                   <tr>
                                       <td>Main Cat Description</td>
                                       <td>Department</td>
                                   </tr>

                                   <tr>
                                       <td>Sub Cat Description</td>
                                       <td>Category</td>
                                   </tr>

                                   <tr>
                                       <td>Size</td>
                                       <td>Size</td>
                                   </tr>

                                   <tr>
                                       <td>Actual Color</td>
                                       <td>Color</td>
                                   </tr>

                                   <tr>
                                       <td>Current SRP</td>
                                       <td>Price</td>
                                   </tr>

                                   <tr>
                                       <td>Serial Code</td>
                                       <td>POS Required Field</td>
                                   </tr>

                                   <tr>
                                       <td>IMEI Code</td>
                                       <td>POS Required Field</td>
                                   </tr>

                                   <tr>
                                       <td>2nd IMEI Code</td>
                                       <td>POS Required Field</td>
                                   </tr>



                               </tbody>
                           </table>
                        </div>
                    </div>
                <?php endif; ?>
                    <div class="col-md-12 hint">
                        <p></p>
                    </div>
                </div>
            </div>
            <br />
        </div>
        <!-- /page content -->


        <form action="{{ url($module.'/fileupload') }}" id="preciousUpload" method="POST" files="true" style="display:none" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">    
            <input type="file" name="file" id="template">
        </form>

        @include('elements/footer')
    </div>
</div>
@endsection

@section('js-logic1')
<script type="text/javascript">
    $(document).ready(function(){


        $("#failed-import-wrapper").mCustomScrollbar({
             theme:"dark"
        });
        $("#success-import-wrapper").mCustomScrollbar({
             theme:"dark"
        });
        // $(".tool-add").click(function(){
        //     $(".medium-modal").modal('show')
        //     $(".medium-modal .modal-header > span").html('Add New Client')
        //     $(".medium-modal .modal-body").load(base_url+module+'/create')

        // })


        var locations = JSON.parse('<?=$locations?>');



        $(".import").click(function(){
            $("#template").trigger('click');
        });


        // var loctionsSelectize = $("select[name=loctions]").selectize({
        //                                 delimiter: ',',
        //                                 plugins: ['remove_button'],
        //                                 persist: false,
        //                                 create: function(input) {
        //                                     return {
        //                                         value: input,
        //                                         text: input
        //                                     }
        //                                 }
                                          
        //                             });
        var settings;
        $("#template").change(function(){
            $('#preciousUpload').ajaxForm({
                beforeSend:function(){
                    $(".product-wrapper").hide();
                    $(".product-import").show();
                     $('.product-mapping').html('<tr><td colspan="2">please wait...</td></tr>');
                    // $(".stone-spinner").show();
                    // $("."+button).attr("disabled",true).html('<i class="fa fa-upload"></i> Please Wait while Uploading...');
                },
                uploadProgress:function(event, position, total, percentComplete){
                    // console.log(percentComplete)
                    $(".progress-bar").css({'width':percentComplete+'%'}).html(percentComplete+'%')
                    $(".progress-bar").attr('aria-valuenow',percentComplete)
                },
                success:function(data){
                  
                    try{
                        par = JSON.parse(data);
                        settings = par.settings;
                        result = par.result;
                        console.log(par)
                        option = '';

                        if(par.settings !== null){
                            $.each(par.settings, function(k,v){
                                if(k == 'sku'){ option += '<option value="sku">SKU</option>' }
                                if(k == 'code'){ option += '<option value="code">Product Code</option>' }
                                if(k == 'stock_code'){ option += '<option value="stock_code">Stock Code</option>' }
                                if(k == 'supplier_code'){ option += '<option value="supplier_code">Supplier Code</option>' }
                                if(k == 'bar_code'){ option += '<option value="barcode">Bar Code</option>' }
                            });
                        }else{
                            option += '<option value="sku">SKU</option>'+
                                        '<option value="code">Product Code</option>'+
                                        '<option value="supplier_code">Supplier Code</option>'+
                                        '<option value="barcode">Bar Code</option>';
                        }


                        tr= '';
                        $i=0;
                        $.each(result,function(k,v){
                            console.log(k)
                            tr +=  '<tr>'+
                                        '<td>'+k.replace('_',' ')+'</td>'+
                                        '<td>'+
                                            '<select name="'+k+'" data-index="'+$i+'" class="form-control map-select">'+
                                            '<option value=""></option>'+option+
                                            '<option value="name">Product Name</option>'+
                                            '<option value="stock_code">Stock Code</option>'+
                                            '<option value="description">Product Description</option>'+
                                            '<option value="category_id">Category</option>'+
                                            '<option value="subcategory">Sub Category</option>'+
                                            '<option value="model">Model</option>'+
                                            '<option value="association">Association</option>'+
                                            '<option value="department_id">Department</option>'+
                                            '<option value="brand_id">Brand</option>'+
                                            '<option value="association">Association</option>'+
                                            '<option value="size">Size</option>'+
                                            '<option value="color">Color</option>'+
                                            '<option value="cost">Cost</option>'+
                                            '<option value="unit_cost">Unit Cost</option>'+
                                            '<option value="unitofmeasure">Unit of Measure</option>'+
                                            '<option value="unitofmeasure_value">Value Per Unit Cost</option>'+
                                            '<option value="price_default">Price</option>'+
                                            '<option value="pos_required_fields">POS required Field</option>'+
                                            '<option value="ignore">IGNORE</option>'+
                                            '</select>'+
                                        '</td>'+
                                    '</tr>';
                            $i++;
                        })

                        options = '';
                        $.each(par.location,function(k,v){
                            options += '<option value="'+v.id+'">'+v.name+'</option>';
                        })

                        // tr +=  '<tr>'+
                        //                 '<td>Locations</td>'+
                        //                 '<td>'+
                        //                     '<select name="location_id" class="form-control">'+options+'</select>'+
                        //                 '</td>'+
                        //             '</tr>';

                        $('.product-mapping').html(tr);

                    }catch(e){
                        console.log('error')
                    }
                    tr = $('.product-mapping').find('tr')

                    th = '';
                    tr.each(function(k,v){

                        if($(v).find('td:first').text() != 'Locations'){
                            th += '<th style="padding:1%">'+$(v).find('td:first').text()+'</th style="padding:3px;">';
                        }
                    })
                    $("#ie-thead").html(th);
                },
                error:function(data){

                }

                    
            }).submit();
            
            $("#template").val('');
        });

        var previousVal;
        var previousText;
        var previousIndex;

        $(document).on('focus','.map-select',function(){
            previousVal = $(this).val();
            previousText = $(this).find(":selected").text();
            previousIndex = $(this).data('index');
            console.log(previousVal)
        });

        $(document).on('change','.map-select',function(){
            current = $(this);
            
            if(current.val() != 'ignore' && current.val() != 'pos_required_fields'  && current.val() != 'subcategory' ){
                $('.map-select').each(function(k,siblings){

                    if(previousVal != 'ignore' && previousVal != 'pos_required_fields' && previousVal != 'subcategory')
                    {

                        //remove option from siblings equal to current selected option
                        if(current.val() == $(siblings).find('[value="'+current.val()+'"]').val()){
                            if(current.val() != $(siblings).val()){
                                $(siblings).find('[value="'+current.val()+'"]').remove();
                            }
                        }

                        // selected to empty, restore previous value to all siblings
                        if(previousVal != '' && current.val() == ''){
                            if(previousIndex != k && current.val() == ''){
                                $(siblings).append('<option value="'+previousVal+'">'+previousText+'</option>');   
                            }
                        }

                        //selected to selected
                        if(previousVal != '' && current.val() != ''){
                            if(current.val() != $(siblings).find('[value="'+current.val()+'"]').val()){
                                $(siblings).append('<option value="'+previousVal+'">'+previousText+'</option>');   
                            }else{
                                $(siblings).append('<option value="'+previousVal+'">'+previousText+'</option>');   
                            }
                        }
                    }
                    else
                    {
                        //remove option from siblings equal to current selected option
                        if(current.val() == $(siblings).find('[value="'+current.val()+'"]').val()){
                            if(current.val() != $(siblings).val()){
                                $(siblings).find('[value="'+current.val()+'"]').remove();
                            }
                        }

                    }
                    
                });

            }else{

                $('.map-select').each(function(k,siblings){
                    //remove option from siblings equal to current selected option
                    if(previousIndex != k && previousVal != ''){
                        $(siblings).append('<option value="'+previousVal+'">'+previousText+'</option>');   
                    }
                })
            }

                // if(self.val() == ''){
                //     $('.map-select').each(function(k,v){

                //         if($(v).val() != previousVal && previousIndex != k){
                //             $(v).append('<option value="'+previousVal+'">'+previousText+'</option>');
                //         }
                //     })  
                // }

                // if(self.val() != ''){
                //     $('.map-select').each(function(k,v){
                //         //remove option from siblings equal to current selected option
                //         if($(v).val() != self.val()){
                //             $(v).find('[value="'+self.val()+'"]').remove();
                //         }


                //         if( previousVal != ''){
                //             $(v).append('<option value="'+previousVal+'">'+previousText+'</option>');
                //         }
                //     })
                // }

            previousVal = '';
            previousText = '';
            previousIndex = '';

        });


        $(".import-validate").click(function(){
            var self = $(this);
            // self.button('loading');
            fields = Array();
            emptyFields = false;
            errors = Array();
            $(".map-select").each(function(k,v){
                fields.push($(v).val())
                if($(v).val() == "") emptyFields = true;
            });

            $.each(settings,function(k,v){

                if($.inArray('code',fields) == -1 && k == 'code'){
                    errors.push('Product Code');
                }

                if($.inArray('stock_code',fields) == -1 && k == 'stock_code'){
                    errors.push('Stock Code');
                }

                if($.inArray('sku',fields) == -1 && k == 'sku'){
                    errors.push('SKU');
                }

                if($.inArray('barcode',fields) == -1 && k == 'bar_code'){
                    errors.push('Bar Code');
                }

                if($.inArray('supplier_code',fields) == -1 && k == 'supplier_code'){
                    errors.push('Supplier Code');
                }
            })


            // if($.inArray('category_id',fields) == -1){
            //     errors.push('Category')
            // }

            // if($.inArray('price_default',fields) == -1){
            //     errors.push('Price')
            // }

            if(emptyFields){
                alert('Mapping fields must not be Empty')
                self.button('reset');
                return false;
            }


            if(errors.length > 0){
                alert('The following Mapping fields are required : '+errors.join(', '))
                self.button('reset');
                return false;
            }

            var hasError = false;
            $("#map-form").ajaxForm({
                xhrFields: {
                    onprogress: function(e) {
                        arr = e.target.responseText.split('|')
                        progress = arr[arr.length - 2]
                        // console.log(progress)
                        // $("#import-success").html(e.target.responseText);
                        $(".progress-bar").css({'width':Math.round(progress)+'%'}).html(Math.round(progress)+'%')
                        $(".progress-bar").attr('aria-valuenow',Math.round(progress))
                        // content = '<div class="progress">'+
                        //                 '<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: '+progress+'%;">'+
                        //                     '<span id="pb-txt">'+progress+'%</span>'+
                        //                 '</div>'+
                        //             '</div>';
                        // $(".small-modal .modal-body").html(content)
                    }
                },
                beforeSend:function(){
                    // $(".product-wrapper").hide();
                    // $(".product-import").show();
                    // $(".small-modal").modal('show')
                        // $.progress();
                    
                    // $(".stone-spinner").show();
                    // $("."+button).attr("disabled",true).html('<i class="fa fa-upload"></i> Please Wait while Uploading...');
                },
                uploadProgress:function(event, position, total, percentComplete){
                    console.log(percentComplete)
                     
                },
                success:function(data){
                    $.ajax({
                        url:base_url+module+'/errorimport',
                        xhrFields:{
                            onprogress:function(e){
                                hasError = true;
                                if(e.target.responseText){
                                    $("#failed-import-wrapper").show();
                                }else{
                                    $("#failed-import-wrapper").hide();
                                }
                                $("#import-errors").html(e.target.responseText);   
                            }
                        },
                        success:function(data){

                            if(hasError == false){
                                $("#failed-import-wrapper").hide();
                                alert('Import Successful');
                                window.location.href = base_url+module
                            }
                            // $(".import-validate").hide();
                        }

                    })
                },
                error:function(data){
                    $(".import-validate").button('reset');
                }
            }).submit();
        })

        $(document).on('click',".error-submit",function(){
            var hasError = false;
            $("#error-form").ajaxForm({
                xhrFields: {
                    onprogress: function(e) {
                        arr = e.target.responseText.split('|')
                        progress = arr[arr.length - 2]
                        $(".progress-bar").css({'width':Math.round(progress)+'%'}).html(Math.round(progress)+'%')
                        $(".progress-bar").attr('aria-valuenow',Math.round(progress))
                    }
                },
                beforeSend:function(){
                        // $.progress();
                    // $(".product-wrapper").hide();
                    // $(".product-import").show();
                    
                    // $(".stone-spinner").show();
                    // $("."+button).attr("disabled",true).html('<i class="fa fa-upload"></i> Please Wait while Uploading...');
                },
                success:function(data){
                    $.ajax({
                        url:base_url+module+'/errorimport',
                        xhrFields:{
                            onprogress:function(e){
                                hasError = true;
                                if(e.target.responseText){
                                    $("#failed-import-wrapper").show();
                                }else{
                                    $("#failed-import-wrapper").hide();
                                }
                                $("#import-errors").html(e.target.responseText);   
                            }
                        },
                        success:function(data){
                            if(hasError === false){
                                $("#failed-import-wrapper").hide();
                                alert('Import Successful');
                                window.location.href = base_url+module
                            }
                            // $(".import-validate").button('reset');
                        }

                    })
                },
                error:function(data){

                }
            }).submit();
        })


        $.progress = function(){

            setInterval(function(){

                $.get(base_url+module+'/progress',function(data){
                    $(".progress-bar").css({'width':data+'%'});
                    $("#pb-txt").html(data+'%');
                })
            },2000)
        }



        $("#productstatus").change(function(){
         $('.sub-panel').html('<center><i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i><center>');
        _filters = $("#form-filters").serialize();
        $.ajax({
        type: "GET",
        url: base_url+module+'/datatable',
        data: {"q":$('.search').val(),'filters': _filters},
        success: function(res){
            $(".sub-panel").html(res);
            $("input.search").removeClass('searchSpinner');

        }
    })
  })
        
    })
</script>
@endsection

