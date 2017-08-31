<?php 
namespace App\Http\Controllers\RaoVat;
use App\Http\Controllers\Controller;
use App\Categories;
use App\City;
use App\Manufacturer;
use App\CarType;
use App\RaoVatPost;
use App\User;
use App\Model\AdsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class RaoVatAdController extends Controller{
    public function index(Request $request)
    {
        $isLogin = session('RVfullname') == null;
        $cities = $this->getCityList();
        $manufacturer = $this->getManufacturerList();
        $adsCategory = $this->getCategoryList();
        $user = User::where('u_username',decrypt(session('RVuser')))->first();
        return view('raovat/up_ad_main',array('cities'=>$cities,'manufacturers'=>$manufacturer,'adsCategories'=>$adsCategory,'user'=>$user,'isLogin'=>$isLogin));
    }
    public function postAd(Request $request){
        $userId = User::where('u_username',decrypt(session('RVuser')))->first()->id;
        $category = $request->input('category_id');
        $hangXe = $request->input('hang_xe');
        $hopSo = $request->input('hop_so');
        $xang = $request->input('xang');
        $mauXe = $request->input('color');
        $soKm = $request->input('km_number');
        $city = $request->input('city');

        $title = $request->input('title');
        $content = $request->input('content');
        $price = $request->input('price');

        $name = $request->input('fullname');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $address = $request->input('address');
        $time = $request->input('time_support');

        return "abc";
    }
    public function getCityList()
    {
        return City::all();
    }
    public function getManufacturerList()
	{	
		return Manufacturer::Active()->get();
	}
    public function getCategoryList()
    {
        return AdsCategory::Active()->get();
    }
}