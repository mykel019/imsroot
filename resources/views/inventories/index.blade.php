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

                <div class="col-md-10 col-sm-12 col-xs-12 product-wrapper" >
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

                <div class="col-md-10 col-sm-12 col-xs-12 product-import" style="display: none">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                                Product Column Mapping
                            </h3>
                        </div>
                        <div class="title_right">
                        </div>
                    </div>
                    <div class='x_panel'>
                        <div class="col-md-4">
                            <form action="{{ url($module.'/import') }}" onSubmit="return false;" method="POST" id="map-form">
                                <table class="table">
                                    <thead>
                                        <th>Excel Columns</th>
                                        <th>Map to</th>
                                    </thead>
                                    <tbody class="product-mapping">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <div style="text-align:center">
                                <button class="btn btn-success import-validate"><i class="fa fa-upload "></i> Validate and Upload</button>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                    <span id="pb-txt">61%</span>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <table class="table table-bordered">
                                    <thead id="ie-thead"></thead>
                                    <tbody id="import-errors"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 col-sm-12 col-xs-12 widgets-wrapper">
                    <div class="x_panel">
                        <h4>Inventory Statistics</h4>
                        <div class="x_content">
                            <table class="table widget-statistics">
                                <tr>
                                    <td class="title">Total Items</td>
                                    <td class="amount">{{ number_format($total) }}</td>
                                </tr>

                                <tr>
                                    <td class="thres" colspan="3" width="100%"><br><span class="fa fa-stop" style="color:#d38d23;"></span>&nbsp&nbspProducts below threshold limit</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <div class="x_panel">
                        <h4><i class="fa fa-cogs"></i> Inventory Options</h4>
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

                                <div class="form-group">
                                    <label><input type="checkbox" class="flat filter-threshold-chk" > Below Threshold Limit</label>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-12 hint">

                    </div>
                </div>

            </div>
            <br />
        </div>
        <!-- /page content -->


        <form action="{{ url($module.'/fileupload') }}" id="preciousUpload" method="POST" files="true" style="display:none" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">    
            <input type="file" name="file" id="template">
        </form>

        @include('elements/footer')
    </div>
</div>
@endsection

@section('js-logic1')
<script>
    $(document).ready(function(){

        $(this).on('ifChecked','.filter-location-chk',function(){
            $('.filter-location-sub').show();
        })

        $(this).on('ifUnchecked','.filter-location-chk',function(){
            $(".filter-location-sub").hide()
        })


        $(this).on('ifChecked','.filter-threshold-chk',function(){
            $('.threshold').show();
            $('.all_inventory_items').hide();
        })

        $(this).on('ifUnchecked','.filter-threshold-chk',function(){
            $('.threshold').hide();
            $('.all_inventory_items').show();
        })

        $("#filter-location").change(function(){
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
    });
</script>
@endsection

