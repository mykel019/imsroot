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
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                                <label>Username</label>
                                                <input type='text' name='username' value="{{  (old('username')) ? old('username') : $result->username }}"  class='form-control'>
                                                @if ($errors->has('username'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                                @endif
                                            </div>


                                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label>Password</label>

                                                <div class="password-wrapper"><button class="btn btn-info form-control change-password">Change Password</button></div>
                                                <!-- <input type='password' name='password' value="{{  (old('password')) ? old('password') : $result->password }}"  class='form-control'> -->
                                            </div>

                                            <div class="form-group {{ $errors->has('firstname') ? ' has-error' : '' }}">
                                                <label>Firs Name</label>
                                                <input type='text' name='firstname' value="{{  (old('firstname')) ? old('firstname') : $result->firstname }}"  class='form-control'>
                                                @if ($errors->has('firstname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('firstname') }}</strong>
                                                </span>
                                                @endif
                                            </div>



                                            <div class="form-group {{ $errors->has('middlename') ? ' has-error' : '' }}">
                                                <label>Middle Name</label>
                                                <input type='text' name='middlename' value="{{  (old('middlename')) ? old('middlename') : $result->middlename }}"  class='form-control'>
                                                @if ($errors->has('middlename'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('middlename') }}</strong>
                                                </span>
                                                @endif
                                            </div>


                                            <div class="form-group {{ $errors->has('lastname') ? ' has-error' : '' }}">
                                                <label>Last Name</label>
                                                <input type='text' name='lastname' value="{{  (old('lastname')) ? old('lastname') : $result->lastname }}"  class='form-control'>
                                                @if ($errors->has('lastname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('lastname') }}</strong>
                                                </span>
                                                @endif
                                            </div>


                                            <div class="form-group {{ $errors->has('position_id') ? ' has-error' : '' }}">
                                                <label>Position</label>
                                                <select name='position_id' value="{{  (old('position_id')) ? old('position_id') : $result->position_id }}"  class='form-control'>
                                                    <option value=""></option>
                                                    <?php foreach ($positions as $key => $value): ?>
                                                            <?php $selected= ''; if($value->id == $result->position_id){ $selected = 'selected'; } ?>
                                                            <option value="{{ $value->id }}" {{ $selected }} >{{ $value->name }}</option>
                                                    <?php endforeach ?>
                                                </select>
                                                @if ($errors->has('position_id'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('position_id') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="form-group {{ $errors->has('position_id') ? ' has-error' : '' }}">
                                                <label>Location</label>
                                                <select name='location_id' class='form-control'>
                                                    <option value=""></option>
                                                    <?php foreach ($locations as $key => $value): ?>
                                                            <?php $selected = ''; if($result->location_id == $value->id) $selected="selected"; ?>
                                                            <option value="{{ $value->id }}" {{ $selected }} >{{ $value->name.' ('.$value->code.')' }}</option>
                                                    <?php endforeach ?>
                                                </select>
                                                @if ($errors->has('location'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('position_id') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                        </div>

                                       <!--  <div class="col-md-6">

                                        <!--     <div class="form-group {{ $errors->has('addr1') ? ' has-error' : '' }}">
                                                <label>Address Line 1</label>
                                                <input type='text' name='addr1' value="{{  (old('addr1')) ? old('addr1') : $result->addr1 }}"  class='form-control'>
                                                @if ($errors->has('addr1'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('addr1') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="form-group {{ $errors->has('addr2') ? ' has-error' : '' }}">
                                                <label>Address Line 2</label>
                                                <input type='text' name='addr2' value="{{  (old('addr2')) ? old('addr2') : $result->addr2 }}"  class='form-control'>
                                                @if ($errors->has('addr2'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('addr2') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                                                <label>City</label>
                                                <input type='text' name='city' value="{{  (old('city')) ? old('city') : $result->city }}"  class='form-control'>
                                                @if ($errors->has('city'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('city') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('province') ? ' has-error' : '' }}">
                                                <label>Province / State</label>
                                                <input type='text' name='province' value="{{  (old('province')) ? old('province') : $result->province}}"  class='form-control'>
                                                @if ($errors->has('province'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('province') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="form-group {{ $errors->has('postal') ? ' has-error' : '' }}">
                                                <label>Postal Code / Zip Code</label>
                                                <input type='text' name='postal' value="{{  (old('postal')) ? old('postal') : $result->postal }}"  class='form-control'>
                                                @if ($errors->has('postal'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('postal') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                                                <label>Country</label>
                                                <input type='text' name='country' value="{{  (old('country')) ? old('country') : $result->country }}"  class='form-control'>
                                                @if ($errors->has('country'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('country') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div> -->


                                    </div>
                                </section>
                            </form>
                        <!-- </div> -->
                    <!-- </div> -->
              <!--   </div>
            </div> -->
            <br />
        </div>
        <!-- /page content -->

        @include('elements/footer')
    </div>
</div>
@endsection



@section('js-logic1')
<script>
    $(".change-password").click(function(){
        $(".password-wrapper").html('<input type="password" name="password"  class="form-control">')
    })
</script>
@endsection