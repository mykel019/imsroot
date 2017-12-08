
 @foreach($products as $key => $value )
 	@if($value->order_status == 1)
		<tr>
		    <td>{{$value->name}}<input type="hidden" data-id="{{$value->id}}" value="{{$value->id}}"> </input></td>
		    <td><input type="text" name="qty[{{$value->id}}][0]" value="" class="form-control qty" onkeypress="return isNumber(event)">
		    	<span class="errormsg"></span>
		    	<span class="error_qty" style="margin-top:2px;"><center><font color="red" size="2">required</font></center></span>
		    	<span style="display:none;"><input type="text" name="received_qty[{{$value->id}}]" value="{{$value->qty_received}}"></span>
		    	<span style="display:none;"><input type="text" name="quantity[{{$value->id}}]" value="{{$value->qty}}"></span>
		    </td>
		    <td><input type="date" name="date_received[{{$value->id}}][0]" class="form-control date_received" value="{{date('Y-m-d')}}"><span class="error_dr" style="margin-top:2px;"><center><font color="red" size="2">required</font></center></span></td>
		    <td><i class="fa fa-close remove_item" style="font-size:25px; cursor:pointer"></i></td>
		</tr>
	@else
		@if($value->qty_received < $value->qty && $value->returns != "Cancelled")
			<tr>
			    <td>{{$value->name}}<input type="hidden" data-id="{{$value->id}}" value="{{$value->id}}"> </input></td>
			    <td><input type="text" name="qty[{{$value->id}}][0]" value="" class="form-control qty" onkeypress="return isNumber(event)">
			    	<span class="errormsg"></span>
			    	<span class="error_qty" style="margin-top:2px;"><center><font color="red" size="2">required</font></center></span>
			    	<span style="display:none;"><input type="text" name="received_qty[{{$value->id}}]" value="{{$value->qty_received}}"></span>
	    			<span style="display:none;"><input type="text" name="quantity[{{$value->id}}]" value="{{$value->qty}}"></span>
			    </td>
			    <td><input type="date" name="date_received[{{$value->id}}][0]"  class="form-control date_received" value="{{date('Y-m-d')}}"><span class="error_dr" style="margin-top:2px;"><center><font color="red" size="2">required</font></center></span></td>
			    <td><i class="fa fa-close remove_item" style="font-size:25px; cursor:pointer"></i></td>
			</tr>
		
		@endif
	@endif
@endforeach

@if($products[0]->returns == "Cancelled")
<center>
	<div class="col-lg-24" style="margin-top:50px; font-weight:100px; margin-left:488px; margin-right: -279px;">
		<h2>PURCHASER DECLINED TO ACCEPT THE REMAINING PRODUCTS</h2>
		<br> Input new Delivery or Purchase Order Number
	<div>
@endif

