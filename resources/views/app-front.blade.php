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
    
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript">
            base_url = "<?php echo URL::to('/'); ?>";
            module = "<?php echo '/'.@$module; ?>";
        </script>
    </head>
    <body class="nav-md main page" style="background:#F7F7F7;">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


        <!-- include('elements/nav') -->
        <div id='wrapper'>
            @yield('sidemenu')
            @yield('content')
        </div>


        <script src="{{ asset('js/bootstrap.min.js') }} "></script>
        <script src="{{ asset('js/plugins.js') }} "></script>
        <script src="{{ asset('js/init.js') }} "></script>
        <script src="{{ asset('js/_temp.js') }} "></script>

        @yield('js-logic1')
        @yield('js-logic2')
    
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
