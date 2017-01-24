<?php
//check if user has session
session_start();
if($_SESSION["username"] == null) { //if not redirect to login page
    header('location: index.php');
}

include('data-manager/get-data.php');
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OPS I Order Tracking</title>
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
    <?php include ('./main-menu.php'); ?>
    <div id="page-wrapper" >
    	<div id="page-tr">
        	<div class="row">
            <div class="col-md-12">
                <h2><strong>Tracking Ordered Medical Supplies</strong></h2>              
            </div>
            </div>
				<hr />
            <div style="position: absolute; left:300px; top: 180px;">
                 <input style="font-size:15px; height:35px; width:300px; vertical-align:middle;" type="text" name="Search" placeholder="Search">&nbsp;<button class="btn btn-default">SEARCH</button>
            </div> 
                    
            <div style="position:absolute; top:240px; left:300px;"> 
		    <form method="POST" style="border:1px solid #0C6; padding:15px; width:384px;" enctype="multipart/form-data">
            	<div class="row">
             	<div class="col-md-6">
                	<label>Order ID:</label>
                </div>
                <div class="col-md-9">
                	<input name="orderid" type="text" size="40"/>
                </div>
                </div>
                <br>
                <div class="row">
             	<div class="col-md-6">
                	<label>Customer Name:</label>
                </div>
                <div class="col-md-9">
                	<input name="name" type="text" size="40"/>
                </div>
                </div>
                <br>
                <div class="row">
             	<div class="col-md-6">
               		<label>Tracking Number:</label>
                </div>
                <div class="col-md-9">
                 	<input name="tnum" type="text" size="40"/>
                </div>
                </div>
                <br>
              	<div class="row">
             	<div class="col-md-6">
                 	<label>Date Shipped:</label>
                </div>
              	<div class="col-md-9">
              		<input type="text" name="date" size="40"/>
                </div>
                </div>
              	<br><br>
             	<button style="float:right;" class="btn btn-primary">
              		SEND TO CUSTOMER
              	</button>
  			 	<br>
`			</form>
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
