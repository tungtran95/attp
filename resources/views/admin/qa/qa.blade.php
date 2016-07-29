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
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Admin' Page</a></li>
            <li class="active">Hỏi đáp</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
             <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Danh sách câu hỏi</h3>
                  
                  
                </div><!-- /.box-header -->


                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                         <th>Ngày</th>
                        <th>Câu hỏi</th>
                        <th>Trạng thái</th>
                       
                        <th>Xóa</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach($list_qa as $qa)
                      <tr>
                        <td>{{ $qa->pk_qa_id }}</td>
                        <td>{{ $qa->c_date }}</td>
                        <td><a href="{{ url('admin/edit_qa') }}/{{ $qa->pk_qa_id }}">{{ $qa->c_question }}</a></td>
                         <td>@if($qa->c_status==1) 
                                <i style="color:green" class="fa fa-check" aria-hidden="true"></i>
                            @endif
                            @if($qa->c_status==0) 
                                <i style="color:red"  class="fa fa-exclamation" aria-hidden="true"></i>
                            @endif
                        </td>
                        
                         <td><a style="color:red; font-size:15px"  onClick="javascript:return window.confirm('Bạn muốn xóa bài viết này?');" href="{{ url('admin/delete_qa') }}/{{ $qa->pk_qa_id }}"><i class="fa fa-close"></i></a></td>
                      </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                         <th>Date</th>
                        <th>Name</th>
                          <th>Status</th>
                       
                        <th>Delete</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
         <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>

@endsection