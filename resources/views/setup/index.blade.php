@extends('app-setup')

@section('content')
<div class="container setup-wrapper" style="background-color:#fff">
    @include('elements/nav')
    <div id="wizard_verticle" class=" wizard_verticle">
        <ul class="list-unstyled wizard_steps">
            <li>
                <a href="#step-11">
                    <span class="step_no">1</span>
                </a>
            </li>
            <li>
                <a href="#step-22">
                    <span class="step_no">2</span>
                </a>
            </li>
            <li>
                <a href="#step-33">
                    <span class="step_no">3</span>
                </a>
            </li>
<!--             <li>
                <a href="#step-44">
                    <span class="step_no">4</span>
                </a>
            </li> -->
        </ul>

        <div id="step-11">
            <h2 class="StepTitle"><b>Step 1:</b> Create Location <small>This can be Warehouse, Store, or any area a location can be called</small></h2>
            <div class="col-md-6">
                <form method="POST" action="{{ url('/').'/locations/storesetup'}}" onsubmit="return false;" id="locations-form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class='panel panel-default'>
                        <div class='panel-heading'>
                            <i class='icon-edit icon-large'></i>
                            Location Det
                        </div>
                        <div class='panel-body'>
                            <section>
                                <div class="section-body row">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label>Location Name</label>
                                            <input type='text' name='name' value="{{ old('name') }}"  class='form-control'>
                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                                            <label>Location Code</label>
                                            <input type='text' name='code' value="{{ old('code') }}"  class='form-control'>
                                            @if ($errors->has('code'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('code') }}</strong>
                                            </span>
                                            @endif
                                        </div>


                                        <div class="form-group {{ $errors->has('business_name') ? ' has-error' : '' }}">
                                            <label>Business Name</label>
                                            <input type='text' name='business_name' value="{{ old('business_name') }}"  class='form-control'>
                                            @if ($errors->has('business_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('business_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>


                                        <div class="form-group {{ $errors->has('addr1') ? ' has-error' : '' }}">
                                            <label>Address Line 1</label>
                                            <input type='text' name='addr1' value="{{ old('addr1') }}"  class='form-control'>
                                            @if ($errors->has('addr1'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('addr1') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group {{ $errors->has('addr2') ? ' has-error' : '' }}">
                                            <label>Address Line 2</label>
                                            <input type='text' name='addr2' value="{{ old('addr2') }}"  class='form-control'>
                                            @if ($errors->has('addr2'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('addr2') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                                            <label>City</label>
                                            <input type='text' name='city' value="{{ old('city') }}"  class='form-control'>
                                            @if ($errors->has('city'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group {{ $errors->has('province') ? ' has-error' : '' }}">
                                            <label>Province / State</label>
                                            <input type='text' name='province' value="{{ old('province') }}"  class='form-control'>
                                            @if ($errors->has('province'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('province') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group {{ $errors->has('postal') ? ' has-error' : '' }}">
                                            <label>Postal Code / Zip Code</label>
                                            <input type='text' name='postal' value="{{ old('postal') }}"  class='form-control'>
                                            @if ($errors->has('postal'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('postal') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                                            <label>Country</label>
                                            <input type='text' name='country' value="{{ old('country') }}"  class='form-control'>
                                            @if ($errors->has('country'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('country') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="row" style="text-align: center">
                        <button class="btn btn-success location-submit">Save New Location</button>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <div class="locations-sub-panel">
                    {!! $locationsController->getDatatablesetup() !!}
                </div>
                <small><b>Hint:</b> We prevent deletion of entries from this point. Add as many as you like, later on you can manage your entries on their specific module. </small>
            </div>
            
        </div>
        <div id="step-22">
            <h2 class="StepTitle">Step 2: Required Product Identifier</h2>
            <div class="row product-identifier">
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
                    <div class="col-md-6">
                        <div class="inner-panel">
                            <div class="ip-title">Required Product Identifier</div>
                            <div class="ip-body">
                                <?php 
                                    // dd($options);
                                    if(!empty($options)){
                                        (@isset($options->sku)) ? $option_sku = "checked" : $option_sku = "";
                                        (@isset($options->stock_code)) ? $option_stock_code = "checked" : $option_stock_code = "";
                                        (@isset($options->bar_code)) ? $option_bar_code = "checked" : $option_bar_code = "";
                                    }else{
                                        $option_sku = "checked";
                                        $option_stock_code = "checked";
                                        $option_bar_code = "checked";
                                    }
                                ?>
                                <input type="hidden" name="id" value="{{ $id }}">
                                <label><input type="checkbox" name="sku" class="flat" {{ $option_sku }}> SKU</label><br>
                                <label><input type="checkbox" name="stock_code" class="flat" {{$option_stock_code}}> Stock Code</label><br>
                                <label><input type="checkbox" name="bar_code" class="flat" {{ $option_bar_code }}> Bar Code</label>
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
                    <div class="row"><hr></div>
                    <button class="btn btn-success save-product-settings"> Save Settings</button>
                </form>
            </div>
        </div>
<!--         <div id="step-33">
            <h2 class="StepTitle"><b>Step 3:</b> <a  class="btn btn-success btn-round import"> <i class="fa fa-upload"></i> Import Product</a></h2>
            <div class="row product-import" style="display:none">
                <div class="col-md-4">
                    <form action="{{ url('products/import') }}" onSubmit="return false;" method="POST" id="map-form">
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
                        <button class="btn btn-success import-validate"><i class="fa fa-upload "></i> Validate and Upload</button>
                    </div>
                </div>
                <div class="col-md-8">
                    <h3>Successful Import : <span id="success-counter"></span></h3>
                    <div id="success-import-wrapper" style="height:500px;">
                        <table class="table table-bordered">
                            <thead id="ie-thead"></thead>
                            <tbody id="import-success" ></tbody>
                        </table>
                    </div>
                    
                    <div id="failed-import-wrapper" style="display:none; height:500px;">
                        <h3>Failed Import</h3>
                        <form action="{{ url('products/errorimport') }}" onSubmit="return false;" method="POST" id="error-form">
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
        </div> -->
        <div id="step-33">
           <h2 class="StepTitle"><b>Step 3:</b> Create POS Users</h2>
            <div class="col-md-6">
                <form method="POST" action="{{ url('/').'/posusers/storesetup'}}" onsubmit="return false" id="posusers-form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class='panel panel-default'>
                        <div class='panel-heading'>
                            <i class='icon-edit icon-large'></i>
                            {{ $title }} Info
                        </div>
                        <div class='panel-body'>
                            <section>
                                <div class="section-body row">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                            <label>Username</label>
                                            <input type='text' name='username' value="{{ old('username') }}"  class='form-control'>
                                            @if ($errors->has('username'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                            @endif
                                        </div>


                                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label>Password</label>
                                            <input type='password' name='password' value="{{ old('password') }}"  class='form-control'>
                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>


                                        <div class="form-group {{ $errors->has('firstname') ? ' has-error' : '' }}">
                                            <label>First Name</label>
                                            <input type='text' name='firstname' value="{{ old('firstname') }}"  class='form-control'>
                                            @if ($errors->has('firstname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('firstname') }}</strong>
                                            </span>
                                            @endif
                                        </div>


                                        <div class="form-group {{ $errors->has('middlename') ? ' has-error' : '' }}">
                                            <label>Middle Name</label>
                                            <input type='text' name='middlename' value="{{ old('middlename') }}"  class='form-control'>
                                            @if ($errors->has('middlename'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('middlename') }}</strong>
                                            </span>
                                            @endif
                                        </div>


                                        <div class="form-group {{ $errors->has('lastname') ? ' has-error' : '' }}">
                                            <label>Last Name</label>
                                            <input type='text' name='lastname' value="{{ old('lastname') }}"  class='form-control'>
                                            @if ($errors->has('lastname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                            @endif
                                        </div>


                                        <div class="form-group {{ $errors->has('position_id') ? ' has-error' : '' }}">
                                            <label>Position</label>
                                            <select name='position_id' value="{{ old('position_id') }}"  class='form-control'>
                                                <option value=""></option>
                                                <?php foreach ($positions as $key => $value): ?>
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                <?php endforeach ?>
                                            </select>
                                            @if ($errors->has('position_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('position_id') }}</strong>
                                            </span>
                                            @endif
                                        </div>


                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('addr1') ? ' has-error' : '' }}">
                                            <label>Address Line 1</label>
                                            <input type='text' name='addr1' value="{{ old('addr1') }}"  class='form-control'>
                                            @if ($errors->has('addr1'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('addr1') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group {{ $errors->has('addr2') ? ' has-error' : '' }}">
                                            <label>Address Line 2</label>
                                            <input type='text' name='addr2' value="{{ old('addr2') }}"  class='form-control'>
                                            @if ($errors->has('addr2'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('addr2') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                                            <label>City</label>
                                            <input type='text' name='city' value="{{ old('city') }}"  class='form-control'>
                                            @if ($errors->has('city'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group {{ $errors->has('province') ? ' has-error' : '' }}">
                                            <label>Province / State</label>
                                            <input type='text' name='province' value="{{ old('province') }}"  class='form-control'>
                                            @if ($errors->has('province'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('province') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group {{ $errors->has('postal') ? ' has-error' : '' }}">
                                            <label>Postal Code / Zip Code</label>
                                            <input type='text' name='postal' value="{{ old('postal') }}"  class='form-control'>
                                            @if ($errors->has('postal'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('postal') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                                            <label>Country</label>
                                            <input type='text' name='country' value="{{ old('country') }}"  class='form-control'>
                                            @if ($errors->has('country'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('country') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>

                    <div class="row" style="text-align: center">
                        <button class="btn btn-success posusers-submit">Save New POS User</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="posusers-sub-panel">
                    {!! $posusersController->getDatatablesetup() !!}
                </div>
                <small><b>Hint:</b> We prevent deletion of entries from this point. Add as many as you like, later on you can manage your entries on their specific module. </small>
            </div>
        </div>
        
    </div>

    <form action="{{ url('products/fileupload') }}" id="preciousUpload" method="POST" files="true" style="display:none" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">    
        <input type="file" name="file" id="template">
    </form>
     @include('elements/footer')
</div>
@endsection

@section('js-logic1')
<script type="text/javascript">
    $(document).ready(function() {
        // Smart Wizard
        $('#wizard').smartWizard();
        //action bar
        $(".actionBar").click
    });

    $(document).ready(function() {
        // Smart Wizard
        var step = {{ $step }}

        $('#wizard_verticle').smartWizard({
            transitionEffect: 'slide',
            noForwardJumping:false,
            hideButtonsOnDisabled: true,
            onLeaveStep:leaveAStepCallback,
            onFinish:onFinishCallback
        });

        if(step == 3){
            $('#wizard_verticle').smartWizard("enableStep",2);
        }

        if(step == 4){
            $('#wizard_verticle').smartWizard("enableStep",2);
            $('#wizard_verticle').smartWizard("enableStep",3);
        }
            $('#wizard_verticle').smartWizard("goToStep",step);
            


        function leaveAStepCallback(obj, context){
            // alert("Leaving step " + context.fromStep + " to go to step " + context.toStep);
            return validateSteps(context.fromStep); // return false to stay on step and true to continue navigation 
        }

        function onFinishCallback(objs, context){
            if(validateAllSteps()){
                window.location.href = base_url+'/';
            }
        }

        // Your Step validation logic
        function validateSteps(stepnumber){
            var isStepValid = true;
            
            // validate step 1
            if(stepnumber == 1){
                 $.post(base_url+'/setup/marksteps',{step:stepnumber + 1},function(data){});

                return true;
            }

            if(stepnumber == 2){
                 $.post(base_url+'/setup/marksteps',{step:stepnumber + 1},function(data){});
                 
                return true;
            }


            if(stepnumber == 3){
                $.post(base_url+'/setup/marksteps',{step:stepnumber + 1},function(data){});
                return true;
            }

            if(stepnumber == 4){
                return true;
            }

            // ...      
        }
        function validateAllSteps(){
            var isStepValid = true;
            // all step validation logic     
            return isStepValid;
        }       

    });



    $(document).off('click',".location-submit").on('click',".location-submit",function(){
        var btn = $(this);

        $("#locations-form").ajaxForm({
            beforeSend:function(){
                btn.button('loading')
            },
            success:function(data){
                par  =  JSON.parse(data);

                if(par.status){ 
                    alert(par.response);
                    $(".error-msg").remove();        
                    $('input[type="text"], select').popover('destroy').val('');
                    $('.locations-sub-panel').load(base_url+'/locations/datatablesetup');
                }

                btn.button('reset');
            },
            error:function(data){
                $error = data.responseJSON;
                /*reset popover*/   
                $('input[type="text"], select').popover('destroy');

                /*add popover*/
                block = 0;
                $(".error-msg").remove();
                $.each($error,function(k,v){
                    var messages = v.join(', ');
                    msg = '<div class="error-msg err-'+k+'" ><i class="fa fa-exclamation-circle" style="color:rgb(255, 184, 0)"></i> '+messages+'</div>';
                    $('input[name="'+k+'"], textarea[name="'+k+'"], select[name="'+k+'"]').after(msg).attr('data-content',messages);
                    if(block == 0){
                        $('html, body').animate({
                            scrollTop: $('.err-'+k).offset().top - 130
                        }, 500);
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


    $(document).off('click',".posusers-submit").on('click',".posusers-submit",function(){
        var btn = $(this);

        $("#posusers-form").ajaxForm({
            beforeSend:function(){
                btn.button('loading')
            },
            success:function(data){
                par  =  JSON.parse(data);

                if(par.status){ 
                    alert(par.response);      
                    $(".error-msg").remove();  
                    $('input[type="text"], select').popover('destroy').val('');
                    $('.posusers-sub-panel').load(base_url+'/posusers/datatablesetup');
                }

                btn.button('reset');
            },
            error:function(data){
                $error = data.responseJSON;
                /*reset popover*/   
                $('input[type="text"], select').popover('destroy');

                /*add popover*/
                block = 0;
                $(".error-msg").remove();
                $.each($error,function(k,v){
                    var messages = v.join(', ');
                    msg = '<div class="error-msg err-'+k+'" ><i class="fa fa-exclamation-circle" style="color:rgb(255, 184, 0)"></i> '+messages+'</div>';
                    $('input[name="'+k+'"], textarea[name="'+k+'"], select[name="'+k+'"]').after(msg).attr('data-content',messages);
                    if(block == 0){
                        $('html, body').animate({
                            scrollTop: $('.err-'+k).offset().top - 130
                        }, 500);
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
</script>

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

            $.post(base_url+'/settings/productsettings',{data:data},function(data){
                par = JSON.parse(data);
                if(par.status){
                    alert(par.response);
                    $('.alert-notification-success').show();
                    // $('.notif-msg').html(par.response);
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
@endsection


<!-- products -->
@section('js-logic3')
<!-- <script type="text/javascript">
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
                success:function(data){

                    try{
                        par = JSON.parse(data);
                        console.log(par)
                        settings = par.settings;
                        result = par.result;
                        // console.log(par.location)
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
                                        '<option value="stock_code">Stock Code</option>'+
                                        '<option value="supplier_code">Supplier Code</option>'+
                                        '<option value="barcode">Bar Code</option>';
                        }

                        tr= '';
                        $i=0;
                        $.each(result,function(k,v){
                            tr +=  '<tr>'+
                                        '<td>'+k.replace('_',' ')+'</td>'+
                                        '<td>'+
                                            '<select name="'+k+'" data-index="'+$i+'" class="form-control map-select">'+
                                            '<option value=""></option>'+option+
                                            '<option value="name">Product Name</option>'+
                                            '<option value="description">Product Description</option>'+
                                            '<option value="category_id">Category</option>'+
                                            '<option value="cost">Cost</option>'+
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
                        // console.log('sf')
                        $.each(par.location,function(k,v){
                            options += '<option value="'+v.id+'">'+v.name+'</option>';
                        })

                        tr +=  '<tr>'+
                                        '<td>Locations</td>'+
                                        '<td>'+
                                            '<select name="location_id" class="form-control">'+options+'</select>'+
                                        '</td>'+
                                    '</tr>';

                        $('.product-mapping').html(tr);

                    }catch(e){
                        console.log(e.message)
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
            
            if(current.val() != 'ignore' && current.val() != 'pos_required_fields' ){
                $('.map-select').each(function(k,siblings){

                    if(previousVal != 'ignore' && previousVal != 'pos_required_fields')
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
            self = $(this);
            self.button('loading');

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

            if($.inArray('price_default',fields) == -1){
                errors.push('Price')
            }

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


            $counter = 0;
             var last_response_len = false;
             $("#map-form").ajaxForm({
                xhrFields: {
                    onprogress: function(e) {
                        $("#import-success").html(e.target.responseText);
                    }
                },
                beforeSend:function(){
                    $(".product-wrapper").hide();
                    $(".product-import").show();
                        // $.progress();
                    
                    // $(".stone-spinner").show();
                    // $("."+button).attr("disabled",true).html('<i class="fa fa-upload"></i> Please Wait while Uploading...');
                },
                success:function(data){
                    $.ajax({
                        url:base_url+'/products/errorimport',
                        xhrFields:{
                            onprogress:function(e){
                                if(e.target.responseText != ''){
                                    $("#failed-import-wrapper").show();
                                }
                                $("#import-errors").html(e.target.responseText);   
                                self.button('reset');
                            }
                        }
                    })
                },
                error:function(data){
                    self.button('reset');
                }
            }).submit();
        })


        $(document).on('click',".error-submit",function(){
            $("#error-form").ajaxForm({
                xhrFields: {
                    onprogress: function(e) {
                        $("#import-errors").html(e.target.responseText);
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
                    console.log(data)
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
        


    })
</script> -->
@endsection
<!-- endproducts -->