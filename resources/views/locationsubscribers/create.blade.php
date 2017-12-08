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
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Email (Username)</label>
                                                <input type='text' name='email'  class='form-control'>
                                            </div>


                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type='password' name='password'  class='form-control'>
                                            </div>


                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type='text' name='fname'  class='form-control'>

                                            </div>


                                            <div class="form-group">
                                                <label>Middle Name</label>
                                                <input type='text' name='mname'  class='form-control'>

                                            </div>


                                            <div class="form-group ">
                                                <label>Last Name</label>
                                                <input type='text' name='lname'  class='form-control'>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Birth Date</label>
                                                <input type='date' name='birthdate'  class='form-control'>
                                            </div>

                                            <div class="form-group">
                                                <label>Contact Details</label>
                                                <input type='text' name='contact_details'  class='form-control'>
                                            </div>


                                            <div class="form-group">
                                                <label>Position</label>     
                                                <select name='position_id'  class='form-control'>
                                                    <option value=""></option>
                                                    <?php foreach ($positions as $key => $value): ?>
                                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Access Type</label>     
                                                <select name='access_type_id'  class='form-control'>
                                                    <?php foreach ($access_types as $key => $value): ?>
                                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Branch Location</label>     
                                                <select name='location_id'  class='form-control'>
                                                    <?php foreach ($locations as $key => $value): ?>
                                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    <?php endforeach ?>
                                                </select>
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




