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
class QaController extends Controller{

	
	//===============================================================
	public function list_qa(){
		//lay du lieu tu bang user, co su dung ham de phan trang
		if(Auth::user()->role < 2){
			if(Cookie::get('lang') != null) {
				$lang= Cookie::get('lang');
			}
			else {
				$lang='vn';
				Cookie::queue('lang', 'vn', 4500000);
			}
			if($lang=='en'){
				$data["list_qa"] = DB::table("tbl_qa")->where("c_lang","=","en")->get();
			}
			if($lang=='vn'){
				$data["list_qa"] = DB::table("tbl_qa")->where("c_lang","=","vn")->get();
			}
			$data["title"]="Danh sách câu hỏi";	
			return view("admin.qa.qa",$data);
		}
		else {
			$data["title"]="Admin's Page";
			return view("admin.home",$data);
		}
	}
	//======================================================================
	
	//======================================================================
	public function edit_qa($id){
		if(Auth::user()->role < 2){
		//lay du lieu tu bang user, co su dung ham de phan trang
			$data['arr']=DB::table("tbl_qa")->where("pk_qa_id","=",$id)->first();
			$data["title"]="Q&A | Trả lời câu hỏi ";	
			return view("admin.qa.edit_qa",$data);
			}
		else {
			$data["title"]="Admin's Page";
			return view("admin.home",$data);
		}
	}

	//===================================================================
	public function do_edit_qa($id){
		//lay du lieu tu bang user, co su dung ham de phan trang
		if(Auth::user()->role < 2){	
			$uni = new UniController();
			$c_answer = $uni->removeP(Request::get("c_answer"));
					
			$check =$c_answer;

			//print_r($che);
			if($check !=null ){
				DB::update("UPDATE tbl_qa SET c_answer='$c_answer',c_status=1 WHERE pk_qa_id=$id");
				
				return redirect("/admin/qa");
			}
			else {
				
				
					$data['arr']=DB::table("tbl_qa")->where("pk_qa_id","=",$id)->first();
					$data["title"]="Q&A | Trả lời câu hỏi ";	
					$data["c_error"]="(*) Trả lời ko thành công! Vui lòng kiểm tra lại các thông tin dưới đây.";
					return view("admin.qa.edit_qa",$data);
				
			}
		}
		else {
			$data["title"]="Admin's Page";
			return view("admin.home",$data);
		}	
		
	}
	//==================================================
	public function delete_qa($id){
		if(Auth::user()->role < 2){
			DB::delete("delete from tbl_qa where pk_qa_id=$id");
			return redirect("/admin/qa");
		}
		else {
			$data["title"]="Admin's Page";
			return view("admin.home",$data);
		}		
	}
}