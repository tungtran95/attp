<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

//khi bao tu khoa use DB de tac dong vao csdl
use DB;
//bat cac form control
use Request;
use Hash;
use Session;
class UserController extends Controller{

	
	//=====================================User==========================
	public function list_user(){
		//lay du lieu tu bang user, co su dung ham de phan trang
		$data["users"] = DB::table("users")->orderBy('id', 'desc')->get();
		$data["title"]="Quản trị viên";	
		return view("admin.user.user",$data);
	}

	public function add_user(){
		$data["title"]="Thêm mới quản trị viên";
		return view("admin.user.add_user",$data);
	}

	public function edit_user($id){
		//lay du lieu tu bang user, co su dung ham de phan trang
		$data["arr"] = DB::table("users")->where("id","=",$id)->first();
		$data["title"]="Sửa thông tin quản trị viên";
		return view("admin.user.edit_user",$data);
	}

	public function do_edit_user($id){
		//lay du lieu tu bang user, co su dung ham de phan trang
		$name = Request::get("name");
		$email = Request::get("email");
		$remember_token = Request::get("_token");
		$password = Request::get("password");
		$role= Request::get("role");
		$c_img="";
		if (Request::hasFile('c_img')){
			$c_img = Request::file("c_img")->getClientOriginalName();
		}
		if(!empty($c_img)){
			$c_img = time()."_".$c_img;
			//upload anh
			Request::file("c_img")->move("public/upload/admin/",$c_img);
			DB::update("update users set c_img='$c_img' where id=$id");
		}

		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$date= date('Y-m-d H:i:s');
		DB::update("update users set name='$name',email='$email',updated_at='$date',role='$role',remember_token='$remember_token' where id=$id");
		if(!empty($password)){
			$password = Hash::make($password);
			DB::update("update users set password='$password' where id=$id");
		}
		return redirect("/admin/quan-tri-vien");
	}
	
	public function do_add_user(){
		//lay du lieu tu bang user, co su dung ham de phan trang
		$name = Request::get("name");
		$email = Request::get("email");
		$remember_token = Request::get("_token");
		$password = Request::get("password");
		$password_confirmation=Request::get("password_confirmation");
		$role= Request::get("role");
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$date= date('Y-m-d H:i:s');
		$data["arr"] = DB::table("users")->where("email","=",$email)->first();
		$c_img="";
		if (Request::hasFile('c_img')){
			$c_img = Request::file("c_img")->getClientOriginalName();
		}
		if(!empty($c_img)){
			$c_img = time()."_".$c_img;
			//upload anh
			Request::file("c_img")->move("public/upload/admin/",$c_img);
		}
		if($password_confirmation==$password && $data["arr"]==""){
			$password = Hash::make($password);
			DB::insert("insert into users(name,email,password,created_at,updated_at,role,c_img,remember_token) values('$name','$email','$password','$date','$date','$role','$c_img','$remember_token')");
			Session::forget('errorRegister');
			return redirect("/admin/quan-tri-vien");
		}
		else {
			Session::put('errorRegister','(*) Email is exits or comfirm password error. Please review again!');
			return redirect("/admin/them-admin");
		}
	}

	public function delete_user($id){
		//lay du lieu tu bang user, co su dung ham de phan trang
		DB::delete("delete from users where id=$id");
		return redirect("/admin/quan-tri-vien");
	}
}