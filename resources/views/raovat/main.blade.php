@extends('raovat.index')
@section('title', 'Rao Vặt')
@section('content')
<section class="content" style=margin-top:80px>
    <div class="container">
        @include('raovat.search_bar',['cities'=>$cities,'manufacturers'=>$manufacturers,'carTypes'=>$carTypes])
        @include('raovat.result')
    </div>
</section>


@endsection
