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
            <li><a href="{{ url('/admin/document')}}">Văn bản pháp luật</a></li>
            <li class="active">Chỉnh sửa</li>
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
                <form role="form" method="post" action="{{ url('admin/do_edit_document') }}/{{ $arr->pk_document_id }}" enctype="multipart/form-data">
                	{!! csrf_field() !!}
                	
                  <div class="box-body">
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Số ký hiệu:</label>
                      <input type="text" class="form-control" id="c_name" required name="c_code" value="<?php if(isset($arr->c_code)) echo $arr->c_code ?>" placeholder="Số ký hiệu">
                    </div>
                    
                  	<div class="form-group">
                      <label for="exampleInputEmail1">Tiêu đề:</label>
                      <input type="text" class="form-control" id="c_name" required name="c_name" value="<?php if(isset($arr->c_name)) echo $arr->c_name ?>" placeholder="Tiêu đề văn bản">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Ngày ban hành:</label>
                      <input type="text" class="form-control" id="c_name" required name="c_date" value="<?php if(isset($arr->c_date)) echo $arr->c_date ?>" placeholder="Ngày ban hành">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Ngày áp dụng:</label>
                      <input type="text" class="form-control" id="c_name" required name="c_date_active" value="<?php if(isset($arr->c_date_active)) echo $arr->c_date_active ?>" placeholder="Ngày áp dụng">
                    </div>

                     <div class="form-group">
                      <label for="exampleInputEmail1">Cơ quan ban hành:</label>
                      <input type="text" class="form-control" id="c_name" required name="c_company" value="<?php if(isset($arr->c_company)) echo $arr->c_company ?>" placeholder="Cơ quan ban hành">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Loại văn bản:</label>
                      <input type="text" class="form-control" id="c_name" required name="c_category_document" value="<?php if(isset($arr->c_category_document)) echo $arr->c_category_document ?>" placeholder="Chỉ thị, thông tư, công văn, quyết định...v.v..">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload file:</label>
                      <input type="file" class="form-control" id="c_file" required name="c_file" >
                    </div>

                    
                    @if($arr->c_status == 0)
                     <div class="form-group">
                      <a href="<?php echo $arr->c_file ?>"><i class="fa fa-cloud-download" aria-hidden="true"></i> Download file</a>
                      
                      </div>
                    @endif
                    @if($arr->c_status == 1)
                     <div class="form-group">
                      <a href="{{ url('public/upload/document')}}/{{ $arr->c_file }}"><i class="fa fa-cloud-download" aria-hidden="true"></i> Download file</a>
                      
                      </div>
                    @endif
                    

                   
                   
                   	<input type="hidden" name="c_lang" value="{{ $c_lang }}">

                 	</div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Chỉnh sửa</button>
                    <a href="{{ url('/admin/document')}}"><button type="button" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Trở về</button></a>
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