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

include('authentication/functions.php');
include('data-manager/get-products.php');
$count = 1;
$serverURL = "http://$_SERVER[HTTP_HOST]";

//echo '<pre>'; print_r($arr); exit;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OPS | Product Management</title>
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
  
  <link rel="stylesheet" type="text/css" href="assets/css/ops-custom.css">
  <link rel="shortcut icon" href="assets/images/small-logo.png">
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
        Product Management
        <small>Control Panel</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-lg-12 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-list"></i>   Products</h3>
                
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-default btn-sm btn-new" data-toggle="modal" data-target="#add-product-modal"><i class="fa fa-plus"></i>&nbsp;&nbsp;New Product</button>
                </div>
               

              </div>
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="product-table">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Item</th>
                        <th>Description</th>
                        <th>Price (&#x20B1;)</th>
                        <th>Category</th>
                        <th>Photo</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <!-- &#x20B1; //peso sign-->
                    <?php if(isset($arr) AND count($arr) > 0): ?>
                      <?php foreach ($arr as $key => $value): ?>
                        <tr>
                          <td><?php echo $count++ ?></td>
                          <?php $textClass = $value['phase_out'] == 0 ? 'text-success' : 'text-danger'; ?>  
                          <td name="prod-name" data-id="<?php echo $value['id']; ?>" data-avail="<?php echo $value['availability']; ?>" data-po="<?php echo $value['phase_out']; ?>"><i class="fa fa-check-square <?php echo $textClass; ?>"></i>&nbsp;&nbsp;&nbsp;<?php echo $value['name']; ?></td>
                          <td name="prod-desc"><?php echo $value['description']; ?></td>
                          <td name="prod-price"><?php echo $value['price']; ?></td>
                          <td name="prod-category" data-id="<?php echo $value['category']; ?>"><?php echo category($value['category']); ?></td>
                          <td name="prod-photo" data-img="<?php echo $value['picture'];?>" class="table-pic"><img id="prod-pic" src="assets/images/products/<?php echo $value['picture'];?>"></td>
                          <td>
                            <a href="#" data-toggle="tooltip" title="Edit Product" class="edit-product"><i class="fa fa-pencil text-info"></i></a>
<!--                             <a href="#" data-toggle="tooltip" title="Delete Product" class="delete-product"><i class="fa fa-trash-o text-danger"></i></a> -->
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    
                    <?php endif; ?>
                    </tbody>
                  </table>
                </div>
                <!-- Preview image product Modal -->
                <div id="preview-image" class="modal">
                  <span class="close">&times;</span>
                  <img class="modal-content" id="img01">
                  <div id="caption"></div>
                </div>
              </div>
              <div class="box-footer">
                <div class="row">
                  <div class="col-md-12 col-xs-12">
                    <span class="pull-right">This table contains the record of products available for trading.</span>
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
<div id="add-product-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">


    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <div class="alert alert-success alert-dismissable alert-create-success" style="display: none;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
          <strong>Success!</strong> New product created.
        </div>
        <div class="alert alert-success alert-dismissable alert-update-success" style="display: none;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
          <strong>Success!</strong> Record Updated.
        </div>
        <div class="row">
          <div class="col-lg-12 col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">New Product</h3>
                </div>
                <div class="box-body">
                  <form role="form" method="post" action="data-manager/add-product.php" enctype="multipart/form-data">
                    <input name="prod-id" style="display: none" value="">
                    <div class="row">
                      <div class="col-md-12 col-xs-12">
                        <label>Available:</label>
                          <select class="form-control" id="prod-availability">
                            <option value="0">On-hand</option>
                            <option value="1"> For Reservation</option>   
                          </select>  
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                          <p class="errMess categoryEmpty" style="display: none">Choose at least 1 category.</p>
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
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                          <p class="errMess productEmpty" style="display: none">*This is a Required Field</p>
                          <label>Product Name:</label>
                          <input type="text" class="form-control" name="product-name" placeholder="Enter ...">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                          <label>Description:</label>
                          <textarea rows="3" class="form-control" name="product-description" placeholder="Enter..."></textarea> 
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                          <p class="errMess invalidPrice" style="display: none">Numbers Only (e.g 100 or 100.00)</p>
                          <p class="errMess priceEmpty" style="display: none">* This is a required field</p>
                          <label>Price:</label>
                          <input type="number" min="0" step="any" class="form-control" name="price" placeholder="0.00">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                          <p class="errMess invalidPhoto" style="display: none">Image only (.jpg, .jpeg, .png)</p>
                          <div class="row">
                            <div class="col-md-12 col-xs-12">
                              <input type="file" name="product-img" class="file" accept="image/*">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                <input type="text" class="form-control input-lg image-name" disabled placeholder="Upload Image">
                                <span class="input-group-btn">
                                  <button class="browse btn btn-danger input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                                </span>
                              </div>
                            </div>
                            <div class="image-preview col-md-12 col-xs-12">
                              <div class="form-group">
                                <small class="pull-left">  Preview will appear here.</small>
                                <img id="prod-img" src="#" alt="your image" class="center-block img-responsive" style="display: none"/>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-xs-12">
                        <label>Phase Out</label>
                          <select class="form-control" id="prod-phase-out">
                            <option value="0">No</option>
                            <option value="1">Yes</option>   
                          </select>  
                      </div>
                    </div>
                  </form>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-info pull-right update-product" style="display: none">Update</button>
                  <button type="submit" class="btn btn-success pull-right new-product">Save</button>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--end pop up content-->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery-->
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

    $('#product-table').dataTable({
        "paging": true,
        "lengthChange": true,
        "lengthMenu": [ 5, 10, 25, 50, 75, 100],
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "columns": [
            {"name":"first", "orderable":true},
            {"name":"second", "orderable":true},
            {"name":"third", "orderable":true},
            {"name":"fourth", "orderable":true},
            {"name":"fifth", "orderable":true},
            {"name":"sixth", "orderable":false},
            {"name":"seventh", "orderable":false},
        ]
    });

    $(document).on('click', '.browse', function(){
      var file = $(this).parent().parent().parent().find('.file');
      file.trigger('click');
    });

    $(document).on('change', '.file', function(){
      $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));

      var preview = $('img#prod-img');
      var file    = ($('input[type="file"]'))[0].files[0]
      var reader  = new FileReader();

      reader.onloadend = function () {
        $(preview).css('display', 'block');
        $(preview).attr('src', reader.result );
      }
      if (file) {
        reader.readAsDataURL(file); //reads the data as a URL
      } else {
        $(preview).attr('src', '');
      }
    });

    $(document).on('click', '.new-product', function(e){
      e.preventDefault();

      $('p.errMess').css('display','none');
      $('div#add-product-modal div.form-group').removeClass('has-error');
      var category = $(this).closest('div.box').find('.box-body select#prod-category').val();
      var product = $(this).closest('div.box').find('.box-body input[name="product-name"]').val();
      var price =  $(this).closest('div.box').find('.box-body input[name="price"]').val();
      var desc = $(this).closest('div.box').find('.box-body textarea[name="product-description"]').val();
      var photo = $(this).closest('div.box').find('.box-body img#prod-img').attr('src');
      var photo_name = $(this).closest('div.box').find('.box-body .image-name').val();
      var available = $(this).closest('div.box').find('.box-body select#prod-availability').val();
      var phase_out = $(this).closest('div.box').find('.box-body select#prod-phase-out').val();
      var modal = $('div#add-product-modal');


      var data = {
        category: category,
        product: product,
        price: price,
        desc: desc,
        photo: photo,
        photo_name: photo_name,
        available: available,
        phase_out: phase_out
      }

      console.log(data);

      $.ajax({
        type: "POST",
        url: serverURL + '/ops/data-manager/add-product.php',
        data: data,
        dataType: "json",
        success: function (rData) {
          console.log(rData)
          if (rData.status) {
            $('.alert-create-success').css('display', 'block'); //show success alert
            $('.alert').delay(3000).fadeOut('fast'); //remove alert after 3s
            setTimeout(function () {
              $('#add-product-modal').modal('hide');
              location.reload();
            }, 3200);
          }

          if(rData.productEmpty){
            $(modal).find('.productEmpty').closest('.form-group').addClass('has-error');
            $(modal).find('p.productEmpty').css('display', 'block');
          }

          if(rData.categoryEmpty){
            $(modal).find('.categoryEmpty').closest('.form-group').addClass('has-error');
            $(modal).find('p.categoryEmpty').css('display', 'block');
          }

          if(rData.priceEmpty){
            $(modal).find('.priceEmpty').closest('.form-group').addClass('has-error');
            $(modal).find('p.priceEmpty').css('display', 'block');
          }

          if(rData.invalidPrice){
            $(modal).find('.invalidPrice').closest('.form-group').addClass('has-error');
            $(modal).find('p.invalidPrice').css('display', 'block');
          }

          if(rData.invalidPhoto){
            $(modal).find('.invalidPhoto').closest('.form-group').addClass('has-error');
            $(modal).find('p.invalidPhoto').css('display', 'block');
          }

        },
      });
    });

    $(document).on('click', 'a.delete-product', function(){
      var data = {
        id: $(this).closest('tr').find('td[name="prod-id"]').text(),
      }
      console.log(data);

      bootbox.confirm({
        size: 'small',
        message: 'Delete record?',
        callback: function(result){
          if(result == true){
            $.ajax({
              type: 'POST',
              url: serverURL + '/ops/data-manager/delete-product.php',
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


    $(document).on('click', '.edit-product', function (e) {
      e.preventDefault();

      $('div#add-product-modal div.box-header').find('h3').html('Update Product');
      $('div#add-product-modal div.form-group').removeClass('has-error');
      $('p.errMess').css('display','none');
      $('button.update-product').css('display','block');
      $('button.new-product').css('display','none');
      var id = $(this).closest('tr').find('td[name="prod-name"]').attr('data-id');
      var category = $(this).closest('tr').find('td[name="prod-category"]').attr('data-id');
      var product = $(this).closest('tr').find('td[name="prod-name"]').text();
      var price =  parseFloat($(this).closest('tr').find('td[name="prod-price"]').text()).toFixed(2);
      var desc = $(this).closest('tr').find('td[name="prod-desc"]').text();
      var photo = $(this).closest('tr').find('img#prod-pic').attr('src');
      var photo_name = $(this).closest('tr').find('td[name="prod-photo"]').attr('data-img');
      var avail =  $(this).closest('tr').find('td[name="prod-name"]').attr('data-avail');
      var po = $(this).closest('tr').find('td[name="prod-name"]').attr('data-po');
      var modal = $('div#add-product-modal.fade');

      $(modal).modal('show');
      $(modal).on('shown.bs.modal', function () {
        $(modal).find('.modal-body input[name="prod-id"]').val(id);
        $(modal).find('.modal-body input[name="product-name"]').val(product);
        $(modal).find('.modal-body textarea[name="product-description"]').val(desc);
        $(modal).find('.modal-body input[name="price"]').val(price);
        $(modal).find('.modal-body select#prod-category').val(category);
        $(modal).find('.modal-body .image-name').val(photo_name);
        $(modal).find('.modal-body img#prod-img').css('display','block');
        $(modal).find('.modal-body img#prod-img').attr('src', photo);
        $(modal).find('.modal-body select#prod-availability').val(avail);
        $(modal).find('.modal-body select#prod-phase-out').val(po);


      });
    });

    $(document).on('click', '.btn-new', function () {
      $('div#add-product-modal div.box-header').find('h3').html('New Product');
      $('button.update-product').css('display','none');
      $('button.new-product').css('display','block');
      $('p.errMess').css('display','none');
      $('div#add-product-modal div.form-group').removeClass('has-error');
    });

    $(document).on('click', '.update-product', function (e) {
      e.preventDefault();

      $('p.errMess').css('display','none');
      $('div#add-product-modal div.form-group').removeClass('has-error');
      var id = $(this).closest('div.box').find('.box-body input[name="prod-id"]').val();
      var category = $(this).closest('div.box').find('.box-body select#prod-category').val();
      var product = $(this).closest('div.box').find('.box-body input[name="product-name"]').val();
      var price =  parseFloat($(this).closest('div.box').find('.box-body input[name="price"]').val()).toFixed(2);
      var desc = $(this).closest('div.box').find('.box-body textarea[name="product-description"]').val();
      var photo = $(this).closest('div.box').find('.box-body img#prod-img').attr('src');
      var photo_name = $(this).closest('div.box').find('.box-body .image-name').val();
      var available = $(this).closest('div.box').find('.box-body select#prod-availability').val();
      var phase_out = $(this).closest('div.box').find('.box-body select#prod-phase-out').val();
      var modal = $('div#add-product-modal');

      var data = {
        id: id,
        category: category,
        product: product,
        price: price,
        desc: desc,
        photo: photo,
        photo_name: photo_name,
        available: available,
        phase_out: phase_out
      }

      console.log(data)

      $.ajax({
        type: "POST",
        url: serverURL + '/ops/data-manager/edit-product.php',
        data: data,
        dataType: "json",
        success: function (rData) {
          console.log(rData)
          if (rData.status) {
            $('.alert-update-success').css('display', 'block'); //show success alert
            $('.alert').delay(3000).fadeOut('fast'); //remove alert after 3s
            setTimeout(function () {
              $('#add-product-modal').modal('hide');
              location.reload();
            }, 3200);
          }

          if(rData.productEmpty){
            $(modal).find('.productEmpty').closest('.form-group').addClass('has-error');
            $(modal).find('p.productEmpty').css('display', 'block');
          }

          if(rData.categoryEmpty){
            $(modal).find('.categoryEmpty').closest('.form-group').addClass('has-error');
            $(modal).find('p.categoryEmpty').css('display', 'block');
          }

          if(rData.priceEmpty){
            $(modal).find('.priceEmpty').closest('.form-group').addClass('has-error');
            $(modal).find('p.priceEmpty').css('display', 'block');
          }

          if(rData.invalidPrice){
            $(modal).find('.invalidPrice').closest('.form-group').addClass('has-error');
            $(modal).find('p.invalidPrice').css('display', 'block');
          }

          if(rData.invalidPhoto){
            $(modal).find('.invalidPhoto').closest('.form-group').addClass('has-error');
            $(modal).find('p.invalidPhoto').css('display', 'block');
          }

        },
      });
    });

  });
</script>
<!--<script>-->
<!--  // Get the modal-->
<!--  var modal = document.getElementById('preview-image');-->
<!---->
<!--  // Get the image and insert it inside the modal - use its "alt" text as a caption-->
<!--  var img = document.getElementById('prod-pic');-->
<!--  var modalImg = document.getElementById("img01");-->
<!--  var captionText = document.getElementById("caption");-->
<!--  img.onclick = function(){-->
<!--    modal.style.display = "block";-->
<!--    modalImg.src = this.src;-->
<!--    captionText.innerHTML = this.alt;-->
<!--  }-->
<!---->
<!--  // Get the <span> element that closes the modal-->
<!--  var span = document.getElementsByClassName("close")[0];-->
<!---->
<!--  // When the user clicks on <span> (x), close the modal-->
<!--  span.onclick = function() {-->
<!--    modal.style.display = "none";-->
<!--  }-->
<!--</script>-->

</body>
</html>
