<?php 
namespace App\Http\Controllers\RaoVat;
use App\Http\Controllers\Controller;
use App\Categories;
use App\Posts;
use App\City;
use App\Manufacturer;
use App\CarType;
use App\RaoVatPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class RaoVatController extends Controller{
    public function index()
    {
        $categories = $this->getListCategories(1, 0);
		// $new_posts = $this->getNewListPosts();
		// $posts = $this->getPostByCategory();
        $cities = $this->getCityList();
		$manufacturer = $this->getManufacturerList();
		$carTypes = $this->getCarTypeList();
		$posts = $this->getResult("","","");
        return view('raovat/main',array('categories'=>$categories, 'cities'=>$cities,'manufacturers'=>$manufacturer,'carTypes'=>$carTypes,'posts'=>$posts,'index'=>0));
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
    public function getCityList()
    {
        return City::all();
    }
	public function getManufacturerList()
	{	
		return Manufacturer::Active()->get();
	}
	public function getCarTypeList()
	{
		return DB::table('loaixe')->join('hangxe','loaixe.hx_id','=','hangxe.hx_id')->where('hangxe.hx_state',1)
		->where('loaixe.lx_state',1)->select('loaixe.*','hangxe.hx_alias')->get();
	}
	public function getResult($type,$manufacturer,$city)
	{
		return RaoVatPost::paginate(12);
	}
}