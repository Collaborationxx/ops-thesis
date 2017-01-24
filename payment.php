<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment</title>
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

<!--CONTENTS-->
<br><br>
	<div id="page-wrapper" >
    	<div id="page-inner">
        	<div class="row">
            	<div class="col-md-12">
                    <h2><strong>Payment</strong></h2>   
                 </div>
            </div>
                <hr />
                <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..." style="width: 30%; margin-left: 670px;">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" style="margin-right: 15px;">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                <div class="panel-body">
        <div class="table-responsive">
        	<table class="table table-striped table-bordered table-hover" id="dataTables-example" >
            	<thead>
                	<tr>
                    	<th width="20%"><center>CustomerID</center></th>
                    	<th width="20%"><center>OrderID</center></th>
                        <th width="10%"><center>Bill</center></th>
                        <th width="10%"><center>Payment</center></th>
                        <th width="20%"><center>DepositNumber</center></th>
                        <th width="30%"><center>Date</center></th>
                    </tr>
                </thead>
                <tbody>
                	<tr>
                    	<td>094-943-44</td>
						<td>OPS-320-43</td>
                        <td>5,000.00</td>
                        <td>5,000.00</td>
                        <td>94204-5221</td>
                        <td>11/30/16</td>
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
