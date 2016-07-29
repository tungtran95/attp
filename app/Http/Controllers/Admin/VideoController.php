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
class VideoController extends Controller{

	
	//===============================================================
	public function list_video(){
		//lay du lieu tu bang user, co su dung ham de phan trang
		
			if(Cookie::get('lang') != null) {
				$lang= Cookie::get('lang');
			}
			else {
				$lang='vn';
				Cookie::queue('lang', 'vn', 4500000);
			}
			if($lang=='en'){
				$data["list_video"] = DB::table("tbl_video")->where("c_lang","=","en")->get();
			}
			if($lang=='vn'){
				$data["list_video"] = DB::table("tbl_video")->where("c_lang","=","vn")->get();
			}
			$data["title"]="Phóng sự/thông điệp";	
			return view("admin.video.video",$data);
		
	}
	//======================================================================
	public function add_video(){
		//lay du lieu tu bang user, co su dung ham de phan trang
		
			$data["title"]="Thêm mới video";	
			return view("admin.video.add_video",$data);
		
	}

	//===================================================================
	public function do_add_video(){
		//lay du lieu tu bang user, co su dung ham de phan trang
			$uni = new UniController();
			$c_name = Request::get("c_name");
			$c_description = $uni->removeP(Request::get("c_description"));
			
			$c_code = Request::get("c_code");
			$c_lang= Request::get("c_lang");	
					
			
			$c_slug=$uni->Slug($c_name);
			$c_date= date('d/m/Y');
			

			$check =DB::table("tbl_video")->where("c_slug","=",$c_slug)->get();

			if($check ==null ){
				DB::insert("insert into tbl_video(c_name,c_description,c_code,c_lang,c_date,c_slug) values('$c_name','$c_description','$c_code','$c_lang','$c_date','$c_slug')");
					
				return redirect("/admin/video");
			}
			else {
				$data["c_name"]=$c_name;
				$data["c_description"]=$c_description;
				$data["c_code"]=$c_code;
				
				
				$data["c_error"]="(*) Phóng sự/thông điệp đã tồn tại! Vui lòng kiểm tra lại các thông tin dưới đây.";
				$data["title"]="Thêm mới video ";	
				return view("admin.video.add_video",$data);
			}
			
		
	}
	//======================================================================
	public function edit_video($id){
		//lay du lieu tu bang user, co su dung ham de phan trang
			$data['arr']=DB::table("tbl_video")->where("pk_video_id","=",$id)->first();
			$data["title"]="Chỉnh sửa video ";	
			return view("admin.video.edit_video",$data);
		
	}

	//===================================================================
	public function do_edit_video($id){
		//lay du lieu tu bang user, co su dung ham de phan trang
			$uni = new UniController();
			$c_name = Request::get("c_name");
			$c_description = $uni->removeP(Request::get("c_description"));
			
			$c_code = Request::get("c_code");
			$c_lang= Request::get("c_lang");	
					
			
			$c_slug=$uni->Slug($c_name);
			$c_date= date('d/m/Y');
			
			
			$check =DB::table("tbl_video")->where("c_slug","=",$c_slug)->first();

			//print_r($che);
			if($check ==null ){
				DB::update("UPDATE tbl_video SET c_name='$c_name',c_description='$c_description',c_code='$c_code',c_slug='$c_slug' WHERE pk_video_id=$id");
				
				return redirect("/admin/video");
			}
			else {
				$check =DB::table("tbl_video")->where("c_slug","=",$c_slug)->where("pk_video_id","=",$id)->first();
				if($check != null){
					DB::update("UPDATE tbl_video SET c_name='$c_name',c_description='$c_description',c_code='$c_code',c_slug='$c_slug' WHERE pk_video_id=$id");
					
					return redirect("/admin/video");
				}
				else {
					$data['arr']=DB::table("tbl_video")->where("pk_video_id","=",$id)->first();
					$data["title"]="Chỉnh sửa video ";	
					$data["c_error"]="(*) Video phóng sự/thông điệp đã tồn tại! Vui lòng kiểm tra lại các thông tin dưới đây.";
					return view("admin.video.edit_video",$data);
				}
				
			}
			
		
	}
	//==================================================
	public function delete_video($id){
		DB::delete("delete from tbl_video where pk_video_id=$id");
		return redirect("/admin/video");
	}
}