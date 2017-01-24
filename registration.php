<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Registration Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="stylesheet" href="assets/css/styles.css" type="text/css" media="all" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/nav.css" type="text/css" media="all" />
   <!-- <link rel="stylesheet" href="css/shop.css" type="text/css" media="all" /> -->

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Cart styles  -->
    <link href="assets/css/cart.css" rel="stylesheet"/>
    <link href="assets/css/cart-responsive.css" rel="stylesheet"/>
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
               <a class="navbar-brand topnav" href="index.php">MJ JACOBE TRADING</a>

            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li>
                        <a href="cart.php">
                            <img class="cart-img" src="assets/images/cart.png">
                            MY CART
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">MY ACCOUNT<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="login-member.php"><i class="fa fa-sign-in"></i> Login</a></li>
                        </ul>
                    </li>


                </ul>
            </div>
            <!-- navigation  -->

        </div>
        <!-- /.container -->

    </nav>

  <br><br><br>
	<h3>Registration Form</h3>
	<hr class="soft"/>
	
    
    <div style="position:absolute; left:500px;">
	<form class="form-horizontal">
		<div class="control-group">
        <div class="row">
        <div class="col-md-6">
				<label class="control-label" for="inputFname">First name:</label>
			<div class="controls">
        
			 	<input type="text" id="inputFname" placeholder="First Name" required/>
			</div>
	    </div>
        </div>
        </div>
		<div class="control-group">
        <div class="row">
        <div class="col-md-6">
				<label class="control-label" for="inputLname">Last name:</label>
			<div class="controls">
				<input type="text" id="inputLname" placeholder="Last Name" required/>
			</div>
		</div>
        </div>
        </div>
		<div class="control-group">
        <div class="row">
        <div class="col-md-6">
				<label class="control-label" for="homeadress">Home Address:</label>
			<div class="controls">
				<input type="text" id="address" placeholder="Adress" required/>
			</div>
        </div>
        </div>
        </div>
        <div class="control-group">
        <div class="row">
        <div class="col-md-6">
        		<label class="control-label" for="destination">Shipping Destination:</label>
        	<div class="controls">
        		<input type="text" id="address" placeholder="Shipping Destination" required/>
			</div>
		</div>
        </div>
        </div>
		<div class="control-group">
        <div class="row">
        <div class="col-md-6">
				<label class="control-label" for="mobile">Contact Number</label>
			<div class="controls">
				<input type="text"  name="mobile" id="mobile" placeholder="Mobile Phone" required/> 
			</div>
		</div>
        </div>
        </div>
        <div class="control-group">
        <div class="row">
        <div class="col-md-6">
				<label class="control-label" for="inputEmail">Email:</label>
			<div class="controls">
		  		<input type="text" id="inputEmail" placeholder="Email Address" required/>
			</div>
        </div>
        </div>
        </div>
        <div class="control-group">
        <div class="row">
        <div class="col-md-6">
				<label class="control-label" for="inputUsername">Username:</label>
			<div class="controls">
		  		<input type="text" id="inputEmail" placeholder="Username" />
			</div>
	  	</div>
        </div>
        </div>	  
		<div class="control-group">
    	<div class="row">
        <div class="col-md-6">
				<label class="control-label" for="inputPassword">Password:</label>
			<div class="controls">
		  		<input type="password" id="inputPassword" placeholder="Password"/>
			</div>
	  	</div>
        </div>
        </div>
        <div class="control-group">
    	<div class="row">
        <div class="col-md-6">
				<label class="control-label" for="retypePassword">Re-type Password:</label>
			<div class="controls">
		  		<input type="password" id="inputPassword" placeholder="Re-type Password"/>
			</div>
	  	</div>
        </div>
        </div>
        <div class="control-group">
			<center>
              	<button class="btn btn-success" style="margin-right:20px;">
              		REGISTER
              	</button>
              	<button class="btn btn-warning">
              		CANCEL
              	</button>
  			</center>
		</div>		
	</form>
</div>
    </div>

<!-- jQuery -->
<script src="vendor/js/jquery-3.1.1.min.js"></script>

<script>
	$(function(){
		$('.btn-success').click(function(s){
			s.preventDefault();
			alert("You are registered!");
			window.location='login-member.php';
		});		
	});
</script>
<script>
	$(function(){
		$('.btn-warning').click(function(z){
			z.preventDefault()
			window.location='index.php';
		});		
	});
</script>
  </body>
</html>