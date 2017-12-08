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
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>{{ $title }}</h3>
                        </div>

                    </div>
                    <div class='x_panel'>
                        <div class='x_title'>
                            <div class="row">
                                <a href="{{ url($module.'/index/'.$locid) }}" class="btn btn-app"><i class="fa fa-long-arrow-left"></i> Return</a>
                                <a class="btn btn-app submit"><i class="glyphicon glyphicon-floppy-disk"></i> Save </a>
                                <a class="btn btn-app clear-form"><i class="glyphicon glyphicon-erase"></i> Clear </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class='x_content'>
                            <form method="POST" action="{{ url('/').'/'.$module.'/store'}}" onsubmit="return false" id="form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="inventory_id" value="{{ $locid }}" >
                                <div class='panel panel-default'>
                                    <div class='panel-heading'>
                                        <i class='icon-edit icon-large'></i>
                                        {{ $title }} Info
                                    </div>
                                    <div class='panel-body'>
                                        <section>
                                            <div class="section-body row">
                                                <div class="col-md-12 row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Price Channel Name</label>
                                                            <input type='text' name='name' value="{{ old('name') }}"  class='form-control'>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Client</label>
                                                            <select name='client_id' value="{{ old('client_id') }}"  class='form-control'>
                                                                <option value="">Select Client</option>
                                                                <?php foreach ($clients as $key => $value): ?>
                                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-12 row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Price</label>
                                                            <input type='text' name='price' class='numberinput form-control'>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Discount Type</label>
                                                            <select name='discount_type_id'  class='form-control'>
                                                                    <option value="">Select Discount</option>
                                                                <?php foreach ($discount_types as $key => $value): ?>
                                                                    <?php ($value->percentage == 1)  ? $curr='%' : $curr = ''; ?>
                                                                    <option value="{{ $value->id }}"> {{ $value->name." ( ".$value->disc_value.$curr." )" }}</option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </section>
                                    </div>
                                </div>



                                <div class="row" style="text-align: center">
                                    <button class="btn btn-success submit">Save New {{ $title }}</button>
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
    $("select[name=client_id]").selectize();
</script>
@endsection