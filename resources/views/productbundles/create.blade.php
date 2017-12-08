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
                            <h3>{{ $title }}</h3>
                        </div>

                    </div>
                    <div class='x_panel'>
                        <div class='x_title'>
                            <div class="row">
                                <a href="{{ url($module) }}" class="btn btn-app"><i class="fa fa-long-arrow-left"></i> Return</a>
                                <a class="btn btn-app submit"><i class="glyphicon glyphicon-floppy-disk"></i> Save </a>
                                <a class="btn btn-app clear-form"><i class="glyphicon glyphicon-erase"></i> Clear </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class='x_content' >
                            <form method="POST" action="{{ url('/').'/'.$module.'/store'}}" onsubmit="return false" id="form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <div class="col-xs-12 col-md-5">
                                        <div class="inner-panel">
                                            <div class="ip-body">
                                                <input type="text" class="form-control search-bundle" placeholder="Search">
                                                <hr>
                                                <div class="sub-panel" style="height:500px; overflow-y:scroll">
                                                {!! $controller->getProductdatatable() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-7">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Bundle Code</label>
                                                    <input type="text" name="code" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Bundle Name</label>
                                                    <input type="text" name="name" class=" form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="text" name="price" class=" form-control numberinput">
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Qty.</th>
                                                <th></th>
                                            </thead>
                                            <tbody class="product-wrapper">
                                            </tbody>
                                        </table>
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
        var productArr = Array();
        $(this).on('click','.add-product', function(){
            pid  = $(this).data('pid');
            sku  = $(this).parent().closest('tr').children('td:nth-child(1)').text();
            name = $(this).parent().closest('tr').children('td:nth-child(2)').text();
            console.log(productArr)
            if($.inArray(pid,productArr) == -1){
                productArr.push(pid);
                content =   '<tr>'+
                                '<td>'+sku+'</td>'+
                                '<td>'+name+'</td>'+
                                '<td style="width:100px"><input type="text" name="product['+pid+'][qty]" value="1" style="width:100px" class="form-control" /></td>'+
                                '<td style="width:10px"><button class="btn btn-xs btn-danger remove-product" data-pid="'+pid+'"> <i class="fa fa-remove"></i></button></td>'+
                            '</tr>';
                $('.product-wrapper').append(content)
            }

        })
        
        $(this).on('click','.remove-product', function(){
            pid  = $(this).data('pid');
            productArr.splice($.inArray(pid,productArr),1)
            $(this).parent().closest('tr').remove();
            console.log(productArr)

        })

        /*--------------------
        |   SERARCH
        ----------------------*/
        var timer;
        $(document).on('keyup','.search-bundle',function(){
        $('input.search-bundle').addClass('searchSpinner');
         _filters = $("#form-filters").serialize();

        clearTimeout(timer);
        timer = setTimeout(
                    function(){
                        $.ajax({
                           type: "GET",
                           url: base_url+module+'/productdatatable',
                           data: {"q":$('.search-bundle').val(), 'filters': _filters},
                           success: function(res){
                                $(".sub-panel").html(res);
                                $('input.search-bundle').removeClass('searchSpinner');
                           }
                        });
                    },100);
        })

    })
</script>
@endsection
