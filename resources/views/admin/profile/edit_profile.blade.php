@extends('admin.layout')
@section('title') {{ $title }}
@stop
@section('content')
<section class="content-header">
          <h1>
            Chỉnh sửa cấu hình
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin')}}"><i class="fa fa-dashboard"></i> Admin 'page</a></li>
            <li><a href="{{ url('/admin/profile')}}">Cấu hình</a></li>
            <li class="active">Chỉnh sửa cấu hình</li>
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
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ url('admin/do_edit_profile') }}/{{ $arr->pk_profile_id }}" enctype="multipart/form-data">
                	{!! csrf_field() !!}
                	
                  <div class="box-body">
                    
                  	<div class="form-group">
                      <label for="exampleInputEmail1">Tiêu đề</label>
                      <input type="text" class="form-control" id="c_name" required name="c_name" value="{{ $arr->c_name }}" placeholder="Tên danh mục">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Từ khóa</label>
                      <input type="text" class="form-control" id="c_keyword" required name="c_keyword" value="{{ $arr->c_keyword }}" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Mô tả</label>
                       
	                   <textarea class="textarea" name="c_description"  placeholder="Thông tin mô tả về danh mục mới..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
	                   	{{ $arr->c_description }}
	                   </textarea>
                 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nội dung</label>
                       
	                    <textarea id="editor1" name="c_content" rows="10" cols="80">
	                        {{ $arr->c_content }}
	                    </textarea>

                    </div>
                   
                   	<div class="form-group">
                      <label for="exampleInputEmail1">Google map</label>
                       <br>
	                   <textarea  name="c_google_map"   rows="5" cols="172">
	                   	{{ $arr->c_google_map }}
	                   </textarea>
                 
                    </div>
                    <div class="form-group">
                      {!! $arr->c_google_map !!}
                 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Địa chỉ</label>
                      <input type="text" class="form-control" id="c_address" required name="c_address" value="{{ $arr->c_address }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Phone/Fax:</label>
                      <input type="text" class="form-control" id="c_phone" required name="c_phone" value="{{ $arr->c_phone }}" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" class="form-control" id="c_email" required name="c_email" value="{{ $arr->c_email }}" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Facebook</label>
                      <input type="text" class="form-control" id="c_facebook" required name="c_facebook" value="{{ $arr->c_facebook }}" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Skype</label>
                      <input type="text" class="form-control" id="c_skype" required name="c_skype" value="{{ $arr->c_skype }}" >
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Yahoo</label>
                      <input type="text" class="form-control" id="c_yahoo" required name="c_yahoo" value="{{ $arr->c_yahoo }}" >
                    </div>

                 	</div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Chỉnh sửa</button>
                    <a href="{{ url('/admin/profile')}}"><button type="button" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Trở về</button></a>
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