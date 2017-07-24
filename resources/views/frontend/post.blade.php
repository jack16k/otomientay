@extends('frontend.index')
@section('title', 'Oto Cần Thơ')
@section('content')
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-xs-12">
                
                <div class="row" id="block_new">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background: none;">
                            <h2 class="block_title">{{$post->p_title}}</h2>
                        </div>
                        <div class="panel-body">
                           
                            
                            <div class="row post">
                                <!-- <div class="col-sm-4 padding_10">
                                    <a href="#">
                                        <img class="img-responsive" src="{{$post->p_image}}">
                                    </a>
                                </div> -->
                                <div class="col-sm-12 padding_10">
                                    <!-- <a href="#"><h4>{{$post->p_title}}</h4></a> -->
                                    <p class="p_description" style="font-weight: bold;">{{$post->p_description}}</p>
                                    <p class="p_description">@php echo $post->p_content; @endphp</p>
                                    <span>Từ khóa:<span style="font-style: italic;padding-left: 10px;"></span></span>
                                    <!-- <a href="#" class="btn-readmore">Xem thêm</a> -->
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="block_right">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="block_title">Facebook</h2>
                        </div>
                        <div class="panel-body">
                            <div class="fb-page" data-href="https://www.facebook.com/RivertaleFilmworks/" data-tabs="timeline" data-height="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/RivertaleFilmworks/" class="fb-xfbml-parse-ignore">
                            <a href="https://www.facebook.com/RivertaleFilmworks/">Rivertale Filmworks</a>
                            </blockquote>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="block_title">Xem nhiều</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row post">
                                <div class="col-sm-4 padding_10">
                                    <a href="#">
                                        <img class="img-responsive" src="<?php echo asset('images/oto/1.jpg')?>">
                                    </a>
                                </div>
                                <div class="col-sm-8 padding_10">
                                    <a href="#"><h4>Mercedes-benz</h4></a>
                                </div>
                            </div>
                            <div class="row post">
                                <div class="col-sm-4 padding_10">
                                    <a href="#">
                                        <img class="img-responsive" src="<?php echo asset('images/oto/2.jpg')?>">
                                    </a>
                                </div>
                                <div class="col-sm-8 padding_10">
                                    <a href="#"><h4>Mercedes-benz</h4></a>
                                </div>
                            </div>
                            <div class="row post">
                                <div class="col-sm-4 padding_10">
                                    <a href="#">
                                        <img class="img-responsive" src="<?php echo asset('images/oto/3.jpg')?>">
                                    </a>
                                </div>
                                <div class="col-sm-8 padding_10">
                                    <a href="#"><h4>Mercedes-benz</h4></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="block_title">Quảng cáo</h2>
                        </div>
                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection