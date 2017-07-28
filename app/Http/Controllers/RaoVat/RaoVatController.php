<?php 
namespace App\Http\Controllers\RaoVat;
use App\Http\Controllers\Controller;
use App\Categories;
use App\City;
use App\Manufacturer;
use App\CarType;
use App\RaoVatPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class RaoVatController extends Controller{
    public function index(Request $request)
    {
		$path=$request->path();
		$page=$request->input('page',1);
		$filterManu = $request->input('manufacturer',0);
		$filterType = $request->input('type',0);
		$filterCity = $request->input('location_city_id',0);
		$filterMin = $request->input('minvalue',0);
		$filterMax = $request->input('maxvalue',0);
        $categories = $this->getListCategories(1, 0);
        $cities = $this->getCityList();
		$manufacturer = $this->getManufacturerList();
		$carTypes = $this->getCarTypeList();
		$posts = $this->getResult($filterType,$filterManu,$filterCity,$filterMin,$filterMax);
        return view('raovat/main',array('categories'=>$categories, 'cities'=>$cities,'manufacturers'=>$manufacturer,'carTypes'=>$carTypes,'posts'=>$posts,'index'=>0));
    }
	public function getItem($alias)
	{
		$categories = $this->getListCategories(1, 0);
		return view('raovat/item',array('categories'=>$categories));
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
	public function getResult($type,$manufacturer,$city,$min,$max)
	{
		$query = DB::table('items')->
					join('loaixe','loaixe.lx_id','=','items.lx_id')->
					join('hangxe','hangxe.hx_id','=','items.hx_id')->
					join('thanhpho','thanhpho.tp_id','=','items.tp_id')->
					where('items.p_state',1);
		if($type != 0){
			$query->where('loaixe.lx_alias',$type);
		}
		if(!is_numeric($manufacturer) || $manufacturer != 0){
			$query->where('hangxe.hx_alias',$manufacturer);
		}
		if(!is_numeric($city) || $city != 0){
			$query->where('thanhpho.tp_alias',$city);
		}
		if($min != 0){
			print($min);
			$query->where('items_price','>=',$min);
		}
		if($max != 0){
			print($max);
			$query->where('items_price','<=',$max);
		}
		return $query->paginate(12);
	}
}