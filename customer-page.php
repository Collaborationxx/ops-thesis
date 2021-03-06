<?php
//check if user has session
session_start();
$role = $_SESSION['user_role'];
if($_SESSION["username"] == null) { //if not redirect to login page
  header('location: index.php');
} else {
  if($role != 2){ //prevent other people other than admin in accessing dashboard
    header('location: index.php');
  }
}

$userID = $_SESSION['id'];

include('includes/functions.php');
include('data-manager/get-profile.php');
include('data-manager/get-orders-by-customer.php');
include('data-manager/get-reservation-by-customer.php');
include('data-manager/get-notifications.php');

$serverURL = "http://$_SERVER[HTTP_HOST]";
$i = 1;

//orders by customer
$oDistinct = array();
foreach ($orders as $key => $value){
    $oDistinct[$value['id']]['transaction_date'] = $value['transaction_date'];
    $oDistinct[$value['id']]['payment_status'] = $value['payment_status'];
    $oDistinct[$value['id']]['payment_confirmed'] = $value['payment_confirmed'];

}

//reservations by customer
$rDistinct = array();
foreach ($reservationsByCustomer as $key => $value){
    $rDistinct[$value['id']]['transaction_date'] = $value['transaction_date'];
    $rDistinct[$value['id']]['payment_status'] = $value['payment_status'];
    $rDistinct[$value['id']]['payment_confirmed'] = $value['payment_confirmed'];
}

