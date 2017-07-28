
<div class="row">
    {{--  <form action="/raovat/search" method="get">  --}}
    <form method="get">
    <div class="col-sm-10 col-xs-12">
        
        <div class="row">
            <div class="col-sm-4 padding_8" style="display:flex">
                <select name="manufacturer" class="col-sm-4 padding_8" onchange="select_change_submit()" style="flex:1">
                    <option value="0">Hãng xe</option>
                    @foreach($manufacturers as $manu)
                    <option value="{{$manu->hx_alias}}">{{$manu->hx_name}}</option>    
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4 padding_8" style="display:flex">
                <select name="type" class="col-sm-4 padding_8" onchange="select_change_submit()" style="flex:1">
                    <option value="0">Dòng xe</option>
                    @foreach($carTypes as $type)
                    <option value="{{$type->lx_alias}}" data="{{$type->hx_alias}}" >{{$type->lx_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4 padding_8" style="display:flex">
                <select name="location_city_id" class="col-sm-4 padding_8" onchange="select_change_submit()" style="flex:1">
                    <option value="0">Tỉnh/Thành phố</option>
                    @foreach($cities as $city)
                    <option value="{{$city->tp_alias}}">{{$city->tp_name}}</option>    
                    @endforeach
                </select>
            </div>
            
        </div>
        <div class="row">
            <div class="col-sm-6" style="display:flex">
                <label for="minvalue">Từ :</label>
                <select name="minvalue" id="" style="flex:1">
                    <option value="0">Giá trị nhỏ nhất</option>
                    <option value="1000000">1000000 VND</option>
                    <option value="2000000">2000000 VND</option>
                    <option value="3000000">3000000 VND</option>
                    <option value="4000000">4000000 VND</option>
                    <option value="5000000">5000000 VND</option>
                    <option value="6000000">6000000 VND</option>
                    <option value="7000000">7000000 VND</option>
                </select>
            </div>
            <div class="col-sm-6" style="display:flex">
                <label for="maxvalue">Đến :</label>
                <select name="maxvalue" id="" style="flex:1">
                    <option value="0">Giá trị lớn nhất</option>
                    <option value="1000000">1000000 VND</option>
                    <option value="2000000">2000000 VND</option>
                    <option value="3000000">3000000 VND</option>
                    <option value="4000000">4000000 VND</option>
                    <option value="5000000">5000000 VND</option>
                    <option value="6000000">6000000 VND</option>
                    <option value="7000000">7000000 VND</option>
                </select>
            </div>
        </div>
        
    </div>
    <div class="col-sm-2 text-center" style="height:100%"> 
        <button class="btn-search" type="submit" style="height:50px;width:100px">Tìm</button>
    </div>
    </form>
</div>