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
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class='x_panel'>
                    
                </div>
            </div>
        </div>
        <br />
      </div>
      <!-- /page content -->
    </div>
</div>
@endsection

@section('js-logic1')
<script type="text/javascript">
    $(document).ready(function(){
        // $(".tool-add").click(function(){
        //  $(".medium-modal").modal('show')
        //  $(".medium-modal .modal-header > span").html('Add New Client')
        //  $(".medium-modal .modal-body").load(base_url+module+'/create')

        // })
    })
</script>
@endsection