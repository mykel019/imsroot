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
                                <a class="btn btn-app clear-form"><i class="glyphicon glyphicon-erase"></i> Clear </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class='x_content'>

                            <form method="POST" action="{{ url('/').'/'.$module.'/store'}}" onsubmit="return false" id="form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <section>
                                    <div class="section-body row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input type='text' name='name' value="{{ old('name') }}"  class='form-control'>
                                            </div>


                                            <div class="form-group">
                                                <label>Contact Details</label>
                                                <input type='text' name='contact_details'   class='form-control'>
                                            </div>

                                            <div class="form-group">
                                                <label>Business Nature</label>
                                                <input type='text' name='biz_nature'   class='form-control'>
                                            </div>

                                            <div class="form-group">
                                                <label>Business Type</label>
                                                <input type='text' name='biz_type'   class='form-control'>
                                            </div>

                                            <div class="form-group">
                                                <label>TIN No.</label>
                                                <input type='text' name='tin_no'   class='form-control'>
                                            </div>

                                            <div class="form-group">
                                                <label>VAT Reg NO.</label>
                                                <input type='text' name='vat_reg'   class='form-control'>
                                            </div>

                                        </div>
                                        <div class="col-sm-6 col-md-6">

                                            <div class="form-group ">
                                                <label>Address Line 1</label>
                                                <input type='text' name='addr1'  class='form-control'>
                                            </div>
                                            <div class="form-group">
                                                <label>Address Line 2</label>
                                                <input type='text' name='addr2' value=""  class='form-control'>
                                            </div>

                                            <div class="form-group ">
                                                <label>City</label>
                                                <input type='text' name='city'  class='form-control'>
                                            </div>
                                            <div class="form-group {{ $errors->has('province') ? ' has-error' : '' }}">
                                                <label>Province / State</label>
                                                <input type='text' name='province' value="{{ old('province') }}"  class='form-control'>
                                            </div>

                                            <div class="form-group {{ $errors->has('postal') ? ' has-error' : '' }}">
                                                <label>Postal Code / Zip Code</label>
                                                <input type='text' name='postal' value="{{ old('postal') }}"  class='form-control'>
                                            </div>

                                            <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                                                <label>Country</label>
                                                <input type='text' name='country' value="{{ old('country') }}"  class='form-control'>

                                            </div>
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