// echo '<pre>'; print_r($oDistinct); exit;
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

  <!-- dataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">


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
    <li class="active"><a data-toggle="tab" href="#profile-tab-content" id="profile-tab">Profile</a></li>
    <!--<li><a data-toggle="tab" href="#wishlist-tab-content">Wish List</a></li>-->
    <li><a data-toggle="tab" href="#order-tab-content" id="order-tab">Orders</a></li>
    <li><a data-toggle="tab" href="#reservation-tab-content" id="reservation-tab">Reservations</a></li>
    <li><a data-toggle="tab" href="#notification-tab-content" id="notif-tab">Notification</a></li>
    <li><a data-toggle="tab" href="#accountSettings-tab-content" id="account-tab">Settings</a></li>
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


    <div id="order-tab-content" class="tab-pane fade in">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6 col-xs-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-inbox"></i>   Orders</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-striped table-bordered" id="order-table">
                                  <thead>
                                    <tr style="background-color: #e6ffe6;">
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($oDistinct) AND count($oDistinct) > 0): ?>
                                        <?php foreach ($oDistinct as $okey => $oVal): ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><a href="#" class="order-id" data-id="<?php echo $okey; ?>"><?php echo "OPS-".date('Y', $oVal['transaction_date']).'-O-'.$okey; ?></a></td>
                                                <td><?php echo date('F/j/Y',$oVal['transaction_date']); ?></td>
                                                <td name="pay_stat" data-id="<?php echo $oVal['payment_status']; ?>" data-confirmed="<?php echo $oVal['payment_confirmed']; ?>">
                                                <?php
                                                  if($oVal['payment_confirmed'] == 0){
                                                      echo $oVal['payment_status'] == 0 ? 'Waiting for payment' : 'Payment Sent';
                                                  } else {
                                                    echo "Payment Confirmed";
                                                  }
                                                ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                   <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-xs-12">
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
                                        <input type="text" class="hidden current_ID" value="">
                                        <input type="text" class="hidden total_amount" value="">
                                        <input type="text" class="hidden paymentID" value="">
                                    </div>
                                    <div class="form-group">
                                        <p>Please deposit your full payment in the bank account provided below within 7 days to process your order.</p>
                                        <p>Reply with the deposit number when you paid your order:</p>
                                    </div>
                                    <div class="form-group">
                                        <p class="errMess dpNumEmpty" style="display: none;">*This is a required Field.</p>
                                        <p class="errMess dpNumInvalid" style="display: none;">Numbers Only</p>
                                        <label>Account No:</label>
                                        <input type="number" min="0" step="any" class="form-control" name="deposit-number">
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
          <div class="col-lg-6 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-inbox"></i>   Reservation</h3>
              </div>
              <div class="box-body">
                <table class="table table-striped table-bordered" id="reservation-table">
                  <thead>
                    <tr style="background-color: #e6ffe6;">
                        <th>#</th>
                        <th>Reservation ID</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($rDistinct) AND count($rDistinct) > 0): ?>
                        <?php foreach ($rDistinct as $rkey => $rVal): ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><a href="#" class="reservation-id" data-id="<?php echo $rkey; ?>"><?php echo "OPS-".date('Y', $rVal['transaction_date']).'-R-'.$rkey; ?></a></td>
                                <td><?php echo date('F/j/Y',$rVal['transaction_date']); ?></td>
                                <td name="r_pay_stat" data-id="<?php echo $rVal['payment_status']; ?>" data-confirmed="<?php echo $rVal['payment_confirmed']; ?>">
                                <?php
                                  if($rVal['payment_confirmed'] == 0){
                                      echo paymentStatus($rVal['payment_status']);
                                  } else {
                                    echo "Payment Confirmed";
                                  }
                                ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-xs-12">
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
                          <input type="text" class="hidden current_ID" value="">
                          <input type="text" class="hidden total_amount" value="">                                        <input type="text" class="hidden paymentID" value="">
                      </div>
                      <div class="form-group">
                          <p>Please deposit your full payment in the bank account provided below within 7 days to process your order.</p>
                          <p>Reply with the deposit number when you paid your order:</p>
                      </div>
                      <div class="form-group">
                          <p class="errMess dpNumEmpty" style="display: none;">*Please input Numbers Only.</p>
                         <!--   <p class="errMess dpNumInvalid" style="display: none;">Numbers Only</p> -->
                          <label>Account No:</label>
                          <input type="number" min="0" step="any" class="form-control" name="deposit-number">
                      </div>
                      <div class="form-group">
                        <label>Mode:</label>
                        <select class="form-control" id="payment-mode">
                            <option value="0">Partial Payment</option>
                            <option value="1">Full Payment</option>  
                        </select>
                      </div>
                      <div class="form-group">
                          <p class="errMess err-deposit" style="display: none;"></p>
                          <p class="errMess dpAmEmpty" style="display: none;">*This is a required Field.</p>
                          <p class="errMess dpAmInvalid" style="display: none;">Numbers Only</p>
                          <label>Amount Deposited:</label>
                          <input type="number" min="0" step="any" class="form-control" name="deposit-amount">
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-success pull-right btn-send-r" disabled="disabled">Send <i class="fa fa-share-square-o"></i></button>
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
          <div class="col-lg-12 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-envelope"></i>   My Messages</h3>
              </div>
              <div class="box-body">
                <table class="table table-striped table-bordered" id="notification-table">
                  <thead>
                    <tr style="background-color: #e6ffe6;">
                      <th>Subject</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($notifications) AND count($notifications) > 0): ?>
                      <?php foreach ($notifications as $nkey => $nValue): ?>
                        <tr>
                          <?php if($nValue['type'] == 'b'): ?>
                            <td>
                              <a class="notification-payment" data-id="<?php echo empty($nValue['order_id']) ? $nValue['reservation_id'] : $nValue['order_id']; ?>" data-type="<?php echo empty($nValue['order_id']) ? 'reservation' : 'order'; ?>" data-status="<?php echo $nValue['payment_status']; ?>" href="#" data-toggle="modal" data-target="#notification-modal">Payment Status</a>
                            </td>
                          <?php else: ?>
                            <td><a href="#" class="notification-tracking" data-id="<?php echo empty($nValue['order_id']) ? $nValue['reservation_id'] : $nValue['order_id']; ?>" data-type="<?php echo empty($nValue['order_id']) ? 'reservation' : 'order'; ?>" data-tid="<?php echo $nValue['tracking_id']; ?>" data-courier="<?php echo $nValue['courier']; ?>" data-toggle="modal" data-target="#notification-modal">Tracking Number</a></td>
                          <?php endif; ?>    
                          <td class="transDate"> <?php echo date_format(date_create($nValue['insert_date']), 'F/j/Y h:i A')?></td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>    
                  </tbody>
                </table>
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
<!-- Notification modal -->
<div id="notification-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- end notification -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->

