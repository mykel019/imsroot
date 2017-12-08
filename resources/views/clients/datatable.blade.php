
       <table class="table">
        <thead>
            <!-- <th class="check-col"><input type="checkbox" class="chk-all"></th> -->

            <?php //foreach ($cols as $key => $value):?>
                <th><?=ucfirst('Account Name'); ?></th>
                <th><?=ucfirst('Email'); ?></th>
                <th><?=ucfirst('Company'); ?></th>
                <th><?=ucfirst('Account Manager'); ?></th>
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
                <?php if ($value->deleted_at): ?>
                    <?php $status = "deleted-row" ?>
                <?php else: ?>
                    <?php $status = "active-row" ?>
                <?php endif ?>
            <tr id="<?=Crypt::encrypt($value->id)?>" class="{{$status}}">
                <!-- <td><input type="checkbox" class="chk-list"></td> -->
                <td><?=ucwords($value->name) ?></td>
                <td><?=ucwords($value->email) ?></td>
                <td><?=ucwords($value->company) ?></td>
                <td><?=ucwords($value->account_manager) ?></td>
                @if($_edit == '1' || $_delete == '1' || Auth::User()->position_id == '0')
                    <td class="action-buttons">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                            <?php if ($value->deleted_at): ?>
                                     <li><a class="activate" data-id="{{Crypt::encrypt($value->id)}}" value="{{Crypt::encrypt($value->id)}}">Activate</a></li>
                                <?php else: ?>
                                @if($_edit == '1' || Auth::User()->position_id == '0')
                                    <li><a href="{{ url($module.'/edit/'.Crypt::encrypt($value->id)) }}">Edit</a></li>
                                @endif
                                @if($_delete == '1' || Auth::User()->position_id == '0')
                                    <li><a href="#" class="single-delete" data-id="{{ Crypt::encrypt($value->id) }}">Delete</a></li>
                                @endif
                             <?php endif ?> 
                            </ul>
                        </div>
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
