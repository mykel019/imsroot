    <table class="table">
        <thead>
            <!-- <th class="check-col"><input type="checkbox" class="chk-all"></th> -->

            <?php //foreach ($cols as $key => $value):?>
                <th>Serial</th>
                <th>Terminal</th>
                <th>Location</th>
                <th>Tenure</th>
                <th>Subscriber</th>
                <th>Status</th>
                <!-- <th>Started</th> -->
                <th></th>
            <?php //endforeach; ?>
        </thead>

        <tbody>
            <?php foreach ($data as $key => $value):?>
                <?php if ($value->deleted_at): ?>
                  <?php $status = "deleted-row" ?>
                <?php else: ?>
                  <?php $status = "active-row" ?>
                <?php endif ?>
                <tr id="<?=$value->id?>" class="{{$status}}">
                    <!-- <td><input type="checkbox" class="chk-list"></td> -->
                    <td><?=ucwords($value->serial) ?></td>
                    <td><?=ucwords($value->terminal_no) ?></td>
                    <td><?=ucwords($value->location_id) ?></td>
                    <td><?=ucwords($value->tenure) ?> Months</td>
                    <td><?=ucwords($value->subscriber_id) ?></td>
                    <td><?=($value->status == 0) ? "Inactive" :"Active" ?></td>
                    <!-- <td><?=ucwords($value->date_started) ?></td> -->
                    <td class="action-buttons">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                            <?php if ($value->deleted_at): ?>
                                <li><a class="activate" data-id="{{Crypt::encrypt($value->id)}}" value="{{Crypt::encrypt($value->id)}}">Activate</a></li>
                              <?php else: ?>
                                <li><a href="{{ url($module.'/edit/'.Crypt::encrypt($value->id)) }}">Edit</a></li>
                                <li><a href="#" class="single-delete" data-id="{{ Crypt::encrypt($value->id) }}">Delete</a></li>
                            <?php endif ?>
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

        $(document).on('click','.activate',function(){
        id = $(this).data('id');
        tr = $(this).closest('tr');
        $.get(
          "{{url('posmanager/activate')}}",
          {id:id},
          function(data){
            par  =  JSON.parse(data);
            tr.remove();
            // $(".alert_activated").slideDown();
            // $('.alert_activated').delay(1000).slideUp()
          $('.alert-notification-success').show();
          $('.notif-msg').html(par.response);
          $('.alert-notification-failed').hide();
          $('.alert').delay(2000).fadeOut(500)
          // alert(par.response);   
          $(".error-msg").remove();
          $('input[type="text"], select').popover('destroy');

          $('body').animate({
                  scrollTop: $('.alert').offset().top - 130
              }, 500);

        })
      })
          

</script>
@endsection
