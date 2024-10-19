<!DOCTYPE html>

<html lang="en">

<head>

	

	<title>Upload Certificate | MOLMI</title>

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

				<h2><a href="<?php echo $base_url;?>certificate/lists"><i class="las la-arrow-left"></i></a> Upload Certificate</h2>

			</div>

			<div class="form-white-bg">

			<form role="form" id="form" method="post" action="<?php echo $base_url;?>certificate/upload" enctype="multipart/form-data">
         		<INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
				<INPUT TYPE="hidden" NAME="action" VALUE="upload_certificate">

					<div class="row">

						<div class="col-md-12">

							<div class="theme-form">

								<label for="csv">XLS File</label>

								<input id="csv" name="csv" type="file">

							</div>

						</div>
						
						<span id="contact_error" class="error" style="display: none;color: red;margin-bottom: 10px;"></span>
						<div class="col-md-12">

							<div class="theme-form">

							<button type="button" onclick="javascript:validate();return false;">Submit</button>

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

		var csv = $("#csv").val();
        if (csv == '') {
         $('#contact_error').html("Please Select File");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

		$('#form').submit();

	}

</script>
</body>

</html>