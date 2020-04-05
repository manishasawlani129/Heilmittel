<?php include(dirname(__DIR__).'\header.php'); ?>
<?php include(dirname(__DIR__).'\leftnav.php'); ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Password
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Settings</a></li>
        <li class="active">Update Password</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="box box-primary">
            <!-- form start -->
            <form role="form" class="validatedForm" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="curpass">Current Password</label>
                  <input type="password" class="form-control" id="curpass" name="curpass" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="newpass">New Password</label>
                  <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="confpass">Confirm Password</label>
                  <input type="password" class="form-control" id="confpass" name="confpass" placeholder="Password">
                </div>                                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" id="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- validate -->
<script src="<?php echo base_url(); ?>assets/admin/jquery.validate.js"></script>
<script type="text/javascript">
	$('.validatedForm').validate({
	    rules : {
	    	curpass : {
	          required : true,	          
	        },
	        newpass : {
	          required : true,
	          minlength : 6
	        },
	        confpass : {
	          required : true,
	          minlength : 6,
	          equalTo : "#newpass"
	        }
	    },
	    messages: {
	      curpass : {
	        required : "Please enter your current password",
	      },
	      newpass : {
	        required : "Please enter your new password",
	        minlength : "Password must have 6 or more characters",
	      },
	      confpass : {
	      	required : "Please retype your new password",
	        minlength : "Retype Password must have 6 or more characters",
	        equalTo : "Password and Retype Password fields not match"
	      }
	    },
	    errorElement : 'div',
	    errorLabelContainer: '.errorTxt'
	});
</script>
<script src="<?php echo base_url(); ?>assets/js/modules/settings/change_password_custom.js"></script>
<?php include(dirname(__DIR__).'\common\footer.php'); ?>