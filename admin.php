<?php
//check if user has session
session_start();
if($_SESSION["username"] == null) {
//if not redirect to login page
header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OPS I Admin Panel</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />  
</head>
<body>
	<div id="wrapper">
    <!--NAV TOP-->
    <nav class="navbar navbar-default navbar-cls-top navbar-fixed-top">
    	<div class="navbar-header">
    		<a href="index.php">
            	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
		</div>
        <div class="login-box">
        	<div class="dropdown">
            	<a class="dropdown-toggle admin-panel-user" data-toggle="dropdown" href="#">
                	Hello <?php echo $_SESSION['username']; ?>
                    <span class="caret"></span>
                </a>
                    <ul class="dropdown-menu">
                        <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
             </div>
        </div>
	</nav>   
    <!-- NAV TOP  -->
    
	<!-- SIDE BAR  -->
	<div class="sidebar-wrapper">
		<nav class="navbar-default navbar-side" role="navigation">
        	<div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
					<a href="index.php">
                    <li class="text-center">
                    	<img src="assets/images/ops.png" style="height:100px;width: 250px; margin-bottom: 4px; margin-left: 5px; margin-right: 5px;"/>
					</li>
                    </a>
                    <li>
                        <a href="admin.php"><img src="assets/images/dashboard.ico" class="img"> Dashboard</a>
                    </li>
                    <li>
                        <a  href="inventory.php"><img src="assets/images/inventory-flat.png" class="img"> Inventory</a>
                    </li>
                    <li>
                        <a  href="catalog.php"><img src="assets/images/catalogue-icon.png" class="img"> Product Catalog</a>
                    </li>
                    <li>
                        <a  href="ordertracking.php"><img src="assets/images/order-tracking.png" class="img"> Order Tracking</a>
                    </li>
				    <li  >
                        <a   href="user.php"><img src="assets/images/user-512.png" class="img"> User Account</a>
                    </li>	
                    <li>
                    	<a href="reports.php"> <img src="assets/images/analytics.png" class="img"> Reports</a>
                    </li>
                </ul>  
            </div> 
    	</nav>  
	</div>
	<!--End of sidebar-->
    
	<!--End of default-->

<!-- contents  -->
<br><br>
	<div id="page-wrapper" style="min-height:700px;" >
    	<div id="page-admin">
        	<div class="row">
            	<div class="col-md-12">
                	<h2><strong>Admin Dashboard</strong></h2> 
                </div>
            </div>              
    	<hr />
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">           
				<div class="panel panel-back noti-box">
                	<span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                	</span>
                <div class="text-box" >
                	<a href="order.php" style="text-decoration:none;">
                    <p class="main-text">10 New</p></a>
                    <p class="text-muted">Orders</p>
                </div>
             	</div>
		     	</div>
                <div class="col-md-3 col-sm-6 col-xs-6">           
				<div class="panel panel-back noti-box">
                	<span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                	</span>
                <div class="text-box" >
                	<a href="reservation.php" style="text-decoration:none;">
                    <p class="main-text">5 New</p></a>
                    <p class="text-muted">Reservations</p>
                </div>
             	</div>
		     	</div>
                <div class="col-md-3 col-sm-6 col-xs-6">           
				<div class="panel panel-back noti-box">
                	<span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                	</span>
                <div class="text-box" >
                	<a href="payment.php" style="text-decoration:none;">
                    <p class="main-text">1 New</p></a>
                    <p class="text-muted">Payment</p>
                </div>
            	</div>
		     	</div>
                <div class="col-md-3 col-sm-6 col-xs-6">           
				<div class="panel panel-back noti-box">
                	<span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                	</span>
                <div class="text-box" >
                	<a href="alert.php" style="text-decoration:none;">
                    <p class="main-text">3 New</p></a>
                    <p class="text-muted">Alert</p>
                </div>
            	</div>
		     	</div>
			</div>

<!--Bar Chart-->

	<div class="row">                            
    	<div class="col-md-9 col-sm-12 col-xs-12">                     
    	<div class="panel panel-default">
        <div class="panel-heading">
        	Sales Statistics
        </div>
        <div class="panel-body">
        	<div id="sales-chart"></div>
        </div>
        </div>            
		</div>
    </div>
   
    	
     
    
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script>
        new Morris.Bar({
            // ID of the element in which to draw the chart.
            element: 'sales-chart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
                { month: 'Jan', a: 20, b: 70 },
                { month: 'Feb', a: 50, b: 60 },
                { month: 'Mar', a: 50, b: 100 },
                { month: 'Apr', a: 5, b: 80 },
                { month: 'May', a: 20, b: 25 },
                { month: 'Jun', a: 20, b: 25 },
                { month: 'Jul', a: 20, b: 25 },
                { month: 'Aug', a: 20, b: 25 },
                { month: 'Sep', a: 20, b: 75 },
                { month: 'Oct', a: 20, b: 25 },
                { month: 'Nov', a: 20, b: 25 },
                { month: 'Dec', a: 20, b: 25 }

            ],
            // The name of the data record attribute that contains x-values.
            xkey: 'month',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['a','b'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Over the counter', 'Online Store']
        });
    </script>
    
   
</body>
</html>
