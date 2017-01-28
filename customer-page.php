<?php
//check if user has session
session_start();
if($_SESSION["username"] == null) { //if not redirect to login page
  header('location: index.php');
}

include('data-manager/get-profile.php');

//echo '<pre>'; print_r($arr); exit;
?>
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
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i><span>Hello <?php echo $_SESSION['username']; ?></span><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="customer-page.php"><i class="fa fa-cogs"></i>My Account</a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>
              </ul>
            </li>
        </ul>
      </div>
  </nav>
  <div class="container">
    <h3>My Account</h3>
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#profile-tab-content">Profile</a></li>
      <li><a data-toggle="tab" href="#wishlist-tab-content">Wish List</a></li>
      <li><a data-toggle="tab" href="#message-tab-content">Message</a></li>
      <li><a data-toggle="tab" href="#notification-tab-content">Notification</a></li>
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
                  <?php if(isset($arr) AND count($arr) > 0):?>
                    <?php foreach ($arr as $key => $value): ?>
                      <form role="form">
                      <div class="row">
                        <div class="col-lg-6 col-xs-12">
                          <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" value="<?php echo $value['first_name']; ?>">
                          </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                          <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" value="<?php echo $value['last_name']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12 col-xs-12">
                          <div class="form-group">
                            <label>Home Address</label>
                            <textarea class="form-control" rows="3"><?php echo $value['address']; ?></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12 col-xs-12">
                          <div class="form-group">
                            <label>Shipping Address</label>
                            <textarea class="form-control" rows="3"><?php echo $value['shipping_address']; ?></textarea>
                          </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-lg-6 col-xs-12">
                          <div class="form-group">
                            <label>Contact No.</label>
                            <input type="text" class="form-control" value="<?php echo $value['contact_number']; ?>">
                          </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" value="<?php echo $value['email']; ?>">
                          </div>
                        </div>
                      </div>
                    </form>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-md-6 col-xs-6">
                      <button type="button" class="btn btn-default pull-right">Edit</button>
                    </div>
                    <div class="col-md-6 col-xs-6">
                      <button type="button" class="btn btn-success pull-left">Save</button>
                    </div>
                  </div>
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
      <div id="message-tab-content" class="tab-pane fade in">
        <div class="panel-body">
          <table class="table table-striped table-responsive table-bordered" style="max-width: 40%">
            <tbody>
              <tr>
                <th style="width: 10px">#</th>
                <th>Message</th>
                <th>Date</th>
              </tr>
              <tr>
                <td>1.</td>
                <td>Order Confirmation</td>
                <td>01/23/17</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div> 
      <div id="notification-tab-content" class="tab-pane fade in">
        <div class="panel-body">
          <table class="table table-striped table-responsive table-bordered" style="max-width: 40%">
            <tbody>
              <tr>
                <th style="width: 10px">#</th>
                <th>Message</th>
                <th>Date</th>
              </tr>
              <tr>
                <td>1.</td>
                <td>OrderTracking</td>
                <td>01/23/17</td>
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

<script src="vendor/dist/js/app.min.js"></script>

</body>
</html>