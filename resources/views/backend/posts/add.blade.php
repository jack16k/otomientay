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
    var arrayTags = new Array();
    var newTagId;
    $(function () {
        $("#txtA_Title").focus();
        $("#txtA_Title").keyup(function(){
            assignTitleToAlias();
        });
        
    });

    function addPost(redirectPage){
        var arrayCategoryId = new Array();
        var txtA_Title = $('#txtA_Title');
        var txtA_Alias = $('#txtA_Alias');
        var imgA_Image = $('#imgA_Image').attr('src');
        var txtA_Description = $('#txtA_Description');
        var txtA_Content = CKEDITOR.instances['txtA_Content'].getData();
        var categories_list = $('#categories_list');
        $('input[name="cid[]"]:checked').each(function () {
            var value = $(this).val();
            arrayCategoryId.push(value);
        });
        var hasError = validateEmptyValue(new Array(txtA_Title, txtA_Alias));
        if(!hasError){
            if(arrayCategoryId==""||arrayCategoryId==null){
                assignToolTipBootStrapToTextBox(categories_list, 'Chưa chọn nhóm tin');
                return;
            }
            
            var data = {
                txtA_Title: txtA_Title.val(),
                txtA_Alias: txtA_Alias.val(),
                imgA_Image: imgA_Image,
                txtA_Description: txtA_Description.val(),
                txtA_Content: txtA_Content,
                arrayCategoryId: arrayCategoryId,
                arrayTags: arrayTags
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'insert',
                type:'POST',
                data:data,
                success:function(data){
                    console.log(data);
                    if ($.trim(data) == 'OK') {
                       swal({
                            title: "Thêm thành công!",
                            timer: 1000,
                            type: 'success'
                        });
                        // resetInput();
                        if (redirectPage) {
                            redirect("{{URL('quantri/posts')}}");
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
        }
        
    }

    function assignTitleToAlias(){
        var title = $.trim($("#txtA_Title").val());
        title = removeSigns(title);
        $("#txtA_Alias").val(title);
    }

    function SetFileField(fileUrl) {
        $('#imgA_Image').attr("src", fileUrl);
    }

    function addTags(){
        var nameTag = $("#txtA_Tag").val();
        var tag_id = checkTag(nameTag);
        if(tag_id == 0){
            addTagToDatabase($.trim(nameTag));
            addTagToList($.trim(newTagId), $.trim(nameTag))
        }else{
            addTagToList($.trim(tag_id), $.trim(nameTag))
        }
    }
    function removeTag(key) {
        // div contain key, name and value of property
        var keySpan = $(key).parent();
        // gỡ bỏ từ danh sách hiển thị
        keySpan.remove();
        // key and value
        var keyValue = keySpan.attr('id');
        // position of property to remove
        var index = arrayTags.indexOf(keyValue);
        // if exitst property in array then remove
        if (index > -1) {
            arrayTags.splice(index, 1);
        }
    }
    function addTagToDatabase(tag){
        var data = {
            hdNameTag:tag
        };
        var result = postAjax("addtag", data);
        newTagId =result;
    }

    function addTagToList(id, name){
        if ($.inArray(id, arrayTags) == -1) {
        arrayTags.push(id);
        var key = $('<span id="' + id + '"> <i style="cursor: pointer;margin-left:5px;" onclick="removeTag(this);" class="glyphicon glyphicon-remove-circle"></i><label>' + name + '</label></span>');
        key.appendTo('#tagList');
    }
    }
    function checkTag(nameTag){
        var data = {
            hdNameTag:nameTag
        };
        var result = postAjax("checktag", data);
        return result;
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
            <a class="my-btn-primary" style="color: #fff" href="#" onclick="addPost(true)">
                <i class="glyphicon glyphicon-floppy-open"></i>
                Lưu và thoát
            </a>
            <a href="#" class="my-btn-primary" style="color: #fff" onclick="addPost()">
                <i class="glyphicon glyphicon-floppy-open"></i>
                Lưu
            </a>
            <a href="{{URL('quantri/posts')}}" class="my-btn-warning" style="color: #fff">                              
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
                <div class="col-sm-9">
                    <div class="form-group"> 
                        <label for="txtA_Title" class="col-sm-3 control-label">
                            Tên
                            <span class="d_asterisk">*</span>                                
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" title="" id="txtA_Title" name="txtA_Title" placeholder="Tên">
                        </div>                     
                    </div>
                    <div class="form-group">
                        <label for="txtA_Alias" class="col-sm-3 control-label">
                            Định danh       
                            <span class="d_asterisk">*</span>  
                        </label>
                        <div class="col-sm-9">                                
                            <input type="text" value="" class="form-control" id="txtA_Alias" name="txtA_Alias" placeholder="Định danh">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtA_Image" class="col-sm-3 control-label">
                            Ảnh đại diện       
                        </label>
                        <div class="col-sm-9">                                
                            <img id="imgA_Image" src="{{URL::asset('/images/no_image.png')}}" style="width: 30px; height: 30px;" onclick="BrowseServer('Images')"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtA_Description" class="col-sm-3 control-label">
                            Mô tả 
                        </label>
                        <div class="col-sm-9">  
                            <textarea class="form-control" id="txtA_Description" name="txtA_Description"></textarea> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtA_Content" class="col-sm-3 control-label">
                            Nội dung
                        </label>
                        <div class="col-sm-9">  
                            <textarea class="form-control ckeditor" id="txtA_Content" name="txtA_Content"></textarea> 
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="postbox" id="categories_list">
                        <h2><span>Nhóm tin</span></h2>
                        <div class="inside">
                            <ul class="category_list">
                                @foreach($categories as $category)
                                    <li>
                                        @php echo $category->c_name;@endphp
                                    </li>
                                @endforeach     
                            </ul>
                        </div>
                    </div>
                    <div class="postbox">
                        <h2><span>Từ khóa</span></h2>
                        <div class="inside" style="margin: 10px;">
                            <input type="text" name="txtA_Tag" value="" id="txtA_Tag" placeholder="Từ khóa" class="input-tag">
                            <a href="#" class="btn-add-tag" onclick="addTags()">Thêm</a>
                            
                            <div class="tagList" id="tagList">
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection