<?php

namespace App\Http\Controllers;
use App\Posts;
use App\Categories;
use App\Tags;
use App\PostsTags;
use App\CategoriesPosts;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
class PostsController extends Controller
{
    //
    public function index(){
    	if(session('sUserName')==null){
			return redirect('/quantri');
		}else{
			$orderBy = "p_id";
			$posts = Posts::paginate(10);
			return view('/backend/posts/list',array('name'=>'Quản lý bài viết','posts'=>$posts,'stt'=>1, 'total'=> count($posts)));
		}
    }

    public function add(){
    	if(session('sUserName')==null){
			return redirect('/quantri');
		}else{
			$categories = $this->getListCategory(1);
			return view('/backend/posts/add',array('name'=>'Thêm bài viết','categories'=>$categories,'stt'=>1));
		}
    }

    public function insert(Request $request){
    	$txtA_Title =  $request->input("txtA_Title");
        $txtA_Alias = $request->input("txtA_Alias");
        $imgA_Image = $request->input("imgA_Image");
        $txtA_Description = $request->input("txtA_Description");
        $txtA_Content = $request->input("txtA_Content");
        $arrayCategoryId = $request->input("arrayCategoryId");
        $arrayTags = $request->input("arrayTags");
        $post = new Posts;
        $post->p_title = $txtA_Title;
        $post->p_alias = $txtA_Alias;
        $post->p_description = $txtA_Description;
        $post->p_content = $txtA_Content;
        $post->p_image = $imgA_Image;
        $post->p_order = 0;
        $post->p_state = 1;
        $post->p_createuser = 1;
        $post->p_modifyuser = 1;
        $post->save();
        if($arrayCategoryId != null && $arrayCategoryId!=""){
        	foreach($arrayCategoryId as $catId){
        		$post_category = new CategoriesPosts;
        		$post_category->p_id = $post->p_id;
        		$post_category->c_id = $catId;
        		$post_category->save();
        	}
        }
        if($arrayTags != null && $arrayTags!=""){
        	foreach($arrayTags as $tag){
        		$post_tag = new PostsTags;
        		$post_tag->p_id = $post->p_id;
        		$post_tag->tag_id = $tag;
        		$post_tag->save();
        	}
        }
        return "OK";

    }
    public function checktag(Request $request){
    	$nametag = $request->input("hdNameTag");
    	$tag = Tags::where('tag_title',$nametag)->first();
    	if($tag != null && $tag != ""){
    		return $tag->tag_id;
    	}else{
    		return "0";
    	}
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
        $i = 1;
        foreach ($arr_in as $key => $value) {
            if ($value->c_parent_id == $parent) {
                // $value->c_name = $level == 0 ? '<span style="color:#337ab7">' . $value->c_name . '</span>' : $value->c_name;
                
                $value->c_name = str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $level).'<input type="checkbox" name="cid[]" id="cb'.$value->c_id.'" value="'.$value->c_id.'">&nbsp;&nbsp;'.$value->c_name;
                $arr_out[] = $value;
                unset($arr_child[$key]);
                $arr_out = $this->getRecursionCategoryList($value->c_id, $arr_child, $arr_out, $level + 1);
            	$i++;
            }
        }
        return $arr_out;
    }
}
