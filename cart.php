<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>OPS I Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<link rel="stylesheet" href="assets/css/styles.css" type="text/css" media="all" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/nav.css" type="text/css" media="all" />
   <!-- <link rel="stylesheet" href="css/shop.css" type="text/css" media="all" /> -->

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap.css">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Cart styles  -->
    <link href="assets/css/cart.css" rel="stylesheet"/>
    <link href="assets/css/cart-responsive.css" rel="stylesheet"/>

</head>
<body>
	
<!-- nav -->
    <nav class="navbar navbar-default navbar-fixed-top topnav">
        <div class="navbar-header">
        <a href="index.php">
        	<img src="assets/images/ops.png" style="position:absolute; left:80px; width:100px; height:54px; margin-left:7px;">
            <img src="assets/images/received_10210688875834340.jpeg" style="position:absolute; left:180px; width:200px; height:54px; margin-left:7px;">
        </a>
		</div>
	</nav>
<!-- end nav -->
<br><br><br><br>
  
	<h3 class="carth">SHOPPING CART [ <small>3 Item(s) </small>]</h3>
    <div style="position:absolute; right:160px; top:100px;">
    	<a href="index.php" class="btn btn-success">Continue Shopping</a>
    </div>
    <div style="position:absolute; right:50px; top:100px;">
    	<a href="login.php" class="btn btn-danger">Check Out</a>
    </div>    
   
	<hr class="r"/>
	
    
	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Quantity/Update</th>
				  <th>Price</th>
                  <th>Total</th>
				</tr>
              </thead>
              <tbody>
                <tr>
                  <td> <img width="60" src="assets/images/Blood-Pressure-Monitor.jpg" alt=""/></td>
                  <td>Rossmax BP Digital</td>
				  <td>
					<div class="input-append"><input class="span1" style="max-width:34px; height:30px;" placeholder="1" id="appendedInputButtons" size="16" type="text"><button class="btn" type="button"><i class="icon-minus"></i></button><button class="btn" type="button"><i class="icon-plus"></i></button><button class="btn btn-warning" type="button"><i class="icon-remove icon-white"></i></button>				</div>
				  </td>
                  <td>1,900..00</td>
                  <td>1,900.00</td>
                  </tr>
				<tr>
                  <td> <img width="60" src="assets/images/wheelchair.jpg" alt=""/></td>
                  <td>Standard Wheel Chair</td>
				  <td>
					<div class="input-append"><input class="span1" style="max-width:34px; height:30px;" placeholder="1" id="appendedInputButtons" size="16" type="text"><button class="btn" type="button"><i class="icon-minus "></i></button><button class="btn" type="button"><i class="icon-plus"></i></button><button class="btn btn-warning" type="button"><i class="icon-remove icon-white"></i></button>				</div>
				  </td>
                  <td>3,000.00</td>
                  <td>3,000.00</td>
                </tr>
				<tr>
                  <td> <img width="60" src="assets/images/walker-boots.jpg" alt=""/></td>
                  <td>Oxygen Tank 50lbs.</td>
				  <td>
					<div class="input-append"><input class="span1" style="max-width:34px; height:30px;" placeholder="1" id="appendedInputButtons" size="16" type="text"><button class="btn" type="button"><i class="icon-minus"></i></button><button class="btn" type="button"><i class="icon-plus"></i></button><button class="btn btn-warning" type="button"><i class="icon-remove icon-white"></i></button>				</div>
				  </td>
                  <td>8,000.00</td>
                  <td>8,000.00</td>
                </tr>
				
                <tr>
                  <td colspan="4" align="right">Total Price:	</td>
                  <td> 12,000.00</td>
                </tr>
				</tbody>
            </table>
            </div>
            
</div>
</div>
</div>
</div>

<!-- /container -->

<!-- jQuery -->
<script src="vendor/js/jquery-3.1.1.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
   
</body>
</html>