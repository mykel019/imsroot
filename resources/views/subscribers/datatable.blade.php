    <table class="table">
        <thead>
            <!-- <th class="check-col"><input type="checkbox" class="chk-all"></th> -->

            <?php //foreach ($cols as $key => $value):?>
                <th>Subscriber</th>
                <th>Contact Person</th>
                <th></th>
            <?php //endforeach; ?>
        </thead>

        <tbody>
            <?php foreach ($data as $key => $value):?>
                @if($value->suspend == 0)
                  <tr id="<?=$value->id?>">
                      <!-- <td><input type="checkbox" class="chk-list"></td> -->
                      <td><?=ucwords($value->company_name) ?></td>
                      <td><?=ucwords($value->contact_person) ?></td>
                      <td class="action-buttons">
                          <div class="btn-group">
                              <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Action <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                  <li><a href="{{ url('/usersubscribers/index/'.$value->id) }}">View Users</a></li>
                                  <li><a href="{{ url('/locationsubscribers/index/'.$value->id) }}">View Locations</a></li>
                                  <li><a href="{{ url('/subscriptions/index/'.$value->id) }}">Subscriptions</a></li>
                                  <li><a href="#" data-id="{{ $value->id }}" class="suspend">Suspend</a></li>
                              </ul>
                          </div>
                      </td>
                  </tr>
                @else
                  <tr id="<?=$value->id?>" style="background-color:#e2b2b2;">
                      <!-- <td><input type="checkbox" class="chk-list"></td> -->
                      <td><?=ucwords($value->company_name) ?></td>
                      <td><?=ucwords($value->contact_person) ?></td>
                      <td class="action-buttons">
                          <div class="btn-group">
                              <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Action <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                  <li><a href="{{ url('/usersubscribers/index/'.$value->id) }}">View Users</a></li>
                                  <li><a href="{{ url('/locationsubscribers/index/'.$value->id) }}">View Locations</a></li>
                                  <li><a href="{{ url('/subscriptions/index/'.$value->id) }}">Subscriptions</a></li>
                                  <li><a href="#" data-id="{{ $value->id }}" class="unsuspend">Unsuspend</a></li>
                              </ul>
                          </div>
                      </td>
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

        $(document).on('click','.activate',function(){
        id = $(this).data('id');
        tr = $(this).closest('tr');
        $.get(
          "{{url('brands/activate')}}",
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

        $(document).on('click', '.suspend', function(){

            id = $(this).data('id');

            $.ajax({
                url:"{{URL('subscribers/suspend')}}",
                type:"get",
                data:{data:id},
                success : function (data) {

                par  =  JSON.parse(data);

                if(par.status){
                    $('.alert-notification-success').show();
                    $('.notif-msg').html(par.response);
                    $('.alert-notification-failed').hide();
                    $('.alert').delay(2000).fadeOut(1000)
                    // alert(par.response);     
                    $(".error-msg").remove();
                    $('input[type="text"], select').popover('destroy');

                    $('body').animate({
                            scrollTop: $('.alert').offset().top - 130
                        }, 500);
                    window.location.href = "{{URL('subscribers/index')}}/"+id;
                }else{
                    $('.alert-notification-success').hide();
                    $('.alert-notification-failed').show();
                    $('.notif-msg').html(par.response);
                    $(".error-msg").remove();
                    $('input[type="text"], select').popover('destroy');

                }
                   
                }
            })
        });

         $(document).on('click', '.unsuspend', function(){

            id = $(this).data('id');

            $.ajax({
                url:"{{URL('subscribers/unsuspend')}}",
                type:"get",
                data:{data:id},
                success : function (data) {

                    par  =  JSON.parse(data);

                    if(par.status){
                        $('.alert-notification-success').show();
                        $('.notif-msg').html(par.response);
                        $('.alert-notification-failed').hide();
                        $('.alert').delay(2000).fadeOut(1000)
                        // alert(par.response);     
                        $(".error-msg").remove();
                        $('input[type="text"], select').popover('destroy');

                        $('body').animate({
                                scrollTop: $('.alert').offset().top - 130
                            }, 500);
                        window.location.href = "{{URL('subscribers/index')}}/"+id;
                    }else{
                        $('.alert-notification-success').hide();
                        $('.alert-notification-failed').show();
                        $('.notif-msg').html(par.response);
                        $(".error-msg").remove();
                        $('input[type="text"], select').popover('destroy');

                    }
                       
                }
                   
                })
            });
          

</script>
@endsection
