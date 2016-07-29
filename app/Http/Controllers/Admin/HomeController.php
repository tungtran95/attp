<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


//khi bao tu khoa use DB de tac dong vao csdl
use DB;
//bat cac form control
use Request;
use Hash;
use Session;
use Cookie;
class HomeController extends Controller{
	public function home(){
		//echo Cookie::get('lang');

		if(Cookie::get('lang') != null) {
			$lang= Cookie::get('lang');
		}
		else {
			$lang='vn';
			Cookie::queue('lang', 'vn', 4500000);
		}
		if($lang=='en'){
			$data["title"]="Admin's Page";
		}
		if($lang=='vn') {
			$data["title"]="Trang quản trị";
		}
		return view("admin.home",$data);
	}
	
	public function en(){
		Cookie::queue('lang', 'en', 4500000);
		$data["title"]="Admin's Page";
		return view("admin.home",$data);
	}
	public function vn(){
		Cookie::queue('lang', 'vn', 4500000);
		$data["title"]="Trang quản trị";
		return view("admin.home",$data);
	}
}

