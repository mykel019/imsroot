'@extends('app')

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
                                <div class="col-xs-12 col-md-8">
                                    <div class="inner-panel">
                                        <div class="ip-title">Permission Properties</div>
                                        <div class="ip-body">
                                            <div class="form-group">
                                                <label>Access Name</label>
                                                <input type="text" name="name" value="{{ $result->name }}" class="form-control">
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <th style="width:50%">Modules</th>
                                                    <th>Create</th>
                                                    <th>Read</th>
                                                    <th>Update</th>
                                                    <th>Delete</th>
                                                    <th>Import</th>
                                                    <th>Export</th>
                                                </thead>

                                                <tbody>
                                                <?php 
                                                // dd($result);
                                                $access_rights = [];
                                                    foreach ($result->accessRights as $key => $value) {
                                                        $access_rights[$value->access_module_id] = $value;
                                                    }
                                                    // dd($access_rights);

                                                ?>
                                                <?php foreach ($access_modules as $key => $value): ?>
                                                    <?php 
                                                        if(isset($access_rights[$value->id])){
                                                            ($access_rights[$value->id]->to_add == 1) ? $create ='checked' : $create = '';
                                                            ($access_rights[$value->id]->to_view == 1) ? $read ='checked' : $read = '';
                                                            ($access_rights[$value->id]->to_edit == 1) ? $update ='checked' : $update = '';
                                                            ($access_rights[$value->id]->to_delete == 1) ? $delete ='checked' : $delete = '';
                                                            ($access_rights[$value->id]->to_import == 1) ? $import ='checked' : $import = '';
                                                            ($access_rights[$value->id]->to_export == 1) ? $export ='checked' : $export = '';
                                                        }else{

                                                            $create ='';
                                                            $read ='';
                                                            $update ='';
                                                            $delete ='';
                                                            $import ='';
                                                            $export ='';

                                                        }
                                                        $crud = array_flip(explode(',',$value->crud));  
                                                    ?>

                                                    @if($value->module == "vm_modules")
                                                    @if(Auth::User()->subscriber_id == 2 && Auth::User()->position_id == 0)
                                                        <tr>
                                                    @else
                                                        <tr style="display:none">
                                                        @endif
                                                    @else
                                                            <tr>
                                                    @endif
                                                        <td>{{ $value->description }}</td>
                                                        <td>
                                                            <?php if (isset($crud['c'])): ?>
                                                                <input type="checkbox" name="crud[{{$value->id}}][]" data-id="{{$value->id}}" value="1" id="create{{$value->id}}" class="flat create" {{ $create }}>
                                                            <?php endif ?>
                                                        </td>

                                                        <td>
                                                            <?php if (isset($crud['r'])): ?>
                                                                <input type="checkbox" name="crud[{{$value->id}}][]" value="2" data-id="{{$value->id}}" id="read{{$value->id}}" class="flat read" {{ $read }}>
                                                            <?php endif ?>
                                                        </td>

                                                        <td>
                                                            <?php if (isset($crud['u'])): ?>
                                                                <input type="checkbox" name="crud[{{$value->id}}][]" value="3" data-id="{{$value->id}}" id="update{{$value->id}}" class="flat update" {{ $update }}>
                                                            <?php endif ?>
                                                        </td>
                                                        <td>
                                                            <?php if (isset($crud['d'])): ?>
                                                                <input type="checkbox" name="crud[{{$value->id}}][]" value="4" data-id="{{$value->id}}" id="delete{{$value->id}}" class="flat delete" {{ $delete }}>
                                                            <?php endif ?>
                                                        </td>

                                                        <td>
                                                            <?php if (isset($crud['i'])): ?>
                                                                <input type="checkbox" name="crud[{{$value->id}}][]" value="5" data-id="{{$value->id}}" id="import{{$value->id}}" class="flat import" {{ $import }}>
                                                            <?php endif ?>
                                                        </td>

                                                        <td>
                                                            <?php if (isset($crud['e'])): ?>
                                                                <input type="checkbox" name="crud[{{$value->id}}][]" value="6" data-id="{{$value->id}}" id="export{{$value->id}}" class="flat export" {{ $export }}>
                                                            <?php endif ?>
                                                        </td>
    
                                                    </tr>
                                                <?php endforeach ?>
                                                </tbody>
                                            </table>
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

@section('js-logic1')
<script>
    $(document).ready(function(){

        $(document).on('ifUnchecked' ,'.read',function(){
            id = $(this).data('id');

            $("#read"+id).attr("checked", false);
        });

        $(document).on('ifUnchecked' ,'.read',function(){
            id = $(this).data('id');

            $('#create'+id).iCheck('uncheck');
            $('#update'+id).iCheck('uncheck');
            $('#delete'+id).iCheck('uncheck');
            $('#import'+id).iCheck('uncheck');
            $('#export'+id).iCheck('uncheck');

            $("#create"+id).prop("checked",false);
            $("#update"+id).prop("checked",false);
            $("#delete"+id).prop("checked",false);
            $("#import"+id).prop("checked",false);
            $("#export"+id).prop("checked",false);

        });

        $(document).on('ifChecked' ,'.create',function(){

            id = $(this).data('id');
            $("#read"+id).attr("checked",true);
            $("#read"+id).prop("checked",true);
            $('#read'+id).iCheck('update')[0].checked;

        });

        $(document).on('ifUnchecked' ,'.create',function(){

            id = $(this).data('id');

            $("#read"+id).attr("checked", false);
            $("#read"+id).prop("checked",false);

        });

        $(document).on('ifChecked' ,'.update',function(){

            id = $(this).data('id');

                $("#read"+id).attr("checked",true);
                $("#read"+id).prop("checked",true);
                $('#read'+id).iCheck('update')[0].checked;

        });


        $(document).on('ifChecked' ,'.delete',function(){
            id = $(this).data('id');
                $("#read"+id).attr("checked",true);
                $("#read"+id).prop("checked",true);
                $('#read'+id).iCheck('update')[0].checked;

        });

        $(document).on('ifChecked' ,'.import',function(){
            id = $(this).data('id');
                $("#read"+id).attr("checked",true);
                $("#read"+id).prop("checked",true);
                $('#read'+id).iCheck('update')[0].checked;

        });

        $(document).on('ifChecked' ,'.export',function(){
            id = $(this).data('id');
                $("#read"+id).attr("checked",true);
                $("#read"+id).prop("checked",true);
                $('#read'+id).iCheck('update')[0].checked;

        });
        
    });
</script>
@endsection




