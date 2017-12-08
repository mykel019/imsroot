    <table class="table">
        <thead>
            <!-- <th class="check-col"><input type="checkbox" class="chk-all"></th> -->

            <?php //foreach ($cols as $key => $value):?>
                <th>Location</th>
                <th>Product</th>
                <th>SKU</th>
                <th>Created</th>
                <th></th>
            <?php //endforeach; ?>
        </thead>

        <tbody>
            <?php foreach ($data as $key => $value):?>
                
            <tr id="<?=$value->id?>">
                <!-- <td><input type="checkbox" class="chk-list"></td> -->
                <td><?=ucwords(@$value->location->name) ?></td>
                <td><?=ucwords(@$value->product->name) ?></td>
                <td><?=ucwords(@$value->product->sku) ?></td>
                <td><?=ucwords(@$value->app_created) ?></td>
                <td class="action-buttons">
                    <button class="btn btn-info btn-xs">View More</button>

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
