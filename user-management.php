<?php
//check if user has session
session_start();
if($_SESSION["username"] == null) { //if not redirect to login page
  header('location: index.php');
}

include('authentication/functions.php');
include('data-manager/get-users.php');
$count = 1;
$serverURL = "http://$_SERVER[HTTP_HOST]";

//echo '<pre>'; print_r($arr); exit;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OPS | User Management</title>
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
  <link rel="shortcut icon" href="assets/images/ops.png" />
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>OPS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>OPS</b> Dashboard</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="assets/img/person-placeholder_opt.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Hello <?php echo $_SESSION['username']; ?></span>&nbsp;&nbsp;
              <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="assets/img/person-placeholder_opt.jpg" class="img-circle" alt="User Image">
                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">
          <img src="assets/images/ops.png" class="ops-sidebar-logo">
        </li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active">
          <a href="dashboard.php">
          <img src="assets/images/dashboard.ico" class="ops-sidebar-img">
          <span>Dashboard</span></a>
        </li>
        <li>
          <a href="#">
          <img src="assets/images/user-512.png" class="ops-sidebar-img">
          <span>Account Manager</span></a>
        </li>
        <li>
          <a href="product-management.php">
          <img src="assets/images/catalogue-icon.png" class="ops-sidebar-img">
          <span>Product Catalog</span></a>
        </li>
        <li>
          <a href="order-tracking.php">
          <img src="assets/images/order-tracking.png" class="ops-sidebar-img">
          <span>Order Tracking</span></a>
        </li>
        <li>
          <a href="inventory-management.php">
          <img src="assets/images/inventory-flat.png" class="ops-sidebar-img">
          <span>Inventory</span></a>
        </li>
        <li>
          <a href="reports.php">
          <img src="assets/images/analytics.png" class="ops-sidebar-img">
          <span>Reports</span></a>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Management
        <small>Control Panel</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="alert alert-success alert-dismissable delete-success" style="display: none;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success!</strong> Record Deleted.
        </div>
        <div class="row">
          <div class="col-lg-12 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-user"></i>   Accounts</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#add-user-modal"><i class="fa fa-plus" ></i>&nbsp;&nbsp;New Account</button>
                </div>

              </div>
              <div class="box-body no-padding">
                <div class="table-responsive">
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contact No.</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                      </tr>
                      <?php if(isset($arr) AND count($arr) > 0): ?>
                        <?php foreach ($arr as $key => $value): ?>
                          <tr class="word-wrapper">
                            <td name="user-id" style="display: none"><?php echo $value['id']; ?></td>
                            <td><?php echo $count++; ?></td>
                            <td name="username"><?php echo $value['username']; ?></td>
                            <td><?php echo strtoupper($value['last_name']).", ".$value['first_name']; ?></td>
                            <td name="fname" style="display: none"><?php echo $value['first_name']; ?></td>
                            <td name="lname" style="display: none"><?php echo $value['last_name']; ?></td>
                            <td name="address"><?php echo $value['address']; ?></td>
                            <td name="contact"><?php echo $value['contact_number']; ?></td>
                            <td name="email"><?php echo $value['email']; ?></td>
                            <td name="role"><?php echo userRoles($value['user_role']); ?></td>
                            <td>
                              <a href="#" data-toggle="tooltip" title="Edit User?" class="edit-user"><i class="fa fa-pencil text-info"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <a href="#" data-toggle="tooltip" title="Delete User?" class="delete-user"><i class="fa fa-trash-o text-danger"></i></a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>

              </div>
              <div class="box-footer">
                <div class="row">
                  <div class="col-lg-3 col-xs-6">
                    <span>Lorem ipsum dolor sit amet</span>
                  </div>
                  <div class="col-lg-3 col-lg-offset-6 col-xs-6">
                    <span>Lorem ipsum dolor sit amet</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Premium Quality Products you can afford!
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">MJ Jacobe Trading</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!--pop up content-->
<!-- Modal -->
<div id="add-user-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">OPS</h4>
      </div>
      <div class="modal-body">
      <div class="alert alert-success alert-dismissable alert-create-success" style="display: none;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
          <strong>Success!</strong> New user created.
      </div>
        <div class="row">
          <div class="col-lg-12 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                  <h3 class="box-title">New Account</h3>
              </div>
              <div class="box-body">
                <form role="form" method="post">
                    <div class="row">
                      <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                          <p class="errMess invalidFname" style="display: none">Only letters and white space allowed</p>
                          <p class="errMess fnameReq" style="display: none">*First Name is Required</p>
                          <label>First Name:</label>
                          <input type="text" class="form-control" name="fname" placeholder="Enter ..." required>
                        </div>
                      </div>
                      <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <p class="errMess invalidLname" style="display: none">Only letters and white space allowed</p>
                            <p class="errMess lnameReq" style="display: none">*Last Name is Required</p>
                          <label>Last Name:</label>
                          <input type="text" class="form-control" name="lname" placeholder="Enter ..." required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <p class="errMess addReq" style="display: none">*Address is Required</p>
                          <label>Address:</label>
                          <textarea rows="3" class="form-control" name="address" placeholder="Enter..." required></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <p class="invalidContact" style="display: none">Numbers without white space only.</p>
                            <p class="contactReq" style="display: none">*This is a Required Field</p>
                          <label>Contact No.:</label>
                          <input type="text" class="form-control" name="contact" placeholder="Enter ..." required>
                        </div>
                      </div>
                      <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <p class="errMess invalidEmail" style="display: none">Invalid Email</p>
                            <p class="errMess emailReq" style="display: none">*This is a Required Field</p>
                          <label>Email:</label>
                          <input type="email" class="form-control" name="email" placeholder="Enter ..." required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <p class="errMess usernameReq" style="display: none">*This is a Required Field</p>
                          <label>Username:</label>
                          <input type="text" class="form-control" name="username" placeholder="Enter..." required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                <p class=" errMess roleReq" style="display: none">*This is a Required Field</p>
                                <label>User Role:</label>
                                <select class="form-control" id="user-role">
                                    <option value="">-- Chose one --</option>
                                    <option value="1">Admin</option>
                                    <option value="0">Staff</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-xs-12">
                        <button type="submit" class="btn btn-info pull-right modify-info" style="display: none">Modify</button>
                        <button type="submit" class="btn btn-success pull-right new-user">Save</button>
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
<!--end pop up content-->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/dist/js/app.min.js"></script>
<!-- bootbox.js -->
<script src="assets/js/bootbox.min.js"></script>

