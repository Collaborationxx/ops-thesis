<?php
session_start();
$role = $_SESSION['user_role'];
$count = 1;
$serverURL = "http://$_SERVER[HTTP_HOST]";

if($_SESSION["username"] == null) { //if not redirect to login page
  header('location: index.php');
} else {
  if($role != 1){ //prevent other people other than admin in accessing dashboard
    header('location: index.php');
  }
}

include('data-manager/get-inventory.php');
include('data-manager/get-products.php');
include('authentication/functions.php');
include('data-manager/get-product-inventory.php');

//echo '<pre>'; print_r($itemsLeft); exit;

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OPS | Inventory</title>
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
  <!-- Theme style -->
  <link rel="stylesheet" href="plugins/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/dist/css/skins/skin-green.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link href="plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                <li>
                    <a href="user-management.php">
                        <img src="assets/images/user-512.png" class="ops-sidebar-img">
                        <span>Account Manager</span></a>
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
        Product Inventory
        <small>Control Panel</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-lg-12 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-archive"></i>   Stocks</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-default btn-sm btn-new" data-toggle="modal" data-target="#inventory-modal"><i class="fa fa-plus"></i>&nbsp;&nbsp;New Stock</button>
                </div>

              </div>
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="inventory-table">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Product ID</th>
                          <th>Product Name</th>
                          <th>Quantity
                          <th>Last Re-stock Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(isset($inventory) AND count($inventory) > 0): ?>
                        <?php foreach ($inventory as $key => $value): ?>
                          <tr>
                            <td><?php echo $count++; ?></td>
                            <!-- <td name="inventory-id" style="display: none"><?php echo $value['id']; ?></td> -->
                            <td name="generated-id" data-id="<?php echo $value['id']; ?>">OPS-2017-0<?php echo $value['id']; ?></td>
                            <td name="product" data-id="<?php echo $value['prod_id']; ?>"><?php echo $value['prod_name']; ?></td>
                            <td name="quantity"><?php echo $value['quantity']; ?></td>
                            <td name="stock-date"><?php echo $value['stock_date']; ?></td>
                            <td>
                              <a href="#" data-toggle="tooltip" title="Update Inventory" class="edit-inventory"><i class="fa fa-pencil text-info"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <a href="#" data-toggle="tooltip" title="Delete Inventory" class="delete-inventory"><i class="fa fa-trash-o text-danger"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <a href="inventory-history.php?product=<?php echo $value['id'];?>" data-toggle="tooltip" title="View History" class="view-history"><i class="fa fa-history text-warning"></i></a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      <?php else: ?>
                          <tr>
                            <td colspan="6" style="text-align: center"><b>No Records Found.</b></td>
                          </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>  
              </div>
              <div class="box-footer">
                <div class="row">
                  <div class="col-md-12 col-xs-12">
                    <span class="pull-right">This table contains the record of stocks.</span>
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
<div id="inventory-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <div class="alert alert-success alert-dismissable alert-create-success" style="display: none;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
          <strong>Success!</strong> New Inventory Added.
      </div>
      <div class="alert alert-success alert-dismissable alert-update-success" style="display: none;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
          <strong>Success!</strong> Record Updated.
      </div>
        <div class="row">
          <div class="col-lg-12 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <div class="box-header with-border">
                  <h3 class="box-title">New Inventory</h3>
                </div>
                <div class="box-body">
                  <form role="form">
                    <input type="text" name="invID" style="display: none" value="">
                    <div class="row">
                      <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                          <p class="errMess err-invnetory" style="display: none">All products is in inventory. Cannot do this action.</p>
                          <p class="errMess err-product" style="display: none">No product selected.</p>
                          <label>Product Name:</label>
                          <select class="form-control" id="product-select">
                                <option selected="selected" value="">--Choose Product--</option>
                                <?php if(isset($itemsLeft) AND count($itemsLeft) > 0): ?>
                                    <?php foreach ($itemsLeft as $key => $value): ?>
                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="null">All products is in inventory</option>        
                                <?php endif; ?>
                            </select>
                            <input type="text" name="product-input" class="form-control" disabled="disabled">
                        </div>
                      </div>
                    </div>
                    <div class="row itemsLeft">
                          <div class="col-md-12 col-xs-12">
                              <div class="form-group">
                                  <label>Current Item Count:</label>
                                  <input type="number" min="0" class="form-control" name="quantity"disabled="disabled">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12 col-xs-12">
                              <div class="form-group">
                                  <p class="errMess err-qty" style="display: none">Numbers only!</p>
                                  <p class="errMess err-qty-empty" style="display: none">Add quantity.</p>
                                  <label name="qty">Quantity:</label>
                                  <input type="number" min="0" class="form-control" name="additional-quantity" placeholder="Enter...">
                              </div>
                          </div>
                      </div>
<!--                    <div class="row">
<!--                      <div class="col-md-12 col-xs-12">
<!--                        <div class="form-group">
<!--                          <label>Re-stock Date:</label>
<!--                          <input type="text" class="form-control" name="date-restock" placeholder="Enter...">-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
                  </form>
                </div>
                <div class="box-footer">
                  <button type="button" class="btn btn-success pull-right new-inventory">Save</button>
                  <button type="button" class="btn btn-info pull-right update-inventory">Update</button>
                </div>
            </div>
          </div>
        </div>
        </div> 
    </div>

  </div>
