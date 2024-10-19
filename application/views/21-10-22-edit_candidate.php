<!DOCTYPE html>

<html lang="en">

<head>

	

	<title>Edit Candidate | MOLMI</title>

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

				<h2><a href="<?php echo $base_url;?>candidate/lists"><i class="las la-arrow-left"></i></a> <?php echo $candidate_name; ?></h2>

			</div>

			<div class="form-white-bg">

			<form role="form" id="form" method="post" action="<?php echo $base_url;?>candidate/edit/<?php echo $id; ?>" enctype="multipart/form-data" >
		 		<INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
				<INPUT TYPE="hidden" NAME="action" VALUE="edit_candidate">
				<INPUT TYPE="hidden" NAME="hiddenaction" VALUE="<?php echo $id;?>">

					<div class="row">

						<div class="col-md-9">

							<div class="theme-form">

								<label for="candidate_name">Candidate Name</label>

								<input type="text" id="candidate_name" name="candidate_name" value="<?php echo $candidate_name; ?>" required>

							</div>

						</div>

						<div class="col-md-3">

							<div class="theme-form">

								<label for="cdc_passport">C.D.C / Passport</label>

								<input type="text" id="cdc_passport" name="cdc_passport" value="<?php echo $cdc_passport; ?>">

							</div>

						</div>

						<div class="col-md-2">

							<div class="theme-form">

								<label for="rank">Employee ID</label>

								<input type="text" id="rank" name="rank" value="<?php echo $rank; ?>">

							</div>

						</div>

						<div class="col-md-2">

							<div class="theme-form">

							<label for="prefix">Prefix</label>

							<select id="prefix" name="prefix" required>

								<option value="">---</option>

								<option value="Mr" <?php if($prefix == 'Mr'){ echo "selected";} ?>>Mr</option>

								<option value="Miss" <?php if($prefix == 'Miss'){ echo "selected";} ?>>Miss</option>

								<option value="Mrs" <?php if($prefix == 'Mrs'){ echo "selected";} ?>>Mrs</option>

								<option value="Capt" <?php if($prefix == 'Capt'){ echo "selected";} ?>>Capt</option>

							</select>

							</div>

						</div>

						

						<div class="col-md-2">

							<div class="theme-form">

							<label for="designation">Designation</label>

							<input type="text" id="designation" name="designation" value="<?php echo $designation; ?>" required>

							</div>

						</div>

						<div class="col-md-3">

							<div class="theme-form">

								<label for="dob">Date Of Birth</label>

								<input type="date" id="dob" name="dob" value="<?php echo $dob; ?>" required>

							</div>

						</div>

						<div class="col-md-3">

							<div class="theme-form">

								<label for="nationality">Nationality</label>

								<select id="nationality" name="nationality"  required>

									<option value="">---</option>

									<option value="Afghanistan" <?php if($nationality == 'Afghanistan'){ echo "selected";} ?>>Afghanistan</option>
									<option value="Algeria" <?php if($nationality == 'Algeria'){ echo "selected";} ?>>Algeria</option>
									<option value="India" <?php if($nationality == 'India'){ echo "selected";} ?>>India</option>
									<option value="Poland" <?php if($nationality == 'Poland'){ echo "selected";} ?>>Poland</option>
									<option value="Romania" <?php if($nationality == 'Romania'){ echo "selected";} ?>>Romania</option>
									<option value="Russia" <?php if($nationality == 'Russia'){ echo "selected";} ?>>Russia</option>
									<option value="Switzerland" <?php if($nationality == 'Switzerland'){ echo "selected";} ?>>Switzerland</option>
									<option value="United Kingdom" <?php if($nationality == 'United Kingdom'){ echo "selected";} ?>>United Kingdom</option>
									<option value="United States" <?php if($nationality == 'United States'){ echo "selected";} ?>>United States</option>

								</select>

							</div>

						</div>

						<div class="col-md-4">

							<div class="theme-form">

								<label for="profile_image">Profile Image</label>

								<input type="file" id="profile_image" name="profile_image">

								<?php if($profile_image != '') {?>
									<img class="form-profile" src="<?php echo $front_base_url;?>upload/candidate/<?php echo $profile_image;?>">
								<?php } ?>

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