    <table class="table">
        <thead>
            <!-- <th class="check-col"><input type="checkbox" class="chk-all"></th> -->

            <?php //foreach ($cols as $key => $value):?>
                <th>Position Name</th>
                <th>Description</th>
                <th></th>
            <?php //endforeach; ?>
        </thead>
            <?php 

                $_edit = '';
                $_delete = '';


                    foreach($accessrightsmodule as $key => $value){

                        if($value->module == $module){

                            $_edit = $value->to_edit;
                            $_delete = $value->to_delete;
                        }
                    }

            ?>

        <tbody>
            <?php foreach ($data as $key => $value):?>
            <tr id="<?=$value->id?>">
                <!-- <td><input type="checkbox" class="chk-list"></td> -->
                <td><?=ucwords($value->name) ?></td>
                <td><?=ucwords($value->description) ?></td>
                @if($_edit == '1' || $_delete == '1' || Auth::User()->position_id == '0')
                    <td class="action-buttons">
                        <?php if (strtolower($value->name) != 'manager' && strtolower($value->name) != 'cashier'): ?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                @if($_edit == '1' || Auth::User()->position_id == '0')
                                    <li><a href="{{ url($module.'/edit/'.Crypt::encrypt($value->id)) }}">Edit</a></li>
                                @endif
                                @if($_delete == '1' || Auth::User()->position_id == '0')
                                    <li><a href="#" class="single-delete" data-id="{{ Crypt::encrypt($value->id) }}">Delete</a></li>
                                @endif
                            </ul>
                        </div>
                        <?php endif ?>
                    </td>
                @endif
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
