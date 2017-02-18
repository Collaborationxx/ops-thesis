<?php
session_start(); 
$role = $_SESSION['user_role'];
$userID = $_SESSION['id'];

if($_SESSION["username"] == null) { //if not redirect to login page
  header('location: index.php');
} else { 
    if($role == 2){ //prevent other people other than admin in accessing dashboard
        header('location: index.php');
    }
}

include('authentication/functions.php');
include('data-manager/get-products.php');
include('data-manager/get-inventory.php');
// echo '<pre>'; print_r($arr); exit;
$serverURL = "http://$_SERVER[HTTP_HOST]";

?>


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
  <!-- jquery ui -->
  <link rel="stylesheet" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.min.css">

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
<!--                    <div class="form-group">-->
<!--                      <label>Product Category:</label>-->
<!--                          <select class="form-control" id="prod-category">-->
<!--                          <option value="">*Choose Category</option>-->
<!--                          <option value="1">Electronic</option>-->
<!--                          <option value="2">Self-Care</option>-->
<!--                          <option value="3">Diagnostic</option>-->
<!--                          <option value="4">Surgical</option>-->
<!--                          <option value="5">Durable Medical Equipment</option>-->
<!--                          <option value="6">Acute Care</option>-->
<!--                          <option value="7">Emergency and Trauma</option>-->
<!--                          <option value="8">Long-Term Care</option>-->
<!--                          <option value="9">Storage and Transport</option>-->
<!--                          </select>-->
<!--                    </div>-->

                    <div class="form-group">
                      <p class="errMess err-req hidden">Make sure to fill in product Name and Quantity</p>
                      <p class="errMess no-result hidden">No product matches your search</p>
                      <label>Product Name:</label>
                      <input type="text" class="form-control product-name" data-id="" data-image="" name="prod-name" placeholder="Type at least three characters">
                    </div>
                    <div class="form-group">
                      <label>Price:</label>
                      <input type="text" class="form-control price" name="price" placeholder="0.00" disabled="disabled">
                    </div>
                    <form-group>
                        <label>Stock Left:</label>
                        <input type="text" class="form-control" name="stock-left" disabled="disabled" value="">
                    </form-group>
                    <div class="form-group">
                      <label>Quantity:</label>
                      <p class="errMess err-stock hidden">Quantity is higher than stock available.</p>
                      <input type="number" min="0" class="form-control qty" name="quantity" placeholder="0">
                    </div>
                  </form>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-success pull-right place-order" disabled="disabled">Place Order</button>
                </div>
            </div>
          </div>
        </div>
          <div class="col-lg-8 col-xs-12">
          <div class="alert alert-success remove-success" role="alert" style="display: none">
              <p>Item removed from Orders</p>
          </div>
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-file"></i>   Trading Preview</h3>
                <button class="btn btn-success btn-sm pull-right btn-order" style="margin-bottom: 10px;" disabled="disabled"><i class="fa fa-arrow-down"></i>   Save</button>
              </div>
              <div class="box-body no-padding">
                <table class="table table-striped table-bordered preview-table">
                  <tbody>
                    <tr>
                      <th>Product Photo</th>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Total Price</th>
                      <th></th>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="box-footer">
                <div class="row">
                  <div class="col-md-12 col-xs-12">
                    <span class="pull-right"><b>TOTAL:</b>  &#8369;
                      <input name="total-price" type="text" value="0.00" disabled="disabled">
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  
                   

  <!-- jQuery 3.1.1 -->
