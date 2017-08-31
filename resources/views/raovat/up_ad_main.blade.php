@extends('raovat.index')
@section('title','Dang tin')
@section('content')
<div class="container form-post">
    <img src={{asset("public/7WkqS9WkadziZ3slKS6Ph15Mw10UkcuUi4tr596e.png")}} alt={{asset("public/7WkqS9WkadziZ3slKS6Ph15Mw10UkcuUi4tr596e.png")}} />
    <ul class="nav nav-header"> 
        <li class="active" data-page="1"> 
            <a href="#step-1">Bước 1</a> 
        </li> 
        <li class="disabled" data-page="2"> 
            <a href="#step-2">Bước 2</a> 
        </li> 
        <li class="disabled" data-page="3"> 
            <a href="#step-3">Bước 3</a> 
        </li> 
    </ul> 
    <form role="form" method="post" action="abc"> 
        <input id="latitude" name="lat" value="" type="hidden" /> 
        <input id="longitude" name="lng" value="" type="hidden" /> 
        <div class="setup-content" id="step-1" style="" data-page="1"> 
            <div class="step-content"> 
                <fieldset> 
                    <legend class="polygon-title">Thông tin căn bản 
                        <div class="polygon"><span></span><span></span><span></span><span></span></div> 
                    </legend> 
                    <div class="form-group"> 
                        <label class="required">Loại tin</label> 
                        <select class="form-control" required="required" id="category_id" name="category_id" onchange="category_change(this)">  
                            @foreach($adsCategories as $category)
                                <option value={{$category->c_id}}>{{$category->c_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="more_attr">
                        <div class="form-group col-sm-4">
                            <label for="hang_xe" class="">Hãng xe</label>
                            <select class="form-control required" id="hang_xe" name="hang_xe">
                                @foreach($manufacturers as $man)
                                    <option value={{$man->hx_alias}}>{{$man->hx_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="hop_so" class="required">Hộp số</label>
                            <select class="form-control required" id="hop_so" name="hop_so">
                                <option value="0">Tự động</option>
                                <option value="1">Số Sàn</option>
                                <option value="2">Khác</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="xang" class="required">Loại xăng sử dụng</label>
                            <select class="form-control required" id="xang" name="xang">
                                <option value="0">xăng</option>
                                <option value="1">dầu</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="color" class="">Màu xe</label>
                            <input placeholder="Màu xe" class="form-control" required="required" name="color" id="color" type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="km_number" class="required">Số km đã đi</label>
                            <input placeholder="km" class="form-control" required="required" name="km_number" id="km_number" type="number">
                        </div>
                        <div class="form-group col-sm-4">
                        <label class="required">Tỉnh/Thành</label>
                        <select type="text" required="required" class="form-control" name="city">
                            @foreach($cities as $city)
                                <option value="{{$city->tp_alias}}">{{$city->tp_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                </fieldset>
                <button class="btn btn-success btnNext pull-right" type="button"> Tiếp <i class="fa fa-angle-double-right"></i> </button>
                <div class="clearfix"></div>
            </div>
        </div> 
        <div class="setup-content" id="step-2" data-page="2" style="display:none">
            <div class="step-content">
                <fieldset>
                    <legend class="polygon-title"> Nội dung <div class="polygon"><span></span><span></span><span></span><span></span></div>
                    </legend>
                    <div class="form-group">
                        <label class="control-label">Tiêu đề</label>
                        <input maxlength="70" required="required" class="form-control" name="title" minlength="10" placeholder="Tối thiểu 10 ký tự, tối đa 70 ký tự." type="text">
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Mô tả</label>
                        <textarea id="description" maxlength="1000" minlength="30" rows="7" placeholder="Nhập mô tả sản phẩm cần đăng..." required="required" class="form-control" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Giá</label>
                        <input required="required" pattern="[0-9.]*" class="form-control currency" name="price" maxlength="20" placeholder="Giá" type="text" />
                        <p class="price_string" role="string"></p>
                    </div>
                </fieldset>
                <fieldset>
                    <legend class="polygon-title"> Hình ảnh <div class="polygon"><span></span><span></span><span></span><span></span></div>
                    </legend>
                    <div id="img-upload" class="dropzone-previews dz-clickable ui-sortable">
                    </div>
                    <input hidden id="img-check" required="required" min=1 type="number" />
                </fieldset>
                <button class="btn btn-primary btnPrevious pull-left" type="button">
                    <i class="fa fa-angle-double-left" aria-hidden="true"></i> Quay Lại
                </button>
                <button class="btn btn-success btnNext pull-right" type="button"> Tiếp <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </button>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="setup-content" id="step-3" data-page="3" style="display: none">
            <div class="step-content">
                <fieldset>
                    <legend class="polygon-title"> Thông tin liên hệ <div class="polygon"><span></span><span></span><span></span><span></span></div>
                    </legend>
                    
                    <div class="form-group">
                        <label class="control-label required">Họ tên</label>
                        <input required="required" class="form-control" name="fullname" placeholder="Họ tên" value="{{$user->u_fullname}}" type="text">
                    </div>
                    <div class="form-group">
                        <label class="control-label required">Số điện thoại</label>
                        <input required="required" class="form-control" name="phone" placeholder="Số điện thoại" value="">
                    </div>
                    <div class="form-group">
                        <label class="control-label required">Email</label>
                        <input required="required" class="form-control" name="email" placeholder="Email" value="{{$user->u_email}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label required">Địa chỉ</label>
                        <input required="required" class="form-control" name="address" placeholder="Địa chỉ" value="" type="text">
                    </div>
                    <div class="form-group">
                        <label class="control-label required">Thời gian liên hệ tốt nhất</label>
                        <input required="required" class="form-control" name="time_support" placeholder="Thời gian liên hệ" value="" type="text">
                    </div>
                </fieldset>
                <button class="btn btn-primary btnPrevious pull-left" type="button">
                    <i class="fa fa-angle-double-left" aria-hidden="true"></i> Quay lại
                </button>
                <button class="btn btn-success btn-md nextBtn pull-right" type="submit"> Gửi <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </button>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="setup-content" id="step-5" style="display: none;"></div>
        <div class="clearfix"></div>
        <input name="_token" value="s6Su6ZSWPBtvlb2GDcoKWrwXDq0OBcrpmjEZeBcX" type="hidden">
    </form>
</div>
@endsection
@section('footer')
    @parent
    <script src="<?php echo asset('js/raovat.js')?>" type="text/javascript"></script>
@endsection