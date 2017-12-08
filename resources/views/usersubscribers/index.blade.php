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
                                <a href="{{url('/subscribers/index')}}" class="btn btn-app" style="float:left"><i class="fa fa-long-arrow-left"></i> Return</a>
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
                                {!! $controller->getDatatable($subscriber_id) !!}
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-2 col-sm-12 col-xs-12 widgets-wrapper">
                    <div class="x_panel">
                        <h4>User Statistics</h4>
                        <div class="x_content">
                            <table class="table">
                                <tr>
                                    <td>Total User</td>
                                    <td style="text-align:right">{{$active}}</td>
                                </tr>
                                <!-- <tr>
                                    <td>Total Zones</td>
                                    <td style="text-align:right">0</td>
                                </tr> -->
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 hint">
                       <!--  <p><b>Hint: </b>Locations are for organizing your inventory into physical locations (such as warehouses, stores, offices, etc).</p>
                        <p>Zones are used for organizing your inventory at a specific location Some examples could be "Stock Room", "Locker 1", "Garage 1", etc.</p> -->
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
        $(".search-btn").click(function(){
            $('.sub-panel').html('<center><i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i><center>');

                id = "{{ $subscriber_id }}";

                $.ajax({
                    type: "GET",
                    url: "{{URL('usersubscribers/datatable')}}/"+id,
                    data: {"q":$('.search').val()},
                    success: function(res){
                        $(".sub-panel").html(res);
                        $('input.search').removeClass('searchSpinner');
                    }
            });
        });
        
        $(".search").keypress(function(){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                    $('.search-btn').trigger('click');

                }
        })

});
</script>
@endsection

