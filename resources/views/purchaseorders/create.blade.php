@extends('app')

@section('sidemenu')
@endsection


@section('content')
<style type="text/css">
    .sticky {
      position: fixed;
      width: 100%;
      left: 0;
      top: 0;
      z-index: 100;
      border-top: 0;
    }

</style>
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
                                <a class="btn btn-app save_purchaseorder"><i class="glyphicon glyphicon-floppy-disk"></i> Save </a>
                                <!-- <a class="btn btn-app clear-form"><i class="glyphicon glyphicon-erase"></i> Clear </a> -->
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class='x_content'>
                            <form method="POST" action="{{ url('/').'/'.$module.'/store'}}" onsubmit="return false" id="form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supplier</label>
                                         <select name='supplier_id'  class='form-control suppliers'>
                                                    <option>Select Supplier</option>
                                                <?php foreach ($suppliers as $key => $value): ?>
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Supplier PO Number</label>
                                        <input type="text" name="supplier_po_no" class="form-control">
                                    </div>
                                    <div>
                                        <label><input type="checkbox" class="flat chk" value="0" style="position: absolute; opacity: 0;"> Include Products not related with supplier?</label>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Location</label>
                                        @if(Auth::User()->position_id == 0)
                                            <select name='location_id'  class='form-control locations'>
                                                        <option>Select Location</option>
                                                    <?php foreach ($locations as $key => $value): ?>
                                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    <?php endforeach ?>
                                            </select>
                                        @else

                                            <?php foreach ($locations as $key => $value): ?>
                                                @if($value->id == Auth::User()->location_id)
                                                <input type="text" class="form-control" value="{{$value->name}}" readonly>
                                                <input type="hidden"  value="{{$value->id}}" name="location_id">
                                                @endif
                                            <?php endforeach ?>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>PO Date</label>
                                        <input type="date" name="po_date" class="form-control">
                                    </div>

                                
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 item_description">
                                <br>
                                    <h3>Item Description</h3>
                                    <br>
                                    <button class="btn btn-default add-inventory">+ Add Inventory Item</button>
                                    <hr>
                                    <table class="table">
                                        <thead >
                                            <th style="vertical-align:top; width:40%">Item Description</th>
                                            @if(Auth::User()->subscriber_id == 3)
                                            <th style="vertical-align:top; width:18%">Weight</th>
                                            @endif
                                            <th style="vertical-align:top; width:18%">Qty</th>
                                            <th style="vertical-align:top;width:18%;">Unit Amount</small></th>
                                            <th style="width:4%"></th>
                                            <th style="vertical-align:top;width:20%; text-align:right;">Subtotal</small></th>
                                        </thead>
                                        <tbody class="po-items">
                                           <!--  <tr>
                                                <td>
                                                    <img src="http://ims.ph:9000/img/default-item.png" class="img-thumbnail" style="width:100px; height:100px" alt="">
                                                    <span style="margin-left:1%">
                                                        <div style="vertical-align:top; display:inline-block">
                                                            <h3>Bratwurst</h3>
                                                            <small>ID: 3</small> |
                                                            <small>SKU: 3</small>
                                                        </div>
                                                    </span>
                                                </td>
                                                <td>undefined</td>
                                                <td>
                                                    <div class="input-group"><span class="input-group-addon">$</span><input type="text" class="form-control" value="0" aria-label="Amount (to the nearest dollar)"></div>
                                                </td>
                                                <td><i class="fa fa-close" style="font-size:30px; cursor:pointer"></i></td>  
                                            </tr> -->
                                            <tr>
                                            <td colspan="2"></td>
                                                <td colspan="4" style="text-align:right">
                                                    <!-- <h4>Subtotal: <span id="subtotal"></span></h4> -->
                                                    <h4>Tax: <span id="tax"></span></h4>
                                                    <h4>Shipping: <span id="shipping"></span></h4>
                                                    <h3>Grand Total: <span id="grand-total"></span></h3>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                        
                                    </table>
                                    

                                    <br>
                                    <br>
                                    <br>
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Public Note<small>(Your supplier will see this optional note)</small></h2>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div id="alerts"></div>
                                            <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
                                                <div class="btn-group">
                                                    <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                    </ul>
                                                </div>
                                                <div class="btn-group">
                                                    <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a data-edit="fontSize 5">
                                                                <p style="font-size:17px">Huge</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-edit="fontSize 3">
                                                                <p style="font-size:14px">Normal</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-edit="fontSize 1">
                                                                <p style="font-size:11px">Small</p>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="btn-group">
                                                    <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                                    <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                                                    <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                                                    <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                                                </div>
                                                <div class="btn-group">
                                                    <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                                                    <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                                                    <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                                                    <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                                                </div>
                                                <div class="btn-group">
                                                    <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                                                    <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                                                    <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                                                    <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                                                </div>
                                                <div class="btn-group">
                                                    <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                                                    <div class="dropdown-menu input-append">
                                                        <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                                                        <button class="btn" type="button">Add</button>
                                                    </div>
                                                    <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>

                                                </div>
                                                <div class="btn-group">
                                                    <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                                                    <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                                                </div>
                                            </div>

                                            <div id="editor">
                                            </div>
                                            <textarea name="descr" id="descr" style="display:none;"></textarea>
                                            

                                        </div>
                                    </div>
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
$(document).off('click',".save_purchaseorder").on('click',".save_purchaseorder",function(){
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
            always:function(){
                btn.button('reset');

            }
        }).submit();

    });
    $(document).ready(function(){


        settings = JSON.parse(<?=json_encode($settings) ?>)

        localStorage.setItem('products','');

        cf = JSON.parse('<?=json_encode(old("custom_fields"))  ?>');

        //redisplay custom fields
        if(cf){
            fields = '';
            $.each(cf,function(k,v){

                fields +=  '<div class="input-group">'+
                                '<input type="text" name="custom_fields[]" value="'+v+'" class="form-control" placeholder="Search for...">'+
                                '<span class="input-group-btn">'+
                                '<button class="btn btn-danger remove-field" type="button"><i class="fa fa-remove"></i></button>'+
                                '</span>'+
                            '</div>';
            });

            $(".custom-field-wrapper").html(fields);

        }

        $("#add-field").click(function(){
            field = '<div class="input-group">'+
                        '<input type="text" name="custom_fields[]" class="form-control" placeholder="">'+
                        '<span class="input-group-btn">'+
                        '<button class="btn btn-danger remove-field" type="button"><i class="fa fa-remove"></i></button>'+
                        '</span>'+
                    '</div>';
            $(".custom-field-wrapper").append(field);
        })


        $(this).on('click','.remove-field',function(){
            $(this).parent().closest(".input-group").remove();
        })

        $(this).on('click','.add-inventory',function(){
            $.getProductsPo();
            $(".po-modal").modal('show')
        });

        var timer;
        $(this).on('keyup',".product-search",function(){
            clearTimeout(timer)
            timer = setTimeout(function(){
                        $.searchProductPo()
                    },200)

        })

        var ItemsToPO = Array();

        $(this).on('click','.add-to-document', function(){
            console.log(JSON.parse(localStorage.getItem('products')))
            products = JSON.parse(localStorage.getItem('products'))
            index = $(this).data('index');
            if(ItemsToPO.length == 0){
                ItemsToPO.push(products[index]['id'])
            }
            else if($.inArray(products[index]['id'],ItemsToPO) === -1){
                ItemsToPO.push(products[index]['id'])
            }else{
                alert('Item already exist')
                return false;
            }
            qty = 0;
            style = '';
            //get product INV count
            $.getProductInventoryCount(products[index]['id']);

            if(products[index]['photo'] !== 'NULL' && products[index]['photo'] !== null && products[index]['photo'] !== ''){
                imgSrc = base_url+'/uploads/product_thumbnails/'+products[index]['photo'];
            }else{
                imgSrc = base_url+'/img/default-item.png';
            }

            <?php if(Auth::User()->subscriber_id != 3): ?>
            style += 'display:none';
            <?php endif ?>

            <?php foreach ($items as $key => $value): ?>
                if({{$value->product_id}} == products[index]['id']){
                    qty =+ {{$value->sum}};
                }
            <?php endforeach ?>

            $('.po-items').prepend('<tr>'+
                                    '<td>'+
                                        // '<img src="'+imgSrc+'" class="img-thumbnail" style="max-width:150px; max-height:150px" alt="" />'+
                                        '<span style="margin-left:1%">'+
                                            '<div style="vertical-align:top; display:inline-block">'+
                                                '<h3>'+products[index]['name']+'</h3>'+
                                                '<small>ID: '+products[index]['id']+'</small> | '+
                                                '<small>SKU: '+products[index]['sku']+'</small>'+
                                            '</div>'+
                                        '</span>'+
                                    '</td>'+
                                    '<td style="'+style+'"><input type="text" name="product['+products[index]['id']+'][weight]" value="" data-id="'+products[index]['id']+'" id="weight'+products[index]['id']+'" class="weight form-control numberinput" onkeypress="return isNumber(event)"/><center style="margin-top:10px; "  > per gram </center></td>'+
                                    '<td><input type="text" name="product['+products[index]['id']+'][qty]" value="" data-id="'+products[index]['id']+'" id="qty'+products[index]['id']+'" class="qty form-control numberinput" onkeypress="return isNumber(event)"/><center style="margin-top:10px"  > Available : '+qty+' <br><span class="errormsg"></span></center></td>'+
                                    '<td>'+
                                        '<div class="input-group">'+
                                          '<span class="input-group-addon">₱</span>'+
                                          '<input type="text" name="product['+products[index]['id']+'][unit_cost]" id="amount'+products[index]['id']+'" class="amount form-control numberinput"  data-id="'+products[index]['id']+'" value="'+products[index]['unit_cost']+'" aria-label="Amount (to the nearest dollar)">'+
                                        '</div>'+
                                    '</td>'+
                                    '<td><i class="fa fa-close remove-item" data-index="'+products[index]['id']+'" style="font-size:30px; cursor:pointer"></i></td>'+
                                    '<td style="text-align:right;" id="subtotal'+products[index]['id']+'" class="subtotal" data-id="'+products[index]['id']+'"><span data-id="'+products[index]['id']+'"></span></td>'+
                                '</tr>');

            $(this).parent().closest('li').remove();


            $('input.numberinput').on('keypress', function (e) {            
                return !(e.which != 8 && e.which != 0 &&
                    (e.which < 48 || e.which > 57) && e.which != 46);
            });
        })

        $(this).on('click','.remove-item',function(){
            index = $(this).data('index');
            $(this).parent().closest('tr').remove();
            ItemsToPO.splice(ItemsToPO.indexOf(index),1)
            $.calculate();
        })

        $(this).on('keyup','.qty, .amount',function(){

            var id = $(this).data('id');

            qty_val = $('#qty'+id).val();
            amount_val = $('#amount'+id).val();
            weight_val = "";
            subtotal = 0;
            
            <?php if(Auth::User()->subscriber_id == 3): ?>
                weight_val = $('#weight'+id).val();
            <?php endif ?>

            if(weight_val == ""){
                subtotal = qty_val * amount_val


                $("#subtotal"+id).val(subtotal);
                $.calculate();
            } else {
                subtotal = weight_val * amount_val


                $("#subtotal"+id).val(subtotal);
                $.calculate();
            }

                $("#subtotal"+id).html('<span>₱&nbsp</span>'+$.commaSeparated(subtotal.toFixed(2)));


        });

        $(this).on('keyup','.weight',function(){

            var id = $(this).data('id');
            subtotal = 0;

            qty_val = $('#qty'+id).val();
            amount_val = $('#amount'+id).val();
            weight_val = $('#weight'+id).val();


            subtotal = weight_val * amount_val
            $("#subtotal"+id).html('<span>₱&nbsp</span>'+$.commaSeparated(subtotal.toFixed(2)));
            $("#subtotal"+id).val(subtotal);


            $.calculate();

        });


        $.calculate = function(){
            
                total = 0;

                $(".subtotal").each(function() {      
                    total += parseFloat($(this).val())
                });

            shipping = 0;
            tax = 0;
            grandtotal = total + shipping + tax;
            
            if(isNaN(grandtotal)){
                $("#grand-total").html('<span>₱&nbsp</span>'+$.commaSeparated("0.00"));
            }else {
                $("#grand-total").html('<span>₱&nbsp</span>'+$.commaSeparated(grandtotal.toFixed(2)));
            }

            // $("#subtotal").html($.commaSeparated(total));
            // $(".subtotal"+id).html($.commaSeparated(subtotal));
            $("#tax").html($.commaSeparated(tax));
            $("#shipping").html($.commaSeparated(shipping));
            
        }

        $.getProductsPo = function(){

            if(localStorage.getItem('products') == ''){

                $.searchProductPo();

            }else{

                data = JSON.parse(localStorage.getItem('products'))
                li = '';
                $.each(data,function(k,v){
                    if($.inArray(v.id,ItemsToPO) === -1){
                        li +=   '<li style="padding:1%">'+
                                    '<span style="float:right"><a class="btn btn-default btn-xs add-to-document" data-index="'+k+'">+ Add to PO</a></span>'+
                                    '<b>'+v.name+'</b><br>'+
                                    '<span class="details" id="product_id_po" value="'+v.id+'">'+
                                        'ID: '+v.id+' | SKU: '+v.sku+'<br>'+
                                        'Selling Price: $ '+v.price_default+
                                    '</span>'
                                '</li>';
                    }
                })
                $(".inventory-search-result").html('<ul>'+li+'</ul>');
            }
        }

        $.getSuppliersProductsPo = function(){

            if(localStorage.getItem('products') == ''){

                $.searchProductPo();

            }else{

                data = JSON.parse(localStorage.getItem('products'))
                li = '';
                $.each(data,function(k,v){
                    if($.inArray(v.id,ItemsToPO) === -1){
                        li +=   '<li style="padding:1%">'+
                                    '<span style="float:right"><a class="btn btn-default btn-xs add-to-document" data-index="'+k+'">+ Add to PO</a></span>'+
                                    '<b>'+v.name+'</b><br>'+
                                    '<span class="details">'+
                                        'ID: '+v.id+' | SKU: '+v.sku+'<br>'+
                                        'Selling Price: $ '+v.price_default+
                                    '</span>'
                                '</li>';
                    }
                })
                $(".inventory-search-result").html('<ul>'+li+'</ul>');
            }
        }


        $.searchProductPo = function(){
            $.ajax({
                        url :base_url+module+'/supplierproducts',
                        type: "GET",
                        dataType:'JSON',
                        data:{ supplier_id:$('.suppliers').val() ,'item_name': $(".product-search").val(),'product_id': $(".product_id_po").val(), 'open_search':'0'},
                        success:function(data){
                            localStorage.setItem('products',JSON.stringify(data))
                            li = '';
                            $.each(data,function(k,v){
                                if($.inArray(v.id,ItemsToPO) === -1){
                                    li +=   '<li style="padding:1%">'+
                                                '<span style="float:right"><a class="btn btn-default btn-xs add-to-document" data-index="'+k+'">+ Add to PO</a></span>'+
                                                '<b>'+v.name+'</b><br>'+
                                                '<span class="details">'+
                                                    'ID: '+v.id+' | SKU: '+v.sku+'<br>'+
                                                    'Selling Price: $ '+v.price_default+
                                                '</span>'
                                            '</li>';
                                }
                            })
                            $(".inventory-search-result").html('<ul>'+li+'</ul>');
                        }
                    })
        }

        $.searchProductPoitems = function(){
            $.ajax({
                        url :base_url+module+'/supplierproducts',
                        type: "GET",
                        dataType:'JSON',
                        data:{ supplier_id:$('.suppliers').val() ,'item_name': $(".product-search").val(),'product_id': $(".product_id_po").val(), 'open_search':'1'},
                        success:function(data){
                            localStorage.setItem('products',JSON.stringify(data))
                            li = '';
                            $.each(data,function(k,v){
                                if($.inArray(v.id,ItemsToPO) === -1){
                                    li +=   '<li style="padding:1%">'+
                                                '<span style="float:right"><a class="btn btn-default btn-xs add-to-document" data-index="'+k+'">+ Add to PO</a></span>'+
                                                '<b>'+v.name+'</b><br>'+
                                                '<span class="details">'+
                                                    'ID: '+v.id+' | SKU: '+v.sku+'<br>'+
                                                    'Selling Price: $ '+v.price_default+
                                                '</span>'
                                            '</li>';
                                }
                            })
                            $(".inventory-search-result").html('<ul>'+li+'</ul>');
                        }
                    })
        }

            $(document).off('ifChecked','.chk').on('ifChecked','.chk',function(){
                var timer;
                $(document).off('keyup',".product-search").on('keyup',".product-search",function(){
                    clearTimeout(timer)
                    timer = setTimeout(function(){
                                $.searchProductPoitems()
                            },200)

                })
                    $.searchProductPoitems()
                   
                })

                $(document).off('ifUnchecked','.chk').on('ifUnchecked','.chk',function(){
                    // chk = $(".chk").val("0");
                    var timer;
                    $(document).off('keyup',".product-search").on('keyup',".product-search",function(){
                        clearTimeout(timer)
                        timer = setTimeout(function(){
                                    $.searchProductPo()
                                },200)

                    })
                   $.searchProductPo()
                })

                $(document).off('change','.suppliers').on('change','.suppliers',function(){

                    supplier_id = $('.suppliers').val();
                    var timer;

                    $(document).off('keyup',".product-search").on('keyup',".product-search",function(){
                        clearTimeout(timer)
                        timer = setTimeout(function(){
                                    $.searchProductPo()
                                },200)

                    })

                     $.searchProductPo()
                });


        $.getProductInventoryCount = function(product_id){
            $.get(base_url+module+'/productinventorycount',{product_id:product_id},function(data){
                localStorage.setItem('invcount',data);
            })
        }
    })
