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
	var titleExits = false;
	$(function () {
		$('#txtC_CreatedDate').keypress(function (e) {
	        e.preventDefault();
	    });
	    $('#ipgC_CreatedDate').datetimepicker({
	        defaultDate: new Date(),
	        locale: 'vi',
	        format: 'DD/MM/YYYY',
	        showClear: true
	    });

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

	function addCategory(redirectListPage){
		var txtC_Title = $('#txtC_Title');
        var txtC_Alias = $('#txtC_Alias');
        var txtC_CreatedDate = $('#txtC_CreatedDate');
        var slC_ParentID = $('#slC_ParentID');
        var txtC_Description = CKEDITOR.instances['txtC_Description'].getData();
        var rdoC_State = $('input[name="rdoC_State"]:checked');
        var imgC_Image = $('#imgC_Image').attr('src');
        var hasError = validateEmptyValue(new Array(txtC_Title, txtC_Alias));
        if(!hasError){
        	checkTitle(txtC_Title.val());
        	if(!titleExits) {
        		var data_save = {
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
	                url:'insert',
	                type:'POST',
	                data:data_save,
	                success:function(data){
	                    console.log(data);
	                    if ($.trim(data) == 'OK') {
	                       swal({
                                title: "Thêm thành công!",
                                timer: 1000,
                                type: 'success'
                            });
                            // resetInput();
                            if (redirectListPage) {
                                redirect("{{URL('quantri/categories')}}");
                            } else {
                            //     fillSelectBox_Category(hdC_ComponentID, null);
                            }
	                    } else {
	                        swal("Lỗi", data, "error");
	                    }
	                },
	                error: function (data) {
	                    console.log(data);
	                }
	            });
        	}else{
        		swal("Lỗi", "Tên nhóm đã tồn tại", "error");
        	}
        }
	}
	function checkTitle(title){
		var newTitle = $.trim(title);
		if (newTitle != '') {
	        var data = {
	            txtC_Title: newTitle
	        };
	        var result = postAjax("checktitle", data);
	        if (result === 'OK') {
	            titleExits = true;
	        } else {
	            titleExits = false;
	        }
	        // $.ajaxSetup({
         //        headers: {
         //            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         //        }
         //    });
         //    $.ajax({
         //        url:'checktitle',
         //        type:'POST',
         //        data:data,
         //        success:function(data){
         //            if ($.trim(data) === 'OK') {
         //                titleExits = true;
         //                alert(titleExits);
         //            } else {
         //                titleExits = false;
         //            }
         //        },
         //        error: function (data) {
         //            console.log(data);
         //        }
         //    });
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
	        <a class="my-btn-primary" style="color: #fff" href="#" onclick="addCategory(true)">
	            <i class="glyphicon glyphicon-floppy-open"></i>
	            Lưu và thoát
	        </a>
	        <a href="#" class="my-btn-primary" style="color: #fff" onclick="addCategory()">
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
	                    <input type="text" class="form-control" title="" id="txtC_Title" name="txtC_Title" placeholder="Tên">
	                </div>                     
				</div>
				 <div class="form-group">
	                <label for="txtC_Alias" class="col-sm-3 control-label">
	                    Định danh       
	                    <span class="d_asterisk">*</span>  
	                </label>
	                <div class="col-sm-9">                                
	                    <input type="text" value="" class="form-control" id="txtC_Alias" name="txtC_Alias" placeholder="Định danh">
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="slC_ParentID" class="col-sm-3 control-label">
	                    Nhóm bài viết cha
	                </label>
	                <div class="col-sm-4">  
	                    <select class="form-control" id="slC_ParentID" name="slC_ParentID">                
	                        <option selected="selected" value='0'>--chọn--</option> 
	                        @foreach($categories as $category)
	                        <option  value='{{$category->c_id}}'>@php echo $category->c_name;@endphp</option> 
	                        @endforeach                         
	                    </select>
	                </div>
	                <div class="d_divide10 visible-xs-block"></div>
	                <label for="rdoC_State" class="col-sm-2 control-label">
	                    Trạng thái
	                </label>
	                <div class="col-sm-3">
	                    <label class="radio-inline">
	                        <input type="radio" name="rdoC_State" value="1" checked="checked"> Bật
	                    </label>
	                    <label class="radio-inline">
	                        <input type="radio" name="rdoC_State" value="0"> Tắt
	                    </label>
	                </div>
	            </div>
	            <div class="form-group">
	                <label for="txtC_CreatedDate" class="col-sm-3 control-label">
	                    Ngày tạo     
	                </label>
	                <div class="col-sm-4">   
	                    <div class="input-group date" id="ipgC_CreatedDate">                            
	                        <input type="text"  class="form-control" id="txtC_CreatedDate" name="txtC_CreatedDate" placeholder="Ngày tạo">
	                        <span class="input-group-addon" >
	                            <span class="glyphicon glyphicon-calendar"></span>
	                        </span>
	                    </div>
	                </div>
	                <div class="d_divide10 visible-xs-block"></div>
	                <label for="imgC_Image" class="col-sm-2 control-label">
	                    Ảnh đại diện
	                </label>
	                <div class="col-sm-3">  
	                    <img id="imgC_Image" src="{{URL::asset('/images/no_image.png')}}" style="width: 30px; height: 30px;" onclick="BrowseServer('Images')"/>
	                </div>
	            </div>
	            
	            <div class="form-group">
	                <label for="txtC_Description" class="col-sm-3 control-label">
	                    Mô tả
	                </label>
	                <div class="col-sm-9">   
	                    <textarea class="ckeditor" name="txtC_Description" id="txtC_Description"></textarea>
	                </div>
	            </div>
			</form>
		</div>
	</div>
</div>
@endsection