<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

//khi bao tu khoa use DB de tac dong vao csdl
use DB;
//bat cac form control
use Request;
use Hash;
use Session;
use Auth;
class ProfileController extends Controller{

	
	//===============================================================
	public function list_profile(){
		//lay du lieu tu bang user, co su dung ham de phan trang
		if(Auth::user()->role==0){
			$data["profiles"] = DB::table("tbl_profile")->take(2)->get();
			$data["title"]="Cấu hình";	
			return view("admin.profile.profile",$data);
		}
		else {
			$data["title"]="Admin's Page";
			return view("admin.home",$data);
		}
	}

	public function edit_profile($id){
		//lay du lieu tu bang user, co su dung ham de phan trang
		if(Auth::user()->role==0){
			$data["arr"] = DB::table("tbl_profile")->where("pk_profile_id","=",$id)->first();
			$data["title"]="Chỉnh sửa cấu hình";	
			return view("admin.profile.edit_profile",$data);
		}
		else {
			$data["title"]="Admin's Page";
			return view("admin.home",$data);
		}
	}

	public function do_edit_profile($id){
		//lay du lieu tu bang user, co su dung ham de phan trang
		if(Auth::user()->role==0){
			$uni = new UniController();
			$c_name = Request::get("c_name");
			$c_description = Request::get("c_description");
			$c_description = $uni->removeP($c_description);
			$c_content = Request::get("c_content");
			$c_keyword= Request::get("c_keyword");
			$c_google_map = Request::get("c_google_map");
			$c_address= Request::get("c_address");
			$c_phone = Request::get("c_phone");
			$c_email= Request::get("c_email");
			$c_facebook= Request::get("c_facebook");
			$c_skype = Request::get("c_skype");
			$c_yahoo= Request::get("c_yahoo");
			$c_flickr= Request::get("c_flickr");
			
			DB::update("UPDATE tbl_profile SET c_name='$c_name',c_description='$c_description',c_content='$c_content',c_address='$c_address',c_phone='$c_phone',c_email='$c_email',c_facebook='$c_facebook',c_google_map='$c_google_map',c_skype='$c_skype',c_yahoo='$c_yahoo',c_flickr='$c_flickr',c_keyword='$c_keyword' WHERE pk_profile_id=$id");
			
			return redirect("/admin/profile");
			
		}
		else {
			$data["title"]="Admin's Page";
			return view("admin.home",$data);
		}
	}
}