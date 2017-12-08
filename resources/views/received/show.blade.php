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
                <div class="col-md-9 col-sm-12 col-xs-12">
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
                                    <div class="form-group po">
                                        <label>P.O. #: </label> <span> {{ $result->po_no }}<input type="hidden" id="po_no" name="po_no" value="{{$result->po_no}}"></input></span>
                                    </div>
                                    <div class="form-group dr">
                                        <label>Delivery #: </label> <span>{{ $result->dr_no }}<input type="hidden" id="dr_no" name="dr_no" value="{{$result->dr_no}}"></input></span>
                                    </div>

                                    <div class="form-group">
                                        @foreach($date as $date_received)
                                        <label>Date Received : </label> <span>{{ $date_received->date_received }}</span>
                                        @endforeach
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ship to  : </label> <span>{{ $result->location->name }}</span>
                                    </div>
                                </div>


                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h3>Item Description</h3>
                                    <hr>
                                    <table class="table">
                                        <thead >
                                            <th style="vertical-align:top; width:60%">Item Description</th>
                                            <th style="vertical-align:top; width:18%">Qty</th>
                                            <th style="vertical-align:top; width:18%">Date Received</th>
                                            <th style="width:2%"></th>
                                        </thead>
                                        <tbody class="receive-items">
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
                        <h4>Receiving Status: {{ $status }} <a class="pull-right po-status-edit">Edit</a></h4>
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
                                        <td><i class="fa fa-envelope" style="font-size:18px"></i>Date Received:</td>
                                        @foreach($date as $date_received)
                                        <td></i>{{ date('F d, Y',strtotime($date_received->date_received)) }}</td>
                                        @endforeach
                                    </tr>
                                    
                                </table>
                                <hr>
                            </div>
                                <?php if ($result->status != 3): ?>
                                <!-- <div class="form-group">
                                    <ul style="list-style:none; margin-left: -54px;">
                                        <li><a class="btn receive-partial"><i class="fa fa-dropbox " style="font-size:18px;"></i> Enter Partially Received Items</a></li>
                                        <li><a class="btn receive-full"><i class="fa fa-check-circle " style="font-size:18px"></i> Mark All Items Received Today</a></li>
                                    </ul>
                                </div> -->
                                <?php endif ?>
                            <?php endif ?>
                           
                        </div>
                    </div>

                    <!-- <div class="col-md-12 hint">
                        <p><b>Hint: </b>Once your P.O.'s are marked as "Received", those items will automatically be added to your available inventory.
                    </div> -->

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
    $(document).ready(function(){

    data = $("#dr_no").val();
    data1 = $("#po_no").val();
        if(data != "" && data1 != ""){
           
            $(".dr").hide();
                $.ajax({
                    url:"{{URL('received/showpo')}}",
                    type:"get",
                    data : {data:data1},
                    success : function (data) {
                        $(".receive-items").show();
                        $(".receive-items").html(data);
                    }
                })
        } else if(data1 != ""){
            $(".dr").hide();
                $.ajax({
                    url:"{{URL('received/showpo')}}",
                    type:"get",
                    data : {data:data1},
                    success : function (data) {
                        $(".receive-items").show();
                        $(".receive-items").html(data);
                    }
                })
        } else if(data != ""){

            $(".po").hide();
            $.ajax({
                url:"{{URL('received/showdr')}}",
                type:"get",
                data : {data:data},
                success : function (data) {
                    $(".receive-items").show();
                    $(".receive-items").html(data);
                }
            })
        }

    $(document).on('click','.remove_item',function(){
            var remove_item = $(this).closest("tr");
            x = confirm("Delete this product");
            if(x){
             remove_item.remove();
            }
    });

 })
 
</script>
@endsection