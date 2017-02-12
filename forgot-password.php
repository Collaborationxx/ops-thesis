
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OPS | Forgot Password </title>

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
  <link rel="shortcut icon" href="assets/images/small-logo.png" />
</head>
<body>
  <div class="page-wrapper">

  <nav class="navbar navbar-default" style="height: 70px; background-color: #e6ffe6;">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-6 col-xs-3">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php"><img src="assets/images/opslogo.png" class="ops-nav-logo"></a>
        </div>
        </div>
        <div class="col-md-6 col-xs-9">
          <span class="pull-right" style="margin-top: 15px;">
            <ol class="breadcrumb">
              <li><a href="index.php">Home</a></li>
              <li class="active">Forgot Password</li>
            </ol>
          </span>
        </div>

      </div>
    </div>
  </nav>
 
<div class="page-inner">
    <h4 style="margin-left: 20px;">
      <b>Forgot Password? Reset your password.</b>
    </h4>
    <br>
      <p style="text-align: justify; margin-left: 20px; margin-right: 20px;">
      Please enter the email address for your account. A verification code will be sent to you. Once you have received the verification code, you will be able to choose a new password for your account.
    </p>
      <br/>
      <form>
        <div class="row" style="margin-left: 40px;" >
        <div class="col-md-12 col-xs-12">
        <label type="text">E-mail address</label>
        </div>
        <div class="col-md-12 col-xs-12">
          <input  type="email" placeholder="Email">
        </div>
        
        <div class="col-md-12 col-xs-12">
        <button type="submit" class="btn btn-success" style="margin-top: 10px;">Submit</button>
        </div>
        </div>
      <br>
  </div>

  </div>
    
  

  <!-- jQuery 3.1.1 -->
<script src="plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/dist/js/app.min.js"></script>

<script>
  $(function(){
    $('.btn-success').click(function(e){
      e.preventDefault();
      alert("We sent you the verication  code. Check your email!");
      window.location='index.php';
    });   
  });
</script>

</body>
</html>