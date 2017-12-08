
    <table class="table">
        <thead>
            <!-- <th class="check-col"><input type="checkbox" class="chk-all"></th> -->

            <?php //foreach ($cols as $key => $value):?>
                <th>Status</th>
                <th>Delivery #</th>
                <th>Source Location</th>
                <th>Destination Location</th>
                <th>Delivery Date</th>
            <?php //endforeach; ?>
        </thead>

        <tbody>

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

            <?php foreach ($data as $key => $value):?>
            @if(Auth::User()->position_id == 0)
                <tr id="{{$value->id}}">
                    <!-- <td><input type="checkbox" class="chk-list"></td> -->
                    <td>
                        <?php
                            switch ($value->status) {
                                case 0:
                                    echo '<i class="fa fa-warning"  style="color:orange"></i> Not Sent';
                                    break;
                                case 1:
                                    echo '<i class="fa fa-paper-plane green"></i></i> Sent';
                                    break;
                                case 2:
                                    echo '<i class="fa fa-check"></i> Partially Received';
                                    break;
                                case 3:
                                    echo '<i class="fa fa-check" style="color:blue"></i> Recevied in Full';
                                    break;
                                
                                default:
                                    # code...
                                    break;
                            }
                         ?>
                    </td>
                    <td><?=ucwords(@$value->dr_no) ?></td>
                    <td><?=ucwords(@$value->location->name) ?></td>
                    <td><?=ucwords(@$value->branch_name) ?></td>
                    <td><?=ucwords(date('M d, Y',strtotime(@$value->delivery_date))) ?></td>

                        <td class="action-buttons">

                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url($module.'/show/'.Crypt::encrypt($value->id)) }}">View</a></li>
                                    @if($value->status == 1 or $value->status == 2 or $value->status == 3)
                                    @else
                                       @if($_edit == '1' || Auth::User()->position_id == '0')
                                            <li><a href="{{ url($module.'/edit/'.Crypt::encrypt($value->id)) }}">Edit</a></li>
                                        @else
                                        @endif
                                        @if($_delete == '1' || Auth::User()->position_id == '0')
                                            <li><a href="#" class="single-delete" data-id="{{ Crypt::encrypt($value->id) }}">Delete</a></li>
                                        @else
                                        @endif
                                    @endif
                                </ul>
                            </div>
                        </td>
                </tr>
            @elseif(Auth::User()->location_id == $value->location_id || Auth::User()->location_id == $value->branch_destination_id)
                @if(Auth::User()->location_id == $value->branch_destination_id && $value->status == 2 || $value->status == 3)
                    <tr id="{{$value->id}}">
                        <td>
                            <?php
                                switch ($value->status) {
                                        case 0:
                                            echo '<i class="fa fa-warning"  style="color:orange"></i> Not Sent';
                                            break;
                                        case 1:
                                            echo '<i class="fa fa-paper-plane green"></i></i> Sent';
                                            break;
                                        case 2:
                                            echo '<i class="fa fa-check"></i> Partially Received';
                                            break;
                                        case 3:
                                            echo '<i class="fa fa-check" style="color:blue"></i> Recevied in Full';
                                            break;
                                        
                                        default:
                                            # code...
                                            break;
                                }
                             ?>
                        </td>
                        <td><?=ucwords(@$value->dr_no) ?></td>
                        <td><?=ucwords(@$value->location->name) ?></td>
                        <td><?=ucwords(@$value->branch_name) ?></td>
                        <td><?=ucwords(date('M d, Y',strtotime(@$value->delivery_date))) ?></td>

                            <td class="action-buttons">

                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ url($module.'/show/'.Crypt::encrypt($value->id)) }}">View</a></li>
                                        @if($value->status == 1 or $value->status == 2 or $value->status == 3)
                                        @else
                                        <li><a href="{{ url($module.'/edit/'.Crypt::encrypt($value->id)) }}">Edit</a></li>
                                        <li><a href="#" class="single-delete" data-id="{{ Crypt::encrypt($value->id) }}">Delete</a></li>

                                        @endif
                                    </ul>
                                </div>
                            </td>
                    </tr>
                @elseif(Auth::User()->location_id == $value->location_id)
                    <tr id="{{$value->id}}">
                        <td>
                            <?php
                                switch ($value->status) {
                                        case 0:
                                            echo '<i class="fa fa-warning"  style="color:orange"></i> Not Sent';
                                            break;
                                        case 1:
                                            echo '<i class="fa fa-paper-plane green"></i></i> Sent';
                                            break;
                                        case 2:
                                            echo '<i class="fa fa-check"></i> Partially Received';
                                            break;
                                        case 3:
                                            echo '<i class="fa fa-check" style="color:blue"></i> Recevied in Full';
                                            break;
                                        
                                        default:
                                            # code...
                                            break;
                                }
                             ?>
                        </td>
                        <td><?=ucwords(@$value->dr_no) ?></td>
                        <td><?=ucwords(@$value->location->name) ?></td>
                        <td><?=ucwords(@$value->branch_name) ?></td>
                        <td><?=ucwords(date('M d, Y',strtotime(@$value->delivery_date))) ?></td>

                        <td class="action-buttons">

                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url($module.'/show/'.Crypt::encrypt($value->id)) }}">View</a></li>
                                    @if($value->status == 1 or $value->status == 2 or $value->status == 3)
                                    @else
                                        @if($_edit == '1' || Auth::User()->position_id == '0')
                                            <li><a href="{{ url($module.'/edit/'.Crypt::encrypt($value->id)) }}">Edit</a></li>
                                        @else
                                        @endif
                                        @if($_delete == '1' || Auth::User()->position_id == '0')
                                            <li><a href="#" class="single-delete" data-id="{{ Crypt::encrypt($value->id) }}">Delete</a></li>
                                        @else
                                        @endif

                                    @endif
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endif
            @endif
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- <span><button class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> &nbsp;Remove</button></span> -->
    <span> {!! $data->render() !!}</span>



@section('js-logic2')
<script>
</script>
@endsection
