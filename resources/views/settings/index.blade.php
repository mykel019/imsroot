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
                <div class="col-md-12 col-XS-12">
                    <div class="page-title">
                        <h3>
                        {{ $title }}
                        </h3>
                    </div>
                    <div class="row">

                        <div class="col-md-9">
                            <div class="x_panel">
            
                                <div class="x_content">
                                    <div class="col-xs-3">
                                        <!-- required for floating -->
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs tabs-left">
                                            <li class="active"><a href="#product" data-toggle="tab">Product</a>
                                            </li>
                                         <!--    <li><a href="#employee" data-toggle="tab">Employees</a>
                                            </li> -->
                                             <li><a href="#receipt" data-toggle="tab">Receipt</a>
                                            </li>
                                            <!-- <li><a href="#messages" data-toggle="tab">Naming Dictionary</a> -->
                                          <!--   </li>
                                            <li><a href="#settings" data-toggle="tab">Settings</a>
                                            </li> -->
                                        </ul>
                                    </div>

                                    <div class="col-xs-9">
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="product">
                                                <p class="lead">Product Configuration</p>
                                                <div class="row">
                                                    <?php 
                                                        if($settings['product'] != null){
                                                            $options = json_decode(@$settings['product']->options);
                                                            $id = Crypt::encrypt($settings['product']->id);

                                                        }else{
                                                            $options = '';
                                                            $id = '';
                                                        }
                                                        // dd($options->custom_fields);
                                                        // dd($options->custom_fields['']);
                                                     ?>
                                                    <form id="product-form" onsubmit="return false">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="col-md-6">
                                                                    <div class="inner-panel">
                                                                        <div class="ip-title">Unique & Required Product Identifier</div>
                                                                        <div class="ip-body">
                                                                            <?php 
                                                                                if(!empty($options)){
                                                                                    // (@isset($options->code)) ? $option_code = "checked" : $option_code = "";
                                                                                    (@isset($options->sku)) ? $option_sku = "checked" : $option_sku = "";
                                                                                    (@isset($options->stock_code)) ? $option_stock_code = "checked" : $option_stock_code = "";
                                            
                                                                                    (@isset($options->bar_code)) ? $option_bar_code = "checked" : $option_bar_code = "";
                                                                                }else{
                                                                                    // $option_code = "checked";
                                                                                    $option_sku = "";
                                                                                    $option_stock_code = "";
                                                 
                                                                                    $option_bar_code = "";
                                                                                }
                                                                            ?>
                                                                            <input type="hidden" name="id" value="{{ $id }}">
                                                                            <label style="margin-top: 10px;"><input type="checkbox" name="sku" class="flat sku" {{ $option_sku }}> SKU</label><br>
                                                                            <!-- <label><input type="checkbox" name="stock_code" class="flat" {{$option_stock_code}}> Stock Code</label><br> -->
                                                                            <label><input type="checkbox" name="bar_code" class="flat barcode" {{ $option_bar_code }}> Bar Code</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                
                                                                <div class="col-md-6">
                                                                    <div class="inner-panel">
                                                                        <div class="ip-title">Additional Product Identifier</div>
                                                                        <div class="ip-body">
                                                                            
                                                                            <div class="upf-wrapper">

                                                                                <?php if (@isset($options->custom_fields)): ?>
                                                                                    <?php foreach ($options->custom_fields as $key => $value): ?>
                                                                                    <div class="input-group">
                                                                                        <input type="text" name="custom_fields[]" value="{{ $value }}" class="form-control" placeholder="">
                                                                                        <span class="input-group-btn">
                                                                                        <button class="btn btn-danger remove-field" value="{{ $value }}" type="button"><i class="fa fa-remove"></i></button>
                                                                                        </span>
                                                                                    </div>
                                                                                    <?php endforeach ?>
                                                                                <?php endif ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a class="pull-right add-new-upf" style="cursor:pointer">+ Add New</a>
                                                            </div>
                                                        </div>
                                                        <div class="row"><hr></div>
                                                        <div class="row">
                                                            <?php 
                                                                $epc = '';
                                                                if (@isset($options->enable_price_channel)){
                                                                    $epc = 'checked';
                                                                }
                                                            ?>
                                                            <label><input type="checkbox" name="enable_price_channel" {{ $epc }} class="flat"> Enable Price Channel?</label>
                                                        </div>
                                                        <div class="row"><hr></div>
                                                        <button class="btn btn-success save-product-settings"> Save Settings</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="employee">
                                                <p class="lead">Employee Configuration</p>
                                                <div class="col-xs-12 col-md-4">
                                                    <div class="inner-panel">
                                                         <div class="ip-title">Additional Employee Details</div>
                                                         <div class="ip-body">
                                                             <form id="employee-form" onsubmit="return false">
                                                                <div class="employee-wrapper">
                                                                        <?php  $employees = @json_decode(@$settings['employee']->options); ?>
                                                                        <?php if ($employees): ?>
                                                                        <?php foreach (@$employees->custom_fields as $key => $value): ?>
                                                                        <div class="input-group">
                                                                            <input type="text" name="custom_fields[]" value="{{ $value }}" class="form-control" placeholder="">
                                                                            <span class="input-group-btn">
                                                                            <button class="btn btn-danger remove-field" value="{{ $value }}" type="button"><i class="fa fa-remove"></i></button>
                                                                            </span>
                                                                        </div>
                                                                        <?php endforeach ?>
                                                                        <?php endif ?>
                                                                </div>
                                                                
                                                             </form>
                                                         </div>
                                                    </div>

                                                    <a class="pull-right add-new-employee" style="cursor:pointer">+ Add New</a>
                                                    <div class="row"><hr></div>
                                                    <button class="btn btn-success save-employee-settings"> Save Settings</button>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="receipt">
                                                <p class="lead">Receipt Configuration</p>
                                                     <div class="col-xs-12 col-md-4">
                                                        <?php 
                                                            if($receipt != null){
                                                                $receiptoptions = @json_decode(@$receipt->options);
                                                                $receiptid = Crypt::encrypt($receipt->id);
                                                            }else{
                                                                $receiptoptions = '';
                                                                $receiptid = '';
                                                            }
                                                            // dd($options->custom_fields);
                                                            // dd($options->custom_fields['']);
                                                        ?>
                                                        <div class="inner-panel">
                                                            <div class="ip-title">Receipt Header & Footer</div>
                                                                <form id="receipt-form" onsubmit="return false">
                                                                    <div class="ip-body">
                                                                        <?php  $receipts = @json_decode(@$receipt->options); ?>
                                                                            <input type="hidden" name="id" value="{{ $receiptid }}">
                                                                            <label style="margin-top:10px;"> Header &nbsp&nbsp</label><input type="text" name="header" class="form-control" value="{{@$receiptoptions->header}}" id="header"><br>
                                                                            <label>  Footer &nbsp&nbsp&nbsp</label><input type="text" name="footer" class="form-control" value="{{@$receiptoptions->footer}}" id="footer">
                                                                    </div>
                                                                </form>
                                                        </div>

                                                        <button class="btn btn-success save-receipt-settings"> Save Settings</button>
                                                    </div>
                                            </div>
                                            <div class="tab-pane" id="messages">
                                                <p class="lead">Naming Configuration</p>
                                                <div class="col-xs-12 col-md-10">
                                                     <form id="employee-form" onsubmit="return false">
                                                        <table class="table">
                                                            <thead>
                                                                <th>Original</th>
                                                                <th>Custom</th>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Bar Code</td>
                                                                    <td><input type="text" name="barcode" class="form-control"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Product Name</td>
                                                                    <td><input type="text" name="product_name" class="form-control"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Brand</td>
                                                                    <td><input type="text" name="brand" class="form-control"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Stock Code</td>
                                                                    <td><input type="text" name="stoc_code" class="form-control"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Model</td>
                                                                    <td><input type="text" name="model" class="form-control"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Association</td>
                                                                    <td><input type="text" name="association" class="form-control"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Department</td>
                                                                    <td><input type="text" name="department" class="form-control"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Department</td>
                                                                    <td><input type="text" name="department" class="form-control"></td>
                                                                </tr>
    

                                                            </tbody>

                                                        </table>
                                                        
                                                     </form>

                                                    <div class="row"><hr></div>
                                                    <!-- <button class="btn btn-success save-employee-settings"> Save Settings</button> -->
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="settings">Settings Tab.</div>
                                        </div>
                                        

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
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

