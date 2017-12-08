<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--IE Compatibility modes-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!--Mobile first-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('fonts/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    </head>
    <body class="nav-md">
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript">
            base_url = "<?php echo URL::to('/'); ?>";
            module = "<?php echo '/'.@$module; ?>";
        </script>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        @if(Session::has('success'))
        <div class="alert alert-success alert-notification">
            <span class="glyphicon glyphicon-ok"></span><em> Saving Successful{!! session('status') !!}</em>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if(Session::has('failed'))
        <div class="alert alert-success alert-notification">
            <span class="glyphicon glyphicon-ok"></span><em> Saving Successful{!! session('status') !!}</em>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @include('elements/modals')
        <!-- include('elements/nav') -->
        <div>
            @yield('sidemenu')
            @yield('content')
        </div>


        <script src="{{ asset('js/bootstrap.min.js') }} "></script>
        <script src="{{ asset('js/plugins.js') }} "></script>
        <script src="{{ asset('js/init.js') }} "></script>
        <script src="{{ asset('js/_temp.js') }} "></script>

        @yield('js-logic1')

        @yield('js-logic3')

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
