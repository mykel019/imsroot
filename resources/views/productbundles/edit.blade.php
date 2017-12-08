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
                            <form method="POST" action="{{ url('/').'/'.$module.'/update'}}" onsubmit="return false" id="form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{ Crypt::encrypt($result->id) }}">
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
                                                    <input type="text" name="code" value="{{ $result->code }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Bundle Name</label>
                                                    <input type="text" name="name" value="{{ $result->name }}"  class=" form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="text" name="price" value="{{ $result->price }}"  class=" form-control numberinput">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="deleted_products" class="deleted_products">
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

        var bundleItems = {!! $bundleItems !!}

        console.log(bundleItems)
        var productArr = {};
        $.each(bundleItems, function(k, v){

            productArr[v.product_id] = {id:v.id, product_id:v.product_id}
            content =   '<tr>'+
                            '<td>'+v.product.sku+'</td>'+
                            '<td>'+v.product.name+'</td>'+
                            '<td style="width:100px"><input type="text" name="product['+v.product_id+'][qty]" value="'+v.qty+'" style="width:100px" class="form-control" /></td>'+
                            '<td style="width:10px"><button class="btn btn-xs btn-danger remove-product" data-pid="'+v.product_id+'"> <i class="fa fa-remove"></i></button></td>'+
                        '</tr>';
            $('.product-wrapper').append(content)
        })
        // console.log(productArr[1].id)
        // delete(productArr[1])

        $(this).on('click','.add-product', function(){
            pid  = $(this).data('pid');
            sku  = $(this).parent().closest('tr').children('td:nth-child(1)').text();
            name = $(this).parent().closest('tr').children('td:nth-child(2)').text();
            

            if(!productArr[pid]){
                productArr[pid] = {product_id:pid}
                content =   '<tr>'+
                                '<td>'+sku+'</td>'+
                                '<td>'+name+'</td>'+
                                '<td style="width:100px"><input type="text" name="product['+pid+'][qty]" value="1" style="width:100px" class="form-control" /></td>'+
                                '<td style="width:10px"><button class="btn btn-xs btn-danger remove-product" data-pid="'+pid+'"> <i class="fa fa-remove"></i></button></td>'+
                            '</tr>';
                $('.product-wrapper').append(content)

            }

        })
        
        var deletedProducts = Array();
        $(this).on('click','.remove-product', function(){
            pid  = $(this).data('pid');
            if(productArr[pid].id){
                deletedProducts.push(pid);
                $(".deleted_products").val(JSON.stringify(deletedProducts))
            }
            delete productArr[pid];
            // productArr.splice($.inArray(pid,productArr),1)
            $(this).parent().closest('tr').remove();

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
