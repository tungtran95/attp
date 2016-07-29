@extends('admin.layout')
@section('title') {{ $title }}
@stop
@section('content')



<?php
	$c_lang=Cookie::get("lang");
?>
<section class="content-header">
          <h1>
            
            <small> Ngôn ngữ :	@if($c_lang == "en") 
                            <img src="{{ url('/public/images') }}/en.png"> active <i style="font-size:10px;color:green" class="fa fa-circle"></i>
                          @endif
                          @if($c_lang == "vn") 
                            <img src="{{ url('/public/images') }}/vn.png">  active <i style="font-size:10px;color:green" class="fa fa-circle"></i>
                          @endif</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin')}}"><i class="fa fa-dashboard"></i> Admin 'page</a></li>
            <li><a href="{{ url('/admin/service')}}">Bài viết dịch vụ phân tích</a></li>
            <li class="active">Thêm mới</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Thông tin</h3>
                  <p><i style="color:red"><?php if(isset($c_error)) echo $c_error ?></i></p>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ url('admin/do_add_service') }}" enctype="multipart/form-data">
                	{!! csrf_field() !!}
                	
                  <div class="box-body">
                   
                  	<div class="form-group">
                      <label for="exampleInputEmail1">Tiêu đề:</label>
                      <input type="text" class="form-control" id="c_name" required name="c_name" value="<?php if(isset($c_name)) echo $c_name ?>" placeholder="Tiêu đề bài viết">
                    </div>
                    
                    	<div class="form-group">
	                    <label>Thuộc danh mục:</label>
	                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="fk_category_service_id">
	                      <?php 

	                      

	                      $cat = DB::table("tbl_category_service")->where("c_lang","=",$c_lang)->get(); 
	                      $stt=0;
	                      foreach($cat as $rows){
	                      	$stt++;
	                      	if($stt==1){ ?>
	                      <option value="{{ $rows->pk_category_service_id }}" selected >{{ $rows->c_name }}</option>
	                      <?php }else { ?>

	                       <option value="{{ $rows->pk_category_service_id }}" >{{ $rows->c_name }}</option>

	                      <?php }} ?>
	                    </select>
                 	 </div>
                    
                   
                    

                   <div class="form-group">
                      <label for="exampleInputEmail1">Mô tả:</label>
                       
                     <textarea  name="c_description" id="editor2"  >
                      <?php if(isset($c_description)) echo $c_description ?>
                     </textarea>
                 
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nội dung chi tiết:</label>
                       
                     <textarea  name="c_content" id="editor1"  >
                      <?php if(isset($c_content)) echo $c_content ?>
                     </textarea>
                 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Ảnh đại diện:</label>
                       
                     	<input type="file" name="c_img" class="form-control">
                     	<br>Expamle:
                     	<br><img src="{{ url('public/images/magazine/3.jpg') }}" style="width:30%">
                 
                    </div>
                   
                   	<input type="hidden" name="c_lang" value="{{ $c_lang }}">

                 	</div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Thêm mới</button>
                    <a href="{{ url('/admin/service')}}"><button type="button" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Trở về</button></a>
                  </div>
                </form>
              </div><!-- /.box -->

             

                 

            </div><!--/.col (left) -->
            <!-- right column -->
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->

	         <!-- jQuery 2.1.4 -->
	     <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
      <!-- Bootstrap 3.3.5 -->
      <script src="bootstrap/js/bootstrap.min.js"></script>
      <!-- FastClick -->
      <script src="plugins/fastclick/fastclick.min.js"></script>
      <!-- AdminLTE App -->
      <script src="dist/js/app.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>
         <script src="plugins/ckeditor/ckeditor.js"></script>
         <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
         <script>
        $(function () {
          // Replace the <textarea id="editor1"> with a CKEditor
          // instance, using default configuration.
          CKEDITOR.replace('editor1');
          //bootstrap WYSIHTML5 - text editor
          $(".textarea").wysihtml5();
        });
      </script>
      <script>
      $().ready(function() {
           $('#wysi').wysihtml5({useLineBreaks: false});
      });
    </script>
      <script>
        $(function () {
          // Replace the <textarea id="editor1"> with a CKEditor
          // instance, using default configuration.
          CKEDITOR.replace('editor2');
          CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
          //bootstrap WYSIHTML5 - text editor
          $(".textarea").wysihtml5();
        });
      </script>


@endsection