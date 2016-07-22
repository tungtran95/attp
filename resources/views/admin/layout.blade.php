
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


    <base href="{{ asset('public') }}/admin/"?>
    <!-- Bootstrap 3.3.5 -->
   <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="{{ url('/admin')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">QT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin's </b>Page</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
             
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ url('/public/upload/admin') }}/{{ Auth::user()->c_img }}" class="user-image" alt="User Image">
                  <span class="hidden-xs"><b>{{ Auth::user()->name }}</b></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{ url('/public/upload/admin') }}/{{ Auth::user()->c_img }}" class="img-circle" alt="User Image">
                    <p>
                      {{ Auth::user()->name }} - Admin's page
                      <small>{{ Auth::user()->email }}</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a >Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a >Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a >Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{ url('/admin/sua-admin')}}/{{ Auth::user()->id }}" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ url('/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ url('/public/upload/admin') }}/{{ Auth::user()->c_img }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN MENU</li>
            <li class="active treeview ">
              <a href="{{ url('/admin')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
             
            </li>
           
          
            <!--=========================Lĩnh vực tư vấn=================================-->

            
             <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Giới thiệu</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/admin/danh-muc-tu-van')}}"><i class="fa fa-circle-o"></i> Danh mục tư vấn</a></li>
               
                 <li><a href="{{ url('/admin/danh-muc-tu-van')}}"><i class="fa fa-circle-o"></i> Danh sách bài viết</a></li>
              </ul>
            </li>
            <!--=========================Lĩnh vực tư vấn=================================-->
             <!--=========================Dịch vụ=================================-->

            
             <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Dịch vụ phân tích</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/admin/danh-muc-dich-vu')}}"><i class="fa fa-circle-o"></i> Danh mục dịch vụ khác</a></li>
                <li><a href="{{ url('/admin/dich-vu')}}"><i class="fa fa-circle-o"></i> Dánh sách bài viết</a></li>
                
              </ul>
            </li>
            <!--=========================Dịch vụ=================================-->
            <!--=========================Dịch vụ=================================-->

            
             <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Dịch vụ khác</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/admin/danh-muc-dich-vu')}}"><i class="fa fa-circle-o"></i> Danh mục dịch vụ khác</a></li>
                <li><a href="{{ url('/admin/dich-vu')}}"><i class="fa fa-circle-o"></i> Dánh sách bài viết</a></li>
                
              </ul>
            </li>
            <!--=========================Dịch vụ=================================-->
             <!--=========================News=================================-->

            <li>
              <a href="{{ url('/admin/tin-tuc')}}">
                <i class="fa fa-th"></i> <span>Nghiên cứu khoa học</span> <small class="label pull-right bg-yellow">hot</small>
              </a>
            </li>

            <!--=========================News=================================-->
            <!--=========================News=================================-->

            <li>
              <a href="{{ url('/admin/tin-tuc')}}">
                <i class="fa fa-th"></i> <span>Tin tức ATTP</span> <small class="label pull-right bg-yellow">hot</small>
              </a>
            </li>

            <!--=========================News=================================-->
             <!--=========================News=================================-->

            <li>
              <a href="{{ url('/admin/tin-tuc')}}">
                <i class="fa fa-th"></i> <span>Văn bản pháp luật</span> <small class="label pull-right bg-yellow">hot</small>
              </a>
            </li>

            <!--=========================News=================================-->
             <!--=========================News=================================-->

            <li>
              <a href="{{ url('/admin/tin-tuc')}}">
                <i class="fa fa-video-camera"></i> <span>Phóng sự/ Thông điệp</span> <small class="label pull-right bg-yellow">hot</small>
              </a>
            </li>

            <!--=========================News=================================-->
             <!--=========================News=================================-->

            <li>
              <a href="{{ url('/admin/tin-tuc')}}">
                <i class="fa fa-th"></i> <span>Hỏi đáp</span> <small class="label pull-right bg-yellow">hot</small>
              </a>
            </li>

            <!--=========================News=================================-->
             <!--=========================News=================================-->

            <li>
              <a href="{{ url('/admin/tin-tuc')}}">
                <i class="fa fa-comment"></i> <span>Bình luận</span> <small class="label pull-right bg-yellow">hot</small>
              </a>
            </li>

            <!--=========================News=================================-->
            <!--=========================Contact=================================-->

            <li>
              <a href="{{ url('/admin/lien-he')}}">
                <i class="fa fa-envelope-o"></i> <span>Liên hệ</span> <small class="label pull-right bg-blue"><i class="fa fa-commenting-o"></i> </small>
              </a>
            </li>

            <!--=========================Contect=================================-->
            @if (Auth::user()->role==0)
             <li>
              <a href="{{ url('/admin/quan-tri-vien')}}">
                <i class="fa fa-user"></i> <span>Quản trị viên</span> <small class="label pull-right bg-green">imp</small>
              </a>
            </li>
            @endif
             <li>
              <a href="{{ url('/admin/lien-he')}}">
                <i class="fa fa-gears"></i> <span>Cấu hình</span> <small class="label pull-right bg-blue">imp </small>
              </a>
            </li>
             <li>
              <a href="{{ url('/logout')}}">
                <i class="fa fa-sign-out" aria-hidden="true"></i> <span>Đăng xuất</span> <small class="label pull-right bg-red">logout</small>
              </a>
            </li>
           
            
           
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
      

       @yield('content')



      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
     
           
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    


   


  </body>
</html>
