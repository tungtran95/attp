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
            <li><a href="{{ url('/admin/category_service')}}">Danh mục dịch vụ phân tích</a></li>
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
                <form role="form" method="post" action="{{ url('admin/do_add_category_service') }}" enctype="multipart/form-data">
                	{!! csrf_field() !!}
                	
                  <div class="box-body">
                   
                  	<div class="form-group">
                      <label for="exampleInputEmail1">Tên danh mục</label>
                      <input type="text" class="form-control" id="c_name" required name="c_name" value="<?php if(isset($c_name)) echo $c_name ?>"placeholder="Tên danh mục">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Icon cho danh mục</label>
                      <input type="text" value="<?php if(isset($c_icon)) echo $c_icon ?>" class="form-control" id="c_keyword" placeholder="Icon cho danh mục" required name="c_icon"  >
                      <br>
                     	Example: <a href="http://fontawesome.io/icon/flag/"><?php echo '< i class="fa fa-line-chart" aria-hidden="true"></ i>'; ?></a> : <i class="fa fa-line-chart" aria-hidden="true"></i>
                      <br>
                     Nguồn: <a href="http://fontawesome.io/icons/" target="_blank">Font Awesome Icons</a>
                    </div>

                     <div class="form-group">
                      <label for="optionsRadios">Trạng thái</label>
                      <div class="radio">
                        <label>
                          <input type="radio" name="c_enable" id="optionsRadios" value="1" checked>
                            Enabel(hiện)
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="c_enable" id="optionsRadios" value="0" >
                            Disenable(ẩn)
                        </label>
                      </div>
                     
                    </div>
                   
                    <div class="form-group">
                      <input type="hidden" name="c_lang" value="{{ $c_lang }}">
                    </div>


                   <div class="form-group">
                      <label for="exampleInputEmail1">Mô tả</label>
                       
                     <textarea  name="c_description" id="editor1" placeholder="Thông tin mô tả về danh mục mới..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                      <?php if(isset($c_description)) echo $c_description ?>
                     </textarea>
                 
                    </div>

                   
                    

                 	</div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Thêm mới</button>
                    <a href="{{ url('/admin/category_service')}}"><button type="button" class="btn btn-primary"><i class="fa fa-undo" aria-hidden="true"></i> Trở về</button></a>
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