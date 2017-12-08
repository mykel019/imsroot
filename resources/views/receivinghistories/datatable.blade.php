    <table class="table">
        <thead>
            <!-- <th class="check-col"><input type="checkbox" class="chk-all"></th> -->

            <?php //foreach ($cols as $key => $value):?>
                <th>User</th>
                <th>Location</th>
                <th>Delivery Number</th>
                <th>PO Number</th>
                <th>Received Quantity</th>
                <th>Product Name</th>
                <th>Date Received</th>
                <th>Status</th>
                <th></th>
            <?php //endforeach; ?>
        </thead>

        <tbody>

            <?php foreach ($data as $key => $value):?>
            @if(Auth::User()->position_id == 0)
                    <tr id="<?=$value->id?>">
                        <!-- <td><input type="checkbox" class="chk-list"></td> -->
                        <td><?=ucwords($value->fname)?>&nbsp<?=ucwords($value->lname) ?></td>
                        <td><?=ucwords($value->location_name) ?></td>
                        <td><?=ucwords($value->dr_no) ?></td>
                        <td><?=ucwords($value->po_no) ?></td>
                        <td><?=ucwords($value->received_qty) ?></td>
                        <td><?=ucwords($value->product_name)?></td>
                        <td><?=ucwords($value->date_received) ?></td>
                         <td>
                            <?php
                                switch ($value->status) {
                                  
                                    case 2:
                                        echo '<i class="fa fa-check"></i> Partially Received';
                                        break;
                                    case 3:
                                        echo '<i class="fa fa-check" style="color:blue"></i> Recevied in Full';
                                        break;
                                    
                                    default:
                                        # code...
                                        break;
                                }
                             ?>
                        </td>
                    </tr>
            @elseif(Auth::User()->location_id == $value->location_id)
                <tr id="<?=$value->id?>">
                    <!-- <td><input type="checkbox" class="chk-list"></td> -->
                    <td><?=ucwords($value->fname)?>&nbsp<?=ucwords($value->lname) ?></td>
                    <td><?=ucwords($value->location_name) ?></td>
                    <td><?=ucwords($value->dr_no) ?></td>
                    <td><?=ucwords($value->po_no) ?></td>
                    <td><?=ucwords($value->received_qty) ?></td>
                    <td><?=ucwords($value->product_name)?></td>
                    <td><?=ucwords($value->date_received) ?></td>
                     <td>
                        <?php
                            switch ($value->status) {
                              
                                case 2:
                                    echo '<i class="fa fa-check"></i> Partially Received';
                                    break;
                                case 3:
                                    echo '<i class="fa fa-check" style="color:blue"></i> Recevied in Full';
                                    break;
                                
                                default:
                                    # code...
                                    break;
                            }
                         ?>
                    </td>
                </tr>
            @endif
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- <span><button class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> &nbsp;Remove</button></span> -->
    <span> {!! $data->render() !!}</span>



@section('js-logic2')
<script>

    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });

</script>
@endsection
