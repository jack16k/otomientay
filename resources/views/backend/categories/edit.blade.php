@extends('backend.index')
@section('title', 'Quản trị hệ thống')
@section('header')  
<div class="row" style="background: #3c8dbc;">
	<div class="col-md-4 col-md-offset-4 col-sm-4 col-xs-12 d_bold text-center">
        <h1 style="font-size: 24px; color: #fff;">Quản trị hệ thống</h1>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12 text-right">
        <div class="btn-group" role="group" style="padding:  20px 20px 10px 0px;">
            <a class="btn-logout" href="">
                <span class="glyphicon glyphicon-user"></span>
                <?php echo session('sFullName') ?>
            </a>
            <a class="btn-logout" href="{{URL('quantri/logout')}}"> 
                <span class="glyphicon glyphicon-off"></span>
                Thoát
            </a>
        </div>
    </div>
</div>
<div class="d_divide10"></div>
<div class="container">
	<nav class="navbar_verticle navbar-default" role="navigation" style="margin-bottom: 0px 5px;box-shadow: inset 0 1px 0 rgba(255, 255, 255, .15), 0 1px 5px rgba(0, 0, 0, .075);background-color: #FFFFFF;
border-color: #e7e7e7;border-radius: 0px;" >
		<div class="container-fluid">
			<div class="navbar-header">
	            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="{{URL('quantri')}}"><i class="glyphicon glyphicon-home"></i></a>
	        </div>
		</div>
	</nav>
</div>
<div class="d_divide10"></div>
@endsection
@section('content') 
<script type="text/javascript">
	$(function () {
		$("#txtC_Title").focus();
	    $("#txtC_Title").keyup(function () {
            assignTitleToAlias();
        });
	});
	function assignTitleToAlias(){
		var title = $.trim($("#txtC_Title").val());
	    title = removeSigns(title);
	    $("#txtC_Alias").val(title);
	}
	function SetFileField(fileUrl) {
	    $('#imgC_Image').attr("src", fileUrl);
	}
	function updateCategory(){
		var c_id = {{$category->c_id}};
		var txtC_Title = $('#txtC_Title');
        var txtC_Alias = $('#txtC_Alias');
        var txtC_CreatedDate = $('#txtC_CreatedDate');
        var slC_ParentID = $('#slC_ParentID');
        var txtC_Description = CKEDITOR.instances['txtC_Description'].getData();
        var rdoC_State = $('input[name="rdoC_State"]:checked');
        var imgC_Image = $('#imgC_Image').attr('src');
        var hasError = validateEmptyValue(new Array(txtC_Title, txtC_Alias));
        if(!hasError){
    		var data_save = {
    			c_id:c_id,
                txtC_Title: txtC_Title.val(),
                txtC_Alias: txtC_Alias.val(),
                txtC_CreatedDate: txtC_CreatedDate.val(),
                slC_ParentID: slC_ParentID.val(),
                txtC_Description: txtC_Description,
                imgC_Image: imgC_Image,
                rdoC_State: rdoC_State.val()
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'../update',
                type:'POST',
                data:data_save,
                success:function(data){
                    console.log(data);
                    if ($.trim(data) == 'OK') {
                       swal({
                            title: "Chỉnh sửa thành công!",
                            timer: 1000,
                            type: 'success'
                        });
                        redirect("{{URL('quantri/categories')}}");
                    } else {
                        swal("Lỗi", data, "error");
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
	}
</script>

<div class="container">
	<div class="row" style="background-color: #fff; margin: 0px;">
		<div class="col-sm-6">      
            <div class="icon_40 icon_category pull-left" style="margin-right: 10px"></div>  
            <h4 class="text-left bold pull-left">            
                {{$name}}
            </h4>     
        </div>
        <div class="col-sm-6 text-right">
	        
	        <a href="#" class="my-btn-primary" style="color: #fff" onclick="updateCategory('{{$category->c_id}}')">
                <i class="glyphicon glyphicon-floppy-open"></i>
                Lưu
            </a>
            <a href="{{URL('quantri/categories')}}" class="my-btn-warning" style="color: #fff">                              
                <i class="glyphicon glyphicon-arrow-left"></i>
                Trở về
            </a>
        </div>
	</div>
	<div class="d_divide10"></div>
	<div class="row" style="background-color: #fff; margin: 0px;">	
		<div class="d_divide10"></div>
		<div class="col-sm-12">
			<form class="form-horizontal" name="phpForm" id="phpForm">
				<div class="form-group"> 
					<label for="txtC_Title" class="col-sm-3 control-label">
	                    Tên
	                    <span class="d_asterisk">*</span>                                
	                </label>
	                <div class="col-sm-9">
	                    <input type="text" class="form-control" title="" id="txtC_Title" name="txtC_Title" placeholder="Tên" value="{{$category->c_name}}">
	                </div>                     
				</div>
				 <div class="form-group">
	                <label for="txtC_Alias" class="col-sm-3 control-label">
	                    Định danh       
	                    <span class="d_asterisk">*</span>  
	                </label>
	                <div class="col-sm-9">                                
	                    <input type="text" value="{{$category->c_alias}}" class="form-control" id="txtC_Alias" name="txtC_Alias" placeholder="Định danh">
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="slC_ParentID" class="col-sm-3 control-label">
	                    Nhóm bài viết cha
	                </label>
	                <div class="col-sm-4">  
	                    <select class="form-control" id="slC_ParentID" name="slC_ParentID"> 
	                    	@if($selected_parent>0)               
	                        <option value='0'>--chọn--</option> 
	                        @foreach($categories as $c)
	                        	@if($selected_parent==$c->c_id)
	                        		<option selected="selected"  value='{{$c->c_id}}'>@php echo $c->c_name;@endphp</option>
	                        	@else
	                        		<option  value='{{$c->c_id}}'>@php echo $c->c_name;@endphp</option>
	                        	@endif
	                        @endforeach   
	                        @else
	                        <option selected="selected" value='0'>--chọn--</option> 
	                        @foreach($categories as $c)
	                        <option  value='{{$c->c_id}}'>@php echo $c->c_name;@endphp</option>
	                        @endforeach
	                        @endif                     
	                    </select>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="imgC_Image" class="col-sm-3 control-label">
	                    Ảnh đại diện
	                </label>
	                <div class="col-sm-9">  
	                    <img id="imgC_Image" src="{{$category->c_avatar}}" style="width: 30px; height: 30px;" onclick="BrowseServer('Images')"/>
	                </div>
	            </div>
	            
	            <div class="form-group">
	                <label for="txtC_Description" class="col-sm-3 control-label">
	                    Mô tả
	                </label>
	                <div class="col-sm-9">  
	                    <textarea class="ckeditor" name="txtC_Description" id="txtC_Description">
	                    	{{$category->c_description}}
	                    </textarea>
	                </div>
	            </div>
			</form>
		</div>
	</div>
</div>
@endsection