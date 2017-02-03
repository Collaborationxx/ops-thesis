<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OPS | Staff Panel</title>

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
        <ul class="nav navbar-nav navbar-right pull-right" style="margin-top: 10px;">
          <li><a href="logout.php"><i class="fa fa-sign-out"></i>  Logout</a></li>
        </ul>
      </div>
    </div>
    </div>
    </nav>

 
    <section class="content-header">
      <h1>
        Staff Dashboard
        <small>Control Panel</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-lg-4 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-pencil-square-o"></i>   Over the Counter Trading</h3>
                </div>
                <div class="box-body">
                  <form role="form">
                    <div class="form-group">
                      <label>Product Category:</label>
                          <select class="form-control" id="prod-category">
                          <option value="">*Choose Category</option>
                          <option value="1">Electronic</option>
                          <option value="2">Self-Care</option>
                          <option value="3">Diagnostic</option>
                          <option value="4">Surgical</option>
                          <option value="5">Durable Medical Equipment</option>
                          <option value="6">Acute Care</option>
                          <option value="7">Emergency and Trauma</option>
                          <option value="8">Long-Term Care</option>
                          <option value="9">Storage and Transport</option>
                          </select>
                    </div>
                    <div class="form-group">
                      <label>Product Name:</label>
                      <input type="text" class="form-control" name="prod-name" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                      <label>Price:</label>
                      <input type="text" class="form-control" name="price" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                      <label>Quantity:</label>
                      <input type="text" class="form-control" name="quantity" placeholder="Enter ...">
                    </div>
                  </form>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-success pull-right">Place Order</button>
                </div>
            </div>
          </div>
        </div>
          <div class="col-lg-8 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-file"></i>   Trading Preview</h3>
                <button class="btn btn-success btn-sm pull-right" style="margin-bottom: 10px;">Save  <i class="fa fa-arrow-down"></i></button>
              </div>
              <div class="box-body no-padding">
                <table class="table table-striped table-bordered">
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
                      <td>2</td>
                      <td>5,000</td>
                      <td>10,000</td>
                    </tr>
                    <tr>
                      <td colspan="4"><span class="pull-right"><b>TOTAL:</b></span></td>
                      <td><span>10,000</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="box-footer">
                <div class="row">
                  <div class="col-md-12 col-xs-12">
                    <span class="pull-right">This table contains the record of over the counter orders.</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  
                   

  <!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/dist/js/app.min.js"></script>

</body>
</html>