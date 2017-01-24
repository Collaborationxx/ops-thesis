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
    <meta charset="utf-8">
    <title>OPS I Customer Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="assets/css/styles.css" type="text/css" media="all" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/nav.css" type="text/css" media="all" />
   <!-- <link rel="stylesheet" href="css/shop.css" type="text/css" media="all" /> -->

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Cart styles  -->
    <link href="assets/css/cart.css" rel="stylesheet"/>
    <link href="assets/css/cart-responsive.css" rel="stylesheet"/>
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css">
    
</head>
<body>
<div class="wrapper">
<!--NAV TOP-->
        <nav class="navbar navbar-default navbar-cls-top navbar-fixed-top" role="navigation" style="height:70px;">
            <div class="navbar-header">
                <a href="index.php">
                	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				</a>
            <a href="index.php"><img src="assets/images/ops.png" style="position:absolute; left:23px; width:100px; height:70px; margin-left:7px;"><img src="assets/images/received_10210688875834340.jpeg" style="position:absolute; left:120px; width:200px; height:70px; margin-left:7px;"></a>

            </div>
            <div class="login-box">
                <a href="index.php"><button class="btn btn-success">LOGOUT</button></a>
            </div>
        </nav>   
<!--End of default-->

<div class="page-wrapper">
<div class="page-inner">
<div class="container">
  <h3 class="carth" style="float:left">MY ACCOUNT</h3>
  
  <hr/>
  <ul class="nav nav-tabs">
  	<li><a data-toggle="tab" href="#menu2">Notification</a></li>
  	<li><a data-toggle="tab" href="#message">Message</a></li>
    <li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
  </ul>

  <div class="tab-content">
    <div id="profile" class="tab-pane fade in active">
      <div class="panel-body">
      <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover">
        	<tr>
            <td>
            	<label style="float:left;">First name:</label>
               	<input type="text" id="inputFname" placeholder="First Name" style="float:right">
            </td>
            <td>
            	<label style="float:left;">Shipping Destination:</label>
                <input type="text" id="address" placeholder="Shipping Destination" style="float:right"/>
            </td>
            </tr>
        	<tr>
        	<td>
        		<label style="float:left;">Last name:</label>
            	<input type="text" id="inputLname" placeholder="Last Name" style="float:right"/>
			</td>
        	<td>
        		<label style="float:left;">Email Address:</label>
				<input type="text" id="inputEmail" placeholder="Email" style="float:right"/>
			</td>
        	</tr>
        	<tr>
        	<td>
        		<label style="float:left;">Home Address:</label>
				<input type="text" id="address" placeholder="Adress" style="float:right"/>
			</td>
       		<td>
        		<label style="float:left;">Username:</label>
				<input type="text" id="inputEmail" placeholder="Username" style="float:right"/>
			</td>
        	</tr>
        	<tr>
        	<td>
        		<label style="float:left;">Contact Number:</label>
				<input type="text"  name="mobile" id="mobile" placeholder="Mobile Phone" style="float:right"/> 
			</td>
        	<td>
    			<label style="float:left;">Password:</label>
				<input type="password" id="inputPassword" placeholder="Password" style="float:right"/>
			</td>
        	</tr>
        </table>
        </div>
        </div>
        <br>
			<center>
              	<button class="btn btn-primary">
              		EDIT
              	</button>
                
              	<button class="btn btn-success">
              		SAVE
              	</button>
  			</center>
			<br>
    </div>
  
 <!--MESSAGES-->   
    <div id="message" class="tab-pane fade">
     	<div class="panel-body">
        <div class="table-responsive">
        	<table class="table table-striped table-bordered table-hover">
            	<thead>
                	<tr>
                    	<th width="50%"><center>Message</center></th>
                        <th width="30%"><center>Date</center></th>
                    </tr>
                </thead>
                <tbody>
                	<tr>
                    	<td><a data-toggle="modal" href="#myModal" style="text-decoration:none;">Order Confirmation OPS-1234-879</a></td>

  <!-- Modal -->
  <!--<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <!--<div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#0C9;">ORDER CONFIRMATION</h4>
        </div>
        <div class="modal-body" style="background-color: #CCC; border-top: 1px solid #0C6;">
          <p>Good day! Thank you for ordering medical supplies at OPS!</p>
          <p>The following is the list of your orders:</p>
          <p><strong>1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wheelchair&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Php5,000.00</strong></p>
          <p>Please deposit your full payment in the bank account provided below within 7 days to process your order. Reply with the deposit number when you paid your order:</p>
          <p style="vertical-align:middle"><strong>DEPOSIT NUMBER:</strong>&nbsp;&nbsp;<input type="text" size="5"/>&nbsp;&nbsp;<button type="submit" class="btn btn-success" style="margin-bottom:8px;">REPLY</button></p>
        </div>
        <div class="modal-footer" style="border-top: 1px solid #0C6;">
        <p style="float:left"><strong>ACCOUNT NAME:&nbsp;</strong>MJ Jacobe Trading&nbsp;&nbsp;&nbsp;I</p>
        <p style="float:right"><strong>ACCOUNT NUMBER:&nbsp;</strong>0932-4587</p>
         </div>
      </div>
      
    </div>
  </div>

                        <td>11/01/16</td>
                    </tr>
                    <tr>
                    	<td>Order  Confirmation OPS-1544-879</td>
                        <td>11/01/16</td>
                    </tr>
                    <tr>
                    	<td><a data-toggle="modal" href="#myModal3" style="text-decoration:none;">Reservation Confirmation</a></td>
                        <!-- Modal -->
  <!--<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <!--<div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#0C9;">RESERVATION CONFIRMATION</h4>
        </div>
        <div class="modal-body" style="background-color: #CCC; border-top: 1px solid #0C6;">
          <p>Good day! Thank you for ordering medical supplies at OPS!</p>
          <p>The following is the list of your reservation:</p>
          <p><strong>1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wheelchair&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Php5,000.00</strong></p>
          <p>Please deposit your remaining balance of payment in the bank account provided below within 7 days to process your order. Reply with the deposit number when you paid your order:</p>
          <p style="vertical-align:middle"><strong>DEPOSIT NUMBER:</strong>&nbsp;&nbsp;<input type="text" size="5"/>&nbsp;&nbsp;<button type="submit" class="btn btn-success" style="margin-bottom:8px;">REPLY</button></p>
        </div>
        <div class="modal-footer" style="border-top: 1px solid #0C6;">
        <p style="float:left"><strong>ACCOUNT NAME:&nbsp;</strong>MJ Jacobe Trading&nbsp;&nbsp;&nbsp;I</p>
        <p style="float:right"><strong>ACCOUNT NUMBER:&nbsp;</strong>0932-4587</p>
         </div>
      </div>
      
    </div>
  </div>

