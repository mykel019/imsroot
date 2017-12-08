    <table class="table">
        <thead>
            <!-- <th class="check-col"><input type="checkbox" class="chk-all"></th> -->

            <?php //foreach ($cols as $key => $value):?>
                <th>Branch</th>
                <th>Terminal</th>
                <th>OR Number</th>
                <th>TR Number</th>
                <th>Ref TR Number</th>
                <th>Total Tender</th>
                <th>Total Due</th>
                <th>Items Sold</th>
                <th></th>
            <?php //endforeach; ?>
        </thead>

        <tbody>
            <?php foreach ($data as $key => $value):?>
            <tr id="<?=$value->id?>">
                <!-- <td><input type="checkbox" class="chk-list"></td> -->
                <td><?=ucwords($value->name) ?></td>
                <td><?=ucwords($value->terminal) ?></td>
                <td><?=ucwords($value->or_number) ?></td>
                <td><?=ucwords($value->tr_number) ?></td>
                <td><?=ucwords($value->ref_tr_number) ?></td>
                <td><?=ucwords(number_format($value->total_tender)) ?></td>
                <td><?=ucwords(number_format($value->total_due)) ?></td>
                <td>
                    <?php $x = 0; foreach ($value->InvoiceDetails as $InvoiceDetails): ?>
                        <?php 
                            $x += (int)$InvoiceDetails->qty ;
                        ?>
                    <?php endforeach ?>
                    <label class="badge">{{$x}}</label>
                </td>
                <td class="action-buttons">
                    <a href="{{ url('invoicedetails/index/'.Crypt::encrypt($value->id)) }}" class="btn btn-info btn-xs">View Invoices</a>
                 
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
