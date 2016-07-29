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
            <li><a href="{{ url('/admin/contact')}}">Hỏi đáp</a></li>
            <li class="active">Phản hồi</li>
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
                <form role="form" method="post" action="{{ url('admin/do_edit_contact') }}/{{ $arr->pk_contact_id }}" enctype="multipart/form-data">
                	{!! csrf_field() !!}
                	
                  <div class="box-body">
                   
                  	<div class="form-group">
                      <label for="exampleInputEmail1">Ngày: <?php if(isset($arr->c_date)) echo $arr->c_date ?></label>
                      
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Họ tên: <?php if(isset($arr->c_name)) echo $arr->c_name ?></label>
                      
                    </div>
                   
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email: <?php if(isset($arr->c_email)) echo $arr->c_email ?></label>
                      
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nội dung:</label>
                       
                     <br>
                     <?php if(isset($arr->c_content)) echo $arr->c_content ?>
                     
                 
                    </div>
                   
                   	

                 	</div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-danger"><i  class="fa fa-check" aria-hidden="true"></i> Đã xem</button>
                    <a href="{{ url('/admin/contact')}}"><button type="button" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Trở về</button></a>
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