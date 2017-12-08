    <table class="table">
        <thead>
            <!-- <th class="check-col"><input type="checkbox" class="chk-all"></th> -->

            <?php //foreach ($cols as $key => $value):?>
                <th>Product</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Return Qty</th>
                <th>Return Total</th>
                <th>VAT</th>
                <th>VAT Sale</th>
                <th>VAT Exempt</th>
                <th>VAT Exempt Sale</th>
                <th></th>
            <?php //endforeach; ?>
        </thead>

        <tbody>
            <?php foreach ($data as $key => $value):?>
            <tr id="<?=$value->id?>">
                <!-- <td><input type="checkbox" class="chk-list"></td> -->
                <td><?=ucwords($value->name) ?></td>
                <td><?=ucwords($value->qty) ?></td>
                <td><?=ucwords($value->total) ?></td>
                <td><?=ucwords($value->return_qty) ?></td>
                <td><?=ucwords($value->return_total) ?></td>
                <td><?=ucwords($value->vat) ?></td>
                <td><?=ucwords($value->vat_sale) ?></td>
                <td><?=ucwords($value->vat_exempt) ?></td>
                <td><?=ucwords($value->vat_exempt_sale) ?></td>
                <td class="action-buttons">
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
