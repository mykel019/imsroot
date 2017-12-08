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
                                <div class="col-xs-12 col-md-4">
                                    <div class="inner-panel">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" name="fname" value="{{ $result->fname }}" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input type="text" name="mname" value="{{ $result->mname }}" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" name="lname" value="{{ $result->lname }}" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Employee No</label>
                                            <input type="text" name="employee_no" value="{{ $result->employee_no }}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-4">
                                    <div class="inner-panel">
                                        <div class="ip-title">Custom Fields</div>
                                        <div class="ip-body">
                                         <?php  $employees = @json_decode(@$settings['employee']->options); ?>
                                         <?php if ($employees): ?>
                                         <?php  $custom_field = @(Array)json_decode(@$result->custom_fields); ?>
                                            <?php foreach ($employees->custom_fields as $key => $value): ?>
                                                <div class="form-group">
                                                    <label>{{ ucwords($value) }}</label>
                                                    <input type="text" name="custom_fields[{{ $value }}]" value="{{ @$custom_field[$value] }}" class="form-control">
                                                </div>
                                            <?php endforeach ?>
                                         <?php endif ?>
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