<script>
  $(document).ready(function () {
      var serverURL = <?php echo json_encode($serverURL); ?>;

      $(document).on('click', 'a.delete-user', function(){
          var data = {
            id: $(this).closest('tr').find('td[name="user-id"]').text(),
          } 

          bootbox.confirm({
            size: 'small',
            message: 'Delete record?',
            callback: function(result){
              if(result == true){
                $.ajax({
                  type: 'POST',
                  url: serverURL + '/ops-thesis/data-manager/delete-users.php',
                  data: data,
                  dataType: 'json',
                  success: function(rData){
                    if(rData.response){
                        location.reload();
                    }
                  },
                });
            }
          },
        });    
      });

      $(document).on('click', '.new-user', function(e){
          e.preventDefault();

          $('div#add-user-modal div.form-group').removeClass('has-error');
          $('p.errMess').css('display', 'none');
          var fname = $(this).closest('div.box-body').find('input[name="fname"]').val();
          var lname = $(this).closest('div.box-body').find('input[name="lname"]').val();
          var address = $(this).closest('div.box-body').find('textarea[name="address"]').val();
          var contact = $(this).closest('div.box-body').find('input[name="contact"]').val();
          var email = $(this).closest('div.box-body').find('input[name="email"]').val();
          var user_role = $(this).closest('div.box-body').find('select#user-role').val();
          var username = $(this).closest('div.box-body').find('input[name="username"]').val();

          var data = {
              fname: fname,
              lname: lname,
              address: address,
              contact: contact,
              email: email,
              user_role: user_role,
              username: username,
          }
          console.log(data);

          $.ajax({
              type: "POST",
              url: serverURL + '/ops-thesis/data-manager/add-user.php',
              data: data,
              dataType: "json",
              success: function(rData){
                  console.log(rData)
                  if(rData.status){
                      $('.alert-create-success').css('display', 'block'); //show success alert
                      $('.alert').delay(3000).fadeOut('fast'); //remove alert after 3s
                      setTimeout(function(){
                          $('#add-user-modal').modal('hide');
                          location.reload();
                      }, 3200);
                  }

                  if(rData.invalidFname){
                      $('#add-user-modal').find('.invalidFname').closest('.form-group').addClass('has-error');
                      $('#add-user-modal').find('p.invalidFname').css('display', 'block');
                  }

                  if(rData.fnameEmpty){
                      $('#add-user-modal').find('.fnameReq').closest('.form-group').addClass('has-error');
                      $('#add-user-modal').find('p.fnameReq').css('display', 'block');
                  }

                  if(rData.invalidLname){
                      $('#add-user-modal').find('.invalidLname').closest('.form-group').addClass('has-error');
                      $('#add-user-modal').find('p.invalidLname').css('display', 'block');
                  }

                  if(rData.lnameEmpty){
                      $('#add-user-modal').find('.lnameReq').closest('.form-group').addClass('has-error');
                      $('#add-user-modal').find('p.lnameReq').css('display', 'block');
                  }

                  if(rData.address){
                      $('#add-user-modal').find('.addReq').closest('.form-group').addClass('has-error');
                      $('#add-user-modal').find('p.addReq').css('display', 'block');
                  }

                  if(rData.roleEmpty){
                      $('#add-user-modal').find('.roleReq').closest('.form-group').addClass('has-error');
                      $('#add-user-modal').find('p.roleReq').css('display', 'block');
                  }

                  if(rData.contactEmpty){
                      $('#add-user-modal').find('.contactReq').closest('.form-group').addClass('has-error');
                      $('#add-user-modal').find('p.contactReq').css('display', 'block');
                  }

                  if(rData.invalidContact) {
                      $('#add-user-modal').find('.invalidContact').closest('.form-group').addClass('has-error');
                      $('#add-user-modal').find('p.invalidContact').css('display', 'block');
                  }

                  if(rData.emailEmpty){
                      $('#add-user-modal').find('.emailReq').closest('.form-group').addClass('has-error');
                      $('#add-user-modal').find('p.emailReq').css('display', 'block');
                  }

                  if(rData.invalidEmail) {
                      $('#add-user-modal').find('.invalidEmail').closest('.form-group').addClass('has-error');
                      $('#add-user-modal').find('p.invalidEmail').css('display', 'block');
                  }

                  if(rData.usernameEmpty){
                      $('#add-user-modal').find('.usernameReq').closest('.form-group').addClass('has-error');
                      $('#add-user-modal').find('p.usernameReq').css('display', 'block');
                  }

              },
          });


      });


      $(document).on('click', 'a.modify-info', function(){
          //e.preventDefault();
          $('div#add-user-modal.modal').modal('show');

          $('div#add-user-modal div.box-header').find('h3').html('Edit Account');
          var fname = $(this).closest('tr').find('td[name="fname"]').text();
          var lname = $(this).closest('div.box-body').find('td[name="lname"]').text();
          var address = $(this).closest('div.box-body').find('td[name="address"]').text();
          var contact = $(this).closest('div.box-body').find('td[name="contact"]').text();
          var email = $(this).closest('div.box-body').find('td[name="email"]').val();
          var user_role = $(this).closest('div.box-body').find('td[name="user-role"]').text();
          var username = $(this).closest('div.box-body').find('td[name="username"]').text();

          var data = {
              fname: fname,
              lname: lname,
              address: address,
              contact: contact,
              email: email,
              user_role: user_role,
              username: username,
          }
          console.log(data);


      });

  });
</script>
</body>
</html>
