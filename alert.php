<?php
session_start(); 
$role = $_SESSION['user_role'];
$count = 1;

if($_SESSION["username"] == null) { //if not redirect to login page
  header('location: index.php');
} else { 
    if($role != 1){ //prevent other people other than admin in accessing dashboard
        header('location: index.php');
    }
}

include('includes/functions.php');
include('data-manager/get-alert.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OPS | Alert</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="plugins/ionicons/css/ionicons.min.css">
   <!-- dataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
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
                            <span class="hidden-xs">Hello <?php echo $_SESSION['username']; ?></span>&nbsp;&nbsp;
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="assets/img/person-placeholder_opt.jpg" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo $_SESSION['name']; ?>
                                    <small><?php echo userRoles($role); ?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <!--<div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>-->
                                <div class="pull-right">
                                    <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
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
                        <span>Admin Dashboard</span></a>
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
                    <a href="inventory-management.php">
                        <img src="assets/images/inventory-flat.png" class="ops-sidebar-img">
                        <span>Inventory</span></a>
                </li>
                <li>
                    <a href="order-tracking.php">
                        <img src="assets/images/order-tracking.png" class="ops-sidebar-img">
                        <span>Order Tracking</span></a>
                </li>
                
                <li>
                    <a href="reports.php">
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
        Alert Management
        <small>Control Panel</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-lg-12 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-bell"></i>   Alert</h3>
              </div>
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="alert-table">
                    <thead>
                      <tr style="background-color: #e6ffe6;">
                        <th style="width: 10px">#</th>
                        <th>Product Name</th>
                        <th>Quantity Left</th>
                        <th width=25%;>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(isset($alert) AND count($alert) > 0):?>
                          <?php foreach ($alert as $key => $value): ?>
                              <tr>
                                  <td><?php echo $count ?></td>
                                  <td><?php echo $value['prod_name']; ?></td>
                                  <td><p class="text-danger"><?php echo $value['quantity']; ?></p></td>
                                  <td>
                                      <a href="#" data-toggle="modal" data-target="#inventory-modal" class="update-btn"><i class="fa fa-plus"></i>  <b>Restock</b></a>
                                  </td>
                              </tr>
                          <?php endforeach; ?>
                      
                      <?php endif; ?>

                    </tbody>
                  </table>
                </div>  
              </div>
              
              <div class="box-footer">
                <div class="row">
                  <div class="col-md-12 col-xs-12">
                    <span class="pull-right">This table contains the product needed to be restocked.</span>
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
<!-- Modal -->
<div id="inventory-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <div class="alert alert-success alert-dismissable alert-create-success" style="display: none;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
          <strong>Success!</strong> New Inventory Added.
      </div>
      <div class="alert alert-success alert-dismissable alert-update-success" style="display: none;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
          <strong>Success!</strong> Record Updated.
      </div>
        <div class="row">
          <div class="col-lg-12 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <div class="box-header with-border">
                  <h3 class="box-title">New Inventory</h3>
                </div>
                <div class="box-body">
                  <form role="form">
                    <input type="text" name="invID" style="display: none" value="">
                    <div class="row">
                      <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                          <p class="errMess err-invnetory" style="display: none">All products is in inventory. Cannot do this action.</p>
                          <p class="errMess err-product" style="display: none">No product selected.</p>
                          <label>Product Name:</label>
                            <input type="text" name="product-input" class="form-control" disabled="disabled">
                        </div>
                      </div>
                    </div>
                    <div class="row itemsLeft">
                          <div class="col-md-12 col-xs-12">
                              <div class="form-group">
                                  <label>Quantity Left:</label>
                                  <input type="number" min="0" class="form-control" name="quantity"disabled="disabled">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12 col-xs-12">
                              <div class="form-group">
                                  <p class="errMess err-qty" style="display: none">Numbers only!</p>
                                  <p class="errMess err-qty-empty" style="display: none">Add quantity.</p>
                                  <label name="qty">Quantity:</label>
                                  <input type="number" min="0" class="form-control" name="additional-quantity" placeholder="Enter...">
                              </div>
                          </div>
                      </div>
                  </form>
                </div>
                <div class="box-footer">
                  <button type="button" class="btn btn-info pull-right update-inventory">Update</button>
                </div>
            </div>
          </div>
        </div>
        </div> 
    </div>

  </div>
</div>
<!--end pop up content-->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/dist/js/app.min.js"></script>
<!-- dataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>


<script>
    $(document).ready(function() {
        $('#alert-table').dataTable({
            "paging": true,
            "lengthChange": true,
            "lengthMenu": [ 5, 10, 25, 50, 75, 100],
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "columns": [
            {"name":"first", "orderable":true},
            {"name":"second", "orderable":true},
            {"name":"third", "orderable":true},
            {"name":"fourth", "orderable":true},
            ]
        });

       

    



</script>

</body>
</html>
