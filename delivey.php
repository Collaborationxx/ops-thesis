<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order</title>
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
                        <a  href="order-tracking.php"><img src="assets/images/order-tracking.png" class="img"> Order Tracking</a>
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

<!--CONTENTS-->
<br><br>
	<div id="page-wrapper" >
    	<div id="page-inner">
        	
                <div class="input-group custom-search-form">
                			<button class="btn btn-info" style="float:right; margin-left:930px; margin-top:10px;">PRINT</button>
                </div>
                <div class="panel-body">
        <div class="table-responsive">
        	<table class="table table-striped table-bordered table-hover" id="dataTables-example" >
            	<thead>
                	<tr>
                    	<th width="20%"><center>Customer</center></th>
                        <th width="20%"><center>Orders</center></th>
                        <th width="20%"><center>Order Date</center></th>
                        <th width="20%"><center>Shipping Destination</center></th>
                    </tr>
                </thead>
                <tbody>
                		<tr>
                    	<td>Rubie Francisco</td>
						<td>2&nbsp;&nbsp;&nbsp;Wheelchair<br>1&nbsp;&nbsp;&nbsp;Walker Boots</td>
                        <td>11/26/16</td>
                        <td>San Miguel, Bulacan</td>
                        </tr>
                    	<tr>
                    	<td>Louie Cruz</td>
						<td>1&nbsp;&nbsp;&nbsp;Nebulizer</td>
                        <td>11/26/16</td>
                        <td>Gapan, Nueva Eciija</td>
                        </tr>
                        <tr>
                    	<td>Louie Cruz</td>
						<td>1&nbsp;&nbsp;&nbsp;Nebulizer</td>
                        <td>11/26/16</td>
                        <td>Gapan, Nueva Eciija</td>
                        </tr>
                        <tr>
                    	<td>Louie Cruz</td>
						<td>1&nbsp;&nbsp;&nbsp;Nebulizer</td>
                        <td>11/26/16</td>
                        <td>Gapan, Nueva Eciija</td>
                        </tr>
                        <tr>
                    	<td>Louie Cruz</td>
						<td>1&nbsp;&nbsp;&nbsp;Nebulizer</td>
                        <td>11/26/16</td>
                        <td>Gapan, Nueva Eciija</td>
                        </tr>
                        <tr>
                    	<td>Louie Cruz</td>
						<td>1&nbsp;&nbsp;&nbsp;Nebulizer</td>
                        <td>11/26/16</td>
                        <td>Gapan, Nueva Eciija</td>
                        </tr>
              </tbody>
              </table>
		</div>
		</div>
       	</div>
    </div>
		</div>
	</div>
</div>
  
</body>
</html>
