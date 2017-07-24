<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Posts;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
class FrontendController extends Controller
{
    //
    public function index(){
		$categories = $this->getListCategories(1, 0);
		$new_posts = $this->getNewListPosts();
		$posts = $this->getPostByCategory();
		return view('frontend.front',array('categories'=>$categories, 'new_posts'=>$new_posts, 'posts'=>$posts,'index'=>0));
	}
	public function showpostincategory($alias){
		$categories = $this->getListCategories(1, 0);
		$cate = $this->getCategoryByAlias($alias);
		$posts = DB::table('posts')
    					->join('categories_posts','posts.p_id','=','categories_posts.p_id')
    					->join('categories','categories.c_id','=','categories_posts.c_id')
    					->where('c_state',1)
    					->where('categories.c_id', $cate->c_id)
    					->orderBy('posts.created_at','desc')
    					->get();
		return view('frontend.post_category',array('categories'=>$categories,'cate'=>$cate, 'posts'=>$posts));
	}
	public function showpost($c_alias, $p_alias){
		$categories = $this->getListCategories(1, 0);
		$post = Posts::where('p_alias',$p_alias)->get()->first();
		return view('frontend.post',array('categories'=>$categories,'post'=>$post));
	}

	public function getCategoryByAlias($alias){
		$category = Categories::where('c_alias',$alias)->get()->first();
		return $category;
	}

	public function getListCategories($state, $parent){
		$arr_out = "";
    	$lists = Categories::where('c_state', $state)->where('c_parent_id',$parent)->get();
    	if(count($lists) > 1){
    		foreach($lists as $list){
    			$childLists = Categories::where('c_state', $state)->where('c_parent_id',$list->c_id)->get();
    			if($childLists!=null && $childLists!="" && count($childLists)>0){
    				$arr_out = $arr_out. "<li class='dropdown'><a href='".url('/').'/'.$list->c_alias."' class='dropdown-toggle' aria-haspopup='true'>".$list->c_name."</a>";
    				$arr_out = $arr_out."<ul class='dropdown-menu'>";
    				$arr_out = $arr_out. $this->getListCategories($state, $list->c_id);
    				$arr_out = $arr_out."</ul></li>";
    				
    			}else{
    				$arr_out = $arr_out."<li><a href='".url('/').'/'.$list->c_alias."'>".$list->c_name."</a></li>";
    			}
    		}
    	}
        return $arr_out;
    }

    public function getNewListPosts(){
    	$new_posts = Posts::where('p_state', 1)->orderBy('created_at', 'desc')->limit(3)->get();
    	return $new_posts;
    }
    public function getPostByCategory(){
    	$arr_out = array();
    	$arr_post = array();
    	$arr_cat = array();
    	$categories = Categories::where('c_state',1)->where('c_parent_id',0)->get();
    	foreach($categories as $category){
    		$posts = DB::table('posts')
    					->join('categories_posts','posts.p_id','=','categories_posts.p_id')
    					->join('categories','categories.c_id','=','categories_posts.c_id')
    					->where('c_state',1)
    					->where('categories.c_id', $category->c_id)
    					->orderBy('posts.created_at','desc')
    					->limit(3)
    					->get();
    		if(count($posts)>0){
    			array_push($arr_post,$posts);
    			array_push($arr_cat,$category);
    		}
    	}
    	$arr_out[0]=$arr_cat;
    	$arr_out[1]=$arr_post; 
    	return $arr_out;
    }
}