<script src="plugins/dist/js/app.min.js"></script>

<script src="plugins/js/validator.js"></script>

<!-- dataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- bootbox.js -->
<script src="assets/js/bootbox.min.js"></script>

<!-- moment.js -->
<script src="assets/js/moment.js"></script>


<script>
    $(function () {
        var serverURL = <?php echo json_encode($serverURL)?>; // get server url (localhost/webserver)
        var userID = <?php echo json_encode($userID) ?>; 
        var partial = '';
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
        $(document).on('click', 'a.order-id', function () {
            $('.btn-send').prop('disabled', false);
            var oid = $(this).attr('data-id');
            var status = $(this).closest('tr').find('td[name="pay_stat"]').attr('data-id');
            var confirmed = $(this).closest('tr').find('td[name="pay_stat"]').attr('data-confirmed');
            console.debug('status'. status)
            console.debug('oid', oid);
            console.debug('confirmed', confirmed);

            
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
                    $('.current_ID').val(oid);
                    $('.total_amount').val(tot);
                    console.debug('total', tot)
                    console.debug('orders', ord)

                  },
              });



              if(status == 1){

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
                            $('.paymentID').val(e.id);
                        });
                    }, 
                });
            }

              if(confirmed == 1){
                  $('.btn-send').prop('disabled', true);
              }
              
             
              
        });


        $(document).on('click','.btn-send', function(e){
            e.preventDefault();
            sendPayment($(this), 0, 1, 'div#order-tab-content');  
        });

        //reservation form
        $(document).on('click', '.reservation-id', function () {

            $('.btn-send-r').prop('disabled', false);
            var rid = $(this).attr('data-id');
            var status = $(this).closest('tr').find('td[name="r_pay_stat"]').attr('data-id');
            var confirmed = $(this).closest('tr').find('td[name="r_pay_stat"]').attr('data-confirmed');
            var tot = 0;

            console.debug('status', status)
            console.debug('rid', rid);
            console.debug('confirmed', confirmed);

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
                    var res = rData.reservation;
                    for(var i=0; i < res.length; i++){
                        resd += res[i].name + '\n' +
                                'Qty: ' + res[i].quantity + '\n' +
                                'Price: ' + res[i].price + '\n' ;

                        tot += parseFloat(res[i].total);
                    }


                    $('.reservation-details').val(resd + '\n' + 'Total: ' + parseFloat(tot).toFixed(2));
                    $('.current_ID').val(rid);
                    $('.total_amount').val(tot);
                    console.debug('total', tot)
                    console.debug('res', resd)

                  },
              });


              if(status > 0){
                  $.ajax({
                      type: 'POST',
                      url: serverURL + '/ops/data-manager/get-payment-by-reservationID.php',
                      data: {rid: rid},
                      dataType: 'json',
                      success: function (rData) {
                          var res = rData.payment_details;
                          $(res).each(function(i,e){
                              console.log(e)
                              $('input[name="deposit-number"]').val(e.deposit_number);
                              $('input[name="deposit-amount"]').val(e.deposit_amount);
                              $('select#payment-mode').val(e.payment_mode);
                              $('select#payment-mode').prop('disabled', true);
                              $('.paymentID').val(e.id);
                              partial = e.deposit_amount;

                          });
                      }, 
                  });
              }

              if(confirmed == 1){
                  $('.btn-send-r').prop('disabled', true);
              }


        });

        $(document).on('click','.btn-send-r', function(e){
            e.preventDefault();
            var pm = $('select#payment-mode').val();
            console.debug('pm', pm )
            sendPayment($(this), 1, pm, 'div#reservation-tab-content'); 

        });



        function sendPayment(button, pf, pm, tab)
        {
            $('p.errMess').hide();
            $('.form-group').removeClass('has-error');

            var deposit_number = $(button).closest('form').find('input[name="deposit-number"]').val();
            var deposit_amount = $(button).closest('form').find('input[name="deposit-amount"]').val();
            var payment_id = $(button).closest('form').find('input.paymentID').val();
            var current_id = $(button).closest('form').find('input.current_ID').val();
            var total = $(button).closest('form').find('input.total_amount').val();

            if(payment_id == ''){
                partial = parseFloat(total) / 2;
            } else {
                partial = parseFloat(total) - parseInt(partial);
            }

            console.debug(partial);
            var due = pm == 0 ? partial : total;
            var payment = {
                dp_number: deposit_number,
                dp_amount: deposit_amount,
                tid: current_id,
                pf: pf,
                pm: pm,
                pid: payment_id,
            }

            console.log(payment)
            console.log(due)

            if(deposit_amount >= due){
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
                          $(tab).find('.box-body').find('.form-control').val('');
                      }

                      if(rData.dpNumEmpty){
                          $(tab).find('.dpNumEmpty').closest('.form-group').addClass('has-error');
                          $(tab).find('p.dpNumEmpty').css('display', 'block');
                      }
                      if(rData.dpNumInvalid){
                          $(tab).find('.dpNumInvalid').closest('.form-group').addClass('has-error');
                          $(tab).find('p.dpNumInvalid').css('display', 'block');    
                      }
                      if(rData.dpAmEmpty){
                          $(tab).find('.dpAmEmpty').closest('.form-group').addClass('has-error');
                          $(tab).find('p.dpAmEmpty').css('display', 'block');  
                      }

                      if(rData.dpAmInvalid){
                          $(tab).find('.dpAmInvalid').closest('.form-group').addClass('has-error');
                          $(tab).find('p.dpAmInvalid').css('display', 'block');    
                      }

                  },
              });
            } else {
                console.log('kulang pera mo')
                $('p.err-deposit').css('display', 'block');
                $('p.err-deposit').html('Please pay the amount of: ' + parseFloat(due).toFixed(2) + ' to continue this transaction.');    
                $('p.err-deposit').closest('.form-group').addClass('has-error');
            }

        };

        $(document).on('click', '.notification-payment', function(e){
            var notifModal = $('#notification-modal');
            $(notifModal).find('modal-body .p').html('');
            var content = '';
            var transID = $(this).attr('data-id');
            var subject = $(this).text();
            var type =  $(this).attr('data-type');
            var status = $(this).attr('data-status');
            var transDate = $(this).closest('tr').find('.transDate').text();
            var currentTime = new Date()
            var year = currentTime.getFullYear();
            var char = 'R';
            if(type == 'order') char = 'O';

            var data = {
              transID: transID,
              subject: subject,
              type: type,
              status: status,
              transDate: transDate
            }
            console.log(data)
            

            if(status == 1){
                content = 'Your ' + type + ' ' + 'OPS-'+ year + '-' + char + '-' + transID + ' was confirmed! Please wait for another message about the tracking information of your ' + type + '.</br>Thank you for shopping with OPS!';
            } else {
                content = 'Your ' + type + ' ' + 'OPS -'+ year  + '-' + char + '-' + transID  + ' was rejected. <br> This happened because of either of the following: <br> (1) Deposit does not exist. <br> (2) Insufficient payment. <br> Please check the payment details you have sent then send it again to process the transaction. Thank you!';
            }

            $(notifModal).on('shown.bs.modal', function(){
                $(this).find('.modal-title').text(subject);
                $(this).find('.modal-body p').html(content);
            });

        })

        $(document).on('click', '.notification-tracking', function(e){
            var notifModal = $('#notification-modal');
            $(notifModal).find('modal-body .p').html('');
            var content = '';
            var transID = $(this).attr('data-id');
            var subject = $(this).text();
            var type =  $(this).attr('data-type');
            var courier = $(this).attr('data-courier');
            var trackingNumber = $(this).attr('data-tid');
            var transDate = $(this).closest('tr').find('.transDate').text();
            var currentTime = new Date()
            var year = currentTime.getFullYear();
            var char = 'R';
            if(type == 'order') char = 'O';

            var data = {
              transID: transID,
              subject: subject,
              type: type,
              courier: courier,
              trackingNumber: trackingNumber,
              status: status,
              transDate: transDate
            }
            console.log(data)
            
            content = 'Your ' + type + ' ' + 'OPS-'+ year + '-' + char + '-' + transID + ' was sent via ' + courier +'. Here is your tracking number: '+ trackingNumber +'. Expect your item between 1-2 business days.</br>Thank you for shopping with OPS!';

            $(notifModal).on('shown.bs.modal', function(){
                $(this).find('.modal-title').text(subject);
                $(this).find('.modal-body p').html(content);
            });

        });

        function getNotification(){
            var currentTime = new Date()
            var year = currentTime.getFullYear();
            var transId = '';
            var type = '';
            var subject = '';
            var status = '';
            var table = $('#notification-table');

            $.ajax({
                type: 'POST',
                url: serverURL + '/ops/data-manager/get-notifications-by-customer.php',
                data: {id: userID},
                dataType: 'json',
                success: function(rData){
                    console.log(rData)
                    if(rData.length > 0){
                        $(rData).each(function(i,e){
                          var oid = e.order_id;
                          var dateString = moment.unix(e.insert_date).format("MMMM/DD/YYYY h:mm A");
                          console.log(oid)

                          if(e.type == 'b'){
                              subject = 'Payment Status';
                          } else {
                              subject = 'Tracking Number';
                          }

                          if(oid.length > 0 && oid != undefined){
                              transId = 'OPS-'+ year + '-O-' + e.order_id;
                              type = 'order';
                          } else {
                              transId = 'OPS-'+ year + '-R-' + e.reservation_id;
                              type = 'reservation';
                          }

                          var td1 = '<a class="notification-subject" data-id="'+ transId +'" data-type="'+ type +'" data-status="' + e.payment_status + '" href="#" data-toggle="modal" data-target="#notification-modal"><strong>' + subject +'</strong></a>';

                          var td2 = '<span class="transDate">'+ dateString +'</span>';

                          $('#notification-table tbody').prepend('<tr><td>'+ td1 +'</td><td>'+ td2 +'</td></tr>');

                        });
                    }
                },

            });
        }

        setInterval(getNotification, 30000);

        $('#reservation-tab').click(function(){
            $('#reservation-tab-content').find('input').val('');  
            $('#reservation-tab-content').find('textarea').val('');
            $('p.errMess').hide();
            $('.form-group').removeClass('has-error');  
            $('input[name="deposit-number"]').prop('disabled', false);
            $('input[name="deposit-amount"]').prop('disabled', false);
            $('select#payment-mode').prop('disabled', false);
            $('.btn-send-r').prop('disabled', false);

        });

        $('#order-tab').click(function(){
            $('#order-tab-content').find('input').val('');  
            $('#order-tab-content').find('textarea').val('');  
            $('p.errMess').hide();
            $('.form-group').removeClass('has-error');
            $('input[name="deposit-number"]').prop('disabled', false);
            $('input[name="deposit-amount"]').prop('disabled', false); 
            $('select#payment-mode').prop('disabled', false);
            $('.btn-send').prop('disabled', false);

        });


        //dataTables pagination scripts
        $('#order-table').dataTable({
            "paging": true,
            "lengthChange": true,
            "lengthMenu": [ 5, 10, 25, 50, 75, 100],
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
        });

        $('#reservation-table').dataTable({
            "paging": true,
            "lengthChange": true,
            "lengthMenu": [ 5, 10, 25, 50, 75, 100],
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
        });

        $('#notification-table').dataTable({
            "paging": true,
            "lengthChange": true,
            "lengthMenu": [ 5, 10, 25, 50, 75, 100],
            "searching": true,
            "ordering": true,
            "order": [[ 1, "desc" ]],
            "info": false,
            "autoWidth": true,
        });

        function reDraw(){
            var index = 0, //0 sets the index as the first row
            rowCount = DataTableVAR.data().length-1,
            insertedRow = DataTableVAR.row(rowCount).data(),
            tempRow;

            for (var i=rowCount;i>index;i--) {
                tempRow = DataTableVAR.row(i-1).data();
                DataTableVAR.row(i).data(tempRow);
                DataTableVAR.row(i-1).data(insertedRow);
            }     
            //refresh the page
            DataTableVAR.page(currentPage).draw(false);
        }

        function printReport(table){
            var tableToPrint = document.getElementById(table);
            newWin= window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
        }






  });
</script>

</body>
</html>