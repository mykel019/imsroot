    <table class="table">
        <thead>
            <!-- <th class="check-col"><input type="checkbox" class="chk-all"></th> -->

            <?php //foreach ($cols as $key => $value):?>
                <th>Name</th>
                <th>Contact Details</th>
                <th>Biz. Nature</th>
                <th>Biz. Type</th>
                <th></th>
            <?php //endforeach; ?>
        </thead>

        <tbody>
            <?php foreach ($data as $key => $value):?>
            <tr id="<?=$value->id?>">
                <!-- <td><input type="checkbox" class="chk-list"></td> -->
                <td><?=ucwords($value->name) ?></td>
                <td><?=ucwords($value->contact_details) ?></td>
                <td><?=ucwords($value->biz_nature) ?></td>
                <td><?=ucwords($value->biz_type) ?></td>
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
