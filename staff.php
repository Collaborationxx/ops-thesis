<?php
//check if user has session
session_start();
if($_SESSION["username"] == null) { //if not redirect to login page
header('location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Staff</title>
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
   <link href="assets/css/cart.css" rel="stylesheet"/>
    <link href="assets/css/cart-responsive.css" rel="stylesheet"/>
   
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

            <a href="index.php"><img src="assets/images/ops.png" style="position:absolute; left:20px; width:100px; height:54px; margin-left:7px;"><img src="assets/images/received_10210688875834340.jpeg" style="position:absolute; left:120px; width:200px; height:54px; margin-left:7px;"></a>

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
<!--End of default-->

<!--contents-->       
	
    	<div id="page-inner">
        	<br><br>
                <h2 style="padding-left:20px; padding-top:10px; color: green;"><strong>Over the Counter Trading</strong></h2>
            
            	<hr />
            <div style="position:absolute; top:220px; left:30px;"> 
		  	<form method="POST" style="border:1px solid #0C6; padding:5px; width:120%; border-radius:5px; background-color:#999;" enctype="multipart/form-data">
            	<br>
             	<div class="row">
             	<div class="col-md-4">
                	<label class="z" style="color:#FFF;"><strong>Name:</strong></label>
                </div>
                <div class="col-md-6">
                 	<input name="name" type="text" size="37"/>
                </div>
                </div>
                
                <br>
                <div class="row">
             		<div class="col-md-4">
                		<label class="z" style="color:#FFF;"><strong>Quantity:</strong></label>
               	 	</div>
                	<div class="col-md-6">
                		<input name="price" type="text" size="37"/>
               		</div>
				</div>
              <br>
                <div class="row">
             	<div class="col-md-4">
                	<label class="z" style="color:#FFF;"><strong>Receipt:</strong></label>
                </div>
                <div class="col-md-6">
                	<input name="price" type="text" size="37"/>
                </div>
				</div>
               <br>
               <center>
                <button class="btn btn-success">PLACE AS ORDER</button>
                </center>
                <br>
	  	</form>
			</div>
            
            <div style="position:absolute top:150px; left:200px;">
            <table class="table table-bordered" style="width:60%; margin-left:500px;">
              <thead style="background-color:#0C6; color:white;">
                <tr>
                  <th width="128">Product</th>
                  <th width="128">Name</th>
                  
				  <th width="103">Price</th>
                  <th width="87">Total</th>
				</tr>
              </thead>
              <tbody>
                <tr>
                  <td> <img width="60" src="assets/images/bandage.jpg" alt=""/></td>
                  <td>Bandage</td>
				 
                  <td>$120.00</td>
                  <td>$25.00</td>
                  </tr>
				<tr>
                  <td> <img width="60" src="assets/images/wheelchair.jpg" alt=""/></td>
                  <td>Wheelchair</td>
                  
                  <td>$7.00</td>
                  <td>--</td>
                </tr>
				<tr>
                  <td> <img width="60" src="assets/images/walker-boots.jpg" alt=""/></td>
                  <td>Walker Boots</td>
                  
                  <td>$120.00</td>
                  <td>$25.00</td>
                </tr>
				
                <tr>
                  <td colspan="3" align="right">Total Price:	</td>
                  <td> $228.00</td>
                </tr>
                <tr>
                  <td colspan="3" align="right">Receipt Number:	</td>
                  <td> $228.00</td>
                </tr>
                <tr>
                  <td colspan="5"><button class="btn btn-success" style="float:right; margin-right:20px;">RECORD</button></td>
                </tr>
				</tbody>
            </table>
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
