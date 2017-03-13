<?php
session_start();
$role = $_SESSION['user_role'];

if($_SESSION["username"] == null) { //if not redirect to login page
  header('location: index.php');
} else {
  if($role != 1){ //prevent other people other than admin in accessing dashboard
    header('location: index.php');
  }
}

include('includes/functions.php');
include('data-manager/tracking.php');

$serverURL = "http://$_SERVER[HTTP_HOST]";

// echo '<pre>'; print_r($options); exit;


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OPS | Track Orders</title>
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
          <a href="#">
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
        Order Management
        <small>Control Panel</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-lg-4 col-xs-12">
          <div class="alert alert-success alert-dismissable alert-update-success" style="display: none;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Success!</strong> Tracking Number Sent!
          </div>
            <div class="box box-success">
                <div class="clearfix"></div>
              <div class="box-header with-border">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-envelope-o"></i>   Sending Tracking Number</h3>
                </div>
                <div class="box-body">
                  <form role="form">
                    <div class="form-group">
                      <label>Order ID</label>
                      <p class="error-mess errTransactionID" style="display: none;">* Select one Transaction</p>
                      <!-- <input type="text" class="form-control order-id" placeholder="Enter ..."> -->
                      <select id="orderIdSelect" class="form-control">
                        <option value="">-- select transaction --</option>
                        <?php if(isset($options) AND count($options) > 0): ?>
                          <?php foreach ($options as $key => $value): ?>
                            <option data-pid="<?php echo $value['pid']; ?>" data-cid="<?php echo $value['cid']; ?>" data-char="<?php echo $value['char']; ?>" value="<?php echo $value['id']; ?>"><?php echo 'OPS-'.date('Y', $value['date']).'-'.$value['char'].'-'.$value['id']; ?></option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </select>      
                    </div>
                    <div class="form-group">
                      <p class="error-mess errTrackignNumber" style="display: none;">* This is a required Field</p>
                      <label>Tracking Number</label>
                      <input type="text" class="form-control tracking-number">
                    </div>
                     <div class="form-group">
                      <p class="error-mess errCourier" style="display: none;">* This is a required Field</p>
                      <label>Courier</label>
                      <input type="text" class="form-control courier">
                    </div>
                  </form>
                </div>
                <div class="box-footer">
                  <button type="button" class="btn btn-success pull-right btn-send">Send</button>
                </div>
            </div>
          </div>
        </div>
          <div class="col-lg-8 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-thumb-tack"></i>   Track Orders</h3>
                

              </div>
              <div class="box-body ">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="track-order-table">
                    <thead>
                      <tr style="background-color: #e6ffe6;">
                        <th>Transaction ID</th>
                        <th>Courier</th>
                        <th>Tracking Number</th>
                        <th>Customer Name</th>
                        <th>Date Sent</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($trackers) AND count($trackers) > 0): ?>
                        <?php foreach ($trackers as $tKey => $tValue): ?>
                          <tr>
                            <td>
                              <?php echo isset($tValue['order_id']) ? 
                              'OPS-'.date('Y', $tValue['tdate']).'-'.$tValue['type'].'-'.$tValue['order_id'] : 
                              'OPS-'.date('Y', $tValue['tdate']).'-'.$tValue['type'].'-'.$tValue['reservation_id'] ?>
                            </td>
                            <td><?php echo $tValue['courier']; ?></td>
                            <td><?php echo $tValue['tracking_number']; ?></td>
                            <td><?php echo ucfirst($tValue['lname']).', '.ucfirst($tValue['fname']); ?></td>
                            <td><?php echo date_format(date_create($tValue['date_sent']), 'F/j/Y h:i A') ?></td>
                             
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
                    <span class="pull-right">This table contains the record of sent tracking numbers of orders.</span>
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
<!-- AdminLTE App -->
<script src="plugins/dist/js/app.min.js"></script>

<!-- dataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- bootbox.js -->
<script src="assets/js/bootbox.min.js"></script>

<script>
    $(document).ready(function() {
        var serverURL = <?php echo json_encode($serverURL); ?>;
        var error = 0;

        function validateData(){
            error = 0;
            var oid = $('#orderIdSelect').val();
            var tn = $('.tracking-number').val();
            var courier = $('.courier').val();
            $('.error-mess').hide();
            $('.form-group').removeClass('has-error');

            if(oid == ''){
                error++;
                $('#orderIdSelect').closest('.form-group').addClass('has-error');
                $('.errTransactionID').show();
            }

            if(tn == ''){
                error++;
                $('.tracking-number').closest('.form-group').addClass('has-error');
                $('.errTrackignNumber').show();
            }

            if(courier == ''){
                error++;
                $('.courier').closest('.form-group').addClass('has-error');
                $('.errCourier').show();
            } 
        }    


        $('.btn-send').click(function(){
            var oid = $('#orderIdSelect').val();
            var tn = $('.tracking-number').val();
            var cid = $('option:selected', '#orderIdSelect').attr('data-cid');
            var pid = $('option:selected', '#orderIdSelect').attr('data-pid');
            var char = $('option:selected', '#orderIdSelect').attr('data-char');
            var courier = $('.courier').val();



            var data = {
                oid: oid,
                cid: cid,
                pid: pid,
                tn: tn,
                courier: courier,
                char: char,
                action: 'c',
            }

            console.log(data)

            validateData();
            console.debug('errors', error)

            if(error == 0){
                $.ajax({
                    type: 'POST',
                    url: serverURL + '/ops/data-manager/tracking.php',
                    data: data,
                    dataType: 'json',
                    success: function(rData){
                        console.log(rData)
                        if(rData.status){
                            $('.alert').show();
                            setTimeout(function(){
                                location.reload();
                            },2000);
                        }
                    },
                });
            } 
        }); 


        $('#track-order-table').dataTable({
            "paging": true,
            "lengthChange": true,
            "lengthMenu": [ 5, 10, 25, 50, 75, 100],
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true


        });
    });

</script>

</body>
</html>
