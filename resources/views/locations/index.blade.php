@extends('app')

@section('sidemenu')
@endsection

@section('content')
<div class="container body">
    <div class="main_container">
        @include('elements/nav')
        @include('elements/sidemenu')


        <!-- page content -->
        <div class="right_col" role="main">

            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12">

                    <div class="page-title">
                        <div class="title_left">
                           <h3>
                                    {{$title}}
                           </h3>
                        </div>

                        <div class="title_right">
                        </div>
                    </div>
                         <?php 

                            $_add = '';

                            foreach($accessrightsmodule as $key => $value){

                                if($value->module == $module){
                                    $_add = $value->to_add;
                                }


                            }
                        ?>
                    <div class='x_panel'>
                        <div class='x_title'>
                            <div class="row">
                                @if($_add == '1' || Auth::User()->position_id == '0')
                                    <a href="{{ URL::to($module.'/create') }}" class="btn btn-app" style="float:left"> <i class="fa fa-plus"></i> New</a>
                                @endif
                                <div class="input-group search-wrapper">
                                    <span class="input-group-btn">
                                        <button class="btn btn-app  search-btn" type="button"><i class="fa fa-search"></i> Search</button>
                                    </span>
                                    <input type="text" style="" class="form-control search" placeholder="Enter keyword">
                                </div>
                            </div>

                            <!-- <a class="btn btn-app search-btn"> <i class="fa fa-search"></i> Search</a> -->
                            <div class="clearfix"></div>
                        </div>

                        <div class='x_content'>
                            <div class="sub-panel">
                                {!! $controller->getDatatable() !!}
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12 widgets-wrapper">
                    <div class="x_panel">
                        <form id="form-filters">
                            <div class="form-group">
                            <h4>Location Statistic</h4>
                             <div class="x_content widget-statistics">  
                                <div class="form-group">
                                    <select class="form-control" id="locstatus" name="locstatus">
                                    <option value="2">All Locations</option>
                                        <option value="3">Active Locations</option>
                                        <option value="1">Inactive Locations</option>                              
                                    </select>
                                </div>
                                <table class="table">
                                    <tr>
                                        <td class="title">Total Location</td>
                                        <td class="amount"><span class="badge active-badge">{{ number_format($total_locations) }}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="title">Total Zones</td>
                                        <td class="amount"><span class="badge active-badge">{{ number_format($total_zones) }}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="title">Inactive Locations</td>
                                        <td class="amount"><span class="badge inactive-badge">{{ number_format($inactive) }}</span></td>
                                    </tr>
                                </table>
                            </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 hint">
                        <p><b>Hint: </b>Locations are for organizing your inventory into physical locations (such as warehouses, stores, offices, etc).</p>
                        <p>Zones are used for organizing your inventory at a specific location Some examples could be "Stock Room", "Locker 1", "Garage 1", etc.</p>
                    </div>
                </div>

            </div>
            <br />
        </div>
        <!-- /page content -->

        @include('elements/footer')
    </div>
</div>
@endsection

@section('js-logic1')
<script type="text/javascript">
    $(document).ready(function(){
        // $(".tool-add").click(function(){
        //     $(".medium-modal").modal('show')
        //     $(".medium-modal .modal-header > span").html('Add New Client')
        //     $(".medium-modal .modal-body").load(base_url+module+'/create')
        // })
    var timer;
$(document).on('keyup','.search',function(){
    $('input.search').addClass('searchSpinner');
      _filters = $("#form-filters").serialize();
     //console.log(_filters);
    clearTimeout(timer);
    timer = setTimeout(
                function(){
                    $.ajax({
                       type: "GET",
                       url: base_url+module+'/datatable',
                       data: {"q":$('.search').val(), 'filters': _filters,},
                       success: function(res){
                          $(".sub-panel").html(res);
                          $('input.search').removeClass('searchSpinner');
                       }
                    });
                },500);
        })

  $("#locstatus").change(function(){
     $('.sub-panel').html('<center><i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i><center>');
        _filters = $("#form-filters").serialize();
        $.ajax({
            type: "GET",
            url: base_url+module+'/datatable',
            data: {"q":$('.search').val(), 'filters': _filters},
            success: function(res){
                $(".sub-panel").html(res);
                // $('input.search').removeClass('searchSpinner');
            }
        });
    })


    })
</script>
@endsection


<script type="text/javascript">
/*--------------------
|   SERARCH
----------------------*/

</script>
