    <table class="table">
        <thead>
            <!-- <th class="check-col"><input type="checkbox" class="chk-all"></th> -->

            <?php //foreach ($cols as $key => $value):?>
                <th>Delivery Number</th>
                <th>PO Number</th>
                <th>Product Name</th>
                <th>QTY</th>
                <th>Source</th>
                <th></th>
            <?php //endforeach; ?>
        </thead>

        <tbody>

            <?php foreach ($data as $key => $value):?>
            @if(Auth::User()->position_id == 0)
                <tr id="<?=$value->id?>">
                    <!-- <td><input type="checkbox" class="chk-list"></td> -->
                    <td><?=ucwords($value->dr_no) ?></td>
                    <td><?=ucwords($value->po_no) ?></td>
                    <td><?=ucwords($value->product_name)?></td>
                    <td><?=ucwords($value->qty) ?></td>
                    @if($value->po_no != "")
                    <td><?=ucwords($value->supplier_name)?></td>
                    @else
                    <td><?=ucwords($value->location_name) ?></td>
                    @endif

                    @if($value->dr_no != "" && $value->returns_status != 1)
                    <td>
                        <div class="btn-group action-buttons">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" style="float:left;">
                                <li><a href="#" class="returntosource" data-qty="{{$value->qty}}" data-id="{{$value->id}}" data-location="{{$value->location_id}}" data-index="{{$value->dr_no}}" data-productid="{{$value->product_id}}" data-return="{{$value->branch_destination_id}}">Return</a></li>
                            </ul>
                        </div>
                    </td>
                    @elseif($value->returns_status == 1)
                    <td>
                        <span id="returned{{$value->id}}">Returned to {{$value->destination_name}}</span>
                    </td>
                    @endif

                </tr>
            @elseif(Auth::User()->location_id == $value->location_id)
                <tr id="<?=$value->id?>">
                    <!-- <td><input type="checkbox" class="chk-list"></td> -->
                    <td><?=ucwords($value->dr_no) ?></td>
                    <td><?=ucwords($value->po_no) ?></td>
                    <td><?=ucwords($value->product_name)?></td>
                    <td><?=ucwords($value->qty) ?></td>
                    @if($value->po_no != "")
                    <td><?=ucwords($value->supplier_name)?></td>
                    @else
                    <td><?=ucwords($value->location_name) ?></td>
                    @endif

                    @if($value->dr_no != "" && $value->returns_status != 1)
                    <td>
                        <div class="btn-group action-buttons">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" style="float:left;">
                                <li><a href="#" class="returntosource" data-qty="{{$value->qty}}" data-id="{{$value->id}}" data-location="{{$value->location_id}}" data-index="{{$value->dr_no}}" data-productid="{{$value->product_id}}" data-return="{{$value->branch_destination_id}}">Return</a></li>
                            </ul>
                        </div>
                    </td>
                    @elseif($value->returns_status == 1)
                    <td>
                        <span id="returned{{$value->id}}">Returned to {{$value->destination_name}}</span>
                    </td>
                    @endif

                </tr>

            @endif
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- <span><button class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> &nbsp;Remove</button></span> -->
    <span> {!! $data->render() !!}</span>



@section('js-logic2')
<script>

 $(document).ready(function(){

        $(document).on('click','.returntosource',function(){
                
                x = confirm("Return excess products to Source Location?");

                if(x){

                    var id = $(this).data('id');
                    $(this).parent().closest('td').replaceWith("<td>Returned<td>");
                    var delivery_date = '{{date('Y-m-d')}}';


                    product_id = $(this).data('productid');
                    dr_no = $(this).data('index');
                    qty = $(this).data('qty');
                    location_id = $(this).data('location');
                    branch_destination_id = $(this).data('return');

                        $.ajax({
                            url:"{{URL('returns/savereturn')}}",
                            type:"post",
                            data:{product_id:product_id, delivery_date:delivery_date, qty:qty, location_id:location_id, dr_no:dr_no, branch_destination_id:branch_destination_id},
                            success : function (data) {
                                // alert(id);
                                $("#returned"+id).show();
                            }
                        });
                }

        });
 });

    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });

</script>
@endsection
