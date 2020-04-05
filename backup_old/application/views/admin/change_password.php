<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Heilmittel | Reset Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/AdminLTE.min.css">  
  <!-- custom css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/custom_style.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#">Heilmittel <b>Admin</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Reset Your Password</p>
    <div class="errorTxt alert alert-danger alert-dismissable"></div>
    <form class="validatedForm" action="<?php echo base_url().'admin/updatepassword/token/'.$token;?>" method="post">
      <?php
      if (isset($errmsg)) {
          echo "<div class='alert alert-danger alert-dismissible'>";
          echo $errmsg;
          echo "</div>";
        }
      ?>
      <div class="form-group has-feedback">
        <input type="password" id="user_password" name="password" class="form-control" placeholder="Enter New Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="password_confirm" name="password_confirm" class="form-control" placeholder="Retype Your New password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">        
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" value="submit" name="submit" id="submit_register" class="btn btn-primary btn-block btn-flat">Update Password</button>
        </div>
        <!-- /.col -->
      </div>
    </form>    
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- validate -->
<script src="<?php echo base_url(); ?>assets/admin/jquery.validate.js"></script>
<script>
  $('.validatedForm').validate({
    rules : {        
        password : {
          required : true,
          minlength : 5
        },
        password_confirm : {
          minlength : 5,
          equalTo : "#user_password"
        }
    },
    messages: {      
      password : {
        required : "Please enter your password",
        minlength : "Password must have 5 or more characters",
      },
      password_confirm : {
        minlength : "Retype Password must have 5 or more characters",
        equalTo : "Password and Retype Password fields not match"
      }      
    },
    errorElement : 'div',
    errorLabelContainer: '.errorTxt'
  });
</script>
</body>
</html>
