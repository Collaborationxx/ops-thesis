<!DOCTYPE html>
<html>
<head>
	<title>Confirmation</title>
	<meta name="author" content="3 Idiots">
  	<meta name="description" content="Customer Profile Page">

  	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<!-- Custom CSS -->
    <link rel="stylesheet" href="css/nav.css" type="text/css" media="all" />
   <!-- <link rel="stylesheet" href="css/shop.css" type="text/css" media="all" /> -->

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body style="background-color:#DFDFDF">
<div class="wrapper">
    <!-- nav -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div style="position:absolute; left:10px;"><img src="images/received_10202475646247875.jpeg" width="90px"; height="50px"></div>
               &nbsp;&nbsp; <a class="navbar-brand topnav" href="#">MJ JACOBE TRADING</a>

            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                

                </ul>
            </div>
            <!-- navigation  -->

        </div>
        <!-- /.container -->

    </nav>

    <!-- end nav -->
	<div class="form-page">
		<div class="form">     
            <h1>CONFIRMATION OF ORDER</h1>
		  <form id="registration-form" class="register-form" method="POST" action="register.php">
              <input name="order" type="text" placeholder="Order ID"/>
              <input name="accountName" type="text" placeholder="Account Name"/>
              <input name="confirmation" type="text" placeholder="Confirmation Number"/>
		      <input name="transactiondate" type="text" placeholder="Transaction Date"/>
              <input name="amount" type="text" placeholder="Amount of Payment"/>
              <button name="btn-save" type="submit">CONFIRM MY ORDER</button>
`		  </form></div></div>
</body>
</html>