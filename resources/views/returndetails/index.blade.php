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
                <div class="col-md-10 col-sm-12 col-xs-12">
                    <div class="page-title">
                        <div class="title_left">
                           <h3>
                                    {{$title}}
                           </h3>
                        </div>

                        <div class="title_right">
                        </div>
                    </div>
                    <div class='x_panel'>
                        <div class='x_title'>
                            <div class="row">
                                <a href="{{ URL::to('postransactions/'.Session::get('posTransMenu')) }}" class="btn btn-app" style="float:left"><i class="fa fa-long-arrow-left"></i> Return</a>
                                <div class="input-group search-wrapper">
                                    <span class="input-group-btn">
                                        <button class="btn btn-app  search-btn" type="button"><i class="fa fa-search"></i> Search</button>
                                    </span>
                                    <input type="text" style="height:60px" class="form-control invoice-search" placeholder="Enter keyword">
                                </div>
                            </div>

                            <!-- <a class="btn btn-app search-btn"> <i class="fa fa-search"></i> Search</a> -->
                            <div class="clearfix"></div>
                        </div>

                        <div class='x_content'>
                            <div class="sub-panel">
                                {!! $controller->getDatatable($locid) !!}
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-2 col-sm-12 col-xs-12 widgets-wrapper">
                    <div class="x_panel">
                        <h4>Location Statistic</h4>
                        <div class="x_content">
                            <table class="table">
                                <tr>
                                    <td>Total Location</td>
                                    <td style="text-align:right">0</td>
                                </tr>
                                <tr>
                                    <td>Total Zones</td>
                                    <td style="text-align:right">0</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 hint">
                        <p></p>
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
/*--------------------
|   SERARCH
----------------------*/
var timer;
$(document).on('keyup','.invoice-search',function(){
    $('input.invoice-search').addClass('searchSpinner');
     _filters = $("#form-filters").serialize();

    clearTimeout(timer);
    timer = setTimeout(
                function(){
                    $.ajax({
                       type: "GET",
                       url: base_url+module+'/datatable',
                       data: {"q":$('.invoice-search').val(), 'filters': _filters},
                       success: function(res){
                          $(".sub-panel").html(res);
                          $('input.invoice-search').removeClass('searchSpinner');
                       }
                    });
                },100);
})
</script>
@endsection

