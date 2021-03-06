    <table class="table">
        <thead>
            <!-- <th class="check-col"><input type="checkbox" class="chk-all"></th> -->

            
                <th>Username</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Locations</th>
                
           
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
           @foreach($data as $key => $value)
                <tr id="<?=$value->id?>">
                <?php if ($value->deleted_at): ?>
                  <?php $status = "deleted-row" ?>
                <?php else: ?>
                  <?php $status = "active-row" ?>
                <?php endif ?>
                <tr class="{{$status}}">
                    <td>
                      {{@$value->username}}
                  </td>
                  <td>  
                      {{@$value->firstname}}
                  </td>
                  <td>
                      {{@$value->middlename}}
                  </td>
                    <td>
                      {{@$value->lastname}}
                  </td>
                  <td>
                      {{@$value->location->name}}
                  </td>
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
                                    <li><a  class="single-delete" data-id="{{ Crypt::encrypt($value->id) }}">Delete</a></li>
                                  @endif
                              <?php endif ?>

                              </ul>
                          </div>
                      </td>
                    @endif
                </tr>        
            @endforeach
        </tbody>
    </table>

    <!-- <span><button class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> &nbsp;Remove</button></span> -->
    <span> {!! $data->render() !!}</span>



<script>


      // $('input').iCheck({
      //   checkboxClass: 'icheckbox_square-blue',
      //   radioClass: 'iradio_square-blue',
      //   increaseArea: '20%' // optional
      // });

      $(document).on('click','.activate',function(){
        id = $(this).data('id');
        tr = $(this).closest('tr');
        $.get(
          "{{url('posusers/activate')}}",
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
@section('js-logic2')
@endsection
