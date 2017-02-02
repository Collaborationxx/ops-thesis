<?php
session_start();

include('authentication/functions.php');

?>
<!DOCTYPE html>
<html>

<!-- Mirrored from 8theme.com/demo/html/mango/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Jan 2017 03:22:23 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no, minimal-ui"/>
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/idangerous.swiper.css" rel="stylesheet" type="text/css" />
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700%7CDancing+Script%7CMontserrat:400,700%7CMerriweather:400,300italic%7CLato:400,700,900' rel='stylesheet' type='text/css' />

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">

    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/css/ops-custom.css">

    <link rel="shortcut icon" href="assets/images/smalllogo.png" />
  	<title>OPS | Premium Quality You Can Afford!</title>
</head>
<body class="style-10">
    <!-- LOADER -->
    <div id="loader-wrapper">
        <div class="bubbles">
            <div class="title">Loading</div>
            <span></span>
            <span id="bubble2"></span>
            <span id="bubble3"></span>
        </div>
    </div>
    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Oops!</strong> Seems like you have entered a wrong username or password.
        </div>
    <?php endif; ?>
    <?php if (isset($_GET['status'])): ?>
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Success!</strong> Registration Successful! You can now login to your account.
        </div>
    <?php endif; ?>
    <div id="content-block">

        <div class="content-center fixed-header-margin">
            <!-- HEADER -->
            <div class="header-wrapper style-10">
                <header class="type-1">

                    <div class="header-product">
                        <div class="logo-wrapper">
                            <a href="#" id="logo">
                            
                            <img class="ops-logo" alt="" src="assets/images/opslogo.png">
                            </a>
                        </div>
                       
                        <div class="product-header-content">
                            <div class="line-entry">
                                <!--<div class="menu-button responsive-menu-toggle-class"><i class="fa fa-reorder"></i></div>-->
                                <div class="header-top-entry increase-icon-responsive open-search-popup">
                                    <div class="title"><i class="fa fa-search"></i> <span>Search</span></div>
                                </div>
                                <div class="header-top-entry increase-icon-responsive">

                                    <?php if(isset($_SESSION['username'])): ?>
                                        <div class="title">
                                            <ul>
                                                <li class="dropdown">
                                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i><span>Hello <?php echo $_SESSION['username']; ?></span><span class="caret"></span></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="<?php echo landingPage($_SESSION['user_role']); ?>"><i class="fa fa-cogs"></i>My Account</a></li>
                                                        <li><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>

                                    <?php else: ?>
                                        <div class="title"><a href="#" data-toggle="modal" data-target="#login-signup-modal"><i class="fa fa-user"></i>
                                                <span>My Account</span>
                                        </div>
                                         <?php endif; ?>

                                        </div>
                               
                            </div>

                            <div class="middle-line"></div>

                            <div class="line-entry">
                                <a href="index.php" class="header-functionality-entry"><i class="fa fa-home"></i><span>Home</span></a>

                                <div class="title">
                                    <ul>
                                        <li class="dropdown">
                                            <a class="header-functionality-entry dropdown-toggle"><i class="fa fa-bars"></i><span>Products</span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" style="color:#fff;"><i class="fa fa-angle-right"></i>Always on Hand</a></li>
                                                <li><a href="#" style="color:#fff;"><i class="fa fa-angle-right"></i>For Reservation</a></li>
                                                </ul>
                                        </li>
                                    </ul>
                                </div>



                                
                                <a href="#" class="header-functionality-entry open-wishlist-popup"><i class="fa fa-heart-o"></i><span>Wishlist</span></a>
                                <a href="#" class="header-functionality-entry open-cart-popup"><i class="fa fa-shopping-cart"></i><span>My Cart</span> <b>$255,99</b></a>
                            </div>
                        </div>
                    </div>

                    <div class="close-header-layer"></div>


                     <div class=" navigation navigation-footer responsive-menu-toggle-class">
                                
                         <div class="navigation-copyright">Copyright &copy; MJ Jacobe Trading. All right reserved</div>
                    </div>
                  
                </header>
                <div class="clear"></div>
            </div>