<?php
//check if user has session
session_start();

if($_SESSION["username"] == null) { //if not redirect to login page
  header('location: index.php');
}

include('data-manager/get-profile.php');
include('data-manager/get-orders-by-customer.php');
include('data-manager/get-reservation-by-customer.php');

$serverURL = "http://$_SERVER[HTTP_HOST]";
$i = 1;

//orders by customer
$oDistinct = array();
foreach ($orders as $key => $value){
    $oDistinct[$value['id']]['order_date'] = $value['order_date'];
    $oDistinct[$value['id']]['payment_status'] = $value['payment_status'];
}

//reservations by customer
$rDistinct = array();
foreach ($reservationsByCustomer as $key => $value){
    $rDistinct[$value['id']]['reserved_date'] = $value['reserved_date'];
    $rDistinct[$value['id']]['payment_status'] = $value['payment_status'];
}

// echo '<pre>'; print_r($rDistinct); exit;
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
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="plugins/ionicons/css/ionicons.min.css">

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
<div class="container">
  <h3 style="margin-top: -5px; margin-bottom: 5px; font-weight: bold;">My Account</h3>
  <div class="break"></div>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#profile-tab-content">Profile</a></li>
    <!--<li><a data-toggle="tab" href="#wishlist-tab-content">Wish List</a></li>-->
    <li><a data-toggle="tab" href="#order-tab-content">Orders</a></li>
    <li><a data-toggle="tab" href="#reservation-tab-content">Reservations</a></li>
    <li><a data-toggle="tab" href="#notification-tab-content">Notification</a></li>
    <li><a data-toggle="tab" href="#accountSettings-tab-content">Settings</a></li>
  </ul>

  <div class="tab-content">
    <div class="alert alert-success alert-dismissable alert-update-success" style="display: none;">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      <strong>Success!</strong> Profile Updated.
    </div>
    <div id="profile-tab-content" class="tab-pane fade in active">
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-user"></i>   My Info</h3>
              </div>
              <div class="box-body profile-section">
                <?php if(isset($arr) AND count($arr) > 0):?>
                  <?php foreach ($arr as $key => $value): ?>
                    <form role="form">
                      <div class="row">
                        <div class="col-lg-6 col-xs-12">
                          <div class="form-group">
                            <p class="error-mess errFname" style="display: none;">Only letters and white space allowed</p>
                            <p class="error-mess errFnameReq" style="display: none;">* First Name is Required</p>
                            <label>First Name</label>
                            <input type="text" class="form-control" name="fname" value="<?php echo $value['first_name']; ?>" disabled required>
                          </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                          <div class="form-group">
                            <p class="error-mess errLname" style="display: none;">Only letters and white space allowed</p>
                            <p class="error-mess errLnameReq" style="display:none;">* Last Name is Required</p>
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lname" value="<?php echo $value['last_name']; ?>" disabled required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12 col-xs-12">
                          <div class="form-group">
                            <p class="error-mess errAddReq" style="display: none">* Home Address is Required</p>
                            <label>Home Address</label>
                            <textarea class="form-control" rows="3"  name="address" disabled required><?php echo $value['address']; ?></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12 col-xs-12">
                          <div class="form-group">
                            <label>Shipping Address</label>
                            <textarea class="form-control" rows="3" name="shipAddress" disabled><?php echo $value['shipping_address']; ?></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-xs-12">
                          <div class="form-group">
                            <p class="error-mess errContact" style="display: none">Numbers Only</p>
                            <p class="error-mess errContactReq" style="display: none">* Contact is Required</p>
                            <label>Contact Number</label>
                            <input type="text" class="form-control" name="contact" value="<?php echo $value['contact_number']; ?>" disabled required>
                          </div>
                        </div>
                        <div class="col-lg-6 col-xs-12">
                          <div class="form-group">
                            <p class="error-mess errEmail" style="display: none">Invalid Email</p>
                            <p class="error-mess errEmailReq" style="display: none">* Email is Required</p>
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $value['email']; ?>" disabled required>
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
                    <a href="#" class="btn btn-default pull-right edit-profile-btn"><i class="fa fa-pencil text-warning"></i>   Edit</a>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <button type="submit" class="btn btn-success pull-left update-profile-btn disabled"><i class="fa fa-save">   Save</i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--
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
    </div>-->

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
                                  <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Payment Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($oDistinct) AND count($oDistinct) > 0): ?>
                                        <?php foreach ($oDistinct as $okey => $oVal): ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><a href="#" class="order-id" data-id="<?php echo $okey; ?>"><?php echo "OPS-".date('Y').'-O-'.$okey; ?></a></td>
                                                <td><?php echo date('F/j/Y',$oVal['order_date']); ?></td>
                                                <td name="pay_stat" data-id="<?php echo $oVal['payment_status']; ?>"><?php echo $oVal['payment_status'] == 1 ? 'Payment sent. Waiting for confirmation' : 'Waiting for Payment'; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" style="text-align: center">You have no orders yet.</td>
                                        </tr>
                                    <?php endif; ?>
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
                                    <div class="alert alert-success sucess-payment" role="alert" style="display: none;">
                                        <strong>Sucess!</strong> Payment sent! Please wait for the confirmation of your payment. We will notify you as soon as we are fdone checking it. Thank you!
                                    </div>
                                    <div class="form-group">
                                        <p>Good day! Thank you for ordering medical supplies at OPS! The following is the list of your orders:</p>
                                        <textarea class="form-control order-details" rows="5" style="width:100%" disabled="disabled"></textarea>
                                        <input type="text" class="hidden current_orderID" value="">
                                        <input type="text" class="hidden total_amount" value="">
                                    </div>
                                    <div class="form-group">
                                        <p>Please deposit your full payment in the bank account provided below within 7 days to process your order.</p>
                                        <p>Reply with the deposit number when you paid your order:</p>
                                    </div>
                                    <div class="form-group">
                                        <p class="errMess dpNumEmpty" style="display: none;">*This is a required Field.</p>
                                        <label>Deposit No:</label>
                                        <input type="text" class="form-control" name="deposit-number">
                                    </div>
                                    <div class="form-group">
                                        <p class="errMess err-deposit" style="display: none;"></p>
                                        <p class="errMess dpAmEmpty" style="display: none;">*This is a required Field.</p>
                                        <p class="errMess dpAmInvalid" style="display: none;">Numbers Only</p>
                                        <label>Amount Deposited:</label>
                                        <input type="number" min="0" step="any" class="form-control" name="deposit-amount">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success pull-right btn-send" disabled="disabled">Send <i class="fa fa-share-square-o"></i></button>
                                        <button type="submit" class="btn btn-success pull-right btn-resend" style="display: none;" disabled="disabled">Re-send  <i class="fa fa-share-square-o"></i></button>
                                    </div>
                                </form>
                            </div>
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
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Reservation ID</th>
                        <th>Date</th>
                        <th>Payment Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($rDistinct) AND count($rDistinct) > 0): ?>
                        <?php foreach ($rDistinct as $rkey => $rVal): ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><a href="#" class="reservation-id" data-id="<?php echo $rkey; ?>"><?php echo "OPS-".date('Y').'-R-'.$rkey; ?></a></td>
                                <td><?php echo date('F/j/Y',$rVal['reserved_date']); ?></td>
                                <td name="r_pay_stat" data-id="<?php echo $rVal['payment_status']; ?>"><?php echo $rVal['payment_status'] == 1 ? 'Payment sent. Waiting for confirmation' : 'Waiting for Payment'; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">You have no reservations yet.</td>
                        </tr>
                    <?php endif; ?>
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
                      <div class="alert alert-success sucess-payment" role="alert" style="display: none;">
                          <strong>Sucess!</strong> Payment sent! Please wait for the confirmation of your payment. We will notify you as soon as we are fdone checking it. Thank you!
                      </div>
                      <div class="form-group">
                          <p>Good day! Thank you for ordering medical supplies at OPS! The following is the list of your orders:</p>
                          <textarea class="form-control reservation-details" rows="5" style="width:100%" disabled="disabled"></textarea>
                          <input type="text" class="hidden current_reserveID" value="">
                          <input type="text" class="hidden r-total_amount" value="">
                      </div>
                      <div class="form-group">
                          <p>Please deposit your full payment in the bank account provided below within 7 days to process your order.</p>
                          <p>Reply with the deposit number when you paid your order:</p>
                      </div>
                      <div class="form-group">
                          <p class="errMess r-dpNumEmpty" style="display: none;">*This is a required Field.</p>
                          <label>Deposit No:</label>
                          <input type="text" class="form-control" name="r-deposit-number">
                      </div>
                      <div class="form-group">
                          <select class="form-control" id="payment_mode">
                              <option value="0">Partial Payment</option>
                              <option value="1">Full Payment</option>  
                          </select>
                      </div>
                      <div class="form-group">
                          <p class="errMess r-err-deposit" style="display: none;"></p>
                          <p class="errMess r-dpAmEmpty" style="display: none;">*This is a required Field.</p>
                          <p class="errMess r-dpAmInvalid" style="display: none;">Numbers Only</p>
                          <label>Amount Deposited:</label>
                          <input type="number" min="0" step="any" class="form-control" name="r-deposit-amount">
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-success pull-right btn-send-r" disabled="disabled">Send <i class="fa fa-share-square-o"></i></button>
                          <button type="submit" class="btn btn-success pull-right btn-resend-r" style="display: none;" disabled="disabled">Re-send  <i class="fa fa-share-square-o"></i></button>
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
      <div class="alert alert-success alert-dismissable alert-update-settings-success" style="display: none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Success!</strong> Account settings Updated.
      </div>
      <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h4>Change username or password</h4>
            </div>
            <div class="box-body">
              <form role="form">
                <div class="error-box">
                  <p class="errMess2" style="display: none;">Password incorrect!</p>
                  <p class="errMess" style="display: none;">New Password Not Match</p>
                </div>
                <div class="form-group username-group">
                  <p class="error-mess errUsernameReq" style="display: none">* Username is Required</p>
                  <label>Username</label>
                  <input type="text" class="form-control" name ="username" value="<?php echo $value['username']; ?>" required>
                </div>
                <div class="form-group password-group">
                  <p class="error-mess errOldPassReq" style="display: none">* This is a Required Field</p>
                  <label>Old Password</label>
                  <input type="password" class="form-control" name="current_password" placeholder="Enter ..." required>
                </div>
                <div class="form-group pass-group">
                  <p class="error-mess errNewPassReq" style="display: none">* This is a Required Field</p>
                  <p class="error-mess errPassLen" style="display: none">Password must be between 8 and 25 characters</p>
                  <label>New Password</label>
                  <input type="password" class="form-control" name="new_password" placeholder="Enter ..." required>
                </div>
                <div class="form-group pass-group">
                  <p class="error-mess errRePassReq" style="display: none">* Please type Password again.</p>
                  <label>Re-type Password</label>
                  <input type="password" class="form-control" name="retype_password" placeholder="Enter ..." required>
                </div>
              </form>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-info pull-right update-password">Modify</button>
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
<script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->

