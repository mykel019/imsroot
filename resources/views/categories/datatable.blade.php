    <table class="table">
        <thead>
            <!-- <th class="check-col"><input type="checkbox" class="chk-all"></th> -->

            <?php //foreach ($cols as $key => $value):?>
                <th>Parent Category</th>
                <th>Category Name</th>
                <th><?=ucfirst('Optional Description'); ?></th>
                <th># Additional Fields</th>
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
                    <?php $status = "deleted-row"; ?>
                    <?php else: ?>
                    <?php $status = "active-row" ?>
                <?php endif ?>
            <tr id="<?=$value->id?>" class="{{$status}}">
                <!-- <td><input type="checkbox" class="chk-list"></td> -->
                <td>
                    <?php if ($value->parent_category_id != 0): ?>
                        {{ ucwords($value->parent_name) }}
                    <?php endif ?>
                </td>
                <td><?=ucwords($value->name) ?></td>    
                <td><?=ucwords($value->description) ?></td>
                <td><?=ucwords(@implode(', ',json_decode($value->custom_fields))) ?></td>
                @if($_edit == '1' || $_delete == '1' || Auth::User()->position_id == '0')
                    <td class="action-buttons">

                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                            <?php if ($value->deleted_at): ?>
                                <li><a href="#" class="activate" data-id="{{Crypt::encrypt($value->id)}}" value="{{Crypt::encrypt($value->id)}}">Activate</a></li>
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


     // $(document).on('click','.activate',function(){
     //    id = $(this).data('id');
     //    tr = $(this).closest('tr');
     //    $.get(
     //      base_url+module+'/activate',
     //      {id:id},
     //      function(data){
     //        par  =  JSON.parse(data);
     //        tr.remove();
     //        // $(".alert_activated").slideDown();
     //        // $('.alert_activated').delay(1000).slideUp()
     //      $('.alert-notification-success').show();
     //      $('.notif-msg').html(par.response);
     //      $('.alert-notification-failed').hide();
     //      $('.alert').delay(2000).fadeOut(500)
     //      // alert(par.response);   
     //      $(".error-msg").remove();
     //      $('input[type="text"], select').popover('destroy');

     //      $('body').animate({
     //              scrollTop: $('.alert').offset().top - 130
     //          }, 500);

     //    })
     //  })


</script>
@endsection
