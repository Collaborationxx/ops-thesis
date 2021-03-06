<?php
session_start(); 
$role = $_SESSION['user_role'];
$count = 1;
$serverURL = "http://$_SERVER[HTTP_HOST]";


if($_SESSION["username"] == null) { //if not redirect to login page
  header('location: index.php');
} else { 
    if($role != 1){ //prevent other people other than admin in accessing dashboard
        header('location: index.php');
    }
}

include('includes/functions.php');
include('data-manager/get-delivery-list.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OPS | Print Order</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="plugins/ionicons/css/ionicons.min.css">
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
        Order Management
        <small>Control Panel</small>
      </h1>
      <!--<button class="btn btn-default btn-sm pull-right back-btn"><a href="new-order.php">Back to Order Page</a></button>-->
      <ol class="breadcrumb">
       <li><a href="dashboard.php">Home</a></li>
       <li><a href="new-order.php">New Orders</a></li>
       <li class="active">Print Orders</li>
     </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-lg-12 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-shopping-bag"></i>   New Orders</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-default btn-sm print-btn"><i class="fa fa-print"></i>&nbsp;&nbsp;Print for Delivery</button>
                </div>

              </div>
              <div class="box-body no-padding">
                <div class="table-responsive">
                  <table class="table table-striped toDownload">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Customer</th>
                        <th>Orders</th>
                        <th>Order Date</th>
                        <th>Shipping Destination</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(isset($orderDelivery) AND count($orderDelivery) > 0): ?>
                        <?php foreach ($orderDelivery as $key => $value): ?>
                          <tr>
                            <td class="count"><?php echo $count++; ?></td>
                            <td class="full-name"><?php echo strtoupper($value['last_name']).', '.ucfirst($value['first_name'])?></td>
                            <td class="order-details">
                              <?php foreach ($value['order_details'] as $oKey => $oValue): ?>
                                  <p><?php echo $oValue['quantity'].' '.$oValue['name']; ?></p> 
                              <?php endforeach; ?>
                            </td>
                            <td class="order-date"><?php echo date_format(date_create($value['transaction_date']), 'F-j-Y'); ?></td>
                            <td class="shipping-address"><?php echo isset($value['shipping_address']) ? $value['shipping_address'] : $value['address']; ?></td>
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
                    <span class="pull-right">This table contains the record of online orders to be delivered.</span>
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

  <!-- form for report printing -->
    <form id="report-data" method="POST" action="includes/delivery-excel.php" class="hidden">
        <input type="hidden" name="reportName">
        <input type="hidden" name="headers">
        <input type="hidden" name="body">
    </form>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Premium Quality Products you can afford!
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="index.php">MJ Jacobe Trading</a>.</strong> All rights reserved.
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
<script>
(function($){
    var serverUrl = <?php echo json_encode($serverURL); ?>

    function getHeaders(){
      headers = [];
      $('.toDownload thead tr th').each(function(){
          var th = $(this).text();
          headers.push(th);

      });
    }


    function getBody(){
      body = [];
      $('.toDownload tbody tr').each(function(ind,tr){
          var count = $(this).find('.count').text();
          var name = $(this).find('.full-name').text();
          var resDate = $(this).find('.order-date').text();
          var shipAdd = $(this).find('.shipping-address').text();
          var datails = $('.order-details p', tr).map(function(i, p) {
              return $(p).text();
          }).toArray();

          var tb = {
              count: count,
              customer_name: name,
              date: resDate,
              shipAdd: shipAdd,
              details: datails
          }

          body.push(tb);
                
      });
    }

  $(document).ready(function(){
      getHeaders();
      getBody();

      $('.print-btn').click(function(){
          console.log('click!');
          console.log(headers);
          console.log(body);

          $('input[name=headers]').val(JSON.stringify(headers));
          $('input[name=body]').val(JSON.stringify(body));
          $('input[name=reportName]').val('Orders for Delivery');

          $('#report-data').submit();
      });

  });
})(jQuery);
</script>

</body>

</html>
