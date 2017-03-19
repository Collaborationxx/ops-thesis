<?php
session_start(); 
$role = $_SESSION['user_role'];

if($_SESSION["username"] == null) { //if not redirect to login page
  header('location: index.php');
} else { 
    if($role != 1){ //prevent other people other than admin in accessing dashboard
        header('location: index.php');
    }
}

include('includes/functions.php');
$serverURL = "http://$_SERVER[HTTP_HOST]";

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OPS | Reports</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="plugins/ionicons/css/ionicons.min.css">
  <!-- dataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- date picker -->
  <link rel="stylesheet" type="text/css" href="plugins/datepicker/datepicker3.css">
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
                                    <?php echo $_SESSION['name']; ?>
                                    <small><?php echo userRoles($role); ?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <!--<div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>-->
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
                    <img src="assets/images/small-logo.png" class="ops-sidebar-logo">
                </li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active">
                    <a href="dashboard.php">
                        <img src="assets/images/dashboard.ico" class="ops-sidebar-img">
                        <span>Admin Dashboard</span></a>
                </li>
                <li class="treeview">
                  <a href="#">
                    <img src="assets/images/user-512.png" class="ops-sidebar-img">
                    <span>Account Manager</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                    <li style="margin-left: 35px;"><a href="user-management.php"><i class="fa fa-circle-o"></i> Employee</a></li>
                    <li style="margin-left: 35px;"><a href="customer-management.php"><i class="fa fa-circle-o"></i> Customer</a></li>
                  </ul>
                </li>
                <li>
                    <a href="product-management.php">
                        <img src="assets/images/catalogue-icon.png" class="ops-sidebar-img">
                        <span>Product Catalog</span></a>
                </li>
                <li>
                    <a href="inventory-management.php">
                        <img src="assets/images/inventory-flat.png" class="ops-sidebar-img">
                        <span>Inventory</span></a>
                </li>
                <li>
                    <a href="order-tracking.php">
                        <img src="assets/images/order-tracking.png" class="ops-sidebar-img">
                        <span>Order Tracking</span></a>
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
        Report Management
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
                  <h3 class="box-title"><i class="fa fa-file-text-o"></i>   Generate Report</h3>
                  <button class="btn btn-default pull-right clear-selection"><i class="fa fa-refresh"></i>   Clear Selection</button>
                </div>
                <div class="box-body">
                  <form role="form">
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="form-group">
                          <label>From</label>
                         <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepicker-from">
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="form-group">
                          <label>To</label>
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepicker-to">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select id="categorySelect" class="form-control">
                          <option value="">-- select category --</option>
                          <option data-table="ol_sales">Online Sales</option>
                          <option data-table="order_tbl" data-col="transaction_date" data-type="0">OC Orders</option>
                          <option data-table="order_tbl" data-col="transaction_date" data-type="1">OL Orders</option>
                          <option data-table="reservation_tbl" data-col="transaction_date" data-type="1">Reservations</option>
                          <option data-table="product" data-col="insert_date" data-type="">Product</option>
                          <option data-table="inventory" data-col="stock_date" data-type="">Inventory</option>
                        </select>
                    </div>
                  </form>
                </div>
                <div class="box-footer">
                  <button type="button" class="btn btn-success pull-right btn-generate">Generate</button>
                </div>
            </div>
          </div>
        </div>
          <div class="col-lg-8 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-file-excel-o"></i>   Preview</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-default download-report"><i class="fa fa-download"></i>   Download Report</button>
                  <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
                </div>

              </div>
              <div class="box-body reports-table">
                <table class="table table-striped table-bordered table-purchase" id="reports-purchase" style="display: none">
                  <thead>
                    <th>#</th>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Delivery Status</th>
                    <th>Courier</th>
                    <th>Date</th>
                  </thead>
                  <tbody></tbody>
                </table>
                 <table class="table table-striped table-bordered table-products" id="reports-products" style="display: none">
                  <thead>
                    <th>#</th>
                    <th>Product</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Availability</th>
                    <th>Phase Out</th>
                    <th>Added On</th>
                    </thead>
                  <tbody></tbody>
                </table>
                <table class="table table-striped table-bordered table-inventory" id="reports-inventory" style="display: none">
                  <thead>
                    <th>#</th>
                    <th>Product</th>
                    <th>Quantiy</th>
                    <th>Stock On</th>
                  </thead>
                  <tbody></tbody>
                </table>
                <table class="table table-striped table-bordered table-ol-sales" id="reports-ol-sales" style="display: none">
                  <thead>
                    <th>#</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Sold</th>
                    <th>Total</th>
                  </thead>
                  <tbody></tbody>
                </table>
                <div class="no-result" style="display: none">
                  <p style="text-align: center; font-weight: bold;">No Reports can be generated for this selection. </p>
                </div>

              </div>
              <div class="box-footer">
                <div class="row">
                  <div class="col-md-12 col-xs-12">
                    <span class="pull-right">This table contains the preview of respective report.</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!-- /.content -->

    <form id="report-data" method="POST" action="includes/generate-excel.php" class="hidden">
        <input type="hidden" name="reportName">
        <input type="hidden" name="headers">
        <input type="hidden" name="body">
    </form>
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

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3.1.1 -->
<script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- AdminLTE App -->
<script src="plugins/dist/js/app.min.js"></script>

