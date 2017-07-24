@extends('frontend.index')
@section('title', 'Oto Cần Thơ')
@section('content')
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-xs-12">
                <div class="row">
                    @foreach($new_posts as $new_post)
                        <div class="col-sm-4 col-xs-12 padding_8">
                            <div class="flip">
                                <img class="img-responsive" src="{{$new_post->p_image}}">
                                <div class="mask">
                                    <a href="new-post/{{$new_post->p_alias}}" class="info">Read More</a>
                                </div>
                            </div>
                            <h3 class="h_title"><a href="new-post/{{$new_post->p_alias}}">{{$new_post->p_title}}</a></h2>
                            <p class="p_description">{{$new_post->p_description}}</p>
                        </div>
                    @endforeach
                </div>
                @foreach($posts[0] as $category)
                <div class="row" id="block_new">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="<?php echo url('/').'/'.$category->c_alias; ?>"><h2 class="block_title">{{$category->c_name}}</h2></a>
                        </div>
                        <div class="panel-body">
                            @foreach($posts[1][$index] as $post)
                            @if($post!=null)
                            <div class="row post">
                                <div class="col-sm-4 padding_10">
                                    <a href="<?php echo url('/').'/'.$category->c_alias.'/'. $post->p_alias;?>">
                                        <img class="img-responsive" src="{{$post->p_image}}">
                                    </a>
                                </div>
                                <div class="col-sm-8 padding_10">
                                    <a href="<?php echo url('/').'/'.$category->c_alias.'/'. $post->p_alias;?>"><h4>{{$post->p_title}}</h4></a>
                                    <p class="p_description">{{$post->p_description}}</p>
                                    <a href="<?php echo url('/').'/'.$category->c_alias.'/'. $post->p_alias;?>" class="btn-readmore">Xem thêm</a>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            @php $index++; @endphp
                        </div>
                    </div>
                </div>
                @endforeach
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