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
            <li><a href="{{ url('/admin/video')}}">Tin ATTP</a></li>
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
                <form role="form" method="post" action="{{ url('admin/do_add_video') }}" enctype="multipart/form-data">
                	{!! csrf_field() !!}
                	
                  <div class="box-body">
                   
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tiêu đề:</label>
                      <input type="text" class="form-control" id="c_name" required name="c_name" value="<?php if(isset($arr->c_name)) echo $arr->c_name ?>" placeholder="Tiêu đề phóng sự/thông điệp">
                    </div>
                                     
                    

                   <div class="form-group">
                      <label for="exampleInputEmail1">Mô tả:</label>
                       
                     <textarea  name="c_description" id="editor1"  >
                     <?php if(isset($arr->c_description)) echo $arr->c_description ?>
                     </textarea>
                 
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Mã video:</label>
                      <input type="text" class="form-control" id="c_code" required name="c_code" value="<?php if(isset($arr->c_code)) echo $arr->c_code ?>" placeholder="Id video của vimeo">
                      <p class="help-block">Lấy mã video sau khi upload video lên vimeo.com. Vimeo hỗ trợ upload video dung lượng lớn, nhanh hơn, hiệu quả hơn, hoạt động ổn định.</p>
                     
                      

                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Upload video phóng sự/thông điệp</label>
                      <br>
                      <a href="https://vimeo.com/upload" target="_blank"><button type="button" class="btn btn-sm btn-info"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload video</button></a>
                    </div>

                    
                   
                    <input type="hidden" name="c_lang" value="{{ $c_lang }}">

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Thêm mới</button>
                    <a href="{{ url('/admin/video')}}"><button type="button" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Trở về</button></a>
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