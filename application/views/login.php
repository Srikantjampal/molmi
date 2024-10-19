<!DOCTYPE html>

<html lang="en">

<head>



	<title>Login | MOLMI</title>

	<?php include('include/header.php'); ?>



</head>

<body>

	<div class="login-content">

		<div class="container">

			<div class="row">

				<div class="col-md-3"></div>

				<div class="col-md-6">

					<div class="form-white-bg">
						<form class="form" id="loginform" method="post" action="<?php echo $base_url; ?>welcome/login">
							<INPUT TYPE="hidden" NAME="action" VALUE="login">

							<div class="row">

								<div class="col-md-12 text-center mb-4">

									<a href="index.php"><img src="<?php echo $base_url_views; ?>src/img/logo.png"></a>

								</div>

								<div class="col-md-12 mb-4">
									<div class="theme-form d-flex flex-column flex-md-row">
										<div class="form-check d-flex me-4 mb-2 mb-md-0">
											<input class="custom-radio" type="radio" name="user_role" id="superadmin"
												value="SuperAdmin" checked >
											<label class="form-check-label ms-2" for="superadmin">
												SuperAdmin
											</label>
										</div>
										<div class="form-check d-flex me-4 mb-2 mb-md-0">
											<input class="custom-radio" type="radio" name="user_role" id="trainer"
												value="Trainer">
											<label class="form-check-label ms-2" for="trainer">
												Trainer
											</label>
										</div>
										<div class="form-check d-flex">
											<input class="custom-radio" type="radio" name="user_role" id="candidate"
												value="Candidate">
											<label class="form-check-label ms-2" for="candidate">
												Candidate
											</label>
										</div>
									</div>
								</div>

								<div class="col-md-12">

									<div class="theme-form">

										<label id="inputLabel">Email Id</label>

										<input type="email" name="txtEmail" id="txtEmail" placeholder="">

									</div>

								</div>

								<div class="col-md-12">

									<div class="theme-form">

										<label>Password</label>

										<input type="password" name="txtPassword" id="txtPassword" placeholder="">

									</div>

								</div>

								<span id="contact_error" class="error"
									style="display: none;color: red;margin-bottom: 10px;"></span>
								<?php if ($L_strErrorMessage) { ?>
									<span class="error" style="color: red;margin-bottom: 10px;">Invalid User Name or
										Password.</span>
								<?php } ?>

								<div class="col-md-12">

									<div class="theme-form">

										<button type="button"
											onclick="javascript:validate();return false;">Login</button>
									</div>

								</div>

							</div>

						</form>

					</div>

				</div>

				<div class="col-md-3"></div>

			</div>



		</div>

	</div>



	<?php include('include/footer.php'); ?>
	<script>
		function validate() {

			var userRole = jQuery('input[name="user_role"]:checked').val();
			var txtPassword = jQuery("#txtPassword").val();
			var txtEmail = jQuery("#txtEmail").val();

			if (txtEmail == '') {
				jQuery('#contact_error').html("Please Enter Email Id");
				jQuery('#contact_error').show().delay(0).fadeIn('show');
				jQuery('#contact_error').show().delay(2000).fadeOut('show');
				return false;
			}

			if (userRole === "SuperAdmin") {
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				if (!filter.test(txtEmail)) {
					jQuery('#contact_error').html("Please Enter Valid Email ID");
					jQuery('#contact_error').show().delay(0).fadeIn('show');
					jQuery('#contact_error').show().delay(2000).fadeOut('show');
					return false;
				}
			}

			if (txtPassword == '') {
				jQuery('#contact_error').html("Please Enter Password");
				jQuery('#contact_error').show().delay(0).fadeIn('show');
				jQuery('#contact_error').show().delay(2000).fadeOut('show');
				return false;
			}

			console.log("Selected Role: " + userRole);

			$('#loginform').submit();
		}
	</script>


</body>

</html>