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
                                <a href="{{ URL::to('inventories') }}" class="btn btn-app" style="float:left"><i class="fa fa-long-arrow-left"></i> Inventory</a>
                                <a href="{{ URL::to($module.'/create/'.$locid) }}" class="btn btn-app" style="float:left"> <i class="fa fa-plus"></i> New</a>
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
                                {!! $controller->getDatatable($locid) !!}
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-2 col-sm-12 col-xs-12 widgets-wrapper">
                    <div class="x_panel">
                        <h4>Primary Channel</h4>
                        <div class="x_content">
                            <select name="primary_channel" id="primary_channel" class="form-control">
                                <?php foreach ($price_channels as $key => $value): ?>
                                    <?php ($value->primary == 1) ? $selected = 'selected'  : $selected = ''; ?>
                                    <option value="{{ $value->id }}" {{ $selected }} data-location="{{ $value->location_id }}">{{ $value->name }}</option>
                                <?php endforeach ?>
                            </select>
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
        $("#primary_channel").change(function(){
             id = $(this).val();
             location_id = $('#primary_channel option:selected').data('location');
             console.log(location_id)
             $.post(base_url+module+'/setprimary',{location_id:location_id, id:id },function(data){
                    par = JSON.parse(data)
                    if(par.status){
                        // window.location.reload();
                        alert('Primary Channel has been changed!');
                    }
             })
        })
    })
</script>
@endsection

