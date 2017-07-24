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
	var n_cb = 0;
	function checkAll(n){
		var checked = cbAll.checked;
		var n2 = 0;
		for (var i = 1; i <= n; i++) {
			cb = eval("cb"+i);
	        if (cb) {
	            cb.checked = checked;
	            n2++;
	        }
		}
		if(checked){
			n_cb = n2;
		}else{
			n_cb = 0;
		}
	}
	function isChecked(checked){
		if(checked){
			n_cb++;
		}else{
			n_cb--;
		}
	}

	function deleteCategory(ID) {
		var confirmText = '';
		if (ID == null) {
			if(n_cb==0){
				swal("Thông báo", 'Vui lòng chọn một đối tượng từ danh sách', "warning");
				return;
			}else{
				confirmText = 'Bạn có chắc chắn muốn xóa những nhóm bài viết được chọn không?';
			}
		}else{
			confirmText = 'Bạn có chắc chắn muốn xóa nhóm bài viết này không?';
		}
		swal({
            title: confirmText,
            text: 'Vui lòng nhấn OK để xoá',
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            closeOnCancel: true
        },
        function (isConfirm) {
            if (isConfirm) {
                var arrayID = new Array();
                if (ID == null) {
                    $('input[name="cid[]"]:checked').each(function () {
                        var value = $(this).val();
                        arrayID.push(value);
                    });
                } else {
                    arrayID.push(ID);
                }
               
                var data_save = {
                    hdArrayID: arrayID
                };
                var result = postAjax("categories/delete", data_save);
                if (result == 'OK') {
                    swal({
                        title: "Thao tác thành công!",
                        timer: 500,
                        type: 'success'
                    });
                    window.location.reload();
                } else {
                    swal("Lỗi", result, "error");
                }
            }
        });
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
	        <a class="my-btn-primary" style="color: #fff" href="{{URL('quantri/categories/add')}}" >
	            <i class="glyphicon glyphicon-plus"></i>
	            Thêm mới
	        </a>
            <a href="#" class="my-btn-danger" style="color: #fff" onclick="deleteCategory()">
                <i class="glyphicon glyphicon-remove"></i>
                Xóa
            </a>
        </div>
	</div>
	<div class="d_divide10"></div>
	<div class="row" style="background-color: #fff; margin: 0px;">	
		<div class="col-sm-12" style="padding: 0px;">
			<div class="table-responsive">
				<table class="table table-hover my-table" cellspacing="1" >
					<thead>
						<tr>
							<th width="1%"> # </th>
							<th width="1%">
			                    <input name="cbAll" id="cbAll" value="" onclick="checkAll('{{$total}}');" type="checkbox">
			                </th>
			                <th width="3%" align="center">Ảnh</th>
			                <th width="26%">
			                    <a href="#" id="C_Title" onclick="">Tên</a>
			                </th>
			                <th width="15%">
			                    Slug
			                </th>
			                <th width="12%">
			                    Mô tả
			                </th>  
			                <th align="center" width="3%">Sửa</th>
			                <th align="center" width="3%">Xoá</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
							<tr>
								<td class="text-center">{{$stt}}</td>
								<td>
				                    <input id="cb{{$stt++}}" name="cid[]" value="{{$category->c_id}}" onclick="isChecked(this.checked);" type="checkbox">
				                </td>
				                <td>
				                    <img src="{{$category->c_avatar}}" style="width: 30px; height: 30px" title="Ảnh sai đường dẫn"/>
				                </td>
				                <td style="color: #337ab7;">
				                @php echo $category->c_name; @endphp
				                </td>
				                <td>
				                {{$category->c_alias}}
				                </td>
				                <td>
				                @php echo $category->c_description; @endphp
				                </td>
				                
				                <td align="center"> 
				                	<a href="{{URL('quantri/categories/edit').'/'.$category->c_id}}" class="">
				                        <i class="glyphicon glyphicon-edit"></i>
				                    </a>
				                </td>
				                <td align="center"> 
				                	<a href="#" style="color: #c12e2a;" onclick="deleteCategory({{$category->c_id}})">
				                        <i class="glyphicon glyphicon-trash"></i>
				                    </a>
				                </td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection