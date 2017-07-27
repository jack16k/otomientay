<div class="row">
    {{--  @each('view.name', $collection, 'variable', 'view.empty')  --}}
    @foreach($posts as $post)
        <div class="col-sm-4 col-xs-12 padding_8">
            <div class="flip">
                <img class="img-responsive" src="{{$post->items_image}}">
                <div class="mask">
                    <a href="raovat/item/{{$post->items_alias}}" class="info">Read More</a>
                </div>
            </div>
            <h3 class="h_title"><a href="raovat/item/{{$post->items_alias}}">{{$post->items_title}}</a></h2>
             <p class="p_description">{{$post->items_price}} VNĐ</p> 
            
        </div>
    @endforeach
</div>