<script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/dist/js/app.min.js"></script>
<!-- jquery ui -->
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<!-- bootbox.js -->
<script src="assets/js/bootbox.min.js"></script>
<script>
  $(document).ready(function(){
      $('.alert').css('display','none');
      var serverURL = <?php echo json_encode($serverURL); ?>;
      var products = <?php echo json_encode($arr);?>;
      var inventory = <?php echo json_encode($inventory); ?>; console.debug('inventory', inventory);
      var user_id = <?php echo $userID; ?>;
      var arr = [];
      var stock = '';
      var table = $('.preview-table').find('tbody');
      var total_input = $('body').find('input[name="total-price"]');
      var myTrans = JSON.parse(localStorage.getItem('myTransaction'));
      var item_count = myTrans == null ? 0 : myTrans.length; 
      console.debug('myTrans',myTrans)
      console.log('item_count', item_count)
      

      if(item_count > 0){
          var tot = 0;
          $('body').find('.btn-order').removeAttr('disabled');
          $(myTrans).each(function(x,y){
              table.append(
              '<tr class="order-details">' +
              '<td name="prod-pic"><img src="assets/images/products/' + y.prod_pic +'" style="width: 75px; height: auto"></td>' +
              '<td name="product" data-id="' + y.prod_id+'">' + y.prod_name + '</td>' +
              '<td name="qty">' + y.qty  + '</td>' +
              '<td name="price">' + y.price + '</td>' +
              '<td name="subTotal">' + y.sub_total + '</td>' +
              '<td><a href="#" class="edit-order" data-toggle="tooltip" title="edit order?"><i class="fa fa-pencil text-info"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;' +
              '<a href="#" class="remove-order" data-toggle="tooltip" title="remove order?"><i class="fa fa-times text-danger"></i></a>'+
              '</td></tr>');

              total_input.val(parseFloat(tot += parseFloat(y.sub_total)).toFixed(2)); 
          });

            
      }


      $.each(products, function (i,e) {
          $.each(inventory, function (index, obj) {
              if(e.id == obj.prod_id){
                stock = obj.quantity;
              }
          });
          arr.push({
              label: e.name,
              value: e.name,
              id: e.id,
              price: e.price,
              picture: e.picture,
              stock: stock,
          });
      });
      console.log('products', arr)

      var input = $('.product-name');
      $(input).keyup(function(){
          $('p.errMess').addClass('hidden');
          if($(this).val().length == 0){
              $('.place-order').attr('disabled', true);
          } else {
              $('.place-order').attr('disabled', false);
          }
      });

      $(input).autocomplete({
          source: arr,
          response: function(e, ui){
              if (ui.content.length === 0) {
                $('p.no-result').removeClass('hidden');
              }
          },
          select: function (event, ui) {
              console.log(ui.item);
              $('.price').val(ui.item.price);
              $(input).attr('data-id', ui.item.id);
              $(input).attr('data-image', ui.item.picture);
              $('input[name="stock-left"]').val(ui.item.stock);
          },
          minLength: 3,
      });


      $('.place-order').click(function (e) {
          e.preventDefault();
          $('body').find('.btn-order').removeAttr('disabled');
          var prod_id = $(this).closest('div.box').find('input[name="prod-name"]').attr('data-id');
          var prod_pic = $(this).closest('div.box').find('input[name="prod-name"]').attr('data-image');
          var prod_name = $(this).closest('div.box').find('input[name="prod-name"]').val();
          var price = $(this).closest('div.box').find('input[name="price"]').val();
          var stock = $(this).closest('div.box').find('input[name="stock-left"]').val(); console.debug('stock', stock)
          var qty = $(this).closest('div.box').find('.form-group input[name="quantity"]').val();
          var sub_total = parseFloat(parseInt(qty) * parseFloat(price)).toFixed(2);
          var total = parseFloat($(total_input).val()).toFixed(2);
          var grand_total = parseFloat(parseFloat(total) + parseFloat(sub_total)).toFixed(2);

          var transaction = {
              prod_id: prod_id,
              prod_pic: prod_pic,
              prod_name: prod_name,
              price: price,
              qty: qty,
              sub_total: sub_total
          }

          if(prod_name.length == 0 || qty.length == 0){
              $('.err-req').removeClass('hidden');
          } else {
              if(Number(qty) > Number(stock)){
                  console.log('error')
                  $('.err-stock').removeClass('hidden');
              } else {
                  var myTransaction = JSON.parse(localStorage.getItem('myTransaction')) || [];
                  myTransaction.push(transaction);
                  localStorage.setItem('myTransaction', JSON.stringify(myTransaction));
                  console.debug('webStarage', myTransaction);
                  var table_content = '';

                  $(myTransaction).each(function(i,e){
                      table_content =
                      '<tr class="order-details">' +
                      '<td name="prod-pic"><img src="assets/images/products/' + e.prod_pic +'" style="width: 75px; height: auto"></td>' +
                      '<td name="product" data-id="' + e.prod_id+'">' + e.prod_name + '</td>' +
                      '<td name="qty">' + e.qty  + '</td>' +
                      '<td name="price">' + e.price + '</td>' +
                      '<td name="subTotal">' + e.sub_total + '</td>' +
                      '<td><a href="#" class="edit-order" data-toggle="tooltip" title="edit order?"><i class="fa fa-pencil text-info"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;' +
                      '<a href="#" class="remove-order" data-toggle="tooltip" title="remove order?"><i class="fa fa-times text-danger"></i></a>'+
                      '</td></tr>';
                  });

                  $('.err-stock').addClass('hidden');
                  $(this).closest('div.box').find('input').val(''); //clear inputs
                  $(total_input).val(grand_total);
                  $(table).append(table_content); //place order in the table
              }

          }

      });


      $('.btn-order').click(function () {
        var orders = JSON.parse(localStorage.getItem('myTransaction'));
          var data = {
              user_id: user_id,
              order_details: orders,
              order_type: 0
          };

          console.log(data)

          $.ajax({
              type: "POST",
              url: serverURL + '/ops/data-manager/add-order.php',
              data: data,
              dataType: "json",
              success: function (rData) {
                  if(rData.status){
                    localStorage.removeItem('myTransaction');
                    bootbox.confirm({
                      message: "Success! Another Transaction?",
                      buttons: {
                          confirm: {
                              label: 'Yes',
                              className: 'btn-success'
                        },
                      cancel: {
                            label: 'No',
                            className: 'btn-danger'
                      }
                      },
                      callback: function (result) {
                          if(result == true){
                              location.reload();
                          } else {
                              window.location.href = serverURL + '/ops/index.php';
                          }
                      }
                    });
                  }
              },
          });
      });

      $(document).on('click', '.remove-order', function (e) {
          e.preventDefault();
          var id = $(this).closest('tr').find('td[name="product"]').attr('data-id');
          bootbox.confirm({
              size: 'small',
              message: "Remove this item?",
              callback: function (result) {
                  console.log(result)
                  if(result == true){
                      $(this).closest('tr').remove(); 
                      $.each(myTrans, function(index, obj){
                          if (obj.prod_id == id) {
                              myTrans.splice(index,1);
                              console.log(myTrans);
                              localStorage.setItem('myTransaction', JSON.stringify(myTrans));
                              return false;
                          }
                      });
                      
                      var remove_price = parseFloat($(this).closest('tr').find('td[name="subTotal"]').text());
                      var total = $(total_input).val();
                      var grand_total = parseFloat(parseFloat(total) - parseFloat(remove_price)).toFixed(2);
                      $(total_input).val(grand_total);
                      $('.alert').css('display','block');
                      $('.alert').delay(2000).fadeOut('fast');
                      setTimeout(function(){
                        location.reload();
                      },2010);

                 }
             },
         });
      });

      $(document).on('click', '.edit-order', function(){
          console.log('edit?')
          var orders = JSON.parse(localStorage.getItem('myTransaction'));
          var pid = $(this).closest('tr').find('td[name="product"]').attr('data-id');
          var td = $(this).closest('tr').find('td[name="qty"]');
          var qty = td.text();

          bootbox.prompt({
              title: 'Update Quantity',
              inputType: 'number',
              callback: function(result){
                  console.log(result);
                  if(result == null){
                      td.text(qty);
                  } else {
                      td.val(result);
                      for (var i = 0; i < orders.length; i++) {
                          if(pid == orders[i].prod_id){  //look for match with nid
                              orders[i].qty = result;  //update quantity
                              break;  //exit loop since you found the product
                          }
                      }
                      localStorage.setItem("myTransaction", JSON.stringify(orders));
                      console.log(orders);
                      location.reload();
                  }
              },
          });

      });

  });

</script>
</body>

</html>