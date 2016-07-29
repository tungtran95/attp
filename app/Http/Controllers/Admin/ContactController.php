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
use Cookie;
class ContactController extends Controller{

	
	//===============================================================
	public function list_contact(){
		//lay du lieu tu bang user, co su dung ham de phan trang
		if(Auth::user()->role < 2){
			if(Cookie::get('lang') != null) {
				$lang= Cookie::get('lang');
			}
			else {
				$lang='vn';
				Cookie::queue('lang', 'vn', 4500000);
			}
			
			$data["list_contact"] = DB::table("tbl_contact")->get();
			
			$data["title"]="Danh sách liên hệ";	
			return view("admin.contact.contact",$data);
		}
		else {
			$data["title"]="Admin's Page";
			return view("admin.home",$data);
		}
	}
	//======================================================================
	
	//======================================================================
	public function edit_contact($id){
		if(Auth::user()->role < 2){
		//lay du lieu tu bang user, co su dung ham de phan trang
			$data['arr']=DB::table("tbl_contact")->where("pk_contact_id","=",$id)->first();
			$data["title"]="Contact | Xem liên hệ ";	
			return view("admin.contact.edit_contact",$data);
			}
		else {
			$data["title"]="Admin's Page";
			return view("admin.home",$data);
		}
	}

	//===================================================================
	public function do_edit_contact($id){
		//lay du lieu tu bang user, co su dung ham de phan trang
		if(Auth::user()->role < 2){	
			
			DB::update("UPDATE tbl_contact SET c_status=1 WHERE pk_contact_id=$id");
			return redirect("/admin/contact");
			
		}
		else {
			$data["title"]="Admin's Page";
			return view("admin.home",$data);
		}	
		
	}
	//==================================================
	public function delete_contact($id){
		if(Auth::user()->role < 2){
			DB::delete("delete from tbl_contact where pk_contact_id=$id");
			return redirect("/admin/contact");
		}
		else {
			$data["title"]="Admin's Page";
			return view("admin.home",$data);
		}		
	}
}