
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OPS I Product Catalog</title>
    
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
                <a href="index.php"/>
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

<!--contents--> 
 <br><br>     
	<div id="page-wrapper" >
    	<div id="page-catalog">
        	<div class="row">
            <div class="col-md-12">
                <h2><strong>Medical Supplies Catalog</strong></h2>
            </div>
            </div>
            	<hr />
            <div style="position: absolute; left:320px; top: 180px; vertical-align:middle;">
            	<input style="font-size:15px; height:35px; width:320px; vertical-align:middle;" type="text" name="Search" placeholder="Search">&nbsp;<button class="btn btn-default">SEARCH</button>
            </div>
            <div style="position:absolute; top:230px; left:320px;"> 
		  	<form method="POST" style="border:1px solid #0C6; padding:15px" enctype="multipart/form-data">
            	<div class="row">
             	<div class="col-md-12">
             		<center><img src="assets/images/wheelchair.jpg" style="width:100px; height:100px;"></center>
             	</div>
                </div>
                <br>
             	<div class="row">
             	<div class="col-md-3">
                	<label>Name:</label>
                </div>
                <div class="col-md-9">
                 	<input name="name" type="text" size="37" value="Wheelchair"/>
                </div>
                </div>
                <br>
             	<div class="row">
             	<div class="col-md-3">
					<label style="vertical-align:top">Description:</label>
                </div>
                <div class="col-md-9">
                 	<input name="name" type="text" size="37" style="height:50px;" value="Lorem ipsum ndolor sit amet"/>
                </div>
                </div>
                <br>
                <div class="row">
             	<div class="col-md-3">
                	<label>Price:</label>
                </div>
                <div class="col-md-9">
                	<input name="price" type="text" size="37" value="Php 5,000"/>
                </div>
				</div>
                <br><br>
              	<center>
              	<button class="btn btn-primary">
              		EDIT
              	</button>
              	<button class="btn btn-success">
              		SAVE
              	</button>
              	<button class="btn btn-danger">
              		DELETE
              	</button>
              	<button class="btn btn-warning">
              		CANCEL
              	</button>
  			  	</center>
`		  	</form>
			</div>
               
            <div style="position: absolute; left: 829px; top: 183px;">
               <p class="title">
               		ADD NEW OFFER:
               </p>
            </div> 
                    
            <div style="position: absolute; top: 230px; left: 829px;"> 
		  	<form method="POST" style="border:1px solid #0C6; padding:15px" enctype="multipart/form-data">
            	<div class="row">
             	<div class="col-md-3">
                	<label>Name:</label>
                </div>
                <div class="col-md-9">
                	<input name="description" type="text" size="37"/>
                </div>
                </div>
                <br>
             	<div class="row">
             	<div class="col-md-3">
					<label style="vertical-align:top">Description:</label>
                </div>
                <div class="col-md-9">
                	<textarea rows="3", cols="35"></textarea>
                </div>
                </div>
                <br>
               	<div class="row">
             	<div class="col-md-3">
                	<label>Price:</label>
                </div>
                <div class="col-md-9">
                	<input name="price" type="text" size="37"/>
                </div>
                </div>
                <br><br>
              	<div class="row">
             	<div class="col-md-3">
                	<label>Picture: </label>
                </div>
              	<div class="col-md-9">
              		<input type="file" name="file"/>
                </div>
               	</div>
               	<div style="position:absolute; right:15px; top:260px;">
              		<button class="btn btn-default">UPLOAD</button>
              	</div>
              	<br><br><br>
              	<center>
              		<button class="btn btn-success">
              			SAVE
              		</button>
              		<button class="btn btn-warning">
              			CANCEL
              		</button>
  			  	</center>
`		  	</form>
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
