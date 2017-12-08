@extends('app')

@section('sidemenu')
@endsection
    <style>
        .receivedfull{
            display:none;
        }
    </style>

@section('content')
<div class="container body">
    <div class="main_container">
        @include('elements/nav')
        @include('elements/sidemenu')


        <!-- page content -->
        <div class="right_col" role="main">

            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12">
                  <div class="col md-3 receivedfull" style="height:50px; margin-bottom:10px; border-radius:3px; width:auto; border:1px #92c1925 solid; line-height:45px;background-color:#6fc599; text-align:center; color:white; z-index:2;">
                        <font size="4">Received in Full</font>
                    </div>
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
                                        <a href="#" class="btn btn-app new-po" style="float:left"> <i class="fa fa-plus"></i> New</a>
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
                        <h4>Filter Options</h4>
                        <div class="x_content">
                            <form onsubmit="return false" id="form-filters">
                                <div class="form-group">
                                    <label for="">Receiving Status</label>
                                    <select name="filter-status" class="form-control" id="filter-status">
                                        <option value="">Any Status</option>
                                        <option value="2">Partially Received</option>
                                        <option value="3">Received in Full</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Receiving Date Range</label>
                                    <div class="row">
                                    <div class="col-md-12"><input name="filter-date" id="date" type="text" class="form-control"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="x_panel">
                        <h4>Receiving Statistics</h4>
                        <div class="x_content">
                            <table class="table">
                
                                <tr>
                                    <td>Received Deliveries:</td>
                                    <td>{{$receiveCount}}</td>
                                </tr>

                            </table>
                        </div>
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

        $(document).on('click','.new-po',function(){
            window.location.href = base_url+'/received/create/';
        });

        $(document).on('click','.received',function(){
            data = $(this).data('id');
            $(this).prop("disabled", true);

                $.ajax({
                    url:"{{URL('received/fullyreceive')}}",
                    type:"post",
                    data:{data:data},
                    success : function (data) {
                        $('.receivedfull').slideDown();
                        $('.receivedfull').delay(5000).slideUp();
                        // location.reload();

                    }
                })

        });

        $("#filter-status, #date").change(function(){
            _filters = $("#form-filters").serialize();

        $('.sub-panel').html('<center><i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i><center>');

            $.ajax({
                type: "GET",
                url: base_url+module+'/datatable',
                data: {"q":$('.search').val(), 'filters': _filters},
                success: function(res){
                    $(".sub-panel").html(res);
                    $('input.search').removeClass('searchSpinner');
                }
            });
        })



    });


$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#date').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);
    
});
</script>
@endsection

