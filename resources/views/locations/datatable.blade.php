   <style type="text/css">
   th{
    font-weight: bold;
    font-size: 13px;
   }
   td{
    font-size: 13px;
   }
   </style>
    <table class="table">
        <thead>
                <th>Location Code</th>
                <th>Location Name</th>
                <th>Business Name</th>
                <th># of Zones</th>
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
                <tr id="<?=$value->id?>" class="{{$status}}">
                    <!-- <td><input type="checkbox" class="chk-list"></td> -->
                    <td><?=ucwords($value->code) ?></td>
                    <td><?=ucwords($value->name) ?></td>
                    <td><?=ucwords($value->business_name) ?></td>
                    <td><a href="{{ url('zones/index/'.Crypt::encrypt($value->id)) }}">{{ count($value->zones) }}</a></td>
                    <td><a href="{{ url('locations/poskey/'.$value->subscriber_id.'-'.$value->code) }}">Download Key</a></td>
                    <td><a href="{{ url('locations/posfile/'.$value->subscriber_id.'-'.$value->code) }}">Download POS + Key</a></td>
                    @if($_edit == '1' || $_delete == '1')
                      <td class="action-buttons">

                          <div class="btn-group">
                              <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Action <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                              <?php if ($value->deleted_at): ?>
                                  <li><a class="activate" data-id="{{Crypt::encrypt($value->id)}}" value="{{Crypt::encrypt($value->id)}}">Activate</a></li>
                               <?php else: ?>
                                  @if($_edit == '1')
                                    <li><a href="{{ url($module.'/edit/'.Crypt::encrypt($value->id)) }}">Edit</a></li>
                                  @endif
                                  @if($_delete == '1')
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




      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });



      // $(document).on('click','.activate',function(){
      //   id = $(this).data('id');
      //   //console.log(id);
      //   tr = $(this).closest('tr');
      //   $.get(
      //     "{{url('locations/activate')}}",
      //     {id:id},
      //     function(data){
      //       par  =  JSON.parse(data);
      //       tr.remove();
      //       // $(".alert_activated").slideDown();
      //       // $('.alert_activated').delay(1000).slideUp()
      //     $('.alert-notification-success').show();
      //     $('.notif-msg').html(par.response);
      //     $('.alert-notification-failed').hide();
      //     $('.alert').delay(2000).fadeOut(500)
      //     // alert(par.response);   
      //     $(".error-msg").remove();
      //     $('input[type="text"], select').popover('destroy');

      //     $('body').animate({
      //             scrollTop: $('.alert').offset().top - 130
      //         }, 500);

      //   })
      // })



</script>
@endsection
