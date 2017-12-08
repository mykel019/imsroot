    <table class="table">
        <thead>
            <!-- <th class="check-col"><input type="checkbox" class="chk-all"></th> -->

            
                <th>Username</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Locations</th>
                
           
        </thead>

        <tbody>
       
           @foreach($users as $key => $value)
                <tr id="<?=$value->id?>">
              <tr>
                  <td>
                      {{$value->username}}
                  </td>
                  <td>
                      {{$value->firstname}}
                  </td>
                  <td>
                      {{$value->middlename}}
                  </td>
                    <td>
                      {{$value->lastname}}
                  </td>
                  <td>
                   {{$value->name}}
                  </td>
                      <td class="action-buttons">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url($module.'/edit/'.Crypt::encrypt($value->id)) }}">Edit</a></li>
                                <li><a  class="single-delete" data-id="{{ Crypt::encrypt($value->id) }}">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach

                  
              
           
        </tbody>
    </table>





@section('js-logic2')
<script>

    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });

</script>
@endsection
