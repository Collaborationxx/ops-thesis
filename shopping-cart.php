<?php
    session_start();
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
    $usr_id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
    $serverURL = "http://$_SERVER[HTTP_HOST]";
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
    <nav class="navbar navbar-default" style="height: 70px; background-color: #e6ffe6;">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-xs-6">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php"><img src="assets/images/opslogo.png" class="ops-nav-logo"></a>
        </div>
        </div>

        <div class="col-md-6 col-xs-6">
     
          <ul class="nav navbar-nav navbar-right pull-right" style="margin-top: 10px;">
            <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i><span>   Hello <?php echo $_SESSION['username']; ?></span><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="customer-page.php"><i class="fa fa-cogs"></i>My Account</a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
</nav>

   

    <!-- Main content -->
    <section class="container">
         <?php if (isset($_GET['status'])): ?> 
                <div class="ops-alert">
                    <strong>Success!</strong> Registration Successful! You can now login to your account.
                </div>
     <?php endif; ?> 
        <div class="cont">
            <a href="index.php"><i class="fa fa-angle-left"></i> Continue Shopping</a>
        </div>

        <div class="alert alert-success remove-success" role="alert">
          <p>Item removed from cart</p>
        </div>
        <div class="content-header">
          <h1> My Cart <small class="item_count"></small><h1>
          <a href="#" class="btn btn-danger btn-sm pull-right btn-checkout"><i class="fa fa-angle-double-right"></i>  Checkout</a>
          <a href="#" class="btn btn-warning btn-sm pull-right btn-reserve" style="margin-right: 10px;"><i class="fa fa-archive"></i>  Reserved</a>
        </div>
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box box-success">
                    <div class="box-body no-padding">
                        <table class="table table-striped table-bordered table-responsive cart-table">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Product Photo</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                    <th style="width: 50px;"></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                      <div class="total-price pull-right"></div>
                    </div>
            </div>
        </div>
    </section>

    <!-- login && sign up popup -->
    <div id="login-signup-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <p class="header-title"></p>
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
                                    <p class="errMess errCreds text-danger" style="display: none;"><b>Wrong username or Password</b></p>
                                    <p class="errMess reqField text-danger" style="display: none;"><b>*Fill in your username and password</b></p>
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
                                    <button type="submit" class="btn btn-success pull-righ btn-login">Sign In</button>
                                </form>
                            </div>
                        </div>
                        <!--sign up form-->
                        <div class="signup-group-content">
                            <div class="panel-body">
                                <form action="authentication/signup-from-cart.php?fromCart=1" method="post">
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


<!--script for modal-->
<script src="assets/js/jquery-2.1.3.min.js"></script>
<script src="assets/js/idangerous.swiper.min.js"></script>
<script src="assets/js/global.js"></script>


<!-- range slider -->
<script src="assets/js/jquery-ui.min.js"></script>

