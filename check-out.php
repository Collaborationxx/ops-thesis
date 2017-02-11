<?php
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OPS | Shopping Cart</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="plugins/ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="plugins/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="plugins/dist/css/skins/skin-green.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/css/ops-custom.css">
    <link rel="shortcut icon" href="assets/images/small-logo.png" />
</head>
<body>
    <nav class="navbar navbar-default shop-nav">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-xs-5">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php"><img src="assets/images/opslogo.png" class="ops-nav-logo"></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3>Check Out</h3>
                    </div>
                    <div class="box-body">
                        <div class="tab-content">
                            <div class="row">
                                <div class="col-md-6 col-xs-6 order-group active-tab">
                                    Login
                                </div>
                                <div class="col-md-6 col-xs-6 reserve-group">
                                    Sign Up
                                </div>
                            </div>
                            <div class="order-group-content">
                                <div class="panel-body">
                                    <form id="order-now-form" method="post" action="#">
                                        <div class="form-group">
                                            <label for="payment"></label>
                                            <select class="form-control" id="payment-select">
                                                <option>Mode</option>
                                                <option>Partial</option>
                                                <option>Full</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Password:</label>
                                            <input type="password" name="password" class="form-control" id="pwd" required>
                                        </div>
                                        <div class="checkbox">
                                            <label>Forgot Pasword?   <a href="forgot-password.php">Click here</a></label>
                                        </div>
                                        <button type="submit" class="btn btn-success pull-righ btn-login">Sign In</button>
                                    </form>
                                </div>
                            </div>
                            <!--reserve form-->
                            <div class="reserve-group-content">
                                <div class="panel-body">
                                    <form action="authentication/signup.php" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">

                                                    <div class="row">
                                                        <div class="control-group">
                                                            <div class="col-md-6 col-xs-12">
                                                                <label for="fname">First Name:</label>
                                                                <input type="text" class="form-control" name="fname" id="fname" required>
                                                            </div>
                                                        </div>

                                                        <div class="control-group">
                                                            <div class="col-md-6 col-xs-12">
                                                                <label for="lname">Last Name:</label>
                                                                <input type="text" class="form-control" name="lname" id="lname" required>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="address">Home Address:</label>
                                                    <textarea rows="2" class="form-control" name="address" id="address" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="ship-address">Shipping Address:</label>
                                                    <textarea rows="2" class="form-control" name="ship-address" id="ship-address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contact">Contact Number:</label>
                                                    <input type="text" class="form-control" name="contact" id="contact" maxlength="13" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email:</label>
                                                    <input type="email" class="form-control" name="email" id="email" required>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-success pull-right" style="margin-bottom: -20px;">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- js scripts -->
    <script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
    <script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/js/validator.js"></script>
    <script src="assets/js/bootbox.min.js"></script>
    <script>

        $(document).ready(function () {

            $('.reserve-group-content').css('display', 'none');

            $('.reserve-group').click(function(){
                $('.reserve-group-content').css('display', 'block');
                $('.order-group-content').css('display', 'none');
                $(this).addClass('active-tab');
                $('.order-group').removeClass('active-tab');
            });

            $('.order-group').click(function(){
                $('.reserve-group-content').css('display', 'none');
                $('.order-group-content').css('display', 'block');
                $(this).addClass('active-tab');
                $('.reserve-group').removeClass('active-tab');
            });
        });


    </script>
</body>
</html>