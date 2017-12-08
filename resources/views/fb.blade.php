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
                
            <div
              class="fb-like"
              data-share="true"
              data-width="450"
              data-show-faces="true">
            </div>
            </div>
        </div>
        <!-- /page content -->

        @include('elements/footer')
    </div>
</div>
@endsection

@section('js-logic1')
<script type="text/javascript">
    $(document).ready(function(){
        $(".supplier").selectize();
    })
</script>
@endsection

