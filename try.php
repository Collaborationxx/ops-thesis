<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
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
               <a href="#">
               <img src="assets/images/ops.png" style="position:absolute; left:80px; width:100px; height:54px; margin-left:7px;">
               <img src="assets/images/received_10210688875834340.jpeg" style="position:absolute; left:180px; width:200px; height:54px; margin-left:7px;">
               </a>

            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li class="dropdown">
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
  <br><br><br><br>
	<h3 class="carth">SHOPPING CART [ <small>3 Item(s) </small>]</h3>
    <div style="position:absolute; right:160px; top:100px;"><a href="index.php" class="btn btn-success">Continue Shopping</a></div>
    <div style="position:absolute; right:50px; top:100px;">
    <!--modal-->
	<button class="btn btn-danger" onclick="document.getElementById('id01').style.display='block'">Check Out</button></div>
    
<div id="id01" class="mod">
  
  <form class="mod-content ani">
    <span onclick="document.getElementById('id01').style.display='none'"></span>


    <form id="login-form" action="authentication/authentication.php" method="post">
				
              <?php if (isset($_GET['message'])): ?>
                <div class="err-mess">
                  <span class="login-err-mess"><?php echo $_GET['message']; ?></span>
                </div>
              <?php endif; ?>
            <div class="field-wrap">
              <input name="username" type="text" placeholder="Username" required/>
            </div>
            <div class="field-wrap">
              <input name="password" type="password" placeholder="Password" required/>
            </div>
            <br>
            <p class="forgot"><a href="forgot-password.php">Forgot Password?</a></p>
            <button class="button button-block"/>Log In</button>
            <a href="index.php"><button class="button2 button-cancel" />Cancel</button></a>
          </form>
        </div>
        <div id="signup">   
          <form id="signup-form" action="authentication/signup.php" method="post">
            <?php if (isset($_GET['message'])): ?>
              <div class="err-mess">
                <span class="login-err-mess">Please fill all the required fields.</span>
              </div>
            <?php endif; ?>
          <div class="top-row">
            <div class="field-wrap">
              <input type="text" name="fname" placeholder="First Name" required/>
            </div>
            <div class="field-wrap">
              <input type="text" name="lname" placeholder="Last Name" required autocomplete="off"/>
            </div>
            </div>
            <div class="top-row">
             <div class="field-wrap">
            <input type="text" name="contact" placeholder="Home Address" required autocomplete="off"/>
          </div>
            <div class="field-wrap">
              <input type="text" name="destination" placeholder="Shipping Destination" required autocomplete="off"/>
            </div>
          </div>
          <div class="top-row">
           <div class="field-wrap">
            <input type="text" name="contact" placeholder="Contact Number" required autocomplete="off"/>
          </div>
          <div class="field-wrap">
            <input type="text" name="email" placeholder="Email Address" required autocomplete="off"/>
          </div>
          </div>
		  <div class="field-wrap">
            <input type="email" name="email" placeholder="Username" required autocomplete="off"/>
          </div>
          <div class="field-wrap">
            <input type="password" name="password" placeholder="Password" required autocomplete="off"/>
          </div>
          <button type="submit" class="button button-block">Register</button>
          <a href="index.php"><button class="button2 button-cancel" />Cancel</button></a>

          </form>

  </form>
</div>

<script>
// Get the modal
var mod = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == mod) {
        mod.style.display = "none";
    }
}
</script></div>
    
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
                  <td> <img width="60" src="assets/images/bandage.jpg" alt=""/></td>
                  <td>MASSA AST<br/>Color : black, Material : metal</td>
				  <td>
					<div class="input-append"><input class="span1" style="max-width:34px; height:30px;" placeholder="1" id="appendedInputButtons" size="16" type="text"><button class="btn" type="button"><i class="icon-minus"></i></button><button class="btn" type="button"><i class="icon-plus"></i></button><button class="btn btn-warning" type="button"><i class="icon-remove icon-white"></i></button>				</div>
				  </td>
                  <td>$120.00</td>
                  <td>$25.00</td>
                  </tr>
				<tr>
                  <td> <img width="60" src="assets/images/wheelchair.jpg" alt=""/></td>
                  <td>MASSA AST<br/>Color : black, Material : metal</td>
				  <td>
					<div class="input-append"><input class="span1" style="max-width:34px; height:30px;" placeholder="1" id="appendedInputButtons" size="16" type="text"><button class="btn" type="button"><i class="icon-minus "></i></button><button class="btn" type="button"><i class="icon-plus"></i></button><button class="btn btn-warning" type="button"><i class="icon-remove icon-white"></i></button>				</div>
				  </td>
                  <td>$7.00</td>
                  <td>--</td>
                </tr>
				<tr>
                  <td> <img width="60" src="assets/images/walker-boots.jpg" alt=""/></td>
                  <td>MASSA AST<br/>Color : black, Material : metal</td>
				  <td>
					<div class="input-append"><input class="span1" style="max-width:34px; height:30px;" placeholder="1" id="appendedInputButtons" size="16" type="text"><button class="btn" type="button"><i class="icon-minus"></i></button><button class="btn" type="button"><i class="icon-plus"></i></button><button class="btn btn-warning" type="button"><i class="icon-remove icon-white"></i></button>				</div>
				  </td>
                  <td>$120.00</td>
                  <td>$25.00</td>
                </tr>
				
                <tr>
                  <td colspan="4" align="right">Total Price:	</td>
                  <td> $228.00</td>
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