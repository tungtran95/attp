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
class DocumentController extends Controller{

	
	//===============================================================
	public function list_document(){
		//lay du lieu tu bang user, co su dung ham de phan trang
		
			if(Cookie::get('lang') != null) {
				$lang= Cookie::get('lang');
			}
			else {
				$lang='vn';
				Cookie::queue('lang', 'vn', 4500000);
			}
			if($lang=='en'){
				$data["list_document"] = DB::table("tbl_document")->where("c_lang","=","en")->get();
			}
			if($lang=='vn'){
				$data["list_document"] = DB::table("tbl_document")->where("c_lang","=","vn")->get();
			}
			$data["title"]="Danh sách bài viết";	
			return view("admin.document.document",$data);
		
	}
	//======================================================================
	public function add_document(){
		//lay du lieu tu bang user, co su dung ham de phan trang
		
			$data["title"]="Thêm mới bài viết";	
			return view("admin.document.add_document",$data);
		
	}

	//===================================================================
	public function do_add_document(){
		//lay du lieu tu bang user, co su dung ham de phan trang
			$uni = new UniController();
			$c_name = Request::get("c_name");
			$c_code = Request::get("c_code");
			$c_date_active = Request::get("c_date_active");
			$c_date = Request::get("c_date");
			$c_lang= Request::get("c_lang");	
			$c_status= 1;		
			$c_company = Request::get("c_company");
			$c_category_document = Request::get("c_category_document");
			$c_slug=$uni->Slug($c_name);
			
			$c_file="";
			if (Request::hasFile('c_file')){
				$c_file = Request::file("c_file")->getClientOriginalName();
			}
			if(!empty($c_file)){
				$c_file = time()."_".$c_file;
				//upload anh
				Request::file("c_file")->move("public/upload/document/",$c_file);
			}

			$check =DB::table("tbl_document")->where("c_slug","=",$c_slug)->get();

			if($check ==null ){
				DB::insert("insert into tbl_document(c_name,c_code,c_date,c_date_active,c_category_document,c_company,c_lang,c_file,c_slug,c_status) values('$c_name','$c_code','$c_date','$c_date_active','$c_category_document','$c_company','$c_lang','$c_file','$c_slug',1)");
					
				return redirect("/admin/document");
			}
			else {
				$data["c_name"] = Request::get("c_name");
				$data["c_code"] = Request::get("c_code");
				$data["c_date_active"] = Request::get("c_date_active");
				$data["c_date"] = Request::get("c_date");
					
					
				$data["c_company"] = Request::get("c_company");
				$data["c_category_document"] = Request::get("c_category_document");
				
				$data["c_error"]="(*) Bài viết đã tồn tại! Vui lòng kiểm tra lại các thông tin dưới đây.";
				$data["title"]="Thêm mới bài viết ";	
				return view("admin.document.add_document",$data);
			}
			
		
	}
	//======================================================================
	public function edit_document($id){
		//lay du lieu tu bang user, co su dung ham de phan trang
			$data['arr']=DB::table("tbl_document")->where("pk_document_id","=",$id)->first();
			$data["title"]="Chỉnh sửa bài viết ";	
			return view("admin.document.edit_document",$data);
		
	}

	//===================================================================
	public function do_edit_document($id){
		//lay du lieu tu bang user, co su dung ham de phan trang
			$uni = new UniController();
			$c_name = Request::get("c_name");
			$c_code = Request::get("c_code");
			$c_date_active = Request::get("c_date_active");
			$c_date = Request::get("c_date");
			$c_lang= Request::get("c_lang");	
			$c_status= 1;		
			$c_company = Request::get("c_company");
			$c_category_document = Request::get("c_category_document");
			$c_slug=$uni->Slug($c_name);
			
			$c_file="";
			if (Request::hasFile('c_file')){
				$c_file = Request::file("c_file")->getClientOriginalName();
			}
			
			
			$check =DB::table("tbl_document")->where("c_slug","=",$c_slug)->first();

			//print_r($che);
			if($check ==null ){
				DB::update("UPDATE tbl_document SET c_name='$c_name',c_code='$c_code',c_date='$c_date',c_date_active='$c_date_active',c_company='$c_company',c_lang='$c_lang',c_category_document='$c_category_document' WHERE pk_document_id=$id");
				if(!empty($c_file)){
					$c_file = time()."_".$c_file;
					//upload anh
					Request::file("c_file")->move("public/upload/document/",$c_file);
					DB::update("UPDATE tbl_document SET c_file='$c_file',c_status=1 WHERE pk_document_id=$id");
				}
				return redirect("/admin/document");
			}
			else {
				$check =DB::table("tbl_document")->where("c_slug","=",$c_slug)->where("pk_document_id","=",$id)->first();
				if($check != null){
					DB::update("UPDATE tbl_document SET c_name='$c_name',c_code='$c_code',c_date='$c_date',c_date_active='$c_date_active',c_company='$c_company',c_lang='$c_lang',c_category_document='$c_category_document' WHERE pk_document_id=$id");
					if(!empty($c_file)){
						$c_file = time()."_".$c_file;
						//upload anh
						Request::file("c_file")->move("public/upload/document/",$c_file);
						DB::update("UPDATE tbl_document SET c_file='$c_file',c_status=1 WHERE pk_document_id=$id");
					}
					return redirect("/admin/document");
				}
				else {
					$data['arr']=DB::table("tbl_document")->where("pk_document_id","=",$id)->first();
					$data["title"]="Chỉnh sửa bài viết ";	
					$data["c_error"]="(*) Bài viết đã tồn tại! Vui lòng kiểm tra lại các thông tin dưới đây.";
					return view("admin.document.edit_document",$data);
				}
				
			}
			
		
	}
	//==================================================
	public function delete_document($id){
		DB::delete("delete from tbl_document where pk_document_id=$id");
		return redirect("/admin/document");
	}
}