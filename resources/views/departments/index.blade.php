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
                <div class="col-md-9 col-sm-12 col-xs-12 content-wrapper">
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
                        <h4>Departments Statistic</h4>
                        <div class="x_content widget-statistics">
                        <form id="form-filters">
                            <div class="form-group">
                                <select class="form-control" id="deptstatus" name="deptstatus"> 
                                    <option value="1">All Department</option>
                                    <option value="2">Active Department</option>
                                    <option value="3">InActive Department</option>
                                </select>
                             </div>
                        </form>
                            <table class="table">
                                <tr>
                                    <td class="title">Active Departments</td>
                                    <td class="amount"><span class="badge active-badge">{{ number_format($active) }}</td>
                                </tr>
                                <tr>
                                    <td class="title">Inactive Departments</td>
                                    <td class="amount"><span class="badge inactive-badge">{{ number_format($inactive) }}</td>
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

<script type="text/javascript">
    $(document).ready(function(){
        $("#deptstatus").change(function(){
        $('.sub-panel').html('<center><i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i><center>');
        _filters = $("#form-filters").serialize();
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
            })
</script>>
@endsection