</div>
<!--end pop up content-->
<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/dist/js/app.min.js"></script>
<!-- bootbox.js -->
<script src="assets/js/bootbox.min.js"></script>
<!-- dataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
  $(document).ready(function () {
      var serverURL = <?php echo json_encode($serverURL); ?>;
      var modal = $('div#inventory-modal');

        $('#inventory-table').dataTable({
            "paging": true,
            "lengthChange": true,
            "lengthMenu": [ 5, 10, 25, 50, 75, 100],
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });

      $(document).on('click', '.btn-new', function () {
          $(modal).find('div.box-header').find('h3').html('New Inventory');
          $('button.update-inventory').css('display','none');
          $('button.new-inventory').css('display','block');
          $('p.errMess').css('display','none');
          $('div#inventory-modal div.form-group').removeClass('has-error');
          $(modal).find('select#product-select.form-control').prop('disabled', false);
          $(modal).find('select#product-select').css('display','block');
          $(modal).find('input[name="product-input"]').css('display','none');
          $(modal).find('div.itemsLeft').css('display','none');
          $(modal).find('.form-group label[name="qty"]').text('Quantity');

      });

      $(document).on('click', '.delete-inventory', function(){
          var data = {
            id: $(this).closest('tr').find('td[name="inventory-id"]').text(),
          }
          console.log(data);

          bootbox.confirm({
            size: 'small',
            message: 'Remove item from cart?',
            callback: function(result){
              if(result == true){
                $.ajax({
                  type: 'POST',
                  url: serverURL + '/ops/data-manager/delete-inventory.php',
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

      $(document).on('click', '.new-inventory', function (e) {
         e.preventDefault();

         $('div#inventory-modal div.form-group').removeClass('has-error');
         $('p.errMess').css('display', 'none');
         var product = $(this).closest('div.box').find('div.box-body select#product-select').val();
         var qty = $(this).closest('div.box').find('div.box-body input[name="additional-quantity"]').val();

         var data = {
           product: product,
           qty: qty,
         }

         console.log(data)

         if(data.product != 'null'){
            $.ajax({
               type: 'POST',
               url: serverURL + '/ops/data-manager/add-inventory.php',
               data: data,
               dataType: 'json',
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

                 if(rData.qtyEmpty){
                         $(modal).find('.err-qty-empty').closest('.form-group').addClass('has-error');
                         $(modal).find('p.err-qty-empty').css('display', 'block');
                 }

                 if(rData.invalidQty){
                     $(modal).find('.err-qty').closest('.form-group').addClass('has-error');
                     $(modal).find('p.err-qty').css('display', 'block');
                 }

                 if(rData.productEmpty){
                     $(modal).find('.err-product').closest('.form-group').addClass('has-error');
                     $(modal).find('p.err-product').css('display', 'block');
                 }
               },
            }); 
         } else {
             $(modal).find('p.err-invnetory').css('display', 'block');
         }
         

      });

      $(document).on('click', '.edit-inventory', function () {
          $('div#inventory-modal div.box-header').find('h3').html('Update Inventory');
          $('button.update-inventory').css('display','block');
          $('button.new-inventory').css('display','none');
          $(modal).find('input[name="product-input"]').css('display','block');
          $(modal).find('select#product-select.form-control').css('display','none');
          $(modal).find('div.itemsLeft').css('display','block');
          $(modal).find('.form-group label[name="qty"]').text('Additional Quantity');

          var id = $(this).closest('tr').find('td[name="generated-id"]').attr('data-id');
          var product_id = $(this).closest('tr').find('td[name="product"]').attr('data-id');
          var product_name = $(this).closest('tr').find('td[name="product"]').text();
          var qty = $(this).closest('tr').find('td[name="quantity"]').text();

          $(modal).modal('show');
          $(modal).on('shown.bs.modal', function () {
              $(modal).find('.modal-body input[name="invID"]').val(id);
              $(modal).find('select#product-select.form-control').val(product_id);
              $(modal).find('.modal-body input[name="quantity"]').val(qty);
              $(modal).find('.modal-body input[name="product-input"]').val(product_name);
          });
      });

      $(document).on('click', '.update-inventory', function () {
          var id = $(modal).find('.modal-body input[name="invID"]').val();
          var new_qty = $(modal).find('.modal-body input[name="additional-quantity"]').val();
          var old_qty = $(modal).find('.modal-body input[name="quantity"]').val();
          var qty = parseInt(old_qty) + parseInt(new_qty);

          var data = {
              id: id,
              qty: qty,
              aQty: new_qty
          }
          console.log(data);

          $.ajax({
              type: 'POST',
              url: serverURL + '/ops/data-manager/edit-inventory.php',
              data: data,
              dataType: 'json',
              success: function(rData){
                  console.log(rData)
                  if(rData.status){
                      $('.alert-update-success').css('display', 'block'); //show success alert
                      $('.alert').delay(3000).fadeOut('fast'); //remove alert after 3s
                      setTimeout(function(){
                          $('#add-user-modal').modal('hide');
                          location.reload();
                      }, 3200);
                  }

                  if(rData.qtyEmpty){
                      $(modal).find('.err-qty-empty').closest('.form-group').addClass('has-error');
                      $(modal).find('p.err-qty-empty').css('display', 'block');
                  }
              },
          });
      });

  });
</script>
</body>
</html>
