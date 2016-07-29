<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
//khi bao tu khoa use DB de tac dong vao csdl
use DB;
//bat cac form control
use Request;
use Hash;
class UniController extends Controller{
	public function stripUnicode($str){
		  if(!$str) return false;
		   $unicode = array(
			 'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
			 //'s'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
			 'd'=>'đ|Đ',
			 //'D'=>'Đ',
			  'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
			  //'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
			  'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',	  
			  //'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
			 'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
			  //'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
			 'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
			  //'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
			 'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
			 //'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
		   );
			foreach($unicode as $khongdau=>$codau) {
				$arr=explode("|",$codau);
				$str = str_replace($arr,$khongdau,$str);
			}
			return $str;
		}
		public function Slug($str){
			$str=trim($str);
			if ($str=="") return "";
			$str =str_replace('"','',$str);
			$str =str_replace('- ','',$str);
			$str =str_replace("'","",$str);
			$str = str_replace(' ','-',$str);
			$str = str_replace('/','',$str);
			$str = str_replace(':','',$str);
			$str = str_replace('?','',$str);
			$str = str_replace('&','',$str);
			$str = str_replace("'","",$str);
			$str = str_replace(',','',$str);
			$str = str_replace('.','',$str);
			$str = str_replace('\\','',$str);
			$str = $this->stripUnicode($str);
			$str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
			
			// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
			
			return $str;
		}
		public function removeP($str){
			$str=trim($str);
			$str =str_replace('<p>','',$str);
			$str =str_replace('</p>','',$str);
			return $str;
		}
}

