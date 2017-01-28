<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OPS | My Account</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vendor/ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vendor/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="vendor/dist/css/skins/skin-green.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <link rel="stylesheet" type="text/css" href="assets/css/ops-custom.css">
  <link rel="shortcut icon" href="assets/images/ops.png" />
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php"><img src="assets/images/ops.png" class="ops-nav-logo"></a>
      </div>
      <div class="">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php"><i class="fa fa-sign-out text-danger"></i>  Logout</a></li>
        </ul>
      </div>
  </nav>
  <div class="container">
    <h3>My Account</h3>
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#profile-tab-content">Profile</a></li>
      <li><a data-toggle="tab" href="#wishlist-tab-content">Wish List</a></li>
      <li><a data-toggle="tab" href="#orders-tab-content">Orders</a></li>
      <li><a data-toggle="tab" href="#accountSettings-tab-content">Settings</a></li>
    </ul> 

    <div class="tab-content">
       <div id="profile-tab-content" class="tab-pane fade in active">
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-xs-12">
              <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-user"></i>   My Info</h3>
                </div>    
                <div class="box-body">
                    <form role="form">
                      <div class="row">
                        <div class="col-lg-6 col-xs-12">
                          <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" placeholder="Enter ...">
                          </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                          <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" placeholder="Enter ...">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12 col-xs-12">
                          <div class="form-group">
                            <label>Home Address</label>
                            <textarea class="form-control" rows="3"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12 col-xs-12">
                          <div class="form-group">
                            <label>Shipping Address</label>
                            <textarea class="form-control" rows="3"></textarea>
                          </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-lg-6 col-xs-12">
                          <div class="form-group">
                            <label>Contact No.</label>
                            <input type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control">
                          </div>
                        </div>
                      </div>
                    </form>
                </div>
                <div class="box-footer">
                    <button type="button" class="btn btn-success pull-right">Save</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="wishlist-tab-content" class="tab-pane fade in">
        <div class="panel-body">
          <table class="table table-striped table-bordered table-responsive">
            <tbody>
              <tr>
                <th style="width: 10px">#</th>
                <th>Item</th>
                <th>Quatity</th>
                <th>Preview</th>
                <th style="text-align: center;">Action</th>
              </tr>
              <tr>
                <td>1.</td>
                <td>Wheelchair</td>
                <td>1</td>
                <td>
                  <img src="assets/images/wheelchair.jpg" class="ops-table-img">
                </td>
                <td style="text-align: center;">
                  <a href="#" data-toggle="tooltip" title="Remove this item from Wishlist"><i class="fa fa-times text-danger"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div id="orders-tab-content" class="tab-pane fade in">
        <div class="panel-body">
          <table class="table table-striped table-responsive">
            <tbody>
              <tr>
                <th style="width: 10px">#</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Delivery Date</th>
                <th>Preview</th>
                <th style="text-align: center;">Action</th>
              </tr>
              <tr>
                <td>1.</td>
                <td>Wheelchair</td>
                <td>1</td>
                <td>For Verification</td>
                <td>Jan 27 - Feb 4, 2017</td>
                <td>
                  <img src="assets/images/wheelchair.jpg" class="ops-table-img">
                </td>
                <td style="text-align: center;">
                  <button class="btn btn-warning" type="button">Cancel Order</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div id="accountSettings-tab-content" class="tab-pane fade in">
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-xs-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h4>Change username or password</h4>
                </div>
                <div class="box-body">
                  <form role="form">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                      <label>Old Password</label>
                      <input type="text" class="form-control" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                      <label>New Password</label>
                      <input type="text" class="form-control" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                      <label>Re-type Password</label>
                      <input type="text" class="form-control" placeholder="Enter ...">
                    </div>
                  </form>  
                </div>
                <div class="box-footer">
                  <button type="button" class="btn btn-info pull-right">Modify</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- jQuery 2.2.3 -->
<script src="vendor/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<<<<<<< HEAD
<script src="..page/dist/js/app.min.js"></script>
=======
<script src="vendor/vendor/dist/js/app.min.js"></script>
>>>>>>> 7e32d54828217acf09c58dd9e790f541f77378a9

</body>
</html>