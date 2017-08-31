<?php

namespace App\Model\RaoVat;

use Validator;
use Illuminate\Support\Facades\Storage;
use App\Model\RaoVat\RaoVatImage;

class RaoVatImageUploader{
    public function upload($form){
        $validiator = Validator::make($form,$this->valadiateRule(),$this->errorMessage());
        if($validiator->fails()){
            // return Response::json();
            return response()->json(['error'=>true,'message'=>$validiator->messages()->first(),'code'=>400],400);
        }
        $file = $form['file'];

        $fileFullName = $file->getClientOriginalName();

        $ext = $file->getClientOriginalExtension();
        $fileName = substr($fileFullName,0,strlen($fileFullName) - strlen($ext) - 1);
        $cleanFileName = $this->sanitizeName($fileName);
        
        $name = Storage::putFile('image',$file);
        $nameArr = explode('/',$name);
        $fileSaveName = $nameArr[count($nameArr) - 1];
        $image = new RaoVatImage;
        $image->name = $fileSaveName;
        $image->save();
        $previous = session('uploadImage',[]);
        $previous[$fileFullName] = $fileSaveName;
        session(['uploadImage'=>$previous]);
        return response()->json(['error'=>false,'name'=>session('uploadImage',[]),'code'=>201],201);
    }
    public function delete($filename){
        $uploadFiles = session('uploadImage');
        $uploadFileSaveName = null;
        foreach($uploadFiles as $originName => $saveName){
            if($originName == $filename){$uploadFileSaveName = $saveName;}
        }
        if($uploadFileSaveName == null){
            return response()->json(['error'=>true,'msg'=>'no file','code'=>404],404);
        }
        $image = Storage::delete('image/'.$uploadFileSaveName);
        $RVimage = RaoVatImage::Active()->where('name',$uploadFileSaveName)->first();
        $RVimage->isValid = 0;
        $RVimage->save();
        return response()->json(['error'=>true,'msg'=>(string)$RVimage,'code'=>200],200);
    }
    
    public function valadiateRule(){
        return ['file'=>'required|mimes:png,jpg,gif,jpeg,bmp'];
    }
    public function errorMessage(){
        return ['file.mime'=>'Loi dinh dang','file.required'=>'Chua chon file'];
    }
    public function sanitizeName($string){
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]","}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;","â€”", "â€“", ",", "<", ".", ">", "/", "?");
        $removeStrangeChar = str_replace($strip,"",$string);
        $removeSpace = preg_replace("/\s+/","-",$removeStrangeChar);
        return $removeSpace;
    }
}