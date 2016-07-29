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
class ServiceController extends Controller{

	
	//===============================================================
	public function list_service(){
		//lay du lieu tu bang user, co su dung ham de phan trang
		
			if(Cookie::get('lang') != null) {
				$lang= Cookie::get('lang');
			}
			else {
				$lang='vn';
				Cookie::queue('lang', 'vn', 4500000);
			}
			if($lang=='en'){
				$data["list_service"] = DB::table("tbl_service")->where("c_lang","=","en")->get();
			}
			if($lang=='vn'){
				$data["list_service"] = DB::table("tbl_service")->where("c_lang","=","vn")->get();
			}
			$data["title"]="Bài viết";	
			return view("admin.service.service",$data);
		
	}
	//======================================================================
	public function add_service(){
		//lay du lieu tu bang user, co su dung ham de phan trang
		
			$data["title"]="Thêm mới bài viết giới thiệu";	
			return view("admin.service.add_service",$data);
		
	}

	//===================================================================
	public function do_add_service(){
		//lay du lieu tu bang user, co su dung ham de phan trang
			$uni = new UniController();
			$c_name = Request::get("c_name");
			$c_description = Request::get("c_description");
			
			$c_content = Request::get("c_content");
			$c_lang= Request::get("c_lang");		
			$fk_category_service_id= Request::get("fk_category_service_id");
			$c_slug=$uni->Slug($c_name);
			$c_date= date('d/m/Y');
			$c_img="";
			if (Request::hasFile('c_img')){
				$c_img = Request::file("c_img")->getClientOriginalName();
			}
			if(!empty($c_img)){
				$c_img = time()."_".$c_img;
				//upload anh
				Request::file("c_img")->move("public/upload/service/",$c_img);
			}

			$check =DB::table("tbl_service")->where("c_slug","=",$c_slug)->get();

			if($check ==null ){
				DB::insert("insert into tbl_service(c_name,c_description,c_content,c_lang,c_date,c_img,c_slug,fk_category_service_id) values('$c_name','$c_description','$c_content','$c_lang','$c_date','$c_img','$c_slug','$fk_category_service_id')");
					
				return redirect("/admin/service");
			}
			else {
				$data["c_name"]=$c_name;
				$data["c_description"]=$c_description;
				$data["c_content"]=$c_content;
				
				
				$data["c_error"]="(*) Bài viết đã tồn tại! Vui lòng kiểm tra lại các thông tin dưới đây.";
				$data["title"]="Thêm mới bài viết ";	
				return view("admin.service.add_service",$data);
			}
			
		
	}
	//======================================================================
	public function edit_service($id){
		//lay du lieu tu bang user, co su dung ham de phan trang
			$data['arr']=DB::table("tbl_service")->where("pk_service_id","=",$id)->first();
			$data["title"]="Chỉnh sửa bài viết ";	
			return view("admin.service.edit_service",$data);
		
	}

	//===================================================================
	public function do_edit_service($id){
		//lay du lieu tu bang user, co su dung ham de phan trang
			$uni = new UniController();
			$c_name = Request::get("c_name");
			$c_description = Request::get("c_description");
			
			$c_content = Request::get("c_content");
			$c_lang= Request::get("c_lang");		
			$fk_category_service_id= Request::get("fk_category_service_id");
			$c_slug=$uni->Slug($c_name);
			$c_date= date('d/m/Y');
			$c_img="";
			if (Request::hasFile('c_img')){
				$c_img = Request::file("c_img")->getClientOriginalName();
			}
			
			
			$check =DB::table("tbl_service")->where("c_slug","=",$c_slug)->first();

			//print_r($che);
			if($check ==null ){
				DB::update("UPDATE tbl_service SET c_name='$c_name',c_description='$c_description',c_content='$c_content',c_slug='$c_slug',fk_category_service_id='$fk_category_service_id' WHERE pk_service_id=$id");
				if(!empty($c_img)){
					$c_img = time()."_".$c_img;
					//upload anh
					Request::file("c_img")->move("public/upload/service/",$c_img);
					DB::update("UPDATE tbl_service SET c_img='$c_img' WHERE pk_service_id=$id");
				}
				return redirect("/admin/service");
			}
			else {
				$check =DB::table("tbl_service")->where("c_slug","=",$c_slug)->where("pk_service_id","=",$id)->first();
				if($check != null){
					DB::update("UPDATE tbl_service SET c_name='$c_name',c_description='$c_description',c_content='$c_content',c_slug='$c_slug',fk_category_service_id='$fk_category_service_id' WHERE pk_service_id=$id");
					if(!empty($c_img)){
						$c_img = time()."_".$c_img;
						//upload anh
						Request::file("c_img")->move("public/upload/service/",$c_img);
						DB::update("UPDATE tbl_service SET c_img='$c_img' WHERE pk_service_id=$id");
					}
					return redirect("/admin/service");
				}
				else {
					$data['arr']=DB::table("tbl_service")->where("pk_service_id","=",$id)->first();
					$data["title"]="Chỉnh sửa bài viết";	
					$data["c_error"]="(*) Bài viết đã tồn tại! Vui lòng kiểm tra lại các thông tin dưới đây.";
					return view("admin.service.edit_service",$data);
				}
				
			}
			
		
	}
	//==================================================
	public function delete_service($id){
		DB::delete("delete from tbl_service where pk_service_id=$id");
		return redirect("/admin/service");
	}
}