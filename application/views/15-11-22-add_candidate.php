<!DOCTYPE html>

<html lang="en">

<head>

	

	<title>Add Candidate | MOLMI</title>

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

				<h2><a href="<?php echo $base_url;?>candidate/lists"><i class="las la-arrow-left"></i></a> Add Candidate</h2>

			</div>

			<div class="form-white-bg">

			<form role="form" id="form" method="post" action="<?php echo $base_url;?>candidate/add" enctype="multipart/form-data">
         		<INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
				<INPUT TYPE="hidden" NAME="action" VALUE="add_candidate">

					<div class="row">

						<div class="col-md-9">

							<div class="theme-form">

								<label for="candidate_name">Candidate Name</label>

								<input type="text" id="candidate_name" name="candidate_name" required>

							</div>

						</div>

						<div class="col-md-3">

							<div class="theme-form">

								<label for="cdc_passport">C.D.C / Passport</label>

								<input type="text" id="cdc_passport" name="cdc_passport">

							</div>

						</div>

						<div class="col-md-2">

							<div class="theme-form">

								<label for="rank">Employee ID</label>

								<input type="text" id="rank" name="rank">

							</div>

						</div>

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

							<label for="designation">Designation</label>

							<input type="text" id="designation" name="designation" required>

							</div>

						</div>

						<div class="col-md-3">

							<div class="theme-form">

								<label for="dob">Date Of Birth</label>

								<input type="date" id="dob" name="dob" required>

							</div>

						</div>

						<div class="col-md-3">

							<div class="theme-form">

								<label for="nationality">Nationality</label>

								<select id="nationality" name="nationality"  required>

									<option value="">---</option>

									<option value="Afghanistan">Afghanistan</option>
									<option value="Algeria">Algeria</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="Colombia">Colombia</option>
									<option value="India">India</option>
									<option value="Malaysia">Malaysia</option>
									<option value="Panama">Panama</option>
									<option value="Poland">Poland</option>
									<option value="Romania">Romania</option>
									<option value="Russia">Russia</option>
									<option value="Sri Lanka">Sri Lanka</option>
									<option value="Switzerland">Switzerland</option>
									<option value="United Kingdom">United Kingdom</option>
									<option value="United States">United States</option>

								</select>

							</div>

						</div>

						<div class="col-md-4">

							<div class="theme-form">

								<label for="profile_image">Profile Image</label>

								<input type="file" id="profile_image" name="profile_image">

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

		var candidate_name = $("#candidate_name").val();
        if (candidate_name == '') {
         $('#contact_error').html("Please Enter Candidate Name");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

      var cdc_passport = $("#cdc_passport").val();
        if (cdc_passport == '') {
         $('#contact_error').html("Please Enter C.D.C/Passport");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var rank = $("#rank").val();
        if (rank == '') {
         $('#contact_error').html("Please Enter Employee ID");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var prefix = $("#prefix").val();
        if (prefix == '') {
         $('#contact_error').html("Please Select Prefix");
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

		var dob = $("#dob").val();
        if (dob == '') {
         $('#contact_error').html("Please Select Date of Birth");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

		var nationality = $("#nationality").val();
        if (nationality == '') {
         $('#contact_error').html("Please Select Nationality");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

		$('#form').submit();

	}

</script>
</body>

</html>