<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


//khi bao tu khoa use DB de tac dong vao csdl
use DB;
//bat cac form control
use Request;
use Hash;
use Session;
class HomeController extends Controller{
	public function home(){
		$data["title"]="Admin's Page";
		return view("admin.home",$data);
	}
	
	
}

