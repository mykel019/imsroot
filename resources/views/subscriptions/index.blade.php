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
                           <h3>
                                    Subscriptions
                           </h3>
                        </div>

                        <div class="title_right">
                        </div>
                    </div>
                    <form method="POST" action="{{ url('/subscriptions/store') }}" onsubmit="return false" id="form">
                        <div class='x_panel'>
                             <div class='x_title'>
                                <div class="row">
                                        <a href="{{url('/subscribers/index')}}" class="btn btn-app return-subscribers"><i class="fa fa-long-arrow-left"></i> Return</a>
                                        <a class="btn btn-app save_subscription"><i class="glyphicon glyphicon-floppy-disk"></i> Save </a>
                                        <!-- <a class="btn btn-app clear-form"><i class="glyphicon glyphicon-erase"></i> Clear </a> -->

                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class='col-md-10 col-sm-12 x_content'>
                                <div class="sub-panel">
                                  
                                        <div class="panel panel-primary">
                                          <div class="panel-heading">
                                                Select allowed modules for {{$subscriber->company_name}}
                                                
                                          </div>
                                          <div class="panel-body">
                                        

                                            <div class="panel panel-default">
                                              <div class="panel-heading"><label><input type="checkbox" class="flat" id="checkAll" value="0" style="position: absolute; opacity: 0;">Check All</label></div>
                                              <div class="panel-body">
                                                @foreach($modules as $key => $value)
                                                            <?php 
                                                                $checked = '';
                                                                $hold = [];

                                                                foreach($subscriptions as $key => $val){
                                                                    array_push($hold, $val->module_id) ;
                                                                }

                                                                if(in_array($value->id, $hold)){ $checked = 'checked'; }

                                                            ?>
                                                        <label><input type="checkbox" name="name[]" {{ $checked}} class="flat module" id="module{{$value->id}}" data-id="{{$value->id}}" value="{{$value->id}}" style="position: absolute; opacity: 0;">{{$value->description}}</label><br>
                                                @endforeach
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                </div>

                                  
                            </div>
                        </div>
                    </form>
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

     <script type="text/javascript">
        $(document).ready(function(){

           $('.save_subscription').click(function(){
                var btn = $(this);
                
                $("#form").ajaxForm({
                    
                    success:function(data){

                       location.reload();
                    }
                    
                }).submit();

            });

                $(document).on('ifChecked','#checkAll',function(){

                        $('.module').prop('checked', true);
                   
                        $('.icheckbox_flat-green').addClass('checked');

                });

                $(document).off('ifUnchecked','#checkAll').on('ifUnchecked','#checkAll',function(){
                        
                        $('.module').prop('checked', false);
                        $('.icheckbox_flat-green').removeClass('checked');
                });
        

        });
    </script>
@endsection



