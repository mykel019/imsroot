@extends('app')

@section('sidemenu')
@endsection

@section('content')
<style>
    .alert_activated{
        display: none;
    }

</style>
<div class="container body">
    <div class="main_container">
        @include('elements/nav')
        @include('elements/sidemenu')


        <!-- page content -->
        <div class="right_col" role="main">
        <div class="alert alert-success alert_activated">Account Activated!!</div>
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="page-title">
                        <div class="title_left">
                           <h3>
                            {{ $title }}
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
                      <h4>Filter Options</h4>
                        <div class="x_content">
                            <form id="form-filters">
                                <div class="form-group">
                                    <label>User Status</label>
                                    <select name="status" id="status" class="form-control">
                                    <option value="2">All Users</option>
                                        <option value="3">Active</option>
                                        <option value="1">InActive</option>
                                    </select>
                                </div>
                                <div class="form-group {{ $errors->has('position_id') ? ' has-error' : '' }}">
                                    <label>Location</label>
                                    <select name='location_id' id="location_id" value="{{}}"  class='form-control'>
                                        <option value="">All Locations</option>
                                        <?php foreach ($locations as $key => $value): ?>
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        <?php endforeach ?>
                                    </select>
                                    @if ($errors->has('position_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </form>
                        </div>
                        <h4>POS User Statistic</h4>
                        <div class="x_content">
                            <table class="table">
                                <tr>
                                    <td>Active Users</td>
                                    <td style="text-align:right"><span class="badge" style="background-color:#00b300">{{$users}}</span></td>
                                </tr>
                                <tr>
                                    <td>Inactive Users</td>
                                    <td style="text-align:right"><span class="badge" style="background-color:#ff6666">{{$inactive}}</span></td>
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
    $(document).ready(function(){
        // $(".tool-add").click(function(){
        //     $(".medium-modal").modal('show')
        //     $(".medium-modal .modal-header > span").html('Add New Client')
        //     $(".medium-modal .modal-body").load(base_url+module+'/create')

        // })
    // $(document).on('keyup','.sales-search',function(){
    // $('input.sales-search').addClass('searchSpinner');
    //  _filters = $("#form-filters").serialize();

    // clearTimeout(timer);
    // timer = setTimeout(
    //             function(){
    //                 $.ajax({
    //                    type: "GET",
    //                    url: base_url+module+'/salesdatatable',
    //                    data: {"q":$('.sales-search').val(), 'filters': _filters},
    //                    success: function(res){
    //                       $(".sub-panel").html(res);
    //                       $('input.sales-search').removeClass('searchSpinner');
    //                    }
    //                 });
    //             },100);
    // })

    // $("#location_id").change(function(){
    //     location_id = $("#location_id").val();
    //     users = $("#users").val();
    //     $.get("{{url('posusers/dattaablebyloc')}}",{location_id:location_id,users:users},function(data){
    //         $(".sub-panel").html(data)
    //     })
    // })

    $("#status, #location_id").change(function(){
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

  
})

</script>
@endsection

