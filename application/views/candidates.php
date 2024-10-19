<!DOCTYPE html>

<html lang="en">

<head>

	<title>Candidate | MOLMI</title>

	<?php include('include/header.php'); ?>



</head>
<style>
	.form-group {
		margin-bottom: 10px;
	}
</style>

<body>

	<input type="checkbox" id="nav-toggle" name="">

	<div class="sidebar">

		<?php include('include/sidebar.php'); ?>

	</div>





	<div class="main-content">
		<header>
			<?php include('include/top-header.php'); ?>
		</header>

		
		<main>
			<div class="d-flex gap-3">

			<div class="col-md-3">
				<div class="dashboardcard">
					<?php if (!empty($certificate)) {
						$totalCertificate =count($certificate);
					} else {
						$totalCertificate = 0;
					}
					?>
					<h2><?php echo $totalCertificate; ?> <span><a href="<?php echo $base_url; ?>certificate/lists"
								title="View Traines"><i class="fa fa-eye" aria-hidden="true"></i></a></span></h2>
					<h6>Total Certificates</h6>
				</div>
			</div>
			<div class="col-md-3">
				<div class="dashboardcard">
					<?php if (!empty($course)) {
						$totalCourse =count($course);
					} else {
						$totalCourse = 0;
					}
					?>
					<h2><?php echo $totalCourse; ?> <span><a href="<?php echo $base_url; ?>certificate/lists"
								title="View Traines"><i class="fa fa-eye" aria-hidden="true"></i></a></span></h2>
					<h6>Total Course</h6>
				</div>
			</div>
			</div>

		</main>
	</div>
	<?php include('include/header.php'); ?>
</body>

</html>
<!-- <div class="">
	card
	<?php if ($this->admin->totalTrainer() != '') {
		$totalTrainer = $this->admin->totalTrainer();
	} else {
		$totalTrainer = 0;
	}
	?>
	<h2><?php echo $totalTrainer; ?> <span><a href="<?php echo $base_url; ?>trainer/lists"
				title="View Traines"><i class="fa fa-eye" aria-hidden="true"></i></a></span></h2>
	<h6>Total Trainers</h6> -->