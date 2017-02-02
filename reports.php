<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OPS | Reports</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="plugins/ionicons/css/ionicons.min.css">
  <!-- date picker -->
  <link rel="stylesheet" type="text/css" href="plugins/datepicker/datepicker3.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="plugins/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/dist/css/skins/skin-green.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <link rel="stylesheet" type="text/css" href="assets/css/ops-custom.css">
  <link rel="shortcut icon" href="assets/images/small-logo.png" />
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>OPS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>OPS</b> Dashboard</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="assets/img/person-placeholder_opt.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Hello Admin</span>&nbsp;&nbsp;
              <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="assets/img/person-placeholder_opt.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">
          <img src="assets/images/small-logo.png" class="ops-sidebar-logo">
        </li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active">
          <a href="dashboard.php">
          <img src="assets/images/dashboard.ico" class="ops-sidebar-img">
          <span>Dashboard</span></a>
        </li>
        <li>
          <a href="user-management.php">
          <img src="assets/images/user-512.png" class="ops-sidebar-img">
          <span>Account Manager</span></a>
        </li>
        <li>
          <a href="product-management.php">
          <img src="assets/images/catalogue-icon.png" class="ops-sidebar-img">
          <span>Product Catalog</span></a>
        </li>
        <li>
          <a href="order-tracking.php">
          <img src="assets/images/order-tracking.png" class="ops-sidebar-img">
          <span>Order Tracking</span></a>
        </li>
        <li>
          <a href="inventory-management.php">
          <img src="assets/images/inventory-flat.png" class="ops-sidebar-img">
          <span>Inventory</span></a>
        </li>
        <li>
          <a href="#">
          <img src="assets/images/analytics.png" class="ops-sidebar-img">
          <span>Reports</span></a>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report Management
        <small>Control Panel</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-lg-4 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-file-text-o"></i>   Generate Report</h3>
                </div>
                <div class="box-body">
                  <form role="form">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="form-group">
                          <label>From</label>
                         <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepicker-from">
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="form-group">
                          <label>To</label>
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepicker-to">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control">
                          <option>Orders</option>
                          <option>Product</option>
                          <option>Inventory</option>
                          <option>Sales</option>
                        </select>
                    </div>
                  </form>
                </div>
                <div class="box-footer">
                  <button type="button" class="btn btn-success pull-right">Generate</button>
                </div>
            </div>
          </div>
        </div>
          <div class="col-lg-8 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-file-excel-o"></i>   Preview</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>

              </div>
              <div class="box-body no-padding">
              </div>
              <div class="box-footer">
                <div class="row">
                  <div class="col-lg-3 col-xs-6">
                    <span>Lorem ipsum dolor sit amet</span>
                  </div>
                  <div class="col-lg-3 col-lg-offset-6 col-xs-6">
                    <span>Lorem ipsum dolor sit amet</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Premium Quality Products you can afford!
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">MJ Jacobe Trading</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- AdminLTE App -->
<script src="plugins/dist/js/app.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
<script>
  $(function(){
    //Date picker
    //from
      $('#datepicker-from').datepicker({
        autoclose: true
      });
    //to
    $('#datepicker-to').datepicker({
      autoclose: true
    });
  });
</script>
</body>
</html>
