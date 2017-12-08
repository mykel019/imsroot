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
                                            <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                                <label>Username</label>
                                                <input type='text' name='username' value="{{ old('username') }}"  class='form-control'>
                                                @if ($errors->has('username'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                                @endif
                                            </div>


                                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label>Password</label>
                                                <input type='password' name='password' value="{{ old('password') }}"  class='form-control'>
                                                @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>


                                            <div class="form-group {{ $errors->has('firstname') ? ' has-error' : '' }}">
                                                <label>First Name</label>
                                                <input type='text' name='firstname' value="{{ old('firstname') }}"  class='form-control'>
                                                @if ($errors->has('firstname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('firstname') }}</strong>
                                                </span>
                                                @endif
                                            </div>


                                            <div class="form-group {{ $errors->has('middlename') ? ' has-error' : '' }}">
                                                <label>Middle Name</label>
                                                <input type='text' name='middlename' value="{{ old('middlename') }}"  class='form-control'>
                                                @if ($errors->has('middlename'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('middlename') }}</strong>
                                                </span>
                                                @endif
                                            </div>


                                            <div class="form-group {{ $errors->has('lastname') ? ' has-error' : '' }}">
                                                <label>Last Name</label>
                                                <input type='text' name='lastname' value="{{ old('lastname') }}"  class='form-control'>
                                                @if ($errors->has('lastname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('lastname') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label>Manager</label>
                                                <input type='text' name='manager' class='form-control'>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-md-6">
                                            <div class="inner-panel">
                                                <div class="ip-title">Add Locations</div>
                                                <div class="ip-body">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-md-9">
                                                                <select class="form-control locations">
                                                                <?php foreach ($locations as $key => $value): ?>
                                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                                <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-xs-12 col-md-3"><a class="btn btn-success btn-block add-location">+ Add</a></div>
                                                        
                                                        </div>

                                                        <div class="row"><hr></div>

                                                        <div class="row">
                                                            <input type="hidden" name="locations">
                                                            <div class="col-md-12 locations-wrapper">
                                                                
                                                            </div>
                                                        </div>
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

@section('js-logic1')
<script>
    $(document).ready(function(){
        $(".locations").selectize();
        
        var locationsArr = {};
        $(".add-location").click(function(){
            locationId = $('.locations').val();
            locationLabel = $('.locations .item').text();


            if(!locationsArr[locationId]){
                locationsArr[locationId] = { id:locationId, label:locationLabel }
                content =   '<div class="alert-info" style="padding:10px; margin-bottom:2px">'+
                                '<strong>Location: </strong> <span>'+locationLabel+'</span>'+
                                '<span class="pull-right remove-location" data-locid="'+locationId+'" style="cursor:pointer"><i class="fa fa-close"></i></span>'+
                            '</div>';
                $('.locations-wrapper').append(content)
                $("input[name=locations]").val(JSON.stringify(locationsArr));
            }

        })

        $(this).on('click',".remove-location", function(){
            locid = $(this).data('locid');
            $(this).parent().remove();
            delete locationsArr[locid]
            $("input[name=locations]").val(JSON.stringify(locationsArr));
            // console.log(locationsArr.length)
            
            var size = Object.size(locationsArr);

            if(size === 0){
                $("input[name=locations]").val('')
            }
        })

        Object.size = function(obj) {
            var size = 0, key;
            for (key in obj) {
                if (obj.hasOwnProperty(key)) size++;
            }
            return size;
        };
    })
</script>
@endsection