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

                                <div class="col-sm-6 col-md-6">
                                    <section>
                                        <div class="section-body row">
                                            <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label>Supplier Name</label>
                                                    <input type='text' name='name' value="{{ (old('name')) ? old('name') : $result->name }}"  class='form-control'>
                                                    @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>


                                                <div class="form-group {{ $errors->has('contact_person') ? ' has-error' : '' }}">
                                                    <label>Contact Person</label>
                                                    <input type='text' name='contact_person' value="{{ (old('contact_person')) ? old('contact_person') : $result->contact_person }}"  class='form-control'>
                                                    @if ($errors->has('addr1'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('contact_person') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="form-group ">
                                                    <label>Contact Number</label>
                                                    <input type='text' name='contact_no' value="{{ $result->contact_no }}"  class='form-control'>
                                                    @if ($errors->has('contact_no'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('contact_no') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="form-group {{ $errors->has('company') ? ' has-error' : '' }}">
                                                    <label>Company</label>
                                                    <input type='text' name='company' value="{{  (old('company')) ? old('company') : $result->company }}"  class='form-control'>
                                                    @if ($errors->has('company'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('company') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label>Manager</label>
                                                    <input type='text' name='manager' value="{{  $result->manager }}"  class='form-control'>
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('addr1') ? ' has-error' : '' }}">
                                                    <label>Address Line 1</label>
                                                    <input type='text' name='addr1' value="{{ (old('addr1')) ? old('addr1') : $result->addr1 }}"  class='form-control'>
                                                    @if ($errors->has('addr1'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('addr1') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="form-group {{ $errors->has('addr2') ? ' has-error' : '' }}">
                                                    <label>Address Line 2</label>
                                                    <input type='text' name='addr2' value="{{ (old('addr2')) ? old('addr2') : $result->addr2 }}"  class='form-control'>
                                                    @if ($errors->has('addr2'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('addr2') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                                                    <label>City</label>
                                                    <input type='text' name='city' value="{{ (old('city')) ? old('city') : $result->city }}"  class='form-control'>
                                                    @if ($errors->has('city'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('city') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="form-group {{ $errors->has('province') ? ' has-error' : '' }}">
                                                    <label>Province / State</label>
                                                    <input type='text' name='province' value="{{ (old('province')) ? old('province') : $result->province }}"  class='form-control'>
                                                    @if ($errors->has('province'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('province') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="form-group {{ $errors->has('postal') ? ' has-error' : '' }}">
                                                    <label>Postal Code / Zip Code</label>
                                                    <input type='text' name='postal' value="{{ (old('postal')) ? old('postal') : $result->postal }}"  class='form-control'>
                                                    @if ($errors->has('postal'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('postal') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                                                    <label>Country</label>
                                                    <input type='text' name='country' value="{{ (old('country')) ? old('country') : $result->country }}"  class='form-control'>
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
                                <div class="col-sm-6 col-md-6">
                                    <section>
                                        <div class="section-body row">
                                            <div class="col-md-12">
                                                <label>Payment Terms</label>
                                                <div class="form-group{{ $errors->has('payment_terms') ? ' has-error' : '' }}">
                                                    <textarea name="payment_terms" class="form-control" rows="5">{{ (old('payment_terms')) ? old('payment_terms') : $result->payment_terms }}</textarea>
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

