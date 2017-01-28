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
      <li><a data-toggle="tab" href="#order-tab-content">Orders</a></li>
      <li><a data-toggle="tab" href="#reservation-tab-content">Reservations</a></li>
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
                            <textarea class="form-control" rows="2"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12 col-xs-12">
                          <div class="form-group">
                            <label>Shipping Address</label>
                            <textarea class="form-control" rows="2"></textarea>
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
      <div id="order-tab-content" class="tab-pane fade in">
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-4 col-xs-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-inbox"></i>   Orders</h3>
                </div>
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                      </tr>
                      <tr>
                        <td>OPS-1-2</td>
                        <td>01/06/17</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>

          <div class="col-lg-8 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-expand"></i>   Full Conversation</h3>
                </div>
                <div class="box-body">
                  <form role="form">
                    <div class="form-group">
                      <p>
                        Good day! Thank you for ordering medical supplies at OPS! The following is the list of your orders:
                      </p>
                      <textarea rows="2" style="width:200px;"></textarea>
                    </div>
                    <div class="form-group">
                      <p>Please deposit your full payment in the bank account provided below within 7 days to process your order.</p>
                      <p>Reply with the deposit number when you paid your order:</p>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6 col-xs-12">
                          <label>Deposit No:</label>
                        </div>
                        <div class="col-md-6 col-xs-12">
                          <input type="text" name="deposit-number">
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-6 col-xs-12">
                          <label>Amount Deposited:</label>
                        </div>
                        <div class="col-md-6 col-xs-12">
                          <input type="text" name="amount-deposited">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 col-xs-12">
                          <button type="submit" class="btn btn-success btn-sm pull-right">Send <i class="fa fa-share-square-o"></i></button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-md-12">
                      <label><strong>ACCOUNT NAME:</strong>  MJ Jacobe Trading | <strong>ACCOUNT NUMBER:</strong>  0932-4587</label>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        </div>
        </div>
      </div> 
      <div id="reservation-tab-content" class="tab-pane fade in">
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-4 col-xs-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-inbox"></i>   Reservation</h3>
                </div>
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <th>Reservation ID</th>
                        <th>Date</th>
                      </tr>
                      <tr>
                        <td>OPS-11-22</td>
                        <td>01/06/17</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>

          <div class="col-lg-8 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-expand"></i>   Full Conversation</h3>
                </div>
                <div class="box-body">
                  <form role="form">
                    <div class="form-group">
                      <p>
                        Good day! Thank you for the reservation of medical supplies at OPS! The following is the list of items you placed as reservation:
                      </p>
                      <textarea rows="2" style="width:200px;"></textarea>
                    </div>
                    <div class="form-group">
                      <p>Please deposit your down payment in the bank account provided below within 7 days to process your reservation.</p>
                      <p>Reply with the deposit number when you place your downpayment:</p>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6 col-xs-12">
                          <label>Deposit No:</label>
                        </div>
                        <div class="col-md-6 col-xs-12">
                          <input type="text" name="deposit-number">
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-6 col-xs-12">
                          <label>Downpayment:</label>
                        </div>
                        <div class="col-md-6 col-xs-12">
                          <input type="text" name="downpayment">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 col-xs-12">
                          <button type="submit" class="btn btn-success btn-sm pull-right">Send <i class="fa fa-share-square-o"></i></button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-md-12">
                      <label><strong>ACCOUNT NAME:</strong>  MJ Jacobe Trading | <strong>ACCOUNT NUMBER:</strong>  0932-4587</label>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        </div>
        </div>
      </div>
      <div id="notification-tab-content" class="tab-pane fade in">
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-4 col-xs-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-inbox"></i>   Tracking Orders</h3>
                </div>
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <th>Message</th>
                        <th>Date</th>
                      </tr>
                      <tr>
                        <td>Tracking Number</td>
                        <td>01/06/17</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
             </div>

            <div class="col-lg-8 col-xs-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-expand"></i>   Full Conversation</h3>
                </div>
                <div class="box-body">
                  <form role="form">
                    <div class="form-group">
                      <p>
                        Good day! Thank you for purchasing medical supplies at OPS! 
                      </p>
                    </div>
                    <div class="form-group">
                      <p>We already shipped your purchased medical supplies with the following information:</p>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6 col-xs-12">
                          <label>Order ID:</label>
                        </div>
                        <div class="col-md-6 col-xs-12">
                          <input type="text" name="order-id">
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-6 col-xs-12">
                          <label>Tracking Number:</label>
                        </div>
                        <div class="col-md-6 col-xs-12">
                          <input type="text" name="tracking-number">
                        </div>
                      </div>
                  </form>
                </div>
               
            </div>
          </div>
        </div>
        </div>
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

<script src="..page/dist/js/app.min.js"></script>

</body>
</html>