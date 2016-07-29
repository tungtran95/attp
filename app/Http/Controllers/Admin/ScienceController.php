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
class ScienceController extends Controller{

	
	//===============================================================
	public function list_science(){
		//lay du lieu tu bang user, co su dung ham de phan trang
		
			if(Cookie::get('lang') != null) {
				$lang= Cookie::get('lang');
			}
			else {
				$lang='vn';
				Cookie::queue('lang', 'vn', 4500000);
			}
			if($lang=='en'){
				$data["list_science"] = DB::table("tbl_science")->where("c_lang","=","en")->get();
			}
			if($lang=='vn'){
				$data["list_science"] = DB::table("tbl_science")->where("c_lang","=","vn")->get();
			}
			$data["title"]="Danh sách bài viết";	
			return view("admin.science.science",$data);
		
	}
	//======================================================================
	public function add_science(){
		//lay du lieu tu bang user, co su dung ham de phan trang
		
			$data["title"]="Thêm mới bài viết";	
			return view("admin.science.add_science",$data);
		
	}

	//===================================================================
	public function do_add_science(){
		//lay du lieu tu bang user, co su dung ham de phan trang
			$uni = new UniController();
			$c_name = Request::get("c_name");
			$c_description = Request::get("c_description");
			
			$c_content = Request::get("c_content");
			$c_lang= Request::get("c_lang");		
			
			$c_slug=$uni->Slug($c_name);
			$c_date= date('d/m/Y');
			$c_img="";
			if (Request::hasFile('c_img')){
				$c_img = Request::file("c_img")->getClientOriginalName();
			}
			if(!empty($c_img)){
				$c_img = time()."_".$c_img;
				//upload anh
				Request::file("c_img")->move("public/upload/science/",$c_img);
			}

			$check =DB::table("tbl_science")->where("c_slug","=",$c_slug)->get();

			if($check ==null ){
				DB::insert("insert into tbl_science(c_name,c_description,c_content,c_lang,c_date,c_img,c_slug) values('$c_name','$c_description','$c_content','$c_lang','$c_date','$c_img','$c_slug')");
					
				return redirect("/admin/science");
			}
			else {
				$data["c_name"]=$c_name;
				$data["c_description"]=$c_description;
				$data["c_content"]=$c_content;
				
				
				$data["c_error"]="(*) Bài viết đã tồn tại! Vui lòng kiểm tra lại các thông tin dưới đây.";
				$data["title"]="Thêm mới bài viết ";	
				return view("admin.science.add_science",$data);
			}
			
		
	}
	//======================================================================
	public function edit_science($id){
		//lay du lieu tu bang user, co su dung ham de phan trang
			$data['arr']=DB::table("tbl_science")->where("pk_science_id","=",$id)->first();
			$data["title"]="Chỉnh sửa bài viết ";	
			return view("admin.science.edit_science",$data);
		
	}

	//===================================================================
	public function do_edit_science($id){
		//lay du lieu tu bang user, co su dung ham de phan trang
			$uni = new UniController();
			$c_name = Request::get("c_name");
			$c_description = Request::get("c_description");
			
			$c_content = Request::get("c_content");
			$c_lang= Request::get("c_lang");		
			
			$c_slug=$uni->Slug($c_name);
			$c_date= date('d/m/Y');
			$c_img="";
			if (Request::hasFile('c_img')){
				$c_img = Request::file("c_img")->getClientOriginalName();
			}
			
			
			$check =DB::table("tbl_science")->where("c_slug","=",$c_slug)->first();

			//print_r($che);
			if($check ==null ){
				DB::update("UPDATE tbl_science SET c_name='$c_name',c_description='$c_description',c_content='$c_content',c_slug='$c_slug' WHERE pk_science_id=$id");
				if(!empty($c_img)){
					$c_img = time()."_".$c_img;
					//upload anh
					Request::file("c_img")->move("public/upload/science/",$c_img);
					DB::update("UPDATE tbl_science SET c_img='$c_img' WHERE pk_science_id=$id");
				}
				return redirect("/admin/science");
			}
			else {
				$check =DB::table("tbl_science")->where("c_slug","=",$c_slug)->where("pk_science_id","=",$id)->first();
				if($check != null){
					DB::update("UPDATE tbl_science SET c_name='$c_name',c_description='$c_description',c_content='$c_content',c_slug='$c_slug' WHERE pk_science_id=$id");
					if(!empty($c_img)){
						$c_img = time()."_".$c_img;
						//upload anh
						Request::file("c_img")->move("public/upload/science/",$c_img);
						DB::update("UPDATE tbl_science SET c_img='$c_img' WHERE pk_science_id=$id");
					}
					return redirect("/admin/science");
				}
				else {
					$data['arr']=DB::table("tbl_science")->where("pk_science_id","=",$id)->first();
					$data["title"]="Chỉnh sửa bài viết ";	
					$data["c_error"]="(*) Bài viết đã tồn tại! Vui lòng kiểm tra lại các thông tin dưới đây.";
					return view("admin.science.edit_science",$data);
				}
				
			}
			
		
	}
	//==================================================
	public function delete_science($id){
		DB::delete("delete from tbl_science where pk_science_id=$id");
		return redirect("/admin/science");
	}
}