@extends('app')

@section('sidemenu')
@endsection

    <style>
        .accept-dr{
                    display:none;
        }

        .return-dr{
                    display:none;
        }

        .hide_return {
            display:none;
        }

        .hide_accept{
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
                <div class="col-md-9 col-sm-12 col-xs-12">
                       <div class="col md-3 accept-dr" style="height:50px; margin-bottom:10px; border-radius:3px; width:auto; border:1px #92c1925 solid; line-height:45px;background-color:#6fc599; text-align:center; color:white; font-size:17px; font-weight: 600; z-index:2;">
                            <font size="4"> Excess products added to Inventory   </font>
                        </div>
                        <div class="col md-3 return-dr" style="height:50px; margin-bottom:10px; border-radius:3px; width:auto; border:1px #92c1925 solid; line-height:45px;background-color:#6fc599; text-align:center; color:white; font-size:17px; font-weight: 600; z-index:2;">
                            <font size="4"> Excess products added to Returns </font>
                        </div>
                    <div class="page-title">
                        <div class="title_left">
                            <h3>{{ $title }}</h3>
                        </div>

                    </div>
                    <div class='x_panel'>
                        <div class='x_title'>
                            <div class="row">
                                <a href="{{ url($module) }}" class="btn btn-app"><i class="fa fa-long-arrow-left"></i> Return</a>
                                <!-- <a class="btn btn-app submit"><i class="glyphicon glyphicon-floppy-disk"></i> Save </a> -->
                                <!-- <a class="btn btn-app clear-form"><i class="glyphicon glyphicon-erase"></i> Clear </a> -->
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class='x_content'>
                            <form method="POST" action="{{ url('/').'/'.$module.'/update'}}" onsubmit="return false" id="form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{ Crypt::encrypt($result->id) }}">
                                <input type="hidden" name="location_id" value="{{ $params->location }}">
                                <input type="hidden" name="removed_items" >
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Delivery Number: </label> <span>{{ $result->dr_no }}</span>
                                    </div>

                                    <div class="form-group">
                                        <label>Delivery Date : </label> <span>{{ $result->delivery_date }}</span>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ship from  : </label> <span>{{ $result->location->name }}</span>
                                    </div>

                                    <div class="form-group">
                                        @foreach($location as $key => $value)
                                        <label>Ship to  : </label> <span>{{$value->name}}</span>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h3>Item Description</h3>
                                    <hr>
                                    <table class="table">
                                        <thead >
                                            <th style="vertical-align:top; width:60%">Item Description</th>
                                            <th style="vertical-align:top; width:18%">Qty</th>
                                            <th style="vertical-align:top; width:18% ">Excess/Incomplete Items</th>
                                        </thead>
                                        <tbody class="dr-items">
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
                                            <!-- <tr>
                                                <td colspan="2"></td>
                                                <td colspan="2" style="text-align:right">
                                                    <h4>Subtotal: <span id="subtotal"></span></h4>
                                                    <h4>Tax: <span id="tax"></span></h4>
                                                    <h4>Shipping: <span id="shipping"></span></h4>
                                                    <h3>Grand Total: <span id="grand-total"></span></h3>
                                                </td>
                                            </tr> -->
                                            
                                        </tbody>
                                        
                                    </table>
                                    

                                    <br>
                                    <br>
                                    <br>
                                   <!--  <div class="x_panel">
                                        
                                        <div class="x_content">
                                            <div id="alerts"></div>

                                            <div id="editors" contenteditable="false">

                                            </div>
                                            <textarea name="descr" id="descr"></textarea>

                                        </div>
                                    </div> -->
                                </div>                                

                            </form>


                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12 widgets-wrapper">
                    <?php
                        $status = 'Not Sent';
                        $notSentClass = 'btn-success';
                        $sentClass = 'btn-default disabled';
                        $receivedClass = 'btn-default disabled';

                        if($result->status == 1){
                            $status = 'Sent';
                            $notSentClass = 'btn-default disabled';
                            $sentClass = 'btn-success';
                        }elseif($result->status == 2){
                            $status = 'Partially Received';
                            $notSentClass = 'btn-default disabled';
                            $receivedClass = 'btn-warning';

                        }elseif($result->status == 3){
                            $status = 'Received';
                            $notSentClass = 'btn-default disabled';
                            $receivedClass = 'btn-success';
                        }
                    ?>
                    <div class="x_panel">
                        <h4>Delivery Status: {{ $status }} <a class="pull-right po-status-edit">Edit</a></h4>
                        <div class="x_content">
                            <div class="form-group">
                                <div class="btn-group btn-group-justified " role="group" aria-label="...">
                                  <a type="button" class="btn btn-round {{ $notSentClass }}" >Not Sent</a>
                                  <a type="button" class="btn {{ $sentClass }}" >Sent</a>
                                  <a type="button" class="btn btn-round {{ $receivedClass }}">{{ ($result->status == 2) ? 'Partial' : 'Received' }}</a>
                                </div>
                            </div>
                            <?php if ($result->status >= 1): ?>
                                
                            <div class="form-group">
                                <br>
                                <table class="table">
                                    <tr>
                                        <td><i class="fa fa-envelope" style="font-size:18px"></i> Delivery Sent:</td>
                                        <td></i>{{ date('F d, Y',strtotime($result->delivery_date)) }}</td>
                                    </tr>
                                    <?php if ($result->status == 3 ): ?>
                                    <tr>
                                        <td><i class="fa fa-check-circle" style="font-size:18px"></i> All Items Received:</td>
                                        <td></i>{{ date('F d, Y',strtotime($result->date_received)) }}</td>
                                    </tr>
                                    <?php endif ?>
                                </table>
                                <hr>
                            </div>
                                <?php if ($result->status != 3): ?>
                             <!--    <div class="form-group">
                                    <ul style="list-style:none; margin-left: -54px;">
                                        <li><a class="btn receive-partial"><i class="fa fa-dropbox " style="font-size:18px;"></i> Enter Partially Received Items</a></li>
                                        <li><a class="btn receive-full"><i class="fa fa-check-circle " style="font-size:18px"></i> Mark All Items Received Today</a></li>
                                    </ul>
                                </div> -->
                                <?php endif ?>
                            <?php endif ?>
                           
                        </div>
                    </div>

                    <div class="col-md-12 hint">
                        <p><b>Hint: </b>Once your Deliveries are marked as "Received", those items will automatically be added to your available inventory.
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

        $(".dr-status-edit").click(function(){
            $('.small-modal').modal('show');
            $('.small-modal .modal-title').html('Edit Delivery Status');
            dr_id = {{ $result->id }}
            

            try{
                dr_date_sent = '{{ $result->date_sent }}'
                dr_date_received = '{{ $result->date_received }}'

            }
            catch(e){
                dr_date_sent = '';
                dr_date_received = '';
            }
            
                content =   '<form id="dr-edit-form" action="'+base_url+module+'/status" onsubmit="return false" method="post">'+
                                '<input type="hidden" name="_token" value="{{ csrf_token() }}" />'+
                                '<input type="hidden" name="id" value="'+dr_id+'" />'+
                                '<div class="form-group">'+
                                    '<label for="">Date Sent</label>'+
                                    '<input type="date" name="date_sent" value="'+dr_date_sent+'" class="date-sent form-control">'+
                                '</div>'+
                                '<div class="form-group">'+
                                    '<label for="">Date Received</label>'+
                                    '<input type="date" name="date_received" value="'+dr_date_received+'" class="date-received form-control">'+
                                '</div>'+
                                '<small><b style="color:#FF9800">Important:</b> Entering a Date Received will mark this P.O. as "Received in Full". Item quantities will be increased.</small>'+
                                '<br>'+
                                '<br>'+
                                '<div style="text-align:center"><a class="btn btn-success btn-round po-edit-btn" style="width:150px;">Save Changes</a></div>'+
                            '</from>';
            $('.small-modal .modal-body').html(content);
        })

        $(this).on('click',".po-edit-btn", function(){
            $(this).button('loading')
            $("#dr-edit-form").ajaxForm({
                success:function(data){
                    if(data == 'success'){
                        window.location.reload()
                    }
                }
            }).submit()

        })

        dr_items = {!! $dr_items !!}

        $('.receive-partial').click(function(){
            $('.medium-modal').modal('show')
            $('.medium-modal .modal-title').html('Partially Received P.O. Items')
            
            tr = '';
            $.each(dr_items, function(k,v){
                disabled = '';
                if(v.qty_received < v.qty){

                    tr += '<tr>'+
                            '<td>'+v.product.name+'</td>'+
                            '<td><b>'+v.qty+'</b></td>'+
                            '<td><b>'+v.qty_received+'</b></td>'+
                            '<td><input type="text" name="product['+v.id+'][qty]" value="0" style="text-align:center" class="form-control numberinput"></td>'+
                        '</tr>';
                }
            })

            content =  '<form id="po-partial-form" action="'+base_url+module+'/partial" onsubmit="return false" method="post">'+
                            '<input type="hidden" name="_token" value="{{ csrf_token() }}" />'+
                            '<div class="inner-panel">'+
                                '<div class="ip-title">Delivery Items Received</div>'+
                                '<div class="ip-body">'+
                                    '<table class="table">'+
                                        '<thead>'+
                                            '<th style="width:50%">Description</th>'+
                                            '<th>Ordered</th>'+
                                            '<th>Received</th>'+
                                            '<th>Receiving Now</th>'+
                                        '</thead>'+
                                        '<tbody>'+
                                            tr+
                                        '</tbody>'+
                                    '</table>'+
                                '</div>'+
                            '</div>'+
                            '<div style="text-align:center"><a class="btn btn-success btn-round btn-partial-save" style="width:150px">Save Changes</a></div>'
                        '</form>';

            $('.medium-modal .modal-body').html(content)
        })


        $(".receive-full").click(function(){
            dr_id = '{{ $result->id }}'
            if(confirm('Are you sure all the items in this P.O have been received?')){
                $.post(base_url+module+'/received', {delivery_id:dr_id},function(data){
                    window.location.reload();
                })
            }
        })

        $(this).on('click','.btn-partial-save', function(){
            $(this).button('loading')
            $("#po-partial-form").ajaxForm({
                success:function(data){
                    window.location.reload();
                }
            }).submit()
        });

    })

