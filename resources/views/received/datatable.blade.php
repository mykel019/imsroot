
    <table class="table">
        <thead>
            <!-- <th class="check-col"><input type="checkbox" class="chk-all"></th> -->

            <?php //foreach ($cols as $key => $value):?>
                <th>Status</th>
                <th>P.O #</th>
                <th>Delivery #</th>
                <th>Location</th>
                <th>Date Received</th>
                <th></th>
            <?php //endforeach; ?>
        </thead>

        <tbody>

            <?php foreach ($data as $key => $value):?>
            @if(Auth::User()->position_id == 0)
                <tr id="<?=$value->id?>" class="fullyreceive" style="font-size:13px;">
                    <td>
                        <?php
                            switch ($value->status) {
                                case 2:
                                    echo '<i class="fa fa-check"></i> Partially Received';
                                    break;
                                case 3:
                                    echo '<i class="fa fa-check"></i> Recevied in Full';
                                    break;
                                
                                default:
                                    # code...
                                    break;
                            }
                         ?>
                    </td>
                  
                    <td><?=ucwords(@$value->po_no) ?></td>
                    <td><?=ucwords(@$value->dr_no) ?></td>
                    <td><?=ucwords(@$value->name) ?></td>
                    <td><?=ucwords(date('M d, Y',strtotime(@$value->date_received))) ?></td>
                    <td class="action-buttons">

                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url($module.'/show/'.Crypt::encrypt($value->id)) }}">View</a></li>
                                @if($value->edited == 1)
                                <li> <a href="#" class="received" data-id="{{$value->id}}">Set as Received</a></li>
                                @else
                                <!-- <li><a href="{{ url($module.'/edit/'.Crypt::encrypt($value->id)) }}">Edit</a></li> -->
                                @endif
                                @if($value->edited == 1)
                                @else
                                <!-- <li><a href="#" class="single-delete" data-id="{{ Crypt::encrypt($value->id) }}">Delete</a></li> -->
                                @endif

                            </ul>
                        </div>
                    </td>
                </tr>
            @elseif(Auth::User()->location_id == $value->location_id)
                <tr id="<?=$value->id?>" class="fullyreceive" style="font-size:13px;">
                    <td>
                        <?php
                            switch ($value->status) {
                                case 2:
                                    echo '<i class="fa fa-check"></i> Partially Received';
                                    break;
                                case 3:
                                    echo '<i class="fa fa-check"></i> Recevied in Full';
                                    break;
                                
                                default:
                                    # code...
                                    break;
                            }
                         ?>
                    </td>
                  
                    <td><?=ucwords(@$value->po_no) ?></td>
                    <td><?=ucwords(@$value->dr_no) ?></td>
                    <td><?=ucwords(@$value->name) ?></td>
                    <td><?=ucwords(date('M d, Y',strtotime(@$value->date_received))) ?></td>
                    <td class="action-buttons">

                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url($module.'/show/'.Crypt::encrypt($value->id)) }}">View</a></li>
                                @if($value->edited == 1)
                                <li> <a href="#" class="received" data-id="{{$value->id}}">Set as Received</a></li>
                                @else
                                <!-- <li><a href="{{ url($module.'/edit/'.Crypt::encrypt($value->id)) }}">Edit</a></li> -->
                                @endif
                                @if($value->edited == 1)
                                @else
                                        <!-- <li><a href="#" class="single-delete" data-id="{{ Crypt::encrypt($value->id) }}">Delete</a></li> -->
                                @endif

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


