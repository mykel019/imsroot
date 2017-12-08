@extends('app')

@section('sidemenu')
@endsection
<style >
    .error_qty{
        display:none;
    }
    .error_dr{
        display:none;
    }
</style>

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
                    <div class='x_panel'>
                        <div class='x_title'>
                            <div class="row">
                                <a href="{{ url($module) }}" class="btn btn-app"><i class="fa fa-long-arrow-left"></i> Return</a>
                                <a class="btn btn-app save_receiving "><i class="glyphicon glyphicon-floppy-disk"></i> Save </a>
                                <!-- <a class="btn btn-app clear-form"><i class="glyphicon glyphicon-erase"></i> Clear </a> -->
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group" id="search_by">
                            <label> Search By: </label>
                            <br>
                            <label><input type="radio" name="searchby" class="flat" id="radio_dr" value="dr_no"> Delivery Number</label>
                            <label><input type="radio" name="searchby" class="flat" id="radio_po" value="po_no"> PO Number</label>
                            <label><input type="radio" name="searchby" class="flat" id="radio_both" value=""> Both</label>
                     
                        </div>
                        <div class='x_content'>
                            <form method="POST" action="{{ url('/').'/'.$module.'/store'}}" onsubmit="return false" id="form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="col-md-6">
                                        <!-- <span> Search By: <input type="radio" name="po_no" value="po_no"> PO. Number <input type="radio" name="dr_no" value="dr_no">Delivery Number</span> -->
                                        <div class="form-group" id="po_search" style="display:none;">
                                            <label>PO Number</label>
                                            <input type="text" name="po_no" id="po_no" class="form-control">
                                        </div>
                                        <div class="form-group" id="dr_search"  style="display:none;" >
                                            <label>Delivery Number</label>
                                            <input type="text" name="dr_no" id="dr_no" class="form-control">
                                        </div>
                                        <div class="form-group both_div" style="display:none;">
                                            <!-- <span> Search By: <input type="radio" name="po_no" value="po_no"> PO. Number <input type="radio" name="dr_no" value="dr_no">Delivery Number</span> -->
                                            <div class="col md-3 error_both" style="display:none; height:50px; margin-bottom:10px; border-radius:3px; width:auto; border:1px #92c1925 solid; line-height:45px;
                                            background-color:#c92e36; text-align:center; color:white; font-size:17px; font-weight: 600; z-index:2;">
                                                <font size="4">PO Number or Delivery Number cannot be null</font>
                                            </div>
                                            <div class="form-group" id="po_both_search">
                                                <label>PO Number</label>
                                                <input type="text" name="po_both_no" id="po_both_no" class="form-control" onkeypress="return isNumber(event)">
                                                <span class="error_po" style="margin-top:2px; display:none;"><center><font color="red" size="2">required</font></center></span>
                                                <span class="errormsg"></span>
                                            </div>
                                            <div class="form-group" id="dr_both_search">
                                                <label>Delivery Number</label>
                                                <input type="text" name="dr_both_no" id="dr_both_no" class="form-control" onkeypress="return isNumber(event)">
                                                <span class="error_dr" style="margin-top:2px; display:none;"><center><font color="red" size="2">required</font></center></span>
                                                <span class="errormsg"></span>
                                            </div>
                                                <input type="button" name="dr_po_no" id="dr_po_no" class="form-control btn btn-success" value="Search">
                                        </div>
                                    </div>



                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h3>Item Description</h3>
                                        <hr>
                                        <table class="table">
                                            <thead >
                                                <th style="vertical-align:top; width:60%">Product</th>
                                                <th style="vertical-align:top; width:18%">Qty</th>
                                                <th style="vertical-align:top; width:18%">Date Received</th>
                                                <th style="width:5%"></th>
                                            </thead>
                                            <tbody class="receive-items" style="width:auto;">
                                            </tbody>
                                            
                                        </table>
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
<script type="text/javascript">
   
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {

            $('.errormsg').html( "<span class='red'>Numbers Only</span>").fadeOut("slow");
            return false;

        } 

            return true;
    }


        $("#form").submit(function() {
            var qty = $(".qty").val();
            var date_received = $(".date_received").val();
            var id = $(".qty").data('id');
                if(qty == ""){
                    $('.error_qty').show();
                    $(".qty").focus();
                    $(".qty").keyup(function(){
                        $('.error_qty').hide();
                    })
                    return false;
                } else if(date_received == ""){
                        $('.error_dr').show();
                        $('.date_received').focus();

                            $(".date_received").keyup(function(){
                        $('.error_dr').hide();
                        })
                        return false;

                }  else {

                    $('.error_qty').hide(); 
                    $('.error_dr').hide();
                    return true;
                }


        });


        
    $(document).ready(function(){
        $(document).off('click',".save_receiving").on('click',".save_receiving",function(){
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

                    $('body').animate({
                            scrollTop: $('.alert').offset().top - 130
                        }, 500);
                    path = base_url+module;
                    window.location.href = path;
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
                                scrollTop: $('.err-'+k).offset().top - 130
                            }, 500);
                        }catch(e){
                            console.log('error')
                        }
                        block++;
                    }
                })
                btn.button('reset');
            },
            always:function(data){
                btn.button('reset');

            }
        }).submit();

    });


    $(document).off('ifChecked',"#radio_dr").on('ifChecked',"#radio_dr",function(){
        $("#radio_dr").iCheck('check');
        $("#dr_search").show();
        $("#po_search").hide();
        $(".both_div").hide();
        
    });

    $(document).off('ifChecked',"#radio_po").on('ifChecked',"#radio_po",function(){
        $("#radio_po").iCheck('check');
        $("#po_search").show();
        $("#dr_search").hide();
        $(".both_div").hide();
    });

    $("#dr_no").focus( function() {
        $("#po_no").val("");
        $("#dr_both_no").val("");
        $("#po_both_no").val("");
    });

    $("#po_no").focus( function() {
        $("#dr_no").val("");
        $("#dr_both_no").val("");
        $("#po_both_no").val("");
    });

    $("#po_both_no").focus( function() {
        $("#dr_no").val("");
        $("#po_no").val("");

    });

    $("#dr_both_no").focus( function() {
        $("#dr_no").val("");
        $("#po_no").val("");

    });

    $(document).off('ifChecked',"#radio_both").on('ifChecked',"#radio_both",function(){

        $("#radio_both").iCheck('check');
        $(".both_div").show();
        $("#po_search").hide();
        $("#dr_search").hide();

        $("#form").submit(function() {

            var po_val = $('#po_both_no').val();
            var dr_val = $('#dr_both_no').val();

            if(po_val == "" || dr_val == ""){

                $('.error_both').slideDown();
                $('.error_both').delay(5000).slideUp();
                return false;

            }else {

                return true;
            }
        });

    });

    $(document).on('click','#dr_po_no', function(){
        var po_val = $('#po_both_no').val();
        var dr_val = $('#dr_both_no').val();

        $(".receive-items").html('<center><div class="col-lg-12" style="margin-left:350px; margin-right: -279px; margin-top:30px;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="false"></i></div></center>');

        if(po_val == ""){

            $('.error_po').show();

            $("#po_both_no").focus( function() {
                $('.error_po').hide();
            });



        } else if(dr_val == ""){

            $('.error_dr').show();

            $("#dr_both_no").focus( function() {
                $('.error_po').hide();
                $('.error_dr').hide();
            });

        } else {

            $.ajax({
                url:"{{URL('received/powithdrno')}}",
                type:"get",
                data : {po_val:po_val, dr_val:dr_val},
                success : function (data) {

                    $(".receive-items").html(data);

                }
            })
        }
    })


    $(document).off('keyup','#dr_no').on('keyup','#dr_no', function(){

        search = $("#dr_no").val();

        if (this.value != this.value.replace(/[^0-9\.]/g, '')) {
           this.value = this.value.replace(/[^0-9\.]/g, '');
        }

        $(".receive-items").html('<center><div class="col-lg-12" style="margin-left:350px; margin-right: -279px; margin-top:30px;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="false"></i></div></center>');

            if(search == ""){
                $(".receive-items").hide();
            } else {
                $.ajax({
                    url:"{{URL('received/delproducts')}}",
                    type:"get",
                    data : {data:search},
                    success : function (data) {
                        $(".receive-items").show();
                        $(".receive-items").html(data);

                    }
                })
            }
    })

    $(document).off('keyup','#po_no').on('keyup','#po_no', function(){

        search = $("#po_no").val();

        if (this.value != this.value.replace(/[^0-9\.]/g, '')) {
           this.value = this.value.replace(/[^0-9\.]/g, '');
        }

        $(".receive-items").html('<center><div class="col-lg-12" style="margin-left:350px; margin-right: -279px; margin-top:30px;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="false"></i></div></center>');

            if(search == ""){
                $(".receive-items").hide();
            } else {
                $.ajax({
                    url:"{{URL('received/poproducts')}}",
                    type:"get",
                    data : {data:search},
                    success : function (data) {
                        $(".receive-items").show();
                        $(".receive-items").html(data);

                    }
                })
            }
    })


    $(document).on('click','.remove_item',function(){
            var remove_item = $(this).closest("tr");
            
            x = confirm("Remove this product");
            
            if(x){
             remove_item.remove();
            }
    });

 })

     
</script>
@endsection