</script>

<script>
    $(document).ready(function(){
        var ItemsToDR = Array();
        dr_items = {!! $dr_items !!}
        // alert(po_items);
        console.log(dr_items)
        settings = JSON.parse(<?=json_encode($settings) ?>)

        localStorage.setItem('products','');

        $.getProductInventoryCount = function(product_id){
            $.get(base_url+module+'/productinventorycount',{product_id:product_id},function(data){
                localStorage.setItem('invcount',data);
            })
        }

        $.calculate = function(){
            amount = Array();
            total = 0;
            $.each(dr_items, function(k,v){
                total +=v.qty_received * v.cost
            })

            shipping = 0;
            tax = 0;
            grandtotal = total + shipping + tax;

            $("#subtotal").html($.commaSeparated(total));
            $("#tax").html($.commaSeparated(tax));
            $("#shipping").html($.commaSeparated(shipping));
            $("#grand-total").html($.commaSeparated(grandtotal));
        }

        /*display items in PO*/
        if(dr_items){
            //get product INV count
            $.each(dr_items,function(k,v){
                // console.log(v)
                ItemsToDR.push(v.product_id)
                // $.getProductInventoryCount(v.product_id);
                div = '';
                span = '';
                span1 = '';
                full = '';
                if(v.product.photo !== 'NULL' && v.product.photo !== null && v.product.photo !== ''){
                    imgSrc = base_url+'/uploads/product_thumbnails/'+v.product.photo;
                }else{
                    imgSrc = base_url+'/img/default-item.png';
                }

                if(v.returns > 0 ){

                    div += '<div class="btn-group action-buttons" style="margin-left: 46px; margin-top: -6px;">'+
                                '<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                                    'Action <span class="caret"></span>'+
                                '</button>'+
                                '<ul class="dropdown-menu" style="float:left;">'+
                                    '<li><a href="#" class="accept" data-id="'+v.product.id+'">Accept</a></li>'+
                                    '<li><a href="#" class="return" data-id="'+v.product.id+'">Return</a></li>'+
                                '</ul>'+
                            '</div>';
                            
                    span += '<h4><span class="returns_value">'+v.returns + '</span>';
                }

                if(v.returns == "Accepted"){
                    returned_value = v.received_qty - v.qty 
                     if(returned_value > 1){

                            span1 += '<h4><span class="returns_value">' +returned_value+ ' items | ' +v.returns +  '</span>';

                        } else {

                            span1 += '<h4><span class="returns_value">' +returned_value+ ' item | ' +v.returns +  '</span>';

                        }
                }

                if(v.returns == "Returned"){
                    returned_value = v.received_qty - v.qty 

                    if(returned_value > 1){

                            span1 += '<h4><span class="returns_value">' +returned_value+ ' items | ' +v.returns +  '</span>';

                        } else {

                            span1 += '<h4><span class="returns_value">' +returned_value+ ' item | ' +v.returns +  '</span>';

                        }
                }

                if(v.returns == "Cancelled"){
                    incomplete_items = v.qty - v.received_qty 

                        if(incomplete_items > 1){

                            span1 += '<h4><span class="returns_value">' +incomplete_items+ ' items | ' +v.returns +  '</span>';

                        } else {

                            span1 += '<h4><span class="returns_value">' +incomplete_items+ ' item | ' +v.returns +  '</span>';

                        }

                }

                if(v.returns < 0){

                    incomplete_items = v.qty - v.received_qty 

                    div += '<div class="btn-group action-buttons"  style="margin-left: 46px; margin-top: -3px;">'+
                                                '<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                                                    'Action <span class="caret"></span>'+
                                                '</button>'+
                                                '<ul class="dropdown-menu" style="float:left;">'+
                                                    '<li><a href="#" class="cancel_incomplete_dr_items" data-id="'+v.product.id+'">Cancel</a></li>'+
                                                '</ul>'+
                                            '</div>';

                    span += '<h4><span class="returns_value">'+incomplete_items+  '</span>';

                }

                if(v.returns == 0){
                    full += '<span> Fully Received </span>';
                }

                $('.dr-items').prepend('<tr>'+
                                        '<td>'+
                                            // '<img src="'+imgSrc+'" class="img-thumbnail" style="max-width:150px; max-height:150px" alt="" />'+
                                            '<span style="margin-left:1%">'+
                                                '<div style="vertical-align:top; display:inline-block">'+
                                                    '<h4>'+v.product.name+'</h4>'+
                                                    '<small>ID: '+v.product.id+'</small> | '+
                                                    '<small>SKU: '+v.product.sku+'</small>'+
                                                '</div>'+
                                            '</span>'+
                                        '</td>'+
                                        '<td><h4>'+v.received_qty+' / '+v.qty+'</h4></td>'+
                                        '<td>' + span+ 
                                        full+
                                        span1+
                                        div+ 
                                        '</td>'+
                                    '</tr>');

            });

            $.calculate();  

        }

        $(document).on('click','.accept',function(){

            x = confirm("Accept excess products?");

            if(x){

                $(this).parent().closest('td').replaceWith("<td> Accepted </td>");
                data = $(this).data('id');
                location_id = {{$branch_destination_id}};
                dr_no = {{$result->dr_no}};
                id = {{$result->id}};

                    $.ajax({
                        url:"{{URL('received/accept')}}",
                        type:"post",
                        data:{data:data,location_id:location_id,dr_no:dr_no, id:id},
                        success : function (data) {
                            $('.accept-dr').slideDown();
                            $('.accept-dr').delay(5000).slideUp();
                            // location.reload();

                        }
                    });

            }


        });

        $(document).on('click','.return',function(){

            x = confirm("Return excess products?");

            if(x){

                $(this).parent().closest('td').replaceWith("<td> Returned </td>");
                data = $(this).data('id');
                location_id = {{$params->location}};
                dr_no = {{$result->dr_no}};
                id = {{$result->id}};

                    $.ajax({
                        url:"{{URL('received/return')}}",
                        type:"post",
                        data:{data:data, location_id:location_id, dr_no:dr_no, id:id},
                        success : function (data) {
                            $('.return-dr').slideDown();
                            $('.return-dr').delay(5000).slideUp();
                            // location.reload();

                        }
                    });
            }

        });

        $(document).on('click','.cancel_incomplete_dr_items',function(){

            x = confirm("Cancel remaining items?");

            if(x){
                
                $(this).parent().closest('td').replaceWith("<td> Cancelled </td>");
                data = $(this).data('id');
                location_id = {{$params->location}};
                dr_no = {{$result->dr_no}};        
                id = {{$result->id}};

                    $.ajax({
                        url:"{{URL('received/canceldelivery')}}",
                        type:"post",
                        data:{data:data, location_id:location_id, dr_no:dr_no, id:id},
                        success : function (data) {

                        }
                    })
            }

        });

        $(this).on('click','.add-inventory',function(){
            $.getProducts();
            $(".po-modal").modal('show')
        });

        var timer;
        $(this).on('keyup',".product-search",function(){
            clearTimeout(timer)
            timer = setTimeout(function(){
                        $.searchProduct()
                    },200)

        })



        $(this).on('click','.add-to-document', function(){
            console.log(JSON.parse(localStorage.getItem('products')))
            products = JSON.parse(localStorage.getItem('products'))
            index = $(this).data('index');
            if(ItemsToDR.length == 0){
                ItemsToDR.push(products[index]['id'])
            }
            else if($.inArray(products[index]['id'],ItemsToDR) === -1){
                ItemsToDR.push(products[index]['id'])
            }else{
                alert('Item already exist')
                return false;
            }

            //get product INV count
            $.getProductInventoryCount(products[index]['id']);

            if(products[index]['photo'] !== 'NULL' && products[index]['photo'] !== null && products[index]['photo'] !== ''){
                imgSrc = base_url+'/uploads/product_thumbnails/'+products[index]['photo'];
            }else{
                imgSrc = base_url+'/img/default-item.png';
            }

            $('.dr-items').prepend('<tr>'+
                                    '<td>'+
                                        '<img src="'+imgSrc+'" class="img-thumbnail" style="max-width:150px; max-height:150px" alt="" />'+
                                        '<span style="margin-left:1%">'+
                                            '<div style="vertical-align:top; display:inline-block">'+
                                                '<h3>'+products[index]['name']+'</h3>'+
                                                '<small>ID: '+products[index]['id']+'</small> | '+
                                                '<small>SKU: '+products[index]['sku']+'</small>'+
                                            '</div>'+
                                        '</span>'+
                                    '</td>'+
                                    '<td><input type="text" name="product['+products[index]['id']+'][qty]" value="1" class="qty form-control numberinput" /><center style="margin-top:10px"> Available : '+localStorage.getItem('invcount')+'</center></td>'+
                                    // '<td>'+
                                    //     '<div class="input-group">'+
                                    //       '<span class="input-group-addon">$</span>'+
                                    //       '<input type="text" name="product['+products[index]['id']+'][unit_cost]" class="amount form-control numberinput" value="'+products[index]['unit_cost']+'" aria-label="Amount (to the nearest dollar)">'+
                                    //     '</div>'+
                                    // '</td>'+
                                    '<td><i class="fa fa-close remove-item" data-index="'+products[index]['id']+'" style="font-size:30px; cursor:pointer"></i></td>'+
                                '</tr>');

            $(this).parent().closest('li').remove();


            $.calculate();

            $('input.numberinput').on('keypress', function (e) {            
                return !(e.which != 8 && e.which != 0 &&
                    (e.which < 48 || e.which > 57) && e.which != 46);
            });
        })

        var removedItems = Array();
        $(this).on('click','.remove-item',function(){
            index = $(this).data('index');
            poitemid = $(this).data('poitemid');

            $(this).parent().closest('tr').remove();
            
            if(poitemid){
                removedItems.push(poitemid);
            }
            
            $("input[name=removed_items]").val(JSON.stringify(removedItems))
            ItemsToDR.splice(ItemsToDR.indexOf(index),1)
            $.calculate();
        })


        $(this).on('keyup','.qty, .amount',function(){
            $.calculate();
        });





        $.getProducts = function(){

            if(localStorage.getItem('products') == ''){

                $.searchProduct();

            }else{

                data = JSON.parse(localStorage.getItem('products'))
                li = '';
                $.each(data,function(k,v){
                    if($.inArray(v.id,ItemsToDR) === -1){
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


        $.searchProduct = function(){
            $.ajax({
                    url :base_url+module+'/supplierproducts',
                    type: "GET",
                    dataType:'JSON',
                    data:{'item_name': $(".product-search").val()},
                    success:function(data){
                        localStorage.setItem('products',JSON.stringify(data))
                        li = '';
                        $.each(data,function(k,v){
                            if($.inArray(v.id,ItemsToDR) === -1){
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

    })
</script>

<!-- editor -->
<script>
    $(document).ready(function() {
        $('#editors').keyup(function() {
            $('#descr').val($('#editors').html());
            console.log($('#descr').val())
        });

        $('#editors').html("<?=$result->note ?>")
        $('#descr').val("<?=$result->note ?>")


    });

</script>
<!-- /editor -->
@endsection



