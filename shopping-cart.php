
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
  <nav class="navbar navbar-default" style="height: 70px; background-color: #e6ffe6;">
    <div class="container-fluid">
       <div class="row">
        <div class="col-md-6 col-xs-5">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php"><img src="assets/images/opslogo.png" class="ops-nav-logo"></a>
        </div>
        </div>
        <div class="col-md-6 col-xs-7">
          <span class="pull-right" style="margin-top: 15px; margin-bottom: -5px;">
            <ol class="breadcrumb">
              <li><a href="index.php">Home</a></li>
              <li class="active">My Cart</li>
            </ol>
          </span>
        </div>

      </div>
  </nav>
 
    <section class="content-header">
      <h1>
        Shopping Cart
        <small>[1 Item]</small>
        <span class="pull-right" style="margin-top: 10px; margin-bottom: 10px;">
          <a href="index.php" type="button" class="btn btn-info">Continue Shopping</a>

         <button type="button" class="btn btn-success" data-toggle="modal" data-target="#login-signup-modal">
            Reserve 
          </button>
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#login-signup-modal">
            Checkout 
          </button>


              <!-- login && sign up popup -->
    <div class="modal fade" id="login-signup-modal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
              <div class="tab-content">
                  <div class="row">
                      <div class="col-md-6 col-xs-6 login-group active-group">
                          Login
                      </div>
                      <div class="col-md-6 col-xs-6 signup-group">
                          Sign Up
                      </div>
                  </div>
                <div class="login-group-content">
                    <div class="panel-body">
                        <form id="login-form" method="post" action="authentication/authentication.php">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" required>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" name="password" class="form-control" id="pwd" required>
                            </div>
                            <div class="checkbox">
                                <label>Forgot Pasword?   <a href="forgot-password.php">Click here</a></label>
                            </div>
                            <button type="submit" class="btn btn-success pull-right">Sign In</button>
                        </form>
                    </div>
                </div>
                <!--sign up form-->
                <div class="signup-group-content">
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
                                        <label for="contact">Contact No.:</label>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="signup-username">Username:</label>
                                        <input type="text" class="form-control" name="username" id="signup-username" placeholder="Set a username" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="psw">Password</label>
                                        <input type="password" class="form-control" name="password" id="psw" placeholder="Set a password" required>
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
        </div>

      </div>
    </div>
    <!-- end login && sign up modal -->

    <!-- end popup content -->
          
          <!--<a href="#login-signup-modal" type="button" class="btn btn-success" data-toggle="modal" >Checkout</a>

          <!--<a href="#" type="button" class="btn btn-success">Check Out</a>-->



          </span> 
     
    </section>





    <!-- Main content -->
    <section class="content">
        <div class="row">
         
          <div class="col-lg-12 col-xs-12">
            <div class="box box-success">
              <div class="box-body no-padding">
                <table class="table table-striped table-bordered table-responsive">
                  <tbody>
                    <tr>
                      <th>Product Photo</th>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Total Price</th>
                    </tr>
                    <tr>
                      <td></td>
                      <td>Wheelchair</td>
                      <td>
                        2
                      </td>
                      <td>5,000</td>
                      <td>10,000</td>
                    </tr>
                    <tr>
                      <td colspan="4"><span class="pull-right"><b>TOTAL:</b></span></td>
                      <td><span>1000.00</span>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </section>
  

<!--script for modal-->
    <script src="assets/js/jquery-2.1.3.min.js"></script>
    <script src="assets/js/idangerous.swiper.min.js"></script>
    <script src="assets/js/global.js"></script>

    
     <!-- range slider -->
    <script src="assets/js/jquery-ui.min.js"></script>

    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/js/validator.js"></script>

     <script>
        $(document).ready(function(){
            $('.signup-group-content').css('display', 'none');
            $('.alert').delay(3000).fadeOut('fast');
            var minVal = parseInt($('.min-price span').text());
            var maxVal = parseInt($('.max-price span').text());
            $( "#prices-range" ).slider({
                range: true,
                min: minVal,
                max: maxVal,
                step: 5,
                values: [ minVal, maxVal ],
                slide: function( event, ui ) {
                    $('.min-price span').text(ui.values[ 0 ]);
                    $('.max-price span').text(ui.values[ 1 ]);
                }
            });


            $('.signup-group').click(function(){
                $('.signup-group-content').css('display', 'block');
                $('.login-group-content').css('display', 'none');
                $(this).addClass('active-group');
                $('.login-group').removeClass('active-group');
            });

            $('.login-group').click(function(){
                $('.signup-group-content').css('display', 'none');
                $('.login-group-content').css('display', 'block');
                $(this).addClass('active-group');
                $('.signup-group').removeClass('active-group');
            });

        });
    </script>


    
</body>
</html>