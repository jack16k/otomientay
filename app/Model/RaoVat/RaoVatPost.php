<?php

namespace App\Model\RaoVat;

use Validator;
use Illuminate\Support\Facades\Storage;
use App\Model\RaoVat\RaoVatImage;
use Illuminate\Support\Facades\DB;

class RaoVatPost{
    private $title,$content,$price;
    private $imageList = array();
    private $catergory,$km,$color,$xang,$hopso,$hangXe,$city;
    private $name,$phone,$email,$address,$time;
    private $userId;

    private $isError = false;
    private $errorMessage = "";
    public function setTitle($title){$this->title = $title;}
    public function setContent($content){$this->content = $content;}
    public function setPrice($price){$this->price = $price;}
    public function addImage($image){$this->imageList[] = $image;}
    public function setCatergory($catergory){$this->catergory = $catergory;}
    public function setKm($km){$this->km = $km;}
    public function setColor($color){$this->color = $color;}
    public function setXang($xang){$this->xang = $xang;}
    public function setHopso($hopso){$this->hopso = $hopso;}
    public function setHangxe($hangXe){$this->hangXe = $hangXe;}
    public function setCity($city){$this->city = $city;}
    public function setName($name){$this->name = $name;}
    public function setPhone($phone){$this->phone = $phone;}
    public function setEmail($email){$this->email = $email;}
    public function setAddress($address){$this->address = $address;}
    public function setTime($time){$this->time = $time;}
    public function setUserId($id){$this->userId=$id;}
    public function save(){
        
        $id = DB::table('selling_ads')->insertGetId(
            [
                'sa_title'=>$this->title,
                'sa_content'=>$this->content,
                'sa_price'=>$this->price,
                'sa_km'=>$this->km,
                'sa_hopso'=>$this->hopso,
                'sa_xang'=>$this->xang,
                'sa_mau'=>$this->color,
                'sa_name'=>$this->name,
                'sa_address'=>$this->address,
                'sa_email'=>$this->email,
                'sa_phone'=>$this->phone,
                'sa_time'=>$this->time,
                'sa_creator'=>$this->userId
            ]
        );
        $cityId = DB::table('thanhpho')->where('tp_alias',$this->city)->first()->tp_id;
        DB::table('ads_belong_city')->insert([
            'c_id'=>$cityId,
            'a_id'=>$id
        ]);
        $hangXeId = DB::table('hangxe')->where('hx_alias',$this->hangXe)->first()->hx_id;
        DB::table('ads_belong_city')->insert([
            'c_id'=>$cityId,
            'a_id'=>$id
        ]);
    }
}