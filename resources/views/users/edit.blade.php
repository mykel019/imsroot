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
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Email (Username)</label>
                                                <input type='text' name='email' value="{{ $result->email }}"  class='form-control'>
                                            </div>

                                            <div class="form-group ">
                                                <label>Password</label>

                                                <div class="password-wrapper"><button class="btn btn-info form-control change-password">Change Password</button></div>
                                                <!-- <input type='password' name='password' value="{{  (old('password')) ? old('password') : $result->password }}"  class='form-control'> -->
                                            </div>

                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type='text' name='fname' value="{{ $result->fname }}"  class='form-control'>

                                            </div>


                                            <div class="form-group">
                                                <label>Middle Name</label>
                                                <input type='text' name='mname' value="{{ $result->mname }}"  class='form-control'>

                                            </div>


                                            <div class="form-group ">
                                                <label>Last Name</label>
                                                <input type='text' name='lname' value="{{ $result->lname }}" class='form-control'>
                                            </div>



                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                             <div class="form-group">
                                                <label>Birth Date</label>
                                                <input type='date' name='birthdate' value="{{ $result->birthdate }}"  class='form-control'>
                                            </div>

                                            <div class="form-group">
                                                <label>Contact Details</label>
                                                <input type='text' name='contact_details' value="{{ $result->contact_details }}"  class='form-control'>
                                            </div>

                                            <div class="form-group">
                                                <label>Position</label>
                                                <select name='position_id'   class='form-control'>
                                                    <option value=""></option>
                                                    <?php foreach ($positions as $key => $value): ?>
                                                            <?php $selected= ''; if($value->id == $result->position_id){ $selected = 'selected'; } ?>
                                                            <option value="{{ $value->id }}" {{ $selected }} >{{ $value->name }}</option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Access Type</label>     
                                                <select name='access_type_id'  class='form-control'>
                                                    <?php foreach ($access_types as $key => $value): ?>
                                                            <?php $selected= ''; if($value->id == $result->access_type_id){ $selected = 'selected'; } ?>
                                                            <option value="{{ $value->id }}" {{ $selected }} >{{ $value->name }}</option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label style="margin-bottom: 8px;">Branch Location</label>     
                                                @if(Auth::User()->subscriber_id == 2)
                                                    <select name='location_id[]'  class='form-control location' multiple>
                                                        <option value="">Select Branch</option>
                                                        <?php foreach ($locations as $key => $value): ?>
                                                                <?php $selected= ''; if(in_array($value->id, $location_ids)){ $selected = 'selected'; } ?>
                                                            <option value="{{ $value->id }}" {{$selected}}>{{ $value->name }}</option>
                                                        <?php endforeach ?>
                                                    </select>
                                                @else
                                                    <select name='location_id'  class='form-control'>
                                                        <?php foreach ($locations as $key => $value): ?>
                                                                <?php $selected= ''; if($value->id == $result->location_id){ $selected = 'selected'; } ?>
                                                                <option value="{{ $value->id }}"  {{$selected}} >{{ $value->name }}</option>
                                                        <?php endforeach ?>
                                                    </select>
                                                @endif
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

@section('js-logic1')
<script>
    $(".change-password").click(function(){
        $(".password-wrapper").html('<input type="password" name="password"  class="form-control">')
    });

    $(".location").selectize({
        maxItems:1000,
        plugins: ['remove_button'],
        delimiter: ',',
        persist: false,
        create: function(input) {
            return {
                value: input,
                text: input
            }
        }
    });

</script>
@endsection