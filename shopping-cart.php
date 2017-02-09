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
    <div class="cont">
      <a href="index.php"><i class="fa fa-angle-left"></i> Continue Shopping</a>
    </div>
    <!-- Main content -->
    <section class="container">
        <div class="content-header">
          <h1> My Cart <small class="item_count"></small><h1>
          <a class="btn btn-danger btn-sm pull-right btn-checkout">Checkout  <i class="fa fa-angle-double-right"></i></a>
        </div>
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box box-success">
                    <div class="box-body no-padding">
                        <table class="table table-striped table-bordered table-responsive cart-table">
                            <tbody>
                                <tr>
                                    <th>Product Photo</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
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
      var table = $('.cart-table');
      var cart = JSON.parse(localStorage.getItem('myCart'));
      var item_count = cart.length;
      console.log(cart);
      $('.item_count').text('[ '+ item_count + ' Item(s) ]');

      $(cart).each(function(x,y){
          table.append(
              '<tr>' + 
                  '<td name="prod-pic"></td>' +
                  '<td data-id="'+ y.id +'"name="prod_name">' + y.name +'</td>' +
                  '<td name="uantity">2</td>' +
                  '<td name="price">'+ y.price +'</td>' +
                  '<td name="sub_total">10,000</td>' +
              '</tr>'
          );
      });
  });
</script>

</body>
</html>