    <table class="table">
        <thead>
            <!-- <th class="check-col"><input type="checkbox" class="chk-all"></th> -->

            <?php //foreach ($cols as $key => $value):?>
                <th></th>
                <th>Price Channel Name</th>
                <th>Product</th>
                <th>Location</th>
                <th>Price</th>
                <th>Discount Type</th>
                <th>Discount</th>
                <th>Client</th>
                <th></th>
            <?php //endforeach; ?>
        </thead>

        <tbody>

            <?php foreach ($data as $key => $value):?>
            <tr id="<?=$value->id?>">
                <!-- <td><input type="checkbox" class="chk-list"></td> -->
                <td>
                    <?php 
                        if($value->primary == 1){
                            echo '<i class="glyphicon glyphicon-pushpin"></i>';
                        } 
                    ?>
                </td>
                <td><?=ucwords($value->name) ?></td>
                <td><?=ucwords($value->product_name) ?></td>
                <td><?=ucwords($value->location_name) ?></td>
                <td><?=ucwords($value->price) ?></td>
                <td><?=ucwords($value->disc_name) ?></td>
                <td>
                <?php 
                    if ($value->percentage == 1){
                        echo $value->disc_value.'%';
                    }else{
                        echo number_format($value->disc_value);
                    }

                ?>
                    
                </td>
                <td><?=ucwords($value->client_name) ?></td>
                <td class="action-buttons">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url($module.'/edit/'.Crypt::encrypt($value->id)) }}">Edit</a></li>
                            <li><a href="#" class="single-delete" data-id="{{ Crypt::encrypt($value->id) }}">Delete</a></li>
                        </ul>
                    </div>

                </td>
            </tr>
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