-->
                        <td>11/01/16</td>
                    </tr>
              </tbody>
              </table>
		</div>
		
     </div>
 
 <!--notification-->
    <!--<div id="menu2" class="tab-pane fade">
    	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
            	<thead>
                	<tr>
                    	<th width="50%"><center>Notification</center></th>
                        <th width="30%"><center>Date</center></th>
                    </tr>
                </thead>
                <tbody>
                	<tr>
                    	<td><a data-toggle="modal" href="#myModal2" style="text-decoration:none;">Your order OPS-1234-879 is being shipped</a></td>
<!-- Modal -->
  <!--<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <!--<div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#0C9;">TRACKING NUMBER</h4>
        </div>
        <div class="modal-body" style="background-color: #CCC; border-top: 1px solid #0C6;">
          <p>Good day! Thank you for ordering medical supplies at OPS!</p>
          <p>Your order is being shipped. Expect the arrival within 7 working days</p>
          <p>Below is the tracking number of your order OPS-1234-879.</p>
          <p style="vertical-align:middle"><strong>TRACKING NUMBER:</strong>&nbsp;&nbsp;<input type="text" size="5" value="JRS-3kj5-54re" readonly/ ></p>
        </div>
        <div class="modal-footer" style="border-top: 1px solid #0C6;">
        </div>
      </div>
      </div>
      </div>
      
                        <td>11/01/16</td>
                    </tr>
                    <tr>
                    	<td>Your order OPS-1544-879 is being shipped</td>
                        <td>11/01/16</td>
                    </tr>
                    <tr>
                    	<td>Your order OPS-7644-879 is being shippe</td>
                        <td>11/01/16</td>
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
</div>-->
</div>
</div>
</div>
</div>
</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
         
</body>
</html>
