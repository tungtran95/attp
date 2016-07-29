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
class LinkController extends Controller{

	
	//===============================================================
	public function list_link(){
		//lay du lieu tu bang user, co su dung ham de phan trang
		
			if(Cookie::get('lang') != null) {
				$lang= Cookie::get('lang');
			}
			else {
				$lang='vn';
				Cookie::queue('lang', 'vn', 4500000);
			}
			$data["list_link"] = DB::table("tbl_link")->get();
			
			$data["title"]="Danh sách website liên kết";	
			return view("admin.link.link",$data);
		
	}
	//======================================================================
	public function add_link(){
		//lay du lieu tu bang user, co su dung ham de phan trang
		
			$data["title"]="Thêm mới liên kết";	
			return view("admin.link.add_link",$data);
		
	}

	//===================================================================
	public function do_add_link(){
		//lay du lieu tu bang user, co su dung ham de phan trang
			
			$c_name = Request::get("c_name");
			$c_link = Request::get("c_link");
			
			
			$c_img="";
			if (Request::hasFile('c_img')){
				$c_img = Request::file("c_img")->getClientOriginalName();
			}
			if(!empty($c_img)){
				$c_img = time()."_".$c_img;
				//upload anh
				Request::file("c_img")->move("public/upload/link/",$c_img);
				DB::insert("insert into tbl_link(c_name,c_link,c_img) values('$c_name','$c_link','$c_img')");
				return redirect("/admin/link");
			}
			else {
				$data["c_name"]=$c_name;
				$data["c_link"]=$c_link;
				$data["c_error"]="(*) Upload ảnh ko thành công! Vui lòng kiểm tra lại các thông tin dưới đây.";
				$data["title"]="Thêm mới liên kết";	
				return view("admin.link.add_link",$data);
			}
			

		
	}
	//======================================================================
	public function edit_link($id){
		//lay du lieu tu bang user, co su dung ham de phan trang
			$data['arr']=DB::table("tbl_link")->where("pk_link_id","=",$id)->first();
			$data["title"]="Chỉnh sửa liên kết ";	
			return view("admin.link.edit_link",$data);
		
	}

	//===================================================================
	public function do_edit_link($id){
		//lay du lieu tu bang user, co su dung ham de phan trang
			$c_name = Request::get("c_name");
			$c_link = Request::get("c_link");
			
			
			$c_img="";
			if (Request::hasFile('c_img')){
				$c_img = Request::file("c_img")->getClientOriginalName();
			}
			if(!empty($c_img)){
				$c_img = time()."_".$c_img;
				//upload anh
				Request::file("c_img")->move("public/upload/link/",$c_img);
				DB::update("UPDATE tbl_link SET c_img='$c_img' WHERE pk_link_id=$id");
				
			}
			
			DB::update("UPDATE tbl_link SET c_name='$c_name',c_link='$c_link' WHERE pk_link_id=$id");
			return redirect("/admin/link");	
			
		
	}
	//==================================================
	public function delete_link($id){
		DB::delete("delete from tbl_link where pk_link_id=$id");
		return redirect("/admin/link");
	}
}