<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/js/validator.js"></script>
<script src="assets/js/bootbox.min.js"></script>
<script>
  $(document).ready(function(){

      var username = <?php echo json_encode($username); ?>;
      var usr_id = <?php echo json_encode($usr_id); ?>;
      console.log(username)
      $('.signup-group-content').css('display', 'none');
      $('.alert').css('display','none');
      var modal = ('#login-signup-modal');
      var serverURL = <?php echo json_encode($serverURL); ?>;
      var table = $('.cart-table');
      var cart = JSON.parse(localStorage.getItem('myCart'));
      var item_count = cart == null ? 0 : cart.length;
      var type = 0;

      $('.ops-alert').delay(2000).fadeOut('fast');
      
      console.log(cart);
      $('.item_count').text('[ '+ item_count + ' Item(s) ]');

      if(item_count > 0){
          var i = 1;
          var total = 0;
          $(cart).each(function(x,y){
              var sub_total = parseFloat(parseInt(y.qty) * parseFloat(y.price)).toFixed(2);
              table.append(
                  '<tr>' + 
                      '<td>'+ i++ + '</td>' +
                      '<td name="prod-pic" class="table-pic"><img src="'+ y.img +'" /></td>' +
                      '<td data-id="'+ y.id +'"name="prod_name">' + y.name +'</td>' +
                      '<td name="quantity">'+ y.qty + '</td>' +
                      '<td name="price">'+ y.price +'</td>' +
                      '<td name="sub_total">' + sub_total + '</td>' +
                      '<td style="text-align: center">' +
                      '<a href=#" class="update-item" data-toggle="tooltip" title="Update Item"><i class="fa fa-pencil text-info"></i></a>    |    ' +
                      '<a href=#" class="remove-item" data-toggle="tooltip" title="Remove Item"><i class="fa fa-times text-danger"></i></a>' +
                      '</td>' +
                  '</tr>'
              );
              total = parseFloat(parseFloat(total) + parseFloat(sub_total)).toFixed(2);
          });
         
          $('.total-price').html('TOTAL: ' + total);
//          $('.btn-cart').attr('disabled', false);

      } else {
//          $('.btn-cart').attr('disabled', true);
          table.append(
            '<tr><td colspan="6" style="text-align:center">No Item in your cart yet. Look around, you might find something you\'ll like.</td>');
      }


      $(document).on('click', '.remove-item', function(){
          var id = $(this).closest('tr').find('td[name="prod_name"]').attr('data-id');
          bootbox.confirm({
              size: 'small',
              message: 'Remove item from cart?',
              callback: function(result){
                  if(result == true){
                      $.each(cart, function(index, obj){
                          if (obj.id == id) {
                              cart.splice(index,1);
                              console.log(cart);
                              localStorage.setItem('myCart', JSON.stringify(cart));
                              return false;
                          }
                      });
                      $(this).closest('tr').remove();
                      $('.alert').css('display','block');
                      $('.alert').delay(2000).fadeOut('fast');
                      setTimeout(function(){
                        location.reload();
                      },2010)
                  }
              },
          });
          console.debug('webStarage', cart)

      });

      $(document).on('click', '.update-item', function(){
          console.log('oks')
          var td = $(this).closest('tr').find('td[name="quantity"]');
          var pid = $(this).closest('tr').find('td[name="prod_name"]').attr('data-id');
          var qty = td.text();
          console.log(td)
          bootbox.prompt({
              title: 'Update Quantity',
              inputType: 'number',
              callback: function(result){
                  console.log(result);
                  if(result == null){
                      td.text(qty);
                  } else {
                      td.val(result);
                      for (var i = 0; i < cart.length; i++) {
                          if(pid == cart[i].id){  //look for match with nid
                              cart[i].qty = result;  //update quantity
                              break;  //exit loop since you found the product
                          }
                      }
                      localStorage.setItem("myCart", JSON.stringify(cart));
                      console.log(cart);
                      location.reload();
                  }
              },
          });
      });


     

      $('.btn-checkout').click(function (e) {
          e.preventDefault();
          if(username.length == 0){
              $('#login-signup-modal').find('.header-title').text('To checkout items:');
              $(modal).modal('show');

          } else {
              getCart(0); 
          }
          
      });

      $('.btn-reserve').click(function(e){
          e.preventDefault();
          $('#login-signup-modal').find('.header-title').text('To reserve items:');
          if(username.length == 0){
              type = 1;
              $('#login-signup-modal').find('.header-title').text('To checkout items:');
              $(modal).modal('show');
          } else {
              getCart(1); 
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

      $('.btn-login').click(function(e){
          e.preventDefault();
          console.log('ok')
          $('p.errMess').css('display', 'none');
          var username = $(this).closest('form').find('input[name="username"]').val();
          var password = $(this).closest('form').find('input[name="password"]').val();

          var data = {
              username: username,
              password: password
          };

          console.log(data)

          $.ajax({
              type: 'POST',
              url: serverURL + '/ops/authentication/authentication.php?fromCart=1',
              data: data,
              dataType: 'json',
              success: function(rData){
                  console.log(rData)
                  if(rData.errCreds){
                      $(modal).find('form#login-form').find('p.errCreds').css('display', 'block');
                  }
                  if(rData.reqField){
                      $(modal).find('form#login-form').find('p.reqField').css('display', 'block');
                  }
                  if(rData.redir){
                      var orders = {
                          userID: rData.userID,
                          items: cart,
                          param: type
                      }
                      $.ajax({
                          type: 'POST',
                          url: serverURL + '/ops/data-manager/check-out.php',
                          data: orders,
                          dataType: 'json',
                          success: function (oData) {
                              if(oData.status){
                                  localStorage.removeItem('myCart');
                                  window.location = rData.redir + '?fromCart=1';
                              }
                          },
                      });
                  }
              },
          });
      });

      function getCart(param){
          var data = {
              userID: usr_id,
              items: cart,
              param: param,
          }
          $.ajax({
              type: 'POST',
              url: serverURL + '/ops/data-manager/check-out.php',
              data: data,
              dataType: 'json',
              success: function (oData) {
                  if(oData.status){
                      localStorage.removeItem('myCart');
                      window.location = 'customer-page.php?fromCart=1';
                  }
              },
          });
        };
  });


</script>

</body>
</html>