    <table class="table">
        <thead>
            <!-- <th class="check-col"><input type="checkbox" class="chk-all"></th> -->

            <?php //foreach ($cols as $key => $value):?>
                <th>Username</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Access Type</th>
                <th></th>
            <?php //endforeach; ?>
        </thead>

        <tbody>
            <?php foreach ($data as $key => $value):?>
            @if($value->suspend == 0)
                <tr id="<?=$value->id?>">
                    <!-- <td><input type="checkbox" class="chk-list"></td> -->
                    <td><?=ucwords($value->email) ?></td>
                    <td><?=ucwords($value->fname) ?></td>
                    <td><?=ucwords($value->mname) ?></td>
                    <td><?=ucwords($value->lname) ?></td>
                    <td><?=ucwords(!empty($value->access_type_name) ? $value->access_type_name : 'Administrator') ?></td>
                    <!-- <td class="action-buttons">

                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                    <li><a href="#" data-id="{{ $value->id }}" data-subscriber="{{$subscriber_id}}" class="suspend">Suspend</a></li>
                            </ul>
                        </div>
                    </td> -->
                </tr>
            @else
                <tr id="<?=$value->id?>" style="background-color:#e2b2b2;">
                    <!-- <td><input type="checkbox" class="chk-list"></td> -->
                    <td><?=ucwords($value->email) ?></td>
                    <td><?=ucwords($value->fname) ?></td>
                    <td><?=ucwords($value->mname) ?></td>
                    <td><?=ucwords($value->lname) ?></td>
                    <td><?=ucwords(!empty($value->access_type_name) ? $value->access_type_name : 'Administrator') ?></td>
                   <!--  <td class="action-buttons">

                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                    <li><a href="#" data-id="{{ $value->id }}" data-subscriber="{{$subscriber_id}}" class="unsuspend">Unsuspend</a></li>
                            </ul>
                        </div>
                    </td> -->
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
