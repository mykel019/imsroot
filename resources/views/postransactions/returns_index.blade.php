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
                                    {{$title_module}}
                           </h3>
                        </div>

                        <div class="title_right">
                        </div>
                    </div>
                    <div class='x_panel'>
                        <div class='x_title'>
                            <div class="row">
                                <div class="input-group search-wrapper">
                                    <span class="input-group-btn">
                                        <button class="btn btn-app  search-btn" type="button"><i class="fa fa-search"></i> Search</button>
                                    </span>
                                    <input type="text" style="height: 60px;" class="form-control sales-search" placeholder="Enter keyword">
                                </div>
                            </div>

                            <!-- <a class="btn btn-app search-btn"> <i class="fa fa-search"></i> Search</a> -->
                            <div class="clearfix"></div>
                        </div>

                        <div class='x_content'>
                            <div class="sub-panel">
                                <div class="spin"></div>
                                {!! $controller->getReturnsdatatable() !!}
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-2 col-sm-12 col-xs-12 widgets-wrapper">
                    <div class="x_panel">
                        <h4>Returns Statistic</h4>
                        <div class="x_content">
                            <table class="table">
                                <tr>
                                    <td class="title">Total Entries</td>
                                    <td class="amount">{{ number_format($total) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="x_panel">
                        <h4><i class="fa fa-cogs"></i>Returns Options</h4>
                        <hr>
                        <div class="x_content">
                            <h5><b>Filter By:</b></h5>
                            <form onsubmit="return false" id="form-filters">
                                <div class="form-group">
                                    <label><input type="checkbox" class="flat filter-location-chk" > Location</label>
                                    <div class="filter-location-sub" style="display:none">
                                        <select name="filter-location" id="filter-location" class="form-control">
                                        <option value="">Select Location</option>
                                        <?php foreach ($locations as $key => $value): ?>
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
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

/*--------------------
|   Paginate
----------------------*/
$(document).ready(function(){
        $(this).on('ifChecked','.filter-location-chk',function(){
            $('.filter-location-sub').show();
        })

        $(this).on('ifUnchecked','.filter-location-chk',function(){
            $(".filter-location-sub").hide()
        })

        $("#filter-location").change(function(){
            _filters = $("#form-filters").serialize();

        $('.sub-panel').html('<center><i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i><center>');

            $.ajax({
                type: "GET",
                url: base_url+module+'/returnsdatatable',
                data: {"q":$('.search').val(), 'filters': _filters},
                success: function(res){
                    $(".sub-panel").html(res);
                    $('input.search').removeClass('searchSpinner');
                }
            });
        })
    });
$(document).on('click','.pagination a',function(){
        $('.pagination li').removeClass('active');
        // $(this).parent().addClass('active');

        linkArr = $(this).attr("href").split('/');
        page = linkArr[linkArr.length - 1];
        console.log( )

        // alert(base_url)
        $.ajax({
           type: "GET",
           url: base_url+module+'/datatable/'+page,
           data: {"q":$('.search').val() },
           success: function(res){
              $(".sub-panel").html(res);
           }
        });
    return false;
});


/*--------------------
|   SERARCH
----------------------*/
var timer;
$(document).on('keyup','.sales-search',function(){
    $('input.sales-search').addClass('searchSpinner');
     _filters = $("#form-filters").serialize();

    clearTimeout(timer);
    timer = setTimeout(
                function(){
                    $.ajax({
                       type: "GET",
                       url: base_url+module+'/returnsdatatable',
                       data: {"q":$('.sales-search').val(), 'filters': _filters},
                       success: function(res){
                          $(".sub-panel").html(res);
                          $('input.sales-search').removeClass('searchSpinner');
                       }
                    });
                },100);
})
</script>
@endsection

