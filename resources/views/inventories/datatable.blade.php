    <table class="table">
        <thead>
            <!-- <th class="check-col"><input type="checkbox" class="chk-all"></th> -->

            <?php //foreach ($cols as $key => $value):?>
                <th>Product Name</th>
                <!-- <th>Description</th> -->
                <th>Product Code</th>
                <th>Category</th>
                <th>Cost</th>
                <th>Default Price</th>
                <th>Location</th>
                <th>Zone</th>
                <th>QTY</th>
                <th>Threshold Limit</th>
                <!-- <th>Price Channel</th> -->
                <!-- <th></th> -->
            <?php //endforeach; ?>
        </thead>

        <tbody>
            <?php foreach ($data as $key => $value):?>

                <!-- <td><input type="checkbox" class="chk-list"></td> -->
                @if($value->qty <= $value->threshold_limit)
                <tr class="all_inventory_items" style="background-color:#d38d23; color:white;">
                @else
                <tr class="all_inventory_items" >
                @endif
                    <td><?=ucwords($value->name) ?></td>
                    <!-- <td><?=ucwords($value->description) ?></td> -->
                    <td><?=ucwords($value->code) ?> </td>
                    <td><?=ucwords($value->category_name) ?></td>
                    <td><?=ucwords($value->cost) ?></td>
                    <td><?=ucwords($value->price_default) ?></td>
                    <td><?=ucwords($value->location_name) ?></td>
                    <td><?=ucwords($value->zone_name) ?></td>
                    <td><?=ucwords($value->qty) ?></td>
                    <td><?=ucwords($value->threshold_limit) ?></td>
                </tr>
                    
                <tr class="threshold" style="display:none; background-color:#d38d23; color:white;" >
                    @if($value->qty <= $value->threshold_limit)
                        <td class="name" value="{{$value->qty}}"><?=ucwords($value->name) ?></td>
                        <!-- <td><?=ucwords($value->description) ?></td> -->
                        <td><?=ucwords($value->code) ?> </td>
                        <td><?=ucwords($value->category_name) ?></td>
                        <td><?=ucwords($value->cost) ?></td>
                        <td><?=ucwords($value->price_default) ?></td>
                        <td><?=ucwords($value->location_name) ?></td>
                        <td><?=ucwords($value->zone_name) ?></td>
                        <td><?=ucwords($value->qty) ?></td>
                        <td><?=ucwords($value->threshold_limit) ?></td>
                    @endif
                </tr>
               
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- <span><button class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> &nbsp;Remove</button></span> -->
    <span> {!! $data->render() !!}</span>



@section('js-logic2')
<script>
$(document).ready(function(){

    
        
    });

    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });

</script>
@endsection
