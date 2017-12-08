@foreach($products as $key => $value )
<tr>

    <td>{{$value->name}}<input type="hidden" value="{{$value->id}}"></input></td>

    <td><input type="hidden" name="qty[{{$value->id}}][0]"  value="" class="form-control qty" >{{$value->qty}}</td>
    <td colspan="2"><input type="hidden" name="date_received[{{$value->id}}][0]" value="" class="form-control date_received">{{$value->date_received}}</td>
</tr>

@endforeach

