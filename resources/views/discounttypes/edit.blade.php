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
                                <a class="btn btn-app submit"><i class="glyphicon glyphicon-floppy-disk"></i> Save </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class='x_content'>
                            <form method="POST" action="{{ url('/').'/'.$module.'/update'}}" onsubmit="return false" id="form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{ Crypt::encrypt($result->id) }}">
                                <section>
                                    <div class="section-body row">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Dicount Name</label>
                                                    <input type='text' name='name' value="{{ $result->name }}" class='form-control'>
                                                </div>

                                                <div class="form-group">
                                                    <label>Short Name</label>
                                                    <input type='text' name='code' value="{{ $result->code }}"  class='form-control'>
                                                </div>

                                                <div class="form-group">
                                                    <label>Discount Value</label>
                                                    <label class="pull-right"><input type="checkbox" name="percentage" value="1" class="flat percentage"> Percentage</label><br>
                                                    <input type='text' name='disc_value' value="{{ $result->disc_value }}"  class='numberinput form-control'>
                                                </div>

                                                <div class="form-group">
                                                    <label>Effectivity Start</label>
                                                    <input type="date" name="effectivity_start" value="{{ $result->effectivity_start }}" min="{{ date('Y-m-d') }}" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Effectivity End</label>
                                                    <input type="date" name="effectivity_end" value="{{ $result->effectivity_end }}" min="{{ $result->effectivity_start }}" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <h4>Discount Target</h4><hr>
                                                <label><input type='radio' name='disc_target' checked value="2" class='flat'> Item Discount</label><br>
                                                <label><input type='radio' name='disc_target' value="1" class='flat'> Sub Total</label><br>
                                                <label><input type='radio' name='disc_target' value="3" class='flat'> Any</label><br>
                                            </div>
                                            <div class="col-md-4">
                                                <h4>Other Options</h4><hr>
                                                <label><input type="checkbox" name="is_active" value="1" class="flat"> Is Active</label><br>
                                                <label><input type="checkbox" name="include_tax" value="1" class="flat"> Include Tax(If not checked, 12% vat will be removed in  total)</label><br>
                                                <label><input type="checkbox" name="open_disc" value="1" class="flat"> Open Discount(Prompt User for discount value)</label>
                                            </div>
         
                                    </div>
                                </section>
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


        percentage = '{{ $result->percentage }}';
        is_active = '{{ $result->is_active }}';
        disc_target = '{{ $result->disc_target }}';
        include_tax = '{{ $result->include_tax }}';
        open_disc = '{{ $result->open_disc }}';

        if(percentage == 1){ 
            $(".percentage").iCheck('check');
        } 

        if(is_active == 1){ 
            $("input[name=is_active]").iCheck('check');
        } 

        if(disc_target == 1){ 
            $("input[name=disc_target]").iCheck('check');
        } 

        if(include_tax == 1){ 
            $("input[name=include_tax]").iCheck('check');
        } 

        if(open_disc == 1){ 
            $("input[name=open_disc]").iCheck('check');
        } 


        $(this).on('ifChecked',".percentage",function(){
            $('input[name=disc_value]').addClass('limit-value')
            $(".limit-value").trigger('input');
        });

        $(this).on('input','.limit-value',function(e){
            if($(this).val() > 100){
                $(this).val(100);
                e.preventDefault();
            }
        })

        $("input[name=effectivity_start]").change(function(){
            date = $(this).val();
            $("input[name=effectivity_end]").attr('min',date)
        })


    })
</script>
@endsection

