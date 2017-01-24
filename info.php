<!DOCTYPE html>
<html>
<head>
    <title>OPS I Reservation</title>
    <meta name="author" content="3 Idiots">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/styles.css" type="text/css" media="all" />
    <!--[if lte IE 6]><link rel="stylesheet" href="assets/css/ie6.css" type="text/css" media="all" /><![endif]-->

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/nav.css" type="text/css" media="all" />
   <!-- <link rel="stylesheet" href="css/shop.css" type="text/css" media="all" /> -->

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="wrapper">
    <!-- nav -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <a href="index.php"><img src="assets/images/ops.png" style="position:absolute; left:80px; width:100px; height:54px; margin-left:7px;"><img src="assets/images/received_10210688875834340.jpeg" style="position:absolute; left:180px; width:200px; height:54px; margin-left:7px;"></a>

            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li style="position:absolute; right:220px;">
                        <a href="cart.php">
                            <img class="cart-img" src="assets/images/cart.png">
                            MY CART
                        </a>
                    </li>
                    <li class="dropdown" style="position:absolute; right:75px;">
                        <a class="dropdown-toggle" data-toggle="dropdown">MY ACCOUNT<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="login.php"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Login</a></li>
                        </ul>
                    </li>


                </ul>
            </div>
            <!-- navigation  -->

        </div>
        <!-- /.container -->

    </nav>

    <!-- end nav -->
 <div class="page-wrapper">
 <div class="page-inner" style="min-height:570px;">
 <img src="assets/images/first-aid-kit.jpg" alt="" style="float:left; margin-top:70px; margin-left: 50px;" />
 <form method="POST" style="margin-left:270px; margin-top:40px; width:500px;" enctype="multipart/form-data">
            	<br>
             	<div class="row">
             	<div class="col-md-4">
                	<label style="float:left;"><strong>Product Name:</strong></label>
                    <br><br><br>
                    <label style="float:left;"><strong>Product Description:</strong></label>
                    <br><br><br>
                    <label style="float:left;"><strong>Price:</strong></label>
                    <br><br><br>
                    <label style="float:left;"><strong>Quantity to Reserve:</strong></label>
                    <br><br><br>
                    <label style="float:left;"><strong>Date of Delivery:</strong></label>
                    <br><br><br>
                    <label style="float:left;"><strong>Down Payment:</strong></label>
                    <br><br><br>
                    <label style="float:left;"><strong>Deposit Number:</strong></label>
                </div>
                <div class="col-md-6"> 
                    <input name="name" type="text" size="37" style="margin-bottom:30px;" value="First Aid Kit" readonly/>
                   
                    <input name="name" type="text" size="37" style="margin-bottom:35px;" value="Lorem ipsum dolor sit amet" readonly/>
                    
                    <input name="name" type="text" size="37" style="margin-bottom:34px;" value="Php 5,000.00" readonly/>
                    
                    <input name="name" type="text" size="37" style="margin-bottom:34px;" required/>
                    
                    <input name="name" type="text" size="37" style="margin-bottom:34px;" placeholder="MM/DD/YYYY" required/>
                    
                    <input name="name" type="text" size="37" style="margin-bottom:34px;" placeholder="Should be 50% of the Price" required/>
                    <input name="name" type="text" size="37" style="margin-bottom:30px;" required/>
                   
                </div>
                
                <div class="row" style="margin-left:160px;">
                <div class="col-md-3">
                <a href="login.php"><button class="btn btn-success" style="margin-left:25px;">RESERVE</button></a>
                </div>
                <div class="col-md-3">
                <a href="index.php"><button class="btn btn-danger" style="margin-left:99px;">CANCEL</button></a>
                </div>
                </div>
                
                
	  	</form>
 
 </div>
 </div>
 </div>

 </body></html>