<?php

namespace App\Http\Controllers\Backend;
use App\User;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    //
    public function index(){
    	if(session('sUserName')==null){
			return view('/backend/login');
		}else{
			return view('/backend/admin');
		}
    }

    
    //user Authentication
    public function login(Request $request){
    	$u_u = $request->input('hdUserName');
    	$u_p = $request->input('hdPass');
    	$u = User::where('u_username',$u_u)->first();
    	if($u!= null & $u != ""){
    		
    		if($u_p ==  decrypt($u->u_pass)){
                session(['sUserName' => encrypt($u->u_username)]);
                session(['sFullName' => $u->u_fullname]);
                return "OK";
            }
            return "vui lòng kiểm tra lại tài khoản và mật khẩu!!!";
    	}else{
    		var_dump(encrypt("admin"));
    		return encrypt("admin");
    		// return "vui lòng kiểm tra lại tài khoản và mật khẩu!!!";
    	}
    }
    public function logout(){
    	session()->flush();
        return redirect('/quantri');
    }
}
