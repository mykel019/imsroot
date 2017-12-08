
    <table class="table">
        <thead>
            <!-- <th class="check-col"><input type="checkbox" class="chk-all"></th> -->

            <?php //foreach ($cols as $key => $value):?>
                <th>Product Name</th>
                <!-- <th>Description</th> -->
                <?php if(@$settings->code) echo '<th>Product Code</th>'; ?>
                <?php if(@$settings->sku) echo '<th>SKU</th>'; ?>
                <!-- <?php if(@$settings->stock_code) echo '<th>Stock Code</th>'; ?> -->
                <?php if(@$settings->supplier_code) echo '<th>Supplier Code</th>'; ?>
                <?php if(@$settings->bar_code) echo '<th>Bar Code</th>'; ?>
                
                <th>Stock Code</th>
                <th>Category</th>
                <th>Model</th>
                <th>Cost</th>
                <th>Price</th>
                <th>Color</th>
                <th>Size</th>
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
                <?php $status = 'deleted-row'; ?>
              <?php else: ?>
                <?php $status = 'active-row'; ?>
              <?php endif ?>
            <tr id="<?=$value->id?>" class="{{ $status  }}">
                <!-- <td><input type="checkbox" class="chk-list"></td> -->
                <td><?=ucwords($value->name) ?></td>
                <!-- <td><?=ucwords($value->description) ?></td> -->
                 <?php if(@$settings->code) echo '<td>'.$value->code.'</td>'; ?>
                 <?php if(@$settings->sku) echo '<td>'.$value->sku.'</td>'; ?>
                 <!-- <?php if(@$settings->stock_code) echo '<td>'.$value->stock_code.'</td>'; ?> -->
                 <?php if(@$settings->supplier_code) echo '<td>'.$value->supplier_code.'</td>'; ?>
                 <?php if(@$settings->bar_code) echo '<td>'.$value->barcode.'</td>'; ?>

                <td><?=ucwords($value->stock_code) ?></td>
                <td><?=ucwords($value->category_name) ?></td>
                <td><?=ucwords($value->model) ?></td>
                <td><?=ucwords(number_format($value->cost )) ?></td>
                @if(Auth::User()->subscriber_id == 3)
                    @if($value->unit_cost == 0)
                    <td><?=ucwords(number_format($value->price_default)) ?></td>
                    @else
                    <td><?=ucwords($value->unit_cost) * 1000?></td>
                    @endif
                @else
                <td><?=ucwords(number_format($value->price_default)) ?></td>
                @endif
                <td><?=ucwords($value->color) ?></td>
                <td><?=ucwords($value->size) ?></td>

                @if($_edit == '1' || $_delete == '1' || Auth::User()->position_id == '0')
                    <td class="action-buttons">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <?php if ($value->deleted_at): ?>
                                  <li><a class="activate" data-id="{{ Crypt::encrypt($value->id) }}">Activate</a></li>
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

    $(document).ready(function() {
      $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
          })


    // $(document).on('click','.activate',function(){
    //     id = $(this).data('id');
    //     tr = $(this).closest('tr');
    //     console.log(id);
    //     $.get(
    //       "{{url('products/activate')}}",
    //       {id:id},
    //       function(data){
    //         par  =  JSON.parse(data);
    //         tr.remove();
    //         // $(".alert_activated").slideDown();
    //         // $('.alert_activated').delay(1000).slideUp()
    //       $('.alert-notification-success').show();
    //       $('.notif-msg').html(par.response);
    //       $('.alert-notification-failed').hide();
    //       $('.alert').delay(2000).fadeOut(500)
    //       // alert(par.response);   
    //       $(".error-msg").remove();
    //       $('input[type="text"], select').popover('destroy');

    //       $('body').animate({
    //               scrollTop: $('.alert').offset().top - 130
    //           }, 500);

    //     })
    //   })



</script>
@endsection
