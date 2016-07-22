@extends('admin.layout')
@section('title') {{ $title }}
@stop
@section('content')
		<section class="content-header">
          <h1>
           Quản trị viên
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin')}}"><i class="fa fa-dashboard"></i> Admin' Page</a></li>
            <li class="active">Quản trị viên</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Danh sách thành viên</h3>
                  
                </div><!-- /.box-header -->
				
                <div class="box-body">
                	<a href="{{ url('/admin/add_user')}}"><button class="btn btn-primary"><i class="fa fa-user-plus" aria-hidden="true"></i> Thêm</button></a>
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Id</th>
                        
                        <th>Họ tên</th>
                        <th>Quyền admin</th>
                        <th>Ngày update</th>
                        <th>Xóa</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td>{{ $user->id }}</td>
                        
                        <td><a href="{{ url('admin/edit_user') }}/{{ $user->id }}">{{ $user->name }}</a></td>
                        <td>@if ($user->role == 0)
            						    	Super Admin
            							@else
            							    Admin
            							@endif
            						</td>
                        <td>{{ $user->updated_at }}</td>
                        <td><a style="color:red; font-size:15px"  onClick="javascript:return window.confirm('Bạn muốn xóa admin này?');" href="{{ url('admin/xoa-admin') }}/{{ $user->id }}"><i class="fa fa-close"></i></a></td>
                      </tr>
                    @endforeach
                     
                      
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Id</th>
                       
                        <th>Name</th>
                        <th>Role</th>
                        <th>Date</th>
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