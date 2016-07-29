@extends('admin.layout')
@section('title') {{ $title }}
@stop
@section('content')
		<section class="content-header">
          <h1>
           Cài đặt cấu hình
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Admin' Page</a></li>
            <li class="active">Cấu hình</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Cấu hình</h3>
                  
                </div><!-- /.box-header -->
				
                <div class="box-body">
                	
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Id</th>
                        
                        <th>Tên</th>
                        <th>Ngôn ngữ</th>
                        
                       
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($profiles as $profile)
                      <tr>
                        <td>{{ $profile->pk_profile_id }}</td>
                        
                        <td><a href="{{ url('admin/edit_profile') }}/{{ $profile->pk_profile_id }}">{{ $profile->c_name }}</a></td>
                       
                        <td>
                        	@if($profile->c_lang == "en") 
                        		<img src="{{ url('/public/images') }}/en.png">
                        	@endif
                        	@if($profile->c_lang == "vn") 
                        		<img src="{{ url('/public/images') }}/vn.png">
                        	@endif
                        </td>
                        
                      </tr>
                    @endforeach
                     
                      
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Id</th>
                        
                        <th>Name</th>
                        <th>Language</th>
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