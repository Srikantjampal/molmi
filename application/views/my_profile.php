<!DOCTYPE html>

<html lang="en">

<head>

	

	<title>My Profile | MOLMI</title>

	<?php include('include/header.php');?>



</head>

<body>

<input type="checkbox" id="nav-toggle" name="">

<div class="sidebar">

<?php include('include/sidebar.php');?>

</div>





<div class="main-content">

	<header>

	<?php include('include/top-header.php');?>

	</header>



	<main>
	<?php if($this->session->flashdata('L_strErrorMessage')) { ?>
		  <div class="alert alert-success alert-dismissable" id="message_succsess" style="display:none;"></div>
  	<?php } ?>
		<div class="container">

			<div class="theme-form-header">

				<h2>My Profile</h2>

			</div>

			<div class="form-white-bg">

				<form action="" method="POST" id="form_profile" enctype="multipart/form-data">
				<input type="hidden" name="action" value="update_profile">
					<div class="row">

						<div class="col-md-6">

							<div class="theme-form">

								<label for="email">Email Id</label>

								<input type="email" id="email" name="email" value="<?php echo $profile->email;?>">

							</div>

						</div>

						<div class="col-md-6">

							<div class="theme-form">

								<label for="password">Password</label>

								<input type="password" id="password" name="password" value="<?php echo $profile->password;?>">

							</div>

						</div>
						<span id="contact_error" class="error" style="display: none;color: red;margin-bottom: 10px;"></span>
						<div class="col-md-12">

							<div class="theme-form">

								<button type="button" onclick="javascript:validate();return false;">Save</button>

							</div>

						</div>

					</div>

				</form>

			</div>

		</div>

	</main>

</div>



<?php include('include/footer.php');?>
<?php if($this->session->flashdata('L_strErrorMessage') !=""){ ?>
<script>
$(document).ready(function() {
	$('#message_succsess').html("<?php echo $this->session->flashdata('L_strErrorMessage');?>");
    $('#message_succsess').show().delay(0).fadeIn('show');
    $('#message_succsess').show().delay(3000).fadeOut('show');
});
</script>

<?php } ?>
<script>

	function validate(){

		var email = $("#email").val();
        if (email == '') {
         $('#contact_error').html("Please Enter Email Id");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

		var em = jQuery('#email').val();
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(em)) {
            jQuery('#contact_error').html("Please Enter Valid Email ID");
            jQuery('#contact_error').show().delay(0).fadeIn('show');
            jQuery('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

		var password = jQuery("#password").val();
        if (password == '') {
            jQuery('#contact_error').html("Please Enter Password");
            jQuery('#contact_error').show().delay(0).fadeIn('show');
            jQuery('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

		var oldEmail = '<?php echo $profile->email;?>';
		
		if (email != oldEmail) {

			var url = '<?php echo $base_url;?>user_permission/checkemail';
            $.ajax({
                url: url,
                type: 'post',
                data: 'email=' + email,
                success: function(msg) {

                  //alert (msg);
                    if (msg == "0") {
                        $("#contact_error").html("Email Id is already registered.");
                        $('#contact_error').show().delay(0).fadeIn('show');
                        $('#contact_error').show().delay(2000).fadeOut('show');
                        return false;
                        
                    }else

                    {      
                        $('#form_profile').submit(); 
                    }
                }
            });
		}
		else{
			$('#form_profile').submit(); 
		}

	}

</script>


</body>

</html>