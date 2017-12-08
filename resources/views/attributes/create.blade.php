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
                                        <div class="col-sm-4 col-md-4">

                                            <div class="form-group">
                                                <label>Attribute Name</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Attribute Type</label>
                                                <select name="attr_type" class="form-control">
                                                    <option value=""></option>
                                                    <option value="text">Text Field</option>
                                                    <option value="select">Select Field</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <div class="attribute-wrapper">
                                                    
                                                </div>
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




