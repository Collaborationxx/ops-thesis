<?php
//check if user has session
session_start();
if($_SESSION["username"] == null) { //if not redirect to login page
    header('location: index.php');
}

include('data-manager/get-data.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Account</title>
	
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

    <!-- default style -->
    <link rel="stylesheet" type="text/css" href="assets/css/ops-custom.css">
</head>
<body>
<div id="wrapper">
    <?php include ('./main-menu.php'); ?>
	<div id="page-wrapper" >
    	<div id="page-inner">
        	<div class="row">
            <div class="col-md-12">
                <h2><strong>User List</strong></h2>                 
            	<div style="position: absolute; left:880px; top: 40px;">
                    <button type="button" class="btn btn-info" id="myBtn">ADD NEW USER</button>

<!-- The Modal -->
<div id="myModal" class="modal1">

  <!-- Modal content -->
  <div class="modal-content1">
    
    <form action="authentication/add-user.php" method="POST" style="border:1px solid #0C6; padding:15px; width:auto;" enctype="multipart/form-data" >
        
        <div class="row">
        	<div class="col-md-3">
			 	<label>Firstname: </label>
         	</div>
         	<div class="col-md-6">   
                <input type="text" name="fname" placeholder="First Name" size="40" required/>
			</div>
        </div>
		
        <br>
        <div class="row">
        	<div class="col-md-3">
				<label>Lastname: </label>
        	</div>
        	<div class="col-md-6">
                <input type="text" name="lname" placeholder="Last Name" size="40" required/>
        	</div>
        </div>
        
		<br>
        <div class="row">
        	<div class="col-md-3">
				<label>Address: </label>
            </div>
        	<div class="col-md-6">
            <input type="text" name="address" placeholder="Address" size="40" required/>
			</div>
        </div>
        
        
        <br>
        <div class="row">
        	<div class="col-md-3">
				<label>Contact Number: </label>
            </div>
            <div class="col-md-6">
                <input type="text"  name="contact" placeholder="Mobile Phone" size="40" required/> 
       		</div>
        </div>
        
        <br>
        <div class="row">
        	<div class="col-md-3">
				<label>Email: </label>
                </div>
            <div class="col-md-6">
            <input type="text" name="email" placeholder="Email Address" size="40" required/>
			</div>
        </div>
        
        <br>
        <div class="row">
        	<div class="col-md-3">
				<label>Username: </label>
            </div>
            <div class="col-md-6">
            	<input type="text" name="username" placeholder="Username" size="40" required/>
			</div>
        </div>
        	  
		<br>
        <div class="row">
        	<div class="col-md-3">
				<label>Password: </label>
            </div>
            <div class="col-md-6">
            	<input type="password" name="password" placeholder="Password" size="40" required/>
			</div>
        </div>
        
        <br>
        <div class="row">
        		<div class="col-md-3">
					<label>User Role: </label>
                </div>
                <div class="col-md-6">    
                    <input type="text" name="role" placeholder="1:Admin I 2:Staff" size="40" required/>
				</div>
        </div>
        
        <br>
        <center>
              	<button type="submit" class="btn btn-success" style="margin-right:10px;">
              		REGISTER
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
            <div class="row">
            <div class="col-md-12">
                <?php if (isset($_GET['message'])): ?>
                    <div class="alert alert-danger">
                        <p>Record Deleted!</p>
                    </div>
                <?php endif; ?>
            	<div class="panel panel-default">
            	<div class="panel-heading">
            		Registered Users
                </div>
                <div class="panel-body">
                <div class="table-responsive">
                	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    	<thead>
                        	<tr>
                                <th width="15%"><center>UserName</center></th>
                            	<th width="15%"><center>First Name</center></th>
                                <th width="15%"><center>Last Name</center></th>
                                <th width="25%"><center>Address</center></th>
                                <th width="10%"><center>Contact</center></th>
                                <th width="10%"><center>Email</center></th>
                                <th width="10"><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php foreach($arr as $key => $value): ?>
                        	<tr>
                                <td name="id" style="display: none"><?php echo $value['id']; ?></td>
                                <td><?php echo $value['username']; ?></td>
                                <td><?php echo $value['first_name']; ?></td>
                                <td><?php echo $value['last_name']; ?></td>
                                <td style="word-break:break-all"><?php echo $value['address']; ?></td>
                                <td><?php echo $value['contact_number']; ?></td>
                                <td><?php echo $value['email']; ?></td>
                                <td class="action-btn">
                                    <a href="#" style="color:red;"><i class="fa fa-pencil"></i> |
                                    <a class="delete-btn" href="#"><i class="fa fa-trash-o" style="color:red;"></i></a>
                                </td>
                           </tr>
                        <?php endforeach; ?>
                           </tbody>
                       </table>
                       </div>
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
<!--    <script src="assets/js/dataTables/jquery.dataTables.js"></script>-->
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
            $(document).ready(function () {
//                $('#dataTables-example').dataTable();
                $(document).on('click', '.delete-btn', function (e) {
                    e.preventDefault();
                    var id = $(this).closest('tr').find('td[name="id"]').text();
                    console.log(id);
                    var r = confirm("Are you sure you want to delete this record? This action can't be undone.");
                    if (r == true) {
                        window.location = './data-manager/delete-record.php?id='+id;
                    }
                })

                $('.alert').delay(3000).fadeOut('fast');
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