<!-- product -->
<script type="text/javascript">
    $(document).ready(function(){

        $('.add-new-upf').click(function(){
            field = '<div class="input-group">'+
                            '<input type="text" name="custom_fields[]" class="form-control" placeholder="">'+
                            '<span class="input-group-btn">'+
                            '<button class="btn btn-danger remove-field" type="button"><i class="fa fa-remove"></i></button>'+
                            '</span>'+
                        '</div>';
            $('.upf-wrapper').append(field)
        })

        $(this).on('click','.remove-field',function(){
            $(this).parent().closest(".input-group").remove();
        })

        $(".save-product-settings").click(function(){
            data = $("#product-form").serialize();

            $.post(base_url+module+'/productsettings',{data:data},function(data){
                par = JSON.parse(data);
                if(par.status){
                    $('.alert-notification-success').show();
                    $('.notif-msg').html(par.response);
                    $('.alert-notification-failed').hide();
                    $('.alert').delay(2000).fadeOut(500)
                    // alert(par.response);     
                    $(".error-msg").remove();
                    $('input[type="text"], select').popover('destroy');

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
            })
        });
    })
</script>
<!-- end product -->

<!-- employee -->
<script type="text/javascript">
    $(document).ready(function(){



        $('.add-new-employee').click(function(){
            field = '<div class="input-group">'+
                            '<input type="text" name="custom_fields[]" class="form-control" placeholder="">'+
                            '<span class="input-group-btn">'+
                            '<button class="btn btn-danger remove-employee-field" type="button"><i class="fa fa-remove"></i></button>'+
                            '</span>'+
                        '</div>';
            $('.employee-wrapper').append(field);
        })

        $(this).on('click','.remove-employee-field',function(){
            $(this).parent().closest(".input-group").remove();
        })


        $(".save-employee-settings").click(function(){
            data = $("#employee-form").serialize();



            $.post(base_url+module+'/employeesettings',{data:data},function(data){
                par = JSON.parse(data);
                if(par.status){
                    $('.alert-notification-success').show();
                    $('.notif-msg').html(par.response);
                    $('.alert-notification-failed').hide();
                    $('.alert').delay(2000).fadeOut(500)
                    // alert(par.response);     
                    $(".error-msg").remove();
                    $('input[type="text"], select').popover('destroy');

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
            })
        });
    })
</script>
<!-- end employee -->

<!-- receipt -->
<script type="text/javascript">
    $(document).ready(function(){

        $(".save-receipt-settings").click(function(){
            data = $("#receipt-form").serialize();

            $.post(base_url+module+'/receiptsettings',{data:data},function(data){
                par = JSON.parse(data);
                if(par.status){
                    $('.alert-notification-success').show();
                    $('.notif-msg').html(par.response);
                    $('.alert-notification-failed').hide();
                    $('.alert').delay(2000).fadeOut(500)
                    // alert(par.response);     
                    $(".error-msg").remove();
                    $('input[type="text"], select').popover('destroy');

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
            })
        });
    })
</script>
<!-- end receipt -->
@endsection

