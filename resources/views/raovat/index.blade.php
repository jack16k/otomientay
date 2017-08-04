<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="robots" content="index, follow" />
        <meta name="csrf-token" content="{{ Session::token() }}"> 
        <title>@yield('title')</title>

        <!-- Bootstrap CSS -->
        <link href="<?php echo asset('bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">        
        <link href="<?php echo asset('bootstrap/css/bootstrap-theme.css')?>" rel="stylesheet">
        <!-- alert -->
        <link href="<?php echo asset('bootstrap_alert/sweet-alert.css')?>" rel="stylesheet" type="text/css"/>

        
        <link rel="stylesheet" href="<?php echo asset('css/styles.css')?>" type="text/css">
        <!--<link rel="stylesheet" href="<?php echo asset('css/frontend.css')?>" type="text/css">-->
        <link rel="stylesheet" href="<?php echo asset('css/raovat.css')?>" type="text/css">
        <link rel="stylesheet" href="<?php echo asset('css/font-awesome-4.7.0/css/font-awesome.min.css')?>" type="text/css">
        <link rel="stylesheet" href="<?php echo asset('css/animate.css')?>" type="text/css">
        <link rel="stylesheet" href="<?php echo asset('bootstrap-touch-slider/bootstrap-touch-slider.css')?>" type="text/css">
        <script src="<?php echo asset('js/jquery.min.js')?>"></script>
        <script src="<?php echo asset('bootstrap/js/bootstrap.min.js')?>"></script>
        <script src="<?php echo asset('bootstrap_alert/sweet-alert.js')?>" type="text/javascript"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
        <script type="text/javascript">
            window.onscroll = function() {scrollFunction()};
            function scrollFunction() {
                if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
                    document.getElementById("back_to_top").style.display = "block";
                } else {
                    document.getElementById("back_to_top").style.display = "none";
                }
            }
            function topFunction() {
                document.body.scrollTop = 0; // For Chrome, Safari and Opera
                document.documentElement.scrollTop = 0; // For IE and Firefox
            } 
        </script>
    </head>
    <body>
        <header class="clearfix" >
            <div class="container-fluid">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="">
                        <a href="<?php echo url('/');?>">
                            <span class="logo">
                                <span class="primary_text">Ôtô Cần Thơ</span>
                            </span>
                        </a>
                    </div>
                    <div>
                        <a href="<?php echo url('/raovat');?>">
                            <span class="logo">
                                <span class="primary_text">Rao Vat</span>
                            </span>
                        </a>
                        
                        
                    </div>   
                    <div>
                        <span><a href="http://app.canthotv.vn/oto/forums">Diễn đàn</a></span>
                    </div>
                </nav>
            </div>
        </header>
        <div class="clearfix"></div>
        <!-- <div class="d_divide10"></div> -->
        @yield('content')

        <!-- Footer -->
        <footer class="copyright-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <a href="#">
                            <h1 class="primary_title">Automotive</h1>
                        </a>
                        <p>Copyright © 2017</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12"></div>
                </div>
            </div>
        </footer>
        <a class="back_to_top" id="back_to_top" style="transform: translateZ(0px); display: none;" onclick="topFunction();">
            <i class="glyphicon glyphicon-chevron-up"></i>
        </a>
    </body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=150605925492149";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
</html>