<script src="plugins/dist/js/app.min.js"></script>

<script src="plugins/js/validator.js"></script>

<script>
    $(function () {
        var serverURL = <?php echo json_encode($serverURL)?> // get server url (localhost/webserver)
        $('.alert').css('display', 'none');
        $('p.errMess').css('display', 'none');

        /** Edit button Functionality **/
        $('.edit-profile-btn').click(function (e) {
          e.preventDefault();
          $('.profile-section').find(':input').prop('disabled', false); //enable the input fields for editing
          $('.update-profile-btn').removeClass('disabled'); //enable save button; save button first state is disabled
        });

    /** Save button functionality  **/
        $('.update-profile-btn').click(function (e) {
            e.preventDefault();

            $('div#profile-tab-content div.form-group').removeClass('has-error');
            $('p.error-mess').css('display', 'none');

            var data = { //get the values of inputs
                firstName: $(this).closest('div.box').find('input[name="fname"]').val(),
                lastName: $(this).closest('div.box').find('input[name="lname"]').val(),
                address: $(this).closest('div.box').find('textarea[name="address"]').val(),
                shippingAddress: $(this).closest('div.box').find('textarea[name="shipAddress"]').val(),
                contact: $(this).closest('div.box').find('input[name="contact"]').val(),
                email: $(this).closest('div.box').find('input[name="email"]').val(),
                username : '<?php echo $_SESSION['username']; ?>'

            }
          /** POST request via ajax to send data to /data-manager/update-profile.php **/
             $.ajax({
                type: "POST",
                url: serverURL + '/ops/data-manager/update-profile.php',
                data: data,
                dataType: "json",
                success: function (rData) {
                    if(rData.status){
                        $('.profile-section').find(':input').prop('disabled', true); //on update success disables inputs
                        $('.alert-update-success').css('display', 'block'); //show success alert
                        $('.alert').delay(3000).fadeOut('fast'); //remove alert after 3s
                        $(this).addClass('disabled'); //disable save button
                    }

                    if(rData.errFname){
                        $('div#profile-tab-content').find('.errFname').closest('.form-group').addClass('has-error');
                        $('div#profile-tab-content').find('p.errFname').css('display', 'block');

                    }

                    if(rData.errFnameReq){
                        $('div#profile-tab-content').find('.errFnameReq').closest('.form-group').addClass('has-error');
                        $('div#profile-tab-content').find('p.errFnameReq').css('display', 'block');

                    }

                    if(rData.errLname){
                        $('div#profile-tab-content').find('.errLname').closest('.form-group').addClass('has-error');
                        $('div#profile-tab-content').find('p.errLname').css('display', 'block');

                    }

                    if(rData.errLnameReq){
                        $('div#profile-tab-content').find('.errLnameReq').closest('.form-group').addClass('has-error');
                        $('div#profile-tab-content').find('p.errLnameReq').css('display', 'block');

                    }

                    if(rData.errAddReq){
                        $('div#profile-tab-content').find('.errAddReq').closest('.form-group').addClass('has-error');
                        $('div#profile-tab-content').find('p.errAddReq').css('display', 'block');
                    }

                    if(rData.errContact){
                        $('div#profile-tab-content').find('.errContact').closest('.form-group').addClass('has-error');
                        $('div#profile-tab-content').find('p.errContact').css('display', 'block');
                    }

                    if(rData.errContactReq){
                        $('div#profile-tab-content').find('.errContactReq').closest('.form-group').addClass('has-error');
                        $('div#profile-tab-content').find('p.errContactReq').css('display', 'block');
                    }

                    if(rData.errEmail){
                        $('div#profile-tab-content').find('.errEmail').closest('.form-group').addClass('has-error');
                        $('div#profile-tab-content').find('p.errEmail').css('display', 'block');
                    }

                    if(rData.errEmailReq){
                        $('div#profile-tab-content').find('.errEmailReq').closest('.form-group').addClass('has-error');
                        $('div#profile-tab-content').find('p.errEmailReq').css('display', 'block');
                    }

                },
            });
        });

        /** update password **/
        $('.update-password').click(function(){
            $('div#accountSettings-tab-content div.form-group').removeClass('has-error');
            $('div.error-box p').css('display', 'none');
            $('p.error-mess').css('display', 'none');

            var data = {
                current_username: '<?php echo $_SESSION['username']; ?>',
                username: $(this).closest('div.box').find('input[name="username"]').val(),
                current_password: $(this).closest('div.box').find('input[name="current_password"]').val(),
                new_password: $(this).closest('div.box').find('input[name="new_password"]').val(),
                retype_password: $(this).closest('div.box').find('input[name="retype_password"]').val(),
            }

            $.ajax({
                type: "POST",
                url: serverURL + '/ops/data-manager/update-settings.php',
                data: data,
                dataType: "json",
                success: function(aData){
                    console.log(aData)

                    if(aData.status){
                        console.log('success')
                        $('.alert-update-settings-success').css('display', 'block'); //show success alert
                        $('.alert').delay(3000).fadeOut('fast');
                        $('div#accountSettings-tab-content').find('div.box').find('input[name="current_password"]').val('');
                        $('div#accountSettings-tab-content').find('div.box').find('input[name="new_password"]').val('');
                        $('div#accountSettings-tab-content').find('div.box').find('input[name="retype_password"]').val('');

                    }

                    if(aData.errMess2) {
                        $('div#accountSettings-tab-content div.password-group').addClass('has-error');
                        $('div.error-box .errMess2').css('display', 'block');
                    }

                    if(aData.errMess){
                        $('div#accountSettings-tab-content div.pass-group').addClass('has-error');
                        $('div.error-box .errMess').css('display', 'block');
                    }

                    if(aData.errNewPass){
                        $('div#accountSettings-tab-content').find('.errNewPassReq').closest('.form-group').addClass('has-error');
                        $('div#accountSettings-tab-content').find('p.errNewPassReq').css('display', 'block');
                        $('div#accountSettings-tab-content').find('.errRePassReq').closest('.form-group').addClass('has-error');
                        $('div#accountSettings-tab-content').find('p.errRePassReq').css('display', 'block');
                    }

                    if(aData.errCurrPass){
                        $('div#accountSettings-tab-content').find('.errOldPassReq').closest('.form-group').addClass('has-error');
                        $('div#accountSettings-tab-content').find('p.errOldPassReq').css('display', 'block');
                    }

                    if(aData.errUsername) {
                        $('div#accountSettings-tab-content').find('.errUsernameReq').closest('.form-group').addClass('has-error');
                        $('div#accountSettings-tab-content').find('p.errUsernameReq').css('display', 'block');
                    }

                    if(aData.errPassLen){
                        $('div#accountSettings-tab-content').find('.errPassLen').closest('.form-group').addClass('has-error');
                        $('div#accountSettings-tab-content').find('p.errPassLen').css('display', 'block');
                        $('div#accountSettings-tab-content').find('p.errNewPassReq').css('display', 'none');
                    }

                    //              setTimeout(function(){
                    //                $('div#accountSettings-tab-content div.form-group').removeClass('has-error');
                    //                $('div.error-box p').css('display', 'none');
                    //              }, 3000);

                },
            });
        });
        

        //order form 
        $(document).on('click', '.order-id', function () {
            $('.btn-resend').css('display','none');
            $('.btn-send').css('display','block');
            $('.btn-resend').prop('disabled',false);
            $('.btn-send').prop('disabled', false);
            var oid = $(this).attr('data-id');
            var status = $(this).closest('tr').find('td[name="pay_stat"]').attr('data-id');
            console.debug('oid', oid);
            
            var data = {
              fcp: 1
            }
            $.ajax({
                type: 'POST',
                url: serverURL + '/ops/data-manager/get-orders-by-orderID.php?oid=' + oid,
                data: data,
                dataType: 'json',
                success: function (rData) {
                    console.log(rData)
                    var ord = '';
                    var tot = 0;
                    var res = rData.orders;
                    for(var i=0; i < res.length; i++){
                        ord += res[i].name + '\n' +
                                'Qty: ' + res[i].quantity + '\n' +
                                'Price: ' + res[i].price + '\n' ;

                        tot += parseFloat(res[i].total);
                    }


                    $('.order-details').val(ord + '\n' + 'Total: ' + parseFloat(tot).toFixed(2));
                    $('.current_orderID').val(oid);
                    $('.total_amount').val(tot);
                    console.debug('total', tot)
                    console.debug('orders', ord)

                  },
              });

              if(status == 1){
                  $('.btn-resend').css('display','block');
                  $('.btn-send').css('display','none');

                  $.ajax({
                      type: 'POST',
                      url: serverURL + '/ops/data-manager/get-payment-by-orderID.php',
                      data: {oid: oid},
                      dataType: 'json',
                      success: function (rData) {
                          var res = rData.payment_details;
                          $(res).each(function(i,e){
                              console.log(e)
                              $('input[name="deposit-number"]').val(e.deposit_number);
                              $('input[name="deposit-amount"]').val(e.deposit_amount);   
                          });
                      }, 
                  });
              }
              
        });


        $(document).on('click','.btn-send', function(e){
            e.preventDefault();
            sendPayment($(this), 1, 0);  
        });

        $(document).on('click', '.btn-resend', function(e){
            e.preventDefault();
            sendPayment($(this), 1, 0);  
        });



        //reservation form
        $(document).on('click', '.reservation-id', function () {
            $('.btn-resend-r').css('display','none');
            $('.btn-send-r').css('display','block');
            $('.btn-resend-r').prop('disabled',false);
            $('.btn-send-r').prop('disabled', false);
            var rid = $(this).attr('data-id');
            var status = $(this).closest('tr').find('td[name="r_pay_stat"]').attr('data-id');
            console.debug('rid', rid);
            
            var data = {
              fcp: 1
            }
            $.ajax({
                type: 'POST',
                url: serverURL + '/ops/data-manager/get-reservation-by-reservationID.php?rid=' + rid,
                data: data,
                dataType: 'json',
                success: function (rData) {
                    console.log(rData)
                    var resd = '';
                    var tot = 0;
                    var res = rData.reservation;
                    for(var i=0; i < res.length; i++){
                        resd += res[i].name + '\n' +
                                'Qty: ' + res[i].quantity + '\n' +
                                'Price: ' + res[i].price + '\n' ;

                        tot += parseFloat(res[i].total);
                    }


                    $('.reservation-details').val(resd + '\n' + 'Total: ' + parseFloat(tot).toFixed(2));
                    $('.current_reserveID').val(rid);
                    $('.r-total_amount').val(tot);
                    console.debug('total', tot)
                    console.debug('res', resd)

                  },
              });

              if(status == 1){
                  $('.btn-resend-r').css('display','block');
                  $('.btn-send-r').css('display','none');

                  $.ajax({
                      type: 'POST',
                      url: serverURL + '/ops/data-manager/get-payment-by-reservationID.php',
                      data: {rid: rid},
                      dataType: 'json',
                      success: function (rData) {
                          var res = rData.payment_details;
                          $(res).each(function(i,e){
                              console.log(e)
                              $('input[name="r-deposit-number"]').val(e.deposit_number);
                              $('input[name="r-deposit-amount"]').val(e.deposit_amount);   
                          });
                      }, 
                  });
              }
              
        });

        $(document).on('click','.btn-send-r', function(e){
            e.preventDefault();
            var pm = $('select#payment_mode').val()
            sendResPayment($(this), pm, 1);  
        });

        $(document).on('click', '.btn-resend-r', function(e){
            e.preventDefault();
            var pm = $('select#payment_mode').val();
            sendResPayment($(this), pm, 1);  
        });



        function sendPayment(button, pf, pm)
        {
            $('p.errMess').css('display', 'none');
            console.log('clicked')
            var deposit_number = $(button).closest('form').find('input[name="deposit-number"]').val();
            var deposit_amount = $(button).closest('form').find('input[name="deposit-amount"]').val();
            var orderID = $(button).closest('form').find('input.current_orderID').val();
            var total = $(button).closest('form').find('input.total_amount').val();

            var payment = {
                dp_number: deposit_number,
                dp_amount: deposit_amount,
                tid: orderID,
                pf: pf,
                pm: pm,
            }

            console.log(payment)

            if(deposit_amount >= total){
                console.log('paid')
                $.ajax({
                  type: 'POST',
                  url: serverURL + '/ops/data-manager/add-payment.php',
                  data: payment,
                  dataType: 'json',
                  success: function(rData){
                      console.log(rData)
                      if(rData.status){
                          $('.sucess-payment').css('display', 'block'); //show success alert
                          $('.alert').delay(3000).fadeOut('fast');
                          $('div#order-tab-content').find('.box-body').find('.form-control').val('');
                      }

                      if(rData.dpNumEmpty){
                          $('div#order-tab-content').find('.dpNumEmpty').closest('.form-group').addClass('has-error');
                          $('div#order-tab-content').find('p.dpNumEmpty').css('display', 'block');
                      }

                      if(rData.dpAmEmpty){
                          $('div#order-tab-content').find('.dpAmEmpty').closest('.form-group').addClass('has-error');
                          $('div#order-tab-content').find('p.dpAmEmpty').css('display', 'block');  
                      }

                      if(rData.dpAmInvalid){
                          $('div#order-tab-content').find('.dpAmInvalid').closest('.form-group').addClass('has-error');
                          $('div#order-tab-content').find('p.dpAmInvalid').css('display', 'block');    
                      }

                  },
              });
            } else {
                console.log('kulang pera mo')
                $('p.err-deposit').css('display', 'block');
                $('p.err-deposit').html('Please pay your total bill of: ' + parseFloat(total).toFixed(2) + ' to continue this order.');
                $('p.err-deposit').closest('.form-group').addClass('has-error');
            }

        };


        function sendResPayment(button, pf, pm)
        {
            $('p.errMess').css('display', 'none');
            console.log('clicked')
            var deposit_number = $(button).closest('form').find('input[name="r-deposit-number"]').val();
            var deposit_amount = $(button).closest('form').find('input[name="r-deposit-amount"]').val();
            var reservationID = $(button).closest('form').find('input.current_reserveID').val();
            var total = $(button).closest('form').find('input.r-total_amount').val();
            var partial = parseFloat(total) / 2;
            console.debug('partial', partial)

            var payment = {
                dp_number: deposit_number,
                dp_amount: deposit_amount,
                tid: reservationID,
                pf: pf,
                pm: pm,
            }

            console.log(payment)
            
            if(deposit_amount >= partial){
                console.log('paid')
                $.ajax({
                  type: 'POST',
                  url: serverURL + '/ops/data-manager/add-payment.php',
                  data: payment,
                  dataType: 'json',
                  success: function(rData){
                      console.log(rData)
                      if(rData.status){
                          $('.sucess-payment').css('display', 'block'); //show success alert
                          $('.alert').delay(3000).fadeOut('fast');
                          $('div#reservation-tab-content').find('.box-body').find('.form-control').val('');
                      }

                      if(rData.dpNumEmpty){
                          $('div#reservation-tab-content').find('.r-dpNumEmpty').closest('.form-group').addClass('has-error');
                          $('div#reservation-tab-content').find('p.r-dpNumEmpty').css('display', 'block');
                      }

                      if(rData.dpAmEmpty){
                          $('div#reservation-tab-content').find('.r-dpAmEmpty').closest('.form-group').addClass('has-error');
                          $('div#reservation-tab-content').find('p.r-dpAmEmpty').css('display', 'block');  
                      }

                      if(rData.dpAmInvalid){
                          $('div#reservation-tab-content').find('.r-dpAmInvalid').closest('.form-group').addClass('has-error');
                          $('div#reservation-tab-content').find('p.r-dpAmInvalid').css('display', 'block');    
                      }

                  },
              });
            } else {
                console.log('kulang pera mo')
                $('p.r-err-deposit').css('display', 'block');
                $('p.r-err-deposit').html('Please pay at least half of your total bill of ' + parseFloat(total).toFixed(2) + ' to continue this reservation');
                $('p.r-err-deposit').closest('.form-group').addClass('has-error');
            }

        };


  });
</script>

</body>
</html>