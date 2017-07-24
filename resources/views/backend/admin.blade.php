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
<div class="container">
	<div class="row">
		<div class="col-md-3 col-sm-6">
	        <a href="{{url('quantri/categories')}}">
	            <div class="d_icon">
	                <div class="col-xs-4 text-center" style="background: #6ccac9">
	                    <div class="d_divide10"></div>
	                    <div class="icon_48 icon_category"></div>
	                    <div class="d_divide10"></div>
	                </div>
	                <div class="col-xs-8">     
	                    <div class="d_number"></div>
	                    <div class="d_text">Nhóm bài viết</div>
	                </div>   

	                <div class="clearfix"></div>                 
	            </div>
	        </a>
	    </div>
	    <div class="col-md-3 col-sm-6">
	        <a href="{{URL('quantri/posts')}}">
	            <div class="d_icon">
	                <div class="col-xs-4 text-center" style="background: #ff6c60">
	                    <div class="d_divide10"></div>
	                    <div class="icon_48 icon_article"></div>
	                    <div class="d_divide10"></div>
	                </div>
	                <div class="col-xs-8">     
	                    <div class="d_number"></div>
	                    <div class="d_text">Bài viết</div>
	                </div>   
	                <div class="clearfix"></div>                 
	            </div>
	        </a>
	    </div>
	    <div class="col-sm-6 col-md-3">
	        <a href="#">
	            <div class="d_icon">
	                <div class="col-xs-4 text-center" style="background: #a9d85e">
	                    <div class="d_divide10"></div>
	                    <div class="icon_48 icon_item_category"></div>
	                    <div class="d_divide10"></div>
	                </div>
	                <div class="col-xs-8">     
	                    <div class="d_number"></div>
	                    <div class="d_text">
	                        Nhóm sản phẩm
	                    </div>
	                </div>     
	                <div class="clearfix"></div> 
	            </div>
	        </a>
	    </div>
	    <div class="col-sm-6 col-md-3">
	        <a href="#">
	            <div class="d_icon">
	                <div class="col-xs-4 text-center" style="background: #41cac0">
	                    <div class="d_divide10"></div>
	                    <div class="icon_48 icon_item"></div>
	                    <div class="d_divide10"></div>
	                </div>
	                <div class="col-xs-8">     
	                    <div class="d_number"></div>
	                    <div class="d_text">
	                        Sản phẩm
	                    </div>
	                </div>   
	                <div class="clearfix"></div> 
	            </div>
	        </a>
	    </div>
	    <div class="col-sm-6 col-md-3">
	        <a href="#">
	            <div class="d_icon">
	                <div class="col-xs-4 text-center" style="background: #fcb322">
	                    <div class="d_divide10"></div>
	                    <div class="icon_48 icon_group"></div>
	                    <div class="d_divide10"></div>
	                </div>
	                <div class="col-xs-8">     
	                    <div class="d_number"></div>
	                    <div class="d_text">
	                        Nhóm người dùng
	                    </div>
	                </div>   
	                <div class="clearfix"></div> 
	            </div>
	        </a>
	    </div>
	    <div class="col-sm-6 col-md-3">
	        <a href="#">
	            <div class="d_icon">
	                <div class="col-xs-4 text-center" style="background: #8075c4">
	                    <div class="d_divide10"></div>
	                    <div class="icon_48 icon_user"></div>
	                    <div class="d_divide10"></div>
	                </div>
	                <div class="col-xs-8">     
	                    <div class="d_number"></div>
	                    <div class="d_text">
	                        Thành viên
	                    </div>
	                </div>   
	                <div class="clearfix"></div> 
	            </div>
	        </a>
	    </div>
	    <div class="col-sm-6 col-md-3">
	        <a href="#">
	            <div class="d_icon">
	                <div class="col-xs-4 text-center" style="background: #1c94c6">
	                    <div class="d_divide10"></div>
	                    <div class="icon_48 icon_statistic"></div>
	                    <div class="d_divide10"></div>
	                </div>
	                <div class="col-xs-8">  
	                    <div class="d_text">
	                        Thống kê số lượt truy cập
	                    </div>
	                </div>  
	                <div class="clearfix"></div> 
	            </div>
	        </a>
	    </div>
	</div>
</div>
@endsection
