<?php
//check if user has session
session_start();
if($_SESSION["username"] == null) { //if not redirect to login page
    header('location: index.php');
}

include('data-manager/get-data.php');
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OPS I Inventory</title>
    
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
<div id="wrapper">
    <?php include ('./main-menu.php'); ?>
	<div id="page-wrapper" >
    	<div id="page-inventory">
        	<div class="row">
            	<div class="col-md-12">
                    <h2><strong>Medical Supplies Inventory</strong></h2>                 
                    <div style="position: absolute; left:860px; top: 40px;">
                    <button type="button" class="btn btn-info" id="myBtn">ADD NEW PRODUCT</button>

<!-- The Modal -->
<div id="myModal" class="modal1">

  <!-- Modal content -->
  <div class="modal-content1">
    
    <form method="POST"  style="border:1px solid #0C6; padding:15px; width:auto;" enctype="multipart/form-data">
        
       <h2 class="title2"><center>Restocking of Medical Supplies</center></h2>
        <div class="row">
        	<div class="col-md-3">
				<label class="lbl">Product: </label>
        	</div>
        	<div class="col-md-6">
                <input type="text" id="inputLname" placeholder="Product Name" size="40" style="margin-left:5px;" required/>
        	</div>
        </div>
        
		<br>
        <div class="row">
        	<div class="col-md-3">
				<label class="lbl">Quantity: </label>
            </div>
        	<div class="col-md-6">
            <input type="text" placeholder="Quantity" size="40" style="margin-left:5px;" required/>
			</div>
        </div>
        
        
        <br>
        <div class="row">
        	<div class="col-md-3">
				<label class="lbl">Date: </label>
            </div>
            <div class="col-md-6">
            	<input type="text" placeholder="Date of Restock" size="40" style="margin-left:5px;" required/>
			</div>
        </div>
        
        <br>
        <center>
              	<button class="btn btn-success" style="margin-right:10px;">
              		ADD
              	</button>
              	<button class="btn btn-warning">
              		CANCEL
              	</button>
  		</center>	
				
	</form>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("btn-warning")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

                </div>
            </div>
            </div>
      
                <hr />
