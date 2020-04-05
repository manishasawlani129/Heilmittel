<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Heilmittel | Log in</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#">Heilmittel <b>Admin</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form class="validatedForm" action="<?php echo base_url(); ?>admin/" method="post">
      <?php 
        if (isset($logoutmsg)) {
          echo "<div class='alert alert-success alert-dismissible'>";
          echo $logoutmsg;
          echo "</div>";
        } else if (isset($registermsg)) {
          $theme = ($registermsgtheme == 0) ? 'alert-success' : 'alert-danger';
          echo "<div class='alert ". $theme ." alert-dismissible'>";
          echo $registermsg;
          echo "</div>";
        } else if (isset($errmsg)) {
          echo "<div class='alert alert-danger alert-dismissible'>";
          echo $errmsg;
          echo "</div>";
        } else if (validation_errors()) {
          echo "<div class='alert alert-danger alert-dismissible'>";
          echo validation_errors();
          echo "</div>";
        }   
      ?>
      <div class="form-group has-feedback">
        <input type="email" name="username" id="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="<?php echo base_url(); ?>admin/forgotpassword">Forgot Password</a><br>
    <a href="<?php echo base_url(); ?>admin/register" class="text-center">Register New Admin</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/iCheck/icheck.min.js"></script>
<!-- validate -->
<script src="<?php echo base_url(); ?>assets/admin/jquery.validate.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

  $('.validatedForm').validate({
    rules : {
        username : {
          required : true
        },
        password : {
          required : true,
          minlength : 5
        },
        terms : {
          required : true
        }
    },
    messages: {
      firstname : "Please enter your first name",
      lastname : "Please enter your last name",
      email : "Please enter correct email address",
      password : {
        required : "Please enter your password",
        minlength : "Password must have 5 or more characters",
      },
      password_confirm : {
        minlength : "Retype Password must have 5 or more characters",
        equalTo : "Password and Retype Password fields not match"
      },
      terms : "Please agree to the terms of registration"
    },
    errorElement : 'div',
    errorLabelContainer: '.errorTxt'
  });
</script>
</body>
</html>