<!-- dataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
(function($){
    var serverURL = <?php echo json_encode($serverURL); ?>;
    var headers = [];
    var body = [];
    var x = 0;

    //Date picker
    //from
    $('#datepicker-from').datepicker({
      autoclose: true
    });
    //to
    $('#datepicker-to').datepicker({
      autoclose: true
    });


    function hideDataTableElements(){
        $('.dataTables_info').hide();
        $('.dataTables_paginate').hide();
        $('.dataTables_filter').hide();
        $('.dataTables_length').hide();
    }

    function showDataTableElements(){
        $('.dataTables_info').show();
        $('.dataTables_paginate').show();
        $('.dataTables_filter').show();
        $('.dataTables_length').show();
    }

    function validateData(){
        $('select, input[type=text]').on("keyup", function(){
            if($(this).val() != '' && $('#datepicker-to').val() != '' && $('#categorySelect').val() != ''){
                $('.btn-generate').prop('disabled', false);
            } else {
                $('.btn-generate').prop('disabled', true);
            }
        });

        $('select, input[type=text]').on("change", function(){
            if($(this).val() != '' && $('#datepicker-to').val() != '' && $('#categorySelect').val() != ''){
                $('.btn-generate').prop('disabled', false);
            } else {
                $('.btn-generate').prop('disabled', true);
            }
        });
    }

    function getHeaders(){
      headers = [];
      $('.toDownload thead tr th').each(function(){
          var th = $(this).text();
          headers.push(th);


      });
    }


    function getBody(){
      body = [];

      $('.toDownload tbody tr').each(function(ind,tr){
          var tb = $('td', tr).map(function(index, td) {
              return $(td).text();
              

          }).toArray();

          body.push(tb);
                
      });


    }



  $(document).ready(function(){
      $('.btn-generate').prop('disabled', true);
      validateData();

      $('.btn-generate').click(function(){
          $('table').hide();
          hideDataTableElements();

          var table = $('option:selected', 'select#categorySelect').attr('data-table');
          var column = $('option:selected', 'select#categorySelect').attr('data-col');
          var type = $('option:selected', 'select#categorySelect').attr('data-type');
          var start = $('#datepicker-from').val();
          var end = $('#datepicker-to').val();
          var i = 1;

          var data = {
              table: table,
              column: column,
              type: type,
              start: start,
              end: end
          }
          console.log(data)

          $.ajax({
              type: 'POST',
              url: serverURL + '/ops/data-manager/get-reports.php',
              data: data,
              dataType: 'json',
              success: function(rData){
                  $('.btn-generate').prop('disabled', true);
                  console.log(rData)
                  console.log(rData.category)
                  console.log(rData.reports)
                  $('.table').removeClass('toDownload');

                  reports = rData.reports;
                  if(reports.length > 0){

                      if(rData.category == 'order_tbl'){
                          $('#reports-purchase').show();
                          $('.table-purchase').addClass('toDownload');

                          $(rData.reports).each(function(ind, obj){
                              $('#reports-purchase').dataTable() .fnAddData([
                                  i,
                                  'OPS-'+ (obj.Date).substring(0,4) + '-O-'+ obj.id,
                                  (obj.last_name).toUpperCase() +', '+ obj.first_name,
                                  obj.delivery_status == 0 ? 'Not Delivered' : 'Delivered',
                                  obj.courier,
                                  obj.Date
                              ]);
                              
                              i++;
                          });

                          showDataTableElements();
                      }

                      if(rData.category == 'reservation_tbl'){
                          $('#reports-purchase').show();
                          $('.table-purchase').addClass('toDownload');


                          $(rData.reports).each(function(ind, obj){
                              $('#reports-purchase').dataTable() .fnAddData([
                                  i,
                                  'OPS-'+ (obj.Date).substring(0,4) + '-R-'+ obj.id,
                                  (obj.last_name).toUpperCase() +', '+ obj.first_name,
                                  obj.delivery_status == 0 ? 'Not Delivered' : 'Delivered',
                                  obj.courier,
                                  obj.Date
                              ]);
                              
                              i++;


                          });
                          showDataTableElements();

                      }

                      if(rData.category == 'inventory'){
                          $('#reports-inventory').show();
                          $('.table-inventory').addClass('toDownload');


                          $(rData.reports).each(function(ind, obj){
                              $('#reports-inventory').dataTable() .fnAddData([
                                  i,
                                  obj.name,
                                  obj.quantity,
                                  obj.stock_date
                              ]);
                              
                              i++;

                          });
                          showDataTableElements();

                      }

                      if(rData.category == 'product'){
                          $('#reports-products').show();
                          $('.table-products').addClass('toDownload');


                          $(rData.reports).each(function(ind, obj){
                              $('#reports-products').dataTable() .fnAddData([
                                  i,
                                  obj.name,
                                  obj.description,
                                  obj.category,
                                  obj.price,
                                  obj.availability == 0 ? 'on-hand' : 'for reservation',
                                  obj.phase_out == 0 ? 'No': 'yes',
                                  obj.insert_date
                              ]);
                              
                              i++;

                          });
                          showDataTableElements();

                      }

                      if(rData.category == 'ol_sales'){
                          $('#reports-ol-sales').show();
                          $('.table-ol-sales').addClass('toDownload');

                          $(rData.reports).each(function(ind, obj){
                              $(obj).each(function(x,y){
                                  $('#reports-ol-sales').dataTable() .fnAddData([
                                      i,
                                      y.name,
                                      y.price,
                                      y.sold,
                                      parseFloat(y.price * y.sold).toFixed(2)
                                  ]);
                              
                              i++;
                              });


                          });
                            showDataTableElements();
                      }

                  } else {
                      $('no-result').show();
                  }
              },
          });
      });

      $('.clear-selection').click(function(e){
          e.preventDefault();
          location.reload();

      });

      $('.download-report').click(function(){
          getHeaders();
          getBody();
          console.log(headers);
          console.log(body);

          var cat = $('option:selected', 'select#categorySelect').val();

          $('input[name=headers]').val(JSON.stringify(headers));
          $('input[name=body]').val(JSON.stringify(body));
          $('input[name=reportName]').val(cat);

          $('#report-data').submit();

      });

  });

})(jQuery);
</script>
</body>
</html>