<!--Tables -->               
	<div class="row">
    	<div class="col-md-12">  
        <div class="panel panel-default">
        <div class="panel-heading">
        	Stocks of Medical Supplies
        </div>
        <div class="panel-body">
        <div class="table-responsive">
        	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
            	<thead>
                	<tr>
                    	<th width="38%"><center>Product Name</center></th>
                        <th width="14%"><center>Quantity</center></th>
                        <th width="16%"><center>Date of Restock</center></th>
                        <th width="32%"><center>Action</center></th>
                    </tr>
                </thead>
                <tbody>
                	<tr>
                    	<td>Nebulizer</td>
                        <td>10</td>
                        <td>09/05/16</td>
                        <td>
                        <button class="btn btn-primary">
                        	EDIT
                        </button>
                        <button class="btn btn-success">
                        	SAVE
                        </button>
                        <button class="btn btn-danger">
                        	DELETE
                        </button>
                        <button class="btn btn-warning">
                        	CANCEL
                        </button>
                        </td>
                   </tr>
                   <tr>
                    	<td>Nebulizer</td>
                        <td>10</td>
                        <td>09/05/16</td>
                        <td>
                        <button class="btn btn-primary">
                        	EDIT
                        </button>
                        <button class="btn btn-success">
                        	SAVE
                        </button>
                        <button class="btn btn-danger">
                        	DELETE
                        </button>
                        <button class="btn btn-warning">
                        	CANCEL
                        </button>
                        </td>
                   </tr>
                   <tr>
                    	<td>Nebulizer</td>
                        <td>10</td>
                        <td>09/05/16</td>
                        <td>
                        <button class="btn btn-primary">
                        	EDIT
                        </button>
                        <button class="btn btn-success">
                        	SAVE
                        </button>
                        <button class="btn btn-danger">
                        	DELETE
                        </button>
                        <button class="btn btn-warning">
                        	CANCEL
                        </button>
                        </td>
                   </tr>
                   <tr>
                    	<td>Nebulizer</td>
                        <td>10</td>
                        <td>09/05/16</td>
                        <td>
                        <button class="btn btn-primary">
                        	EDIT
                        </button>
                        <button class="btn btn-success">
                        	SAVE
                        </button>
                        <button class="btn btn-danger">
                        	DELETE
                        </button>
                        <button class="btn btn-warning">
                        	CANCEL
                        </button>
                        </td>
                   </tr>
                   <tr>
                    	<td>Nebulizer</td>
                        <td>10</td>
                        <td>09/05/16</td>
                        <td>
                        <button class="btn btn-primary">
                        	EDIT
                        </button>
                        <button class="btn btn-success">
                        	SAVE
                        </button>
                        <button class="btn btn-danger">
                        	DELETE
                        </button>
                        <button class="btn btn-warning">
                        	CANCEL
                        </button>
                        </td>
                   </tr>
                   <tr>
                    	<td>Nebulizer</td>
                        <td>10</td>
                        <td>09/05/16</td>
                        <td>
                        <button class="btn btn-primary">
                        	EDIT
                        </button>
                        <button class="btn btn-success">
                        	SAVE
                        </button>
                        <button class="btn btn-danger">
                        	DELETE
                        </button>
                        <button class="btn btn-warning">
                        	CANCEL
                        </button>
                        </td>
                   </tr>
                   <tr>
                    	<td>Nebulizer</td>
                        <td>10</td>
                        <td>09/05/16</td>
                        <td>
                        <button class="btn btn-primary">
                        	EDIT
                        </button>
                        <button class="btn btn-success">
                        	SAVE
                        </button>
                        <button class="btn btn-danger">
                        	DELETE
                        </button>
                        <button class="btn btn-warning">
                        	CANCEL
                        </button>
                        </td>
                   </tr>
                	<tr>
                    	<td>Nebulizer</td>
                        <td>10</td>
                        <td>09/05/16</td>
                        <td>
                        <button class="btn btn-primary">
                        	EDIT
                        </button>
                        <button class="btn btn-success">
                        	SAVE
                        </button>
                        <button class="btn btn-danger">
                        	DELETE
                        </button>
                        <button class="btn btn-warning">
                        	CANCEL
                        </button>
                        </td>
                   </tr>
                   <tr>
                    	<td>Wheelchair</td>
                        <td>10</td>
                        <td>09/05/16</td>
                        <td>
                        <button class="btn btn-primary">
                        	EDIT
                        </button>
                        <button class="btn btn-success">
                        	SAVE
                        </button>
                        <button class="btn btn-danger">
                        	DELETE
                        </button>
                        <button class="btn btn-warning">
                        	CANCEL
                        </button>
                        </td>
                   </tr>
                   <tr>
                    	<td>Diaper</td>
                        <td>10</td>
                        <td>09/05/16</td>
                        <td>
                        <button class="btn btn-primary">
                        	EDIT
                        </button>
                        <button class="btn btn-success">
                        	SAVE
                        </button>
                        <button class="btn btn-danger">
                        	DELETE
                        </button>
                        <button class="btn btn-warning">
                        	CANCEL
                        </button>
                        </td>
                   </tr>
                   <tr>
                    	<td>Bandage</td>
                        <td>10</td>
                        <td>09/05/16</td>
                        <td>
                        <button class="btn btn-primary">
                        	EDIT
                        </button>
                        <button class="btn btn-success">
                        	SAVE
                        </button>
                        <button class="btn btn-danger">
                        	DELETE
                        </button>
                        <button class="btn btn-warning">
                        	CANCEL
                        </button>
                        </td>
                   </tr>
              </tbody>
              </table>
		</div>
		</div>
        </div>
        </div>
	</div>
		</div>
	</div>
        
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
