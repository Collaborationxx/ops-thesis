<!DOCTYPE html>
<html>
<head>
    <title>OPS I Forgot Password</title>
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
    <link href="assets/css/cart.css" rel="stylesheet">

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
               <a href="index.php"><img src="assets/images/ops.png" style="position:absolute; left:80px; width:100px; height:50px; margin-left:7px;"><img src="assets/images/received_10210688875834340.jpeg" style="position:absolute; left:180px; width:200px; height:50px; margin-left:7px;"></a>

            </div>
            
            <!-- navigation  -->

        </div>
        <!-- /.container -->

    </nav>

    <!-- end nav -->
 <div class="page-wrapper">
 <div class="page-inner" style="min-height:560px;">
  
    <h3 style="color:#0C6;"> FORGOT YOUR PASSWORD?</h3>	
	<hr class="soft"/>
	
	<div class="row">
		<div class="span9" style="margin-left:300px; ">
			<div class="well">
			<h5>Reset your password</h5><br/>
			Please enter the email address for your account. A verification code will be sent to you. Once you have received the verification code, you will be able to choose a new password for your account.<br/><br/><br/>
			<form>
			  <div class="control-group">
				<label class="control-label" for="inputEmail">E-mail address</label>
				<div class="controls">
				  <input class="span3"  type="text" id="inputEmail" placeholder="Email" style="height:40px;">
				</div>
			  </div>
			  <div class="controls">
			  <button type="submit" class="btn btn-success">Submit</button>
              <!--<script type="text/javascript">alert("We sent you the verication  code. Check your email!")</script> -->
			  </div>
			</form>
		</div>
		</div>
       
	</div>	
	
</div>
</div>
</div><!-- /container -->

</div>
<!-- jQuery -->
<script src="vendor/js/jquery-3.1.1.min.js"></script>

<script>
	$(function(){
		$('.btn-success').click(function(e){
			e.preventDefault();
			alert("We sent you the verication  code. Check your email!");
			window.location='index.php';
		});		
	});
</script>

 
 </div>
 </div>
 </div>
 </body></html>