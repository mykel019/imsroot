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
                        <h3>{{$title}}</h3>
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

                                <div class="col-xs-12 col-md-6">
                                    <div class="inner-panel">
                                        <div class="ip-title">Supplier Info</div>
                                        <div class="ip-body">
                                            <section>
                                                <div class="section-body row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                            <label>Supplier Name</label>
                                                            <input type='text' name='name' value="{{ old('name') }}"  class='form-control'>
                                                            @if ($errors->has('name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>


                                                        <div class="form-group {{ $errors->has('contact_person') ? ' has-error' : '' }}">
                                                            <label>Contact Person</label>
                                                            <input type='text' name='contact_person' value="{{ old('contact_person') }}"  class='form-control'>
                                                            @if ($errors->has('addr1'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('contact_person') }}</strong>
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

                                                        <div class="form-group {{ $errors->has('addr1') ? ' has-error' : '' }}">
                                                            <label>Address Line 1</label>
                                                            <input type='text' name='addr1' value="{{ old('addr1') }}"  class='form-control'>
                                                            @if ($errors->has('addr1'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('addr1') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group {{ $errors->has('addr2') ? ' has-error' : '' }}">
                                                            <label>Address Line 2</label>
                                                            <input type='text' name='addr2' value="{{ old('addr2') }}"  class='form-control'>
                                                            @if ($errors->has('addr2'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('addr2') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-md-6">

                                                        <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                                                            <label>City</label>
                                                            <input type='text' name='city' value="{{ old('city') }}"  class='form-control'>
                                                            @if ($errors->has('city'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('city') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group {{ $errors->has('province') ? ' has-error' : '' }}">
                                                            <label>Province / State</label>
                                                            <input type='text' name='province' value="{{ old('province') }}"  class='form-control'>
                                                            @if ($errors->has('province'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('province') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group {{ $errors->has('postal') ? ' has-error' : '' }}">
                                                            <label>Postal Code / Zip Code</label>
                                                            <input type='text' name='postal' value="{{ old('postal') }}"  class='form-control'>
                                                            @if ($errors->has('postal'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('postal') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                                                            <label>Country</label>
                                                            <input type='text' name='country' value="{{ old('country') }}"  class='form-control'>
                                                            @if ($errors->has('country'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('country') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xs-12 col-md-6">
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

