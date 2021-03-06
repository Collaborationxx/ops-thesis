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
include('data-manager/get-alert.php');
include('data-manager/get-all-orders.php');
include('data-manager/get-all-reservations.php');
include('data-manager/get-all-payment.php');

$alerts = count($alert);
$paymentCount = count($payments);
$orderCount = count($forCount);
$reservationCount = count($pendingReservations);


$oDistinct = array();
foreach ($allOrders as $oKey => $oValue){
    $oDistinct[$oValue['id']] = $oValue;
}

$rDistinct = array();
foreach ($allReservations as $rKey => $rValue){
    $rDistinct[$rValue['id']] = $rValue;
}

// echo '<pre>'; print_r($reservationCount); exit;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OPS | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="plugins/ionicons/css/ionicons.min.css">

    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
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


<!--copy on every page-->

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
                                <div class="pull-left">
                                    <a href="admin-profile.php" class="btn btn-default btn-flat">Profile</a>
                                </div>
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
                <li class="treeview">
                  <a href="#">
                    <img src="assets/images/user-512.png" class="ops-sidebar-img">
                    <span>Account Manager</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                    <li style="margin-left: 35px;"><a href="user-management.php"><i class="fa fa-circle-o"></i> Employee</a></li>
                    <li style="margin-left: 35px;"><a href="customer-management.php"><i class="fa fa-circle-o"></i> Customer</a></li>
                  </ul>
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
    <!--end of copy-->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control Panel</small>
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo $orderCount; ?></h3>
                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="new-order.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo $reservationCount; ?></h3>
                            <p>New Reservation</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-box-outline"></i>
                        </div>
                        <a href="new-reservation.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo $paymentCount; ?></h3>
                            <p>New Payment</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-card"></i>
                        </div>
                        <a href="payment.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?php echo $alerts; ?></h3>

                            <p>New Alerts</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-bell-outline"></i>
                        </div>
                        <a href="alert.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <!-- bar chart -->
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-bar-chart-o fa-fw"></i> Sales Statistics</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body no-padding chart-responsive">
                            <div class="chart">
                                <div id="sales-chart"></div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-lg-3 col-xs-6">
                                    <span><b>Sales:</b> 1 January, 2016 - 31 December, 2016</span>
                                </div>
                                <div class="col-lg-3 col-lg-offset-6 col-xs-6">
                                    <span><b>Total Profit:</b> Php 24,813.53</span>
                                </div>
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

<!-- MORRIS CHART SCRIPTS -->
<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="assets/js/morris/morris.js"></script>
<script>
    $(document).ready(function() {
        barChart();

        $(window).resize(function() {
            window.barChart.redraw();
        });
    });

    function barChart() {
        window.barChart = Morris.Bar({
            element: 'sales-chart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
                { month: 'Jan', a: 10 },
                { month: 'Feb', a: 60 },
                { month: 'Mar', a: 100 },
                { month: 'Apr', a: 80 },
                { month: 'May', a: 25 },
                { month: 'Jun', a: 25 },
                { month: 'Jul', a: 25 },
                { month: 'Aug', a: 25 },
                { month: 'Sep', a: 75 },
                { month: 'Oct', a: 25 },
                { month: 'Nov', a: 25 },
                { month: 'Dec', a: 25 }

            ],
            // The name of the data record attribute that contains x-values.
            xkey: 'month',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['a'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Monthly Sales']
        });
    }
    //        new Morris.Bar({
    //            // ID of the element in which to draw the chart.
    //            element: 'sales-chart',
    //            // Chart data records -- each entry in this array corresponds to a point on
    //            // the chart.
    //            data: [
    //                { month: 'Jan', a: 20, b: 70 },
    //                { month: 'Feb', a: 50, b: 60 },
    //                { month: 'Mar', a: 50, b: 100 },
    //                { month: 'Apr', a: 5, b: 80 },
    //                { month: 'May', a: 20, b: 25 },
    //                { month: 'Jun', a: 20, b: 25 },
    //                { month: 'Jul', a: 20, b: 25 },
    //                { month: 'Aug', a: 20, b: 25 },
    //                { month: 'Sep', a: 20, b: 75 },
    //                { month: 'Oct', a: 20, b: 25 },
    //                { month: 'Nov', a: 20, b: 25 },
    //                { month: 'Dec', a: 20, b: 25 }
    //
    //            ],
    //            // The name of the data record attribute that contains x-values.
    //            xkey: 'month',
    //            // A list of names of data record attributes that contain y-values.
    //            ykeys: ['a','b'],
    //            // Labels for the ykeys -- will be displayed when you hover over the
    //            // chart.
    //            labels: ['Over the counter', 'Online Store']
    //        });
</script>
</body>
</html>
