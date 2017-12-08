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
                        <h4>Category Statistics</h4>
                    
                        <form id="form-filters" onsubmit="return false">
                            <div class="form-group">
            
                                <select class="form-control" name="catstatus" id="catstatus">
                                    <option value="1">All Categeory</option>
                                    <option value="2">Active</option>
                                    <option value="3">InActive</option>
                                </select>
                                <div class="x_content widget-statistics">
                                    <table class="table">
                                        <tr>
                                            <td class="title">Total Category</td>
                                            <td class="amount"><span class="badge" style="background-color:#4da6ff">{{ number_format($total) }}</td>
                                        </tr>
                                         <tr>
                                            <td class="title">Total Active</td>
                                            <td class="amount"><span class="badge active-badge">{{ number_format($active) }}</td>
                                        </tr>
                                         <tr>
                                            <td class="title">Total Inactive</td>
                                            <td class="amount"><span class="badge inactive-badge">{{ number_format($inactive) }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </form>
                        <!-- </form> -->
                    </div>
                    <div class="x_panel">
                        <h4><i class="fa fa-cogs"></i> Category Options</h4>
                        <hr>
                        <div class="x_content">
                            <h5><b>Filter By:</b></h5>
                            <!-- <form onsubmit="return false" id="form-filters"> -->
                                <div class="form-group">
                                    <label><input type="checkbox" class="flat filter-category-chk" > Parent Category</label>
                                    <div class="filter-category-sub" style="display:none">
                                        <select name="filter-category" id="filter-category" class="form-control">
                                        <option value="">Select Category</option>
                                        <?php foreach ($categories as $key => $value): ?>
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </form>
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
<script>
    $(document).ready(function(){
        $(this).on('ifChecked','.filter-category-chk',function(){
            $('.filter-category-sub').show();
        })

        $(this).on('ifUnchecked','.filter-category-chk',function(){
            $(".filter-category-sub").hide()
        })

        $("#catstatus,#filter-category").change(function(){
             $('.sub-panel').html('<center><i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i><center>');
            
            _filters = $("#form-filters").serialize();
            console.log(_filters);

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
</script>
@endsection
