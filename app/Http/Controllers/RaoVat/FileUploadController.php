<?php 
namespace App\Http\Controllers\RaoVat;
use App\Http\Controllers\Controller;
use App\Model\RaoVat\RaoVatImageUploader;
use App\Model\AdsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;

class FileUploadController extends Controller{
    protected $image;
    public function __construct(RaoVatImageUploader $image){
        $this->image = $image;
    }
    public function upload(Request $request)
    {
        
        $photo = $request->all();
        $response = $this->image->upload($photo);
        return $response;
    }
    public function delete(Request $request,$filename)
    {
        if(!$filename){return;}
        return $this->image->delete($filename);
    }
}