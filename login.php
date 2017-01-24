<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>OPS Login | Signup</title>
  
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel="stylesheet" href="assets/css/login-form.css">

</head>

<body>

  <?php if (isset($_GET['status'])): ?>
    <div class="alert alert-success">
      <strong>Success!</strong> Registration Successful! You can now login to your account.
    </div>
  <?php endif; ?>
  <div class="form">
  	<center><a href="index.php"><img src="assets/images/ops.png" style="width:200px; height:80px; "/></a></center>
  	<ul class="tab-group">
        <li class="tab active"><a href="#login">Log In</a></li>
        <li class="tab"><a href="#signup">Sign Up</a></li>
    </ul>

      <div class="tab-content">
        <div id="login">
          <h1>Welcome Back!</h1>

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
            <p class="forgot"><a href="forgotpassword.php">Forgot Password?</a></p>
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
              <input type="text" name="fname" placeholder="First Name" required autocomplete="off"/>
            </div>
            <div class="field-wrap">
              <input type="text" name="lname" placeholder="Last Name" required autocomplete="off"/>
            </div>
            </div>
            <div class="top-row">
             <div class="field-wrap">
            <input type="text" name="address" placeholder="Home Address" required autocomplete="off"/>
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
            <input type="text" name="username" placeholder="Username" required autocomplete="off"/>
          </div>
          <div class="field-wrap">
            <input type="password" name="password" placeholder="Password" required autocomplete="off"/>
          </div>
          <button type="submit" class="button button-block">Register</button>
          <a href="index.php"><button class="button2 button-cancel" />Cancel</button></a>

          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->

  <script src='assets/js/jquery-1.10.2.js'></script>
  <script src="assets/js/login-form.js"></script>
  
</body>
</html>
