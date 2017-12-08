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
                        <div class='x_title '>
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

                                <div class="col-xs-12 col-md-4">
                                    <div class="inner-panel">
                                        <div class="ip-title">Business Contact Info</div>
                                        <div class="ip-body">
                                            <section>
                                                <div class="section-body row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                            <label>Account Name</label>
                                                            <input type='text' name='name' value="{{ old('name') }}"  class='form-control'>
                                                            @if ($errors->has('name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                                            <label>Email</label>
                                                            <input type='email' name='email' value="{{ old('email') }}" class='form-control'>
                                                            @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group {{ $errors->has('account_manager') ? ' has-error' : '' }}">
                                                            <label>Account Manager</label>
                                                            <input type='text' name='account_manager' value="{{ old('account_manager') }}"  class='form-control'>
                                                            @if ($errors->has('account_manager'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('account_manager') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group {{ $errors->has('company') ? ' has-error' : '' }}">
                                                            <label>Company</label>
                                                            <input type='text' name='company' value="{{ old('company') }}"  class='form-control'>
                                                            @if ($errors->has('company'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('company') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                    </div>

                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                            <label>Office Phone</label>
                                                            <input type='text' name='phone' value="{{ old('phone') }}"  class='form-control'>
                                                            @if ($errors->has('phone'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('phone') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Office Fax</label>
                                                            <input type='text' name='fax'  value="{{ old('fax') }}" class='form-control'>
                                                        </div>

                                                        <div class="form-group{{ $errors->has('contact_person') ? ' has-error' : '' }}">
                                                            <label>Contact Person</label>
                                                            <input type='text' name='contact_person' value="{{ old('contact_person') }}"  class='form-control'>
                                                            @if ($errors->has('contact_person'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('contact_person') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="col-xs-12 col-md-4">
                                    <div class="inner-panel">
                                        <div class="ip-title">Payment Terms</div>
                                        <div class="ip-body">
                                            <section>
                                                <div class="section-body row">
                                                    <div class="col-md-12">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                            tempor incididunt ut labore et dolore magna aliqua. </p>
                                                        <div class="form-group{{ $errors->has('payment_terms') ? ' has-error' : '' }}">
                                                            <textarea name="payment_terms" class="form-control" rows="5"></textarea>
                                                            @if ($errors->has('payment_terms'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('payment_terms') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-4">
                                    <div class="inner-panel">
                                        <div class="ip-title">Billing & Shipping Address</div>
                                        <div class="ip-body">
                                            <section>
                                                <div class="section-body row">
                                                    <div class="col-md-6">
                                                        <div class="form-group{{ $errors->has('bill_addr1') ? ' has-error' : '' }}">
                                                            <label>Billing Address Line 1</label>
                                                            <input type='text' name='bill_addr1' value="{{ old('bill_addr1') }}"  class='form-control'>
                                                            @if ($errors->has('bill_addr1'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('bill_addr1') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group{{ $errors->has('bill_addr2') ? ' has-error' : '' }}">
                                                            <label>Billing Address Line 2</label>
                                                            <input type='text' name='bill_addr2' value="{{ old('bill_addr2') }}"  class='form-control'>
                                                            @if ($errors->has('bill_addr2'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('bill_addr2') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group{{ $errors->has('bill_city') ? ' has-error' : '' }}">
                                                            <label>City</label>
                                                            <input type='text' name='bill_city' value="{{ old('bill_city') }}"  class='form-control'>
                                                            @if ($errors->has('bill_city'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('bill_city') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group{{ $errors->has('bill_province') ? ' has-error' : '' }}">
                                                            <label>Province / State</label>
                                                            <input type='text' name='bill_province' value="{{ old('bill_province') }}"  class='form-control'>
                                                            @if ($errors->has('bill_province'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('bill_province') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group{{ $errors->has('bill_postal') ? ' has-error' : '' }}">
                                                            <label>Postal Code / Zip Code</label>
                                                            <input type='text' name='bill_postal' value="{{ old('bill_postal') }}"  class='form-control'>
                                                            @if ($errors->has('bill_postal'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('bill_postal') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group{{ $errors->has('bill_country') ? ' has-error' : '' }}">
                                                            <label>Country</label>
                                                            <input type='text' name='bill_country' value="{{ old('bill_country') }}"  class='form-control'>
                                                            @if ($errors->has('bill_country'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('bill_country') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group {{ $errors->has('ship_addr1') ? ' has-error' : '' }}">
                                                            <label>Shipping Address Line 1</label>
                                                            <input type='text' name='ship_addr1' value="{{ old('ship_addr1') }}"  class='form-control'>
                                                            @if ($errors->has('ship_addr1'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('ship_addr1') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group {{ $errors->has('ship_addr2') ? ' has-error' : '' }}">
                                                            <label>Shipping Address Line 2</label>
                                                            <input type='text' name='ship_addr2' value="{{ old('ship_addr2') }}"  class='form-control'>
                                                            @if ($errors->has('ship_addr2'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('ship_addr2') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group {{ $errors->has('ship_city') ? ' has-error' : '' }}">
                                                            <label>City</label>
                                                            <input type='text' name='ship_city' value="{{ old('ship_city') }}"  class='form-control'>
                                                            @if ($errors->has('ship_city'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('ship_city') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group {{ $errors->has('ship_province') ? ' has-error' : '' }}">
                                                            <label>Province / State</label>
                                                            <input type='text' name='ship_province' value="{{ old('ship_province') }}"  class='form-control'>
                                                            @if ($errors->has('ship_province'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('ship_province') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group {{ $errors->has('ship_postal') ? ' has-error' : '' }}">
                                                            <label>Postal Code / Zip Code</label>
                                                            <input type='text' name='ship_postal' value="{{ old('ship_postal') }}"  class='form-control'>
                                                            @if ($errors->has('ship_postal'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('ship_postal') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group {{ $errors->has('ship_country') ? ' has-error' : '' }}">
                                                            <label>Country</label>
                                                            <input type='text' name='ship_country' value="{{ old('ship_country') }}"  class='form-control'>
                                                            @if ($errors->has('ship_country'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('ship_country') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
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

