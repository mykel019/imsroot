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
                <div class="col-md-9 col-sm-12 col-xs-12 content-wrapper">
                    <div class="page-title">
                        <div class="title_left">
                           <h3>
                                    {{$title}}
                           </h3>
                        </div>

                        <div class="title_right">
                        </div>
                    </div>
                    <div class='x_panel'>
                        <div class='x_title'>
                            <div class="row">
                                <a href="{{ URL::to($module.'/create') }}" class="btn btn-app" style="float:left"> <i class="fa fa-plus"></i> New</a>
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

                <!-- <div class="col-md-3 col-sm-12 col-xs-12 widgets-wrapper">
                    <div class="x_panel">
                        <form id="form-filters">
                             <div class="form-group">
                                <h4>Brands Statistic</h4>
                                <hr>
                                <h5>Filter by Brands:</h5>
                                <select class="form-control" name="brandstatus" id="brandstatus">
                                    <option value="1">All Brands</option>
                                    <option value="2">Active Brands</option>
                                    <option value="3">InActive Brands</option>
                                </select>
                                <div class="x_content widget-statistics">
                                    <table class="table">
                                        <tr>
                                            <td class="title">Active Brands</td>
                                            <td class="amount"><span class="badge" style="background-color:#00b300">{{ number_format($active) }}</span></td>
                                        </tr>
                                        <tr>
                                            <td class="title">Inactive Brands</td>
                                            <td class="amount"><span class="badge" style="background-color:#ff6666">{{ number_format($inactive) }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 hint">
                        <p></p>
                    </div>
                </div> -->
            </div>
            <br />
        </div>
        <!-- /page content -->


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
                    $(".content-wrapper").hide();
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


                        tr= '';
                        $i=0;
                        $.each(result,function(k,v){
                            tr +=  '<tr>'+
                                        '<td>'+k.replace('_',' ')+'</td>'+
                                        '<td>'+
                                            '<select name="'+k+'" data-index="'+$i+'" class="form-control map-select">'+
                                            '<option value=""></option>'+option+
                                            '<option value="name">Distributor Name</option>'+
                                            '<option value="company">Company</option>'+
                                            '<option value="contact_person">Contact Person</option>'+
                                            '<option value="contact_no">Contact No</option>'+
                                            '<option value="payment_terms">Payment Terms</option>'+
                                            '<option value="addr1">Address 1</option>'+
                                            '<option value="addr2">Address 2</option>'+
                                            '<option value="city">City</option>'+
                                            '<option value="province">Province</option>'+
                                            '<option value="country">Country</option>'+
                                            '<option value="postal">Postal</option>'+
                                            '<option value="manager">Manager</option>'+
                                            '<option value="ignore">IGNORE</option>'+
                                            '</select>'+
                                        '</td>'+
                                    '</tr>';
                            $i++;
                        })

                        // options = '';
                        // $.each(par.location,function(k,v){
                        //     options += '<option value="'+v.id+'">'+v.name+'</option>';
                        // })

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
            self.button('loading');
            fields = Array();
            emptyFields = false;
            errors = Array();
            $(".map-select").each(function(k,v){
                fields.push($(v).val())
                if($(v).val() == "") emptyFields = true;
            });

            if($.inArray('name',fields) == -1){
                errors.push('Distributor Name');
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

            var hasError = false;
            $("#map-form").ajaxForm({
                xhrFields: {
                    onprogress: function(e) {
                        arr = e.target.responseText.split('|')
                        progress = arr[arr.length - 2]

                        $(".progress-bar").css({'width':Math.round(progress)+'%'}).html(Math.round(progress)+'%')
                        $(".progress-bar").attr('aria-valuenow',Math.round(progress))

                    }
                },
                beforeSend:function(){
                    // $(".content-wrapper").hide();
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
                    // $(".content-wrapper").hide();
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



        $("#brandstatus").change(function(){
        $('.sub-panel').html('<center><i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i><center>');
        _filters = $("#form-filters").serialize();
        $.ajax({
            type: "GET",
            url: base_url+module+'/datatable',
            data: {"q":$('.search').val(), 'filters': _filters},
            success: function(res){
                $(".sub-panel").html(res);
                $('input.search').removeClass('searchSpinner');
            }
        });
    })
        


    })
</script>
@endsection