</script>

<!-- editor -->
<script>

   function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {

            $('.errormsg').html( "<span class='red'>Numbers Only</span>").fadeOut("slow");
            return false;

        } 

            return true;
    }
    
    $(document).ready(function() {
      $('#editor').keyup(function() {
        $('#descr').val($('#editor').html());
        console.log($('#descr').val())
      });
    });

    $(function() {
        function initToolbarBootstrapBindings() {
            var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'
            ],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
            $.each(fonts, function(idx, fontName) {
                fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
            });
            $('a[title]').tooltip({
                container: 'body'
            });
            $('.dropdown-menu input').click(function() {
                return false;
            })
            .change(function() {
                $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
            })
            .keydown('esc', function() {
                this.value = '';
                $(this).change();
            });

            $('[data-role=magic-overlay]').each(function() {
                var overlay = $(this),
                target = $(overlay.data('target'));
                overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
            });
            if ("onwebkitspeechchange" in document.createElement("input")) {
                var editorOffset = $('#editor').offset();
                $('#voiceBtn').css('position', 'absolute').offset({
                    top: editorOffset.top,
                    left: editorOffset.left + $('#editor').innerWidth() - 35
                });
            } else {
                $('#voiceBtn').hide();
            }
        };

        function showErrorAlert(reason, detail) {
            var msg = '';
            if (reason === 'unsupported-file-type') {
                msg = "Unsupported format " + detail;
            } else {
                console.log("error uploading file", reason, detail);
            }
            $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
        };
        initToolbarBootstrapBindings();
        $('#editor').wysiwyg({
            fileUploadError: showErrorAlert
        });
        window.prettyPrint && prettyPrint();
    });
</script>
<!-- /editor -->
@endsection



