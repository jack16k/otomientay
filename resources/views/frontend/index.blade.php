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
        <link rel="stylesheet" href="<?php echo asset('css/frontend.css')?>" type="text/css">
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
        <header class="clearfix affix-top" data-spy="affix" data-offset-top="1" style="transform: translateZ(0px);">
            <div class="bottom-header"> 
                <div class="container">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="<?php echo url('/');?>">
                                    <span class="logo">
                                        <span class="primary_text">Ôtô Cần Thơ</span>
                                    </span>
                                </a>
                            </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            
                            <ul class="nav navbar-nav pull-right">
                                <li class="active"><a href="<?php echo url('/');?>">Trang chủ</a></li>
                                @php echo $categories; @endphp
                                <li><a href="#">Học bằng lái xe</a></li>
                                <li><a href="http://app.canthotv.vn/oto/forums">Diễn đàn</a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                      </div><!-- /.container-fluid -->
                    </nav>
                </div>
            </div>
        </header>
        <div class="clearfix"></div>
        <section class="banner-wrap">
            <div class="banner">
                <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="3000" >

                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
                        <li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper For Slides -->
                    <div class="carousel-inner" role="listbox">
                        <!-- Third Slide -->
                        <div class="item active">
                            <!-- Slide Background -->
                            <img src="<?php echo asset('images/slider/slide-show1.jpg')?>" alt="Bootstrap Touch Slider"  class="slide-image"/>
                            <div class="bs-slider-overlay"></div>

                            <div class="container">
                                <div class="row">
                                    <!-- Slide Text Layer -->
                                    <div class="slide-text slide_style_left">
                                        <h1 data-animation="animated zoomInRight">Mercedez</h1>
                                        <p data-animation="animated fadeInLeft">Đẳng cấp thương hiệu.</p>
                                        <a href="#" target="_blank" class="btn btn-primary" data-animation="animated fadeInLeft">Chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Slide -->

                        <!-- Second Slide -->
                        <div class="item">

                            <!-- Slide Background -->
                            <img src="<?php echo asset('images/slider/slide-show2.jpg')?>" alt="Bootstrap Touch Slider"  class="slide-image"/>
                            <div class="bs-slider-overlay"></div>
                            <!-- Slide Text Layer -->
                            <div class="slide-text slide_style_center">
                                <h1 data-animation="animated flipInX">Mazda</h1>
                                <p data-animation="animated lightSpeedIn">Vẻ đẹp tuyệt vời.</p>
                                <a href="#" target="_blank" class="btn btn-primary" data-animation="animated fadeInUp">Chi tiết</a>
                            </div>
                        </div>
                        <!-- End of Slide -->

                        <!-- Third Slide -->
                        <div class="item">

                            <!-- Slide Background -->
                            <img src="<?php echo asset('images/slider/slide-show3.jpg')?>" alt="Bootstrap Touch Slider"  class="slide-image"/>
                            <div class="bs-slider-overlay"></div>
                            <!-- Slide Text Layer -->
                            <div class="slide-text slide_style_right">
                                <h1 data-animation="animated zoomInLeft">Audi</h1>
                                <p data-animation="animated fadeInRight">Sang trọng quý phái .</p>
                                <a href="#" target="_blank" class="btn btn-primary" data-animation="animated fadeInLeft">Chi tiết</a>
                            </div>
                        </div>
                        <!-- End of Slide -->


                    </div><!-- End of Wrapper For Slides -->

                    <!-- Left Control -->
                    <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
                        <span class="fa fa-angle-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>

                    <!-- Right Control -->
                    <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
                        <span class="fa fa-angle-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
            <script src="<?php echo asset('js/jquery.touchSwipe.min.js')?>"></script>
            <script src="<?php echo asset('bootstrap-touch-slider/bootstrap-touch-slider.js')?>"></script>
            <script type="text/javascript">
                $('#bootstrap-touch-slider').bsTouchSlider();
            </script>
        </section>
        <div class="d_divide10"></div>
        @yield('content')
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