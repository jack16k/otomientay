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
        <link rel="stylesheet" href="<?php echo asset('css/backend.css')?>" type="text/css">

        <!--datetimepicker -->
        <link href="<?php echo asset('lib/bootstrap_datepicker/css/bootstrap-datetimepicker.css')?>" rel="stylesheet" type="text/css"/>

        <script src="<?php echo asset('js/jquery.min.js')?>"></script>
        <script src="<?php echo asset('bootstrap/js/bootstrap.min.js')?>"></script>
        <script src="<?php echo asset('bootstrap_alert/sweet-alert.js')?>" type="text/javascript"></script>
        
        
        
        <!-- trình soạn thảo và quản lý file -->
        <script src="<?php echo asset('lib/ckeditor/ckeditor.js')?>"></script>
        <script src="<?php echo asset('lib/ckfinder/ckfinder.js')?>"></script>

        <script src="<?php echo asset('js/libraries.js')?>"></script>
    </head>
    <body style="background: #ecf0f5;">
       
        @yield('header')
        @yield('content')
       
    </body>
    <script src="<?php echo asset('lib/bootstrap_datepicker/js/moment-with-locales.js')?>"></script>
    <script src="<?php echo asset('lib/bootstrap_datepicker/js/bootstrap-datetimepicker.js')?>"></script>
</html>