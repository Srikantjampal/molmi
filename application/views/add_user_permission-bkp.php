<!DOCTYPE html>

<html lang="en">

<head>

	

	<title>Add User & Permission | MOLMI</title>

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

		<div class="container">

			<div class="theme-form-header">

				<h2><a href="user-permissions.php"><i class="las la-arrow-left"></i></a> Add User & Permission</h2>

			</div>

			<div class="form-white-bg">

			<form role="form" id="form" method="post" action="<?php echo $base_url;?>user_permission/add" enctype="multipart/form-data">
         		<INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
				<INPUT TYPE="hidden" NAME="action" VALUE="add_user_permission">

					<div class="row">

					<div class="col-md-4">

						<div class="theme-form">

							<label for="name">Name</label>

							<input type="text" id="name" name="name" required>

						</div>

						</div>

						<div class="col-md-4">

							<div class="theme-form">

								<label for="email">Email Id</label>

								<input type="email" id="email" name="email" required>

							</div>

						</div>

						<div class="col-md-4">

							<div class="theme-form">

								<label for="password">Password</label>

								<input type="password" id="password" name="password" required>

							</div>

						</div>

						<div class="col-md-4">

							<div class="theme-form">

								<label>Permissions</label>

								<div class="multiselect">

									<div class="selectBox" onclick="showCheckboxes()">

										<select>

											<option value="">---</option>

										</select>

										<div class="overSelect"></div>

									</div>

									<div id="checkboxes">

										<?php  if($all_permission !='' && count($all_permission) > 0){
                                            foreach($all_permission as $permission){ ?>

											<label for="<?php echo $permission->pname; ?>">
												<input type="checkbox" name="permission[]" value="<?php echo $permission->id; ?>" id="<?php echo $permission->pname; ?>"/><?php echo $permission->pname; ?></label>

										<?php } }  ?>

										
									</div>

								</div>

							</div>

						</div>

						<div class="col-md-4">
							<div class="theme-form">
								<label for="status">Status</label>
								<select id="status" name="status">
									<option value="0">Active</option>
									<option value="1">Deactive</option>
								</select>
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

<script>

	function validate(){

		// var name = $("#name").val();
        // if (name == '') {
        //  $('#contact_error').html("Please Enter Name");
        //  $('#contact_error').show().delay(0).fadeIn('show');
        //  $('#contact_error').show().delay(2000).fadeOut('show');
        //     return false;
        // }

		// var email = $("#email").val();
        // if (email == '') {
        //  $('#contact_error').html("Please Enter Email Id");
        //  $('#contact_error').show().delay(0).fadeIn('show');
        //  $('#contact_error').show().delay(2000).fadeOut('show');
        //     return false;
        // }

		// var em = jQuery('#email').val();
        // var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        // if (!filter.test(em)) {
        //     jQuery('#contact_error').html("Please Enter Valid Email ID");
        //     jQuery('#contact_error').show().delay(0).fadeIn('show');
        //     jQuery('#contact_error').show().delay(2000).fadeOut('show');
        //     return false;
        // }

		// var password = jQuery("#password").val();
        // if (password == '') {
        //     jQuery('#contact_error').html("Please Enter Password");
        //     jQuery('#contact_error').show().delay(0).fadeIn('show');
        //     jQuery('#contact_error').show().delay(2000).fadeOut('show');
        //     return false;
        // }

		var permission = $("input[name='permission[]']:checked").val(); 
    	if(permission == '' || permission == undefined){
			$("#contact_error").html("Please Select Permission.");
			$('#contact_error').show().delay(0).fadeIn('show');
			$('#contact_error').show().delay(2000).fadeOut('show');
			return false;
    	}

		//$('#form').submit();

	}

</script>

</body>

</html>