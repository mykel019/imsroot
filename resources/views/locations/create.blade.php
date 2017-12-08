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

                        <div class='x_content'>
                            <form method="POST" action="{{ url('/').'/'.$module.'/store'}}" onsubmit="return false" id="form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <section>
                                    <div class="section-body row">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label>Location Name</label>
                                                <input type='text' name='name' value="{{ old('name') }}"  class='form-control'>
                                                @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                                                <label>Location Code</label>
                                                <input type='text' name='code' value="{{ old('code') }}"  class='form-control'>
                                                @if ($errors->has('code'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('code') }}</strong>
                                                </span>
                                                @endif
                                            </div>


                                            <div class="form-group {{ $errors->has('business_name') ? ' has-error' : '' }}">
                                                <label>Business Name</label>
                                                <input type='text' name='business_name' value="{{ old('business_name') }}"  class='form-control'>
                                                @if ($errors->has('business_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('business_name') }}</strong>
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

                                        <div class="col-md-6">

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

                                            <!-- <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                                                <label>Longitude</label>
                                                <input type='text' name='longitude'  class='form-control'>
                                            </div>

                                            <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                                                <label>Latitude</label>
                                                <input type='text' name='latitude'  class='form-control'>
                                            </div> -->
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




