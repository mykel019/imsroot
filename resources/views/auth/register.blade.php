@extends('app-front')
@section('content')
<div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
        <div id="" class="animate form">
            <section class="login_content">
                <form action="{{ url('/auth/register') }}" method="POST">
                    {!! csrf_field() !!}
                    <h1>Create Account</h1>
                    <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                        <input type="text" name="company_name" value="{{ old('company_name') }}" placeholder="Company Name" class="form-control" >
                        @if ($errors->has('company_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('company_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control" >
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" name="password" placeholder="Password" class="form-control" >
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" >
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                        <input type="text" name="fname" value="{{ old('fname') }}" placeholder="First Name" class="form-control" >
                        @if ($errors->has('fname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fname') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('mname') ? ' has-error' : '' }}">
                        <input type="text" name="mname" value="{{ old('mname') }}" placeholder="Middle Name" class="form-control" >
                        @if ($errors->has('mname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('mname') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                        <input type="text" name="lname" value="{{ old('lname') }}" placeholder="Last Name" class="form-control" >
                        @if ($errors->has('lname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lname') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('contact_details') ? ' has-error' : '' }}">
                        <input type="text" name="contact_details" value="{{ old('contact_details') }}" placeholder="Contact No." class="form-control" >
                        @if ($errors->has('contact_details'))
                            <span class="help-block">
                                <strong>{{ $errors->first('contact_details') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div>
                        <button class="btn btn-default submit">Submit</button>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">

                        <p class="change_link">Already a member ?
                            <a href="{{ url('/login') }}" class="to_register"> Log in </a>
                        </p>
                        <div class="clearfix"></div>
                        <br />
                        <div>
                            <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Hack&Hustle!</h1>

                            <p>©2015 All Rights Reserved. Hack&Hustle. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
                <!-- form -->
            </section>
            <!-- content -->
        </div>
    </div>
</div>
@endsection
