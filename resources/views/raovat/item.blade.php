@extends('raovat.index')
@section('title')
    {{$post->items_title}}
@endsection
@section('content')
<div class="content">
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <table class="MASTERCMS_TPL_TABLE" style="max-width:100%; width:100%" cellspacing="0" cellpadding="0" border="0" >
                <tbody>
                    <tr>
                        <td><a class="fancybox-button" href="{{$post->items_image}}" rel="fancybox-button" target="_blank"><img alt="{{$post->items_title}}" class="__img_mastercms" src="{{$post->items_image}}" style="margin:0px; max-width:100%; padding:0px; width:100%" title="{{$post->items_title}}" /></a></td> 
                    </tr>
                </tbody>
            </table>  
            <div class="panel-heading" style="background: none;">
                <h2 class="block_title">{{$post->items_title}}</h2>
            </div> 
            <div class="panel-body">
                <div>
                    <p>Giá : {{$post->items_price}}  VND</p>
                </div>
                <div>
                    <p>Chi tiết :</p>
                </div>
                <div>
                    @php echo $post->items_description;@endphp
                </div>
            </div> 
            </div>
            
        </div>
    </div>        
</div>
       
@endsection 