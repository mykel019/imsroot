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
                        <h3>{{ $title }}</h3>
                    </div>
                    <div class='x_panel'>
                        <div class='x_title'>
                            <div class="row">
                                <a href="{{ url($module) }}" class="btn btn-app"><i class="fa fa-long-arrow-left"></i> Return</a>
                                <a class="btn btn-app cat-submit"><i class="glyphicon glyphicon-floppy-disk"></i> Save </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class='x_content'>
                            <form method="POST" action="{{ url('/').'/'.$module.'/update'}}" onsubmit="return false" id="form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{ Crypt::encrypt($result->id) }}">

                                <div class="col-xs-12 col-md-6">
                                    <div class="inner-panel">
                                        <div class="ip-title">Category Info</div>
                                        <div class="ip-body">
                                            <section>
                                                <div class="section-body">
                                                    <div class="form-group">
                                                        <label>Parent Category</label>
                                                        <select name='parent_category_id'  class='form-control parent_category_id'>
                                                            <option value=""></option>
                                                            <?php foreach ($categories as $key => $value): ?>
                                                                <?php ($value->id == $result->parent_category_id) ? $selected = 'selected' : $selected = '' ?>
                                                                <option value="{{ $value->id }}" {{ $selected }} >{{ $value->name }}</option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                        <label>Category Name <span class="required">*</span></label>
                                                        <select name='name'  class='form-control category'>
                                                            <?php foreach ($categories as $key => $value): ?>
                                                                <?php ($value->id == $result->id) ? $selected = 'selected' : $selected = '' ?>
                                                                <option value="{{ $value->id }}" {{ $selected }} >{{ $value->name }}</option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                                        <label>Optional Description</label>
                                                        <input type='text' name='description' value="{{  (old('description')) ? old('description') : $result->description }}"  class='form-control'>
                                                        @if ($errors->has('description'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>

                                                    <hr>
                                                    <div class="sub-category-wrapper">
                                                        
                                                    </div>

                                                    <div class="row">
                                                        <a class=" pull-right add-subcat" style="cursor:pointer"> + Add SubCategory</a>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <div class="inner-panel">
                                        <div class="ip-title">Additional Custom Fields</div>
                                        <div class="ip-body">
                                            <section>
                                                <div class="section-body row">
                                                    @if ($errors->has('custom_fields[]'))
                                                    <div class="alert alert-danger">
                                                        <span class="glyphicon glyphicon-remove"></span><em> {{ $errors->first('custom_fields[]') }} </em>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    @endif
                                                    <div class="col-md-6">
                                                        <div class="form-group custom-field-wrapper">
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <a class="btn btn-default" id="add-field"><i class="fa fa-plus"></i> Add Custom Field</a>
                                                        </div>
                                                    </div>
                                            </section>
                                        </div>
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

            $('.category').selectize({
                                create:true,
                            });

            $('.parent_category_id').selectize();

            try{
                var subcategories = {!! $subcategories !!}
                console.log(subcategories)

                if(subcategories){
                    field = '';
                    $.each(subcategories,function(k,v){

                        field += '<div class="input-group">'+    
                                    '<input type="text" name="sub_category_id[]" value="'+v.name+'" data-id="'+v.id+'" class="sub_category_id form-control" placeholder="Sub Category">'+
                                    '<span class="input-group-btn">'+
                                    '<button class="btn btn-danger remove-cat" type="button"><i class="fa fa-remove"></i></button>'+
                                    '</span>'+
                                '</div>';
                    })
                    $('.sub-category-wrapper').append(field);
                }
            }
            catch(e){
                console.log('parsing error')
            }

            try{

                cf = JSON.parse('<?=(old("custom_fields")) ? json_encode(old("custom_fields")) : $result->custom_fields ?>');

                //redisplay custom fields
                if(cf){
                    fields = '';
                    $.each(cf,function(k,v){

                        fields +=  '<div class="input-group">'+
                                        '<input type="text" name="custom_fields[]" value="'+v+'" class="form-control" placeholder="Search for...">'+
                                        '<span class="input-group-btn">'+
                                        '<button class="btn btn-danger remove-field" type="button"><i class="fa fa-remove"></i></button>'+
                                        '</span>'+
                                    '</div>';
                    });

                    $(".custom-field-wrapper").html(fields);

                }
            }catch(e){
                console.log('parsing error')
            }


            $("#add-field").click(function(){
                field = '<div class="input-group">'+
                            '<input type="text" name="custom_fields[]" class="custom_fields form-control" placeholder="Search for...">'+
                            '<span class="input-group-btn">'+
                            '<button class="btn btn-danger remove-field" type="button"><i class="fa fa-remove"></i></button>'+
                            '</span>'+
                        '</div>';
                $(".custom-field-wrapper").append(field)
            })


            $(this).on('click','.remove-field',function(){
                $(this).parent().closest(".input-group").remove();
            })


            $('.add-subcat').click(function(){

                field = '<div class="input-group">'+    
                            '<input type="text" name="sub_category_id[]" class="sub_category_id form-control" placeholder="Sub Category">'+
                            '<span class="input-group-btn">'+
                            '<button class="btn btn-danger remove-cat" type="button"><i class="fa fa-remove"></i></button>'+
                            '</span>'+
                        '</div>';
                $('.sub-category-wrapper').append(field);
            })

            $(this).on('click','.remove-cat',function(){
                $(this).parent().closest(".input-group").remove();
            })

            $(document).on('change','.sub_category_id', function(){
                self = $(this)
                sci = $(this).val();
                $.get(base_url+module+'/checkname',{name:sci ,id:self.data('id')},function(data){
                    console.log(data)
                    if(data == 'exist'){
                        alert('Sub Category already taken')
                        self.val('')
                    }
                })
            })

            $(document).off('click',".cat-submit").on('click',".cat-submit",function(){
                var btn = $(this);

                $("#form").ajaxForm({
                    // dataType: 'JSON',
                    beforeSend:function(){
                        // btn.button('loading')
                    },
                    success:function(data){

                        par  =  JSON.parse(data);

                        if(par.status){
                            $('.alert-notification-success').show();
                            $('.notif-msg').html(par.response);
                            $('.alert-notification-failed').hide();
                            $('.alert').delay(2000).fadeOut(500)
                            // alert(par.response);     
                            $(".error-msg").remove();
                            $('input[type="text"], select').popover('destroy');

                            $('body').animate({
                                    scrollTop: $('.alert').offset().top - 130
                                }, 500);
                            // path = base_url+module;
                            // window.location.href = path;
                        }else{
                            $('.alert-notification-success').hide();
                            $('.alert-notification-failed').show();
                            $('.notif-msg').html(par.response);
                            $(".error-msg").remove();
                            $('input[type="text"], select').popover('destroy');

                        }

                        btn.button('reset');
                    },
                    error:function(data){
                        
                        $error = data.responseJSON;
                        /*reset popover*/   
                        $('input[type="text"], select').popover('destroy');

                        /*add popover*/
                        block = 0;
                        $(".error-msg").remove();
                        $.each($error,function(k,v){
                            var messages = v.join(', ');
                            msg = '<div class="error-msg err-'+k+'" ><i class="fa fa-exclamation-circle" style="color:rgb(255, 184, 0)"></i> '+messages+'</div>';

                            if(k.indexOf('sub_category_id') >= 0){
                                scidArr = k.split('.')
                                console.log(scidArr)
                                $('.sub_category_id').eq(scidArr[1]).before(msg).attr('data-content',messages);
                            }

                            if(k.indexOf('custom_fields') >= 0){
                                cfdArr = k.split('.')
                                console.log(cfdArr)
                                $('.custom_fields').eq(cfdArr[1]).before(msg).attr('data-content',messages);
                            }

                            $('input[name="'+k+'"], textarea[name="'+k+'"], select[name="'+k+'"]').before(msg).attr('data-content',messages);
                            if(block == 0){
                                try{
                                    $('html, body').animate({
                                        scrollTop: $('.err-'+k).offset().top - 130
                                    }, 500);
                                }catch(e){
                                    console.log('error')
                                }
                                block++;
                            }
                        })
                        btn.button('reset');
                    },
                    always:function(){
                        btn.button('reset');

                    }
                }).submit();

            });
        })
    </script>
@endsection



