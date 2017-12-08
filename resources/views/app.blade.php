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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.bootstrap2.min.css">

    </head>
    <body class="nav-md">
        <script>
          // window.fbAsyncInit = function() {
          //   FB.init({
          //     appId      : '709730755797587',
          //     xfbml      : true,
          //     version    : 'v2.6'
          //   });
          // };

          // (function(d, s, id){
          //    var js, fjs = d.getElementsByTagName(s)[0];
          //    if (d.getElementById(id)) {return;}
          //    js = d.createElement(s); js.id = id;
          //    js.src = "//connect.facebook.net/en_US/sdk.js";
          //    fjs.parentNode.insertBefore(js, fjs);
          //  }(document, 'script', 'facebook-jssdk'));
        </script>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript">
            base_url = "<?php echo URL::to('/'); ?>";
            module = "<?php echo '/'.@$module; ?>";


            // function refreshToken(){
            //     $.get('token').done(function(data){
            //         csrfToken = data; // the new token
            //         $('meta[name="csrf-token"]').attr('content',csrfToken)
            //     });
            // }

            // setInterval(refreshToken, 60000); // 1 hour 
        </script>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

        <div class="alert alert-success alert-notification-success">
            <span class="glyphicon glyphicon-ok"></span> <em class="notif-msg"> Saving Successful</em>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="alert alert-danger alert-notification-failed">
            <span class="glyphicon glyphicon-remove"></span> <em class="notif-msg"> Saving Failed!</em>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/selectize.js"></script>

        @yield('js-logic1')
        @yield('js-logic2')
        @yield('js-logic3')
        @yield('js-logic4')
        @yield('js-logic5')
        @yield('js-sam')

        <script>
            $(document).ready(function(){

                var check = setInterval(function(){ checkSuspend() }, 300000);
                
                function checkSuspend() {

                    $.ajax({
                        url: "{{URL('/check')}}",
                        method: 'GET',

                        success:function(data){
                            console.log(data);
                            if(data == '1'){
                                alert('session expired');
                                window.location.href="{{ URL::to('/auth/logout') }}";
                            }

                        }
                    });
                }

            });

        </script>

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
