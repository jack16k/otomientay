
<div class="row">
    <div class="search-basic">
        <select class="col-sm-3 col-xs-5 spec" name="manufacturer" onchange="select_change_submit()">
            <option value="">Hãng xe</option>
            @foreach($manufacturers as $manu)
            <option value="{{$manu->hx_alias}}">{{$manu->hx_name}}</option>    
            @endforeach
        </select>
        <select class="col-sm-3 col-xs-5 spec" name="manufacturer" onchange="select_change_submit()">
            <option value="">Dòng xe</option>
            @foreach($manufacturers as $manu)
            <option value="{{$manu->hx_alias}}">{{$manu->hx_name}}</option>    
            @endforeach
        </select>
        <select class="col-sm-3 col-xs-5 spec" name="location_city_id" onchange="select_change_submit()">
            <option value="">Tỉnh/Thành phố</option>
            @foreach($cities as $city)
            <option value="{{$city->tp_alias}}">{{$city->tp_name}}</option>    
            @endforeach
        </select>
        <button class="col-sm-2 col-xs-2 btn-search" type="submit">Tìm</button>
    </div>
</div>