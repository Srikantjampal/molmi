<!DOCTYPE html>

<html lang="en">

<head>

	

	<title>Add Trainer | MOLMI</title>

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

				<h2><a href="<?php echo $base_url;?>trainer/lists"><i class="las la-arrow-left"></i></a> Add Trainer</h2>

			</div>

			<div class="form-white-bg">

         <form role="form" id="form" method="post" action="<?php echo $base_url;?>trainer/add" enctype="multipart/form-data">
         <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
				<INPUT TYPE="hidden" NAME="action" VALUE="add_trainer">

					<div class="row">

						<div class="col-md-2">

							<div class="theme-form">

								<label for="prefix">Prefix</label>

								<select id="prefix" name="prefix" required>

									<option value="">---</option>

									<option value="Mr">Mr</option>
									<option value="Miss">Miss</option>
									<option value="Mrs">Mrs</option>
									<option value="Capt">Capt</option>

								</select>

							</div>

						</div>

						<div class="col-md-2">

							<div class="theme-form">

								<label for="officer">Officer</label>

								<select id="officer" name="officer" required>

									<option value="">---</option>

									<option value="Deck">Deck</option>

									<option value="Engine">Engine</option>

								</select>

							</div>

						</div>

						<div class="col-md-2">

							<div class="theme-form">

								<label for="designation">Designation</label>

								<input type="text" id="designation" name="designation" required>

							</div>

						</div>

						<div class="col-md-6">

							<div class="theme-form">

								<label for="trainer_name">Trainer Name</label>

								<input type="text" id="trainer_name" name="trainer_name" required>

							</div>

						</div>

						<div class="col-md-6">

							<div class="theme-form">

								<label for="digital_signature">Digital Signature</label>

								<input type="file" id="digital_signature" name="digital_signature">

							</div>

						</div>

						<div class="col-md-6">

							<div class="theme-form">

								<label for="profile_photo">Profile Photo</label>

								<input type="file" id="profile_photo" name="profile_photo">

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

		var prefix = $("#prefix").val();
        if (prefix == '') {
         $('#contact_error').html("Please Select Prefix");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

      var officer = $("#officer").val();
        if (officer == '') {
         $('#contact_error').html("Please Select Officer");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var designation = $("#designation").val();
        if (designation == '') {
         $('#contact_error').html("Please Enter Designation");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var trainer_name = $("#trainer_name").val();
        if (trainer_name == '') {
         $('#contact_error').html("Please Enter Trainer Name");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

		$('#form').submit();

	}

</script>

</body>

</html>