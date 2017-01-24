<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Account</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
<!--NAV TOP-->
        <nav class="navbar navbar-default navbar-cls-top navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a href="index.php">
                	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

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
					</li></a>
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
<!--sidebar-->
<!--End of default-->
<!-- contents  -->
<br><br>
	<div id="page-wrapper" >
    	<div id="page-inner">
        	<div class="row">
            <div class="col-md-12">
            	<h2><strong>Reports</strong></h2>
            </div>
            </div>
            	<hr />
            <div class="row">
            <div class="col-md-12">
            	<div class="panel panel-default">
            	<div class="panel-heading">
                	Delivery Report
                    <br>
                </div>
                <div class="panel-body">
                <div class="table-responsive">
                	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    	<thead>
                        	<tr>
                            	<th width="10%"><center>First Name</center></th>
                                <th width="10"><center>Last Name</center></th>
                                <th width="40%"><center>Shipping Destination</center></th>
                                <th width="10%"><center>Contact</center></th>
                                <th width="10%"><center>Email</center></th>
                                <th width="10%"><center>Order ID</center></th>
                                <th width="10%"><center>Tracking Number</center></th>
                            </tr>
                        </thead>
                     	<tbody>
                      		<tr>
                        		<td>Angelinina</td>
                                <td>Fuentebuanies</td>
                                <td>zone 2, Brgy. Maligaya, San Miguel, Bulacan</td>
                                <td>09358473278</td>
                                <td>shella@gmail.com</td>
                                <td>00968</td>
                                <td>JWU-0960-2944</td>
                        </tbody>
                    	</table>
                  	</div>
                  	</div>
              	</div>
					<hr />
                <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    	Sales Report for 
                        	<input type="text" name="Search" placeholder="MM/DD/YYYY"> &nbsp;<button class="btn btn-success">Search</button> &nbsp;<button class="btn btn-danger">Print</button>
                    </div>
                    <div class="panel-body">
                    <div class="table-responsive">
                    	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        	<thead>
                            	<tr>
                                	<th width="40%"><center>Product Name</center></th>
                                    <th width="5"><center>Mode of Trading</center></th>
                                    <th width="10%"><center>Quantity</center></th>
                                    <th width="10%"><center>Sales</center></th>
                                </tr>
                            </thead>
                            <tbody>
                            	<tr>
                                	<td>Nebulizer</td>
                                    <td>Shipped in Provinces</td>
                                    <td>2</td>
                                    <td>10,500</td>
                                </tr>
                                <tr>
                                    <td>Diaper</td>
                                    <td>Over the Counter</td>
                                    <td>5</td>
                                    <td>5,500</td>
                                </tr>
                             </tbody>
                          </table>
                      </div>      
                      </div>
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
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
