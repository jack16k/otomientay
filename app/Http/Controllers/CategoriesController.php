<?php

namespace App\Http\Controllers;
use App\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function index(){
    	if(session('sUserName')==null){
			return redirect('/quantri');
		}else{
			$categories = $this->getListCategory(1);
			return view('/backend/categories/list',array('name'=>'Quản lý nhóm bài viết','categories'=>$categories,'stt'=>1, 'total'=> count($categories)));
		}
    }

    public function add(){
    	if(session('sUserName')==null){
			return redirect('/quantri');
		}else{
			$categories = $this->getListCategory(1);
			return view('/backend/categories/add',array('name'=>'Thêm nhóm bài viết','categories'=>$categories));
		}
    }
    public function checktitle(Request $request){
    	$title = $request->input('txtC_Title');
    	$categories = Categories::where('c_name',$title)->get();
    	if(count($categories)>0){
    		return "OK";
    	}else{
    		return "0";
    	}
    	
    }
    public function insert(Request $request){
    	$categories = new Categories;
    	$categories->c_name = $request->input('txtC_Title');
    	$categories->c_alias = $request->input('txtC_Alias');
    	$categories->c_description = $request->input('txtC_Description');
    	$categories->c_parent_id = $request->input('slC_ParentID');
    	$categories->c_avatar = $request->input('imgC_Image');
    	$categories->c_order = 0;
    	$categories->c_state = $request->input('rdoC_State');
    	$a = $categories->save();
    	if($a){
    		return 'OK';
    	}else{
    		return 'Loi';
    	}
    	
    }
    public function update(Request $request){

    	$datetime = new DateTime();
    	$c_id = $request->input('c_id');
    	$category = Categories::where('c_id',$c_id)->first();
    	if($category!=null && $category!=""){
    		$category->c_name = $request->input('txtC_Title');
	    	$category->c_alias = $request->input('txtC_Alias');
	    	$category->c_description = $request->input('txtC_Description');
	    	$category->c_parent_id = $request->input('slC_ParentID');
	    	$category->c_avatar = $request->input('imgC_Image');
	    	$category->c_order = 0;
	    	$a = $category->save();
	    	if($a){
	    		return 'OK';
	    	}else{
	    		return 'Loi';
	    	}
    	}else{
    		return 'Loi';
    	}
    	
    }
    public function edit($id){
    	$category = Categories::where('c_id',$id)->first();
    	$des = $category->c_description;
    	$categories = $this->getListCategory(1);
    	$selected_parent = 0;
    	foreach($categories as $c){
    		if($category->c_parent_id==$c->c_id){
    			$selected_parent = $c->c_id;
    			break;
    		}
    	}
    	return view('/backend/categories/edit',array('name'=>'Chỉnh sửa nhóm bài viết','category'=>$category,'categories'=>$categories,'selected_parent'=>$selected_parent,'des'=>$des));
    }

    public function delete(Request $request){
    	$arrayIds = $request->input('hdArrayID');
    	foreach($arrayIds as $id){
    		$category = Categories::find($id);
    		$category->c_state = 0;
    		$category->save();
    	}
    	return "OK";
    }

    public function getListCategory($state){
    	$list = Categories::where('c_state', $state)->get();
    	if(count($list) > 1){
    		return $this->getRecursionCategoryList(0, $list, array(), 0);
    	}else {
            return $list;
        }
    }
    private function getRecursionCategoryList($parent, $arr_in, $arr_out, $level) {
        $arr_child = $arr_in;
        foreach ($arr_in as $key => $value) {
            if ($value->c_parent_id == $parent) {
                $value->c_name = $level == 0 ? '<span style="color:#337ab7">' . $value->c_name . '</span>' : $value->c_name;
                $value->c_name = str_repeat('__', $level) . $value->c_name;
                $arr_out[] = $value;
                unset($arr_child[$key]);
                $arr_out = $this->getRecursionCategoryList($value->c_id, $arr_child, $arr_out, $level + 1);
            }
        }
        return $arr_out;
    }
}
