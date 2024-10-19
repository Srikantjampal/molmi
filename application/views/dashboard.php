<!DOCTYPE html>

<html lang="en">

<head>

	<title>Admin | MOLMI</title>

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

			<div class="row">

			<?php $permission1 = $this->session->userdata('upermission');
			$permission1 = explode(',',$permission1);?>

			<?php if(in_array('1',$permission1) || in_array('2',$permission1) || in_array('3',$permission1) || in_array('4',$permission1)){ ?> 

				<?php if(in_array('1',$permission1)){ ?>
					<div class="col-md-3">
						<div class="dashboardcard">
							<?php if($this->admin->totalTrainer() != '') {
								$totalTrainer = $this->admin->totalTrainer();
							}else{
								$totalTrainer = 0;
							}
							?>
							<h2><?php echo $totalTrainer; ?> <span><a href="<?php echo $base_url;?>trainer/lists" title="View Traines"><i class="fa fa-eye" aria-hidden="true"></i></a></span></h2>
							<h6>Total Trainers</h6>
						</div>
					</div>
				<?php } ?>

				<?php if(in_array('2',$permission1)){ ?>
					<div class="col-md-3">
						<div class="dashboardcard">
							<?php if($this->admin->totalCourse() != '') {
								$totalCourse = $this->admin->totalCourse();
							}else{
								$totalCourse = 0;
							}
							?>
							<h2><?php echo $totalCourse; ?> <span><a href="<?php echo $base_url;?>course/lists" title="View Courses"><i class="fa fa-eye" aria-hidden="true"></i></a></span></h2>
							<h6>Total Courses</h6>
						</div>
					</div>
				<?php } ?>

				<?php if(in_array('3',$permission1)){ ?>
					<div class="col-md-3">
						<div class="dashboardcard">
							<?php if($this->admin->totalCandidate() != '') {
								$totalCandidate = $this->admin->totalCandidate();
							}else{
								$totalCandidate = 0;
							}
							?>
							<h2><?php echo $totalCandidate; ?> <span><a href="<?php echo $base_url;?>candidate/lists" title="View Candidates"><i class="fa fa-eye" aria-hidden="true"></i></a></span></h2>
							<h6>Total Candidates</h6>
						</div>
					</div>
				<?php } ?>

				<?php if(in_array('4',$permission1)){ ?>
					<div class="col-md-3">
						<div class="dashboardcard">
							<?php if($this->admin->totalCertificate() != '') {
								$totalCertificate = $this->admin->totalCertificate();
							}else{
								$totalCertificate = 0;
							}
							?>
							<h2><?php echo $totalCertificate; ?> <span><a href="<?php echo $base_url;?>certificate/lists" title="View Certificates"><i class="fa fa-eye" aria-hidden="true"></i></a></span></h2>
							<h6>Total Certificates</h6>
						</div>
					</div>
				<?php } ?>

			<?php } ?>

			</div>

		</div>



		<!-- <div class="container">

			<div class="row">

				<div class="col-lg-12">

					<embed src="https://molmi.info/#kt-layout-id_374abb-7b"></embed>

				</div>

			</div>

		</div> -->



		<!--<div class="container">

			<div class="row mobilerows">

				<div class="col-md-12">

					<div class="infos-table">

						<div class="pages-headers">

							<h2>Courses <a href="courses.php" class="theme-cta" title="View Courses">View Courses</a></h2>

						</div>

					<div class="table-responsive">

					<table id="example" class="table nowrap">

						<thead>

							<tr>

								<th>Serial</th>

								<th>Topic</th>

								<th>Course Name</th>

								<th>C.D.C / Passport</th>

							</tr>

						</thead>

						<tbody>

							<tr>

								<td>1</td>

								<td>BRM D</td>

								<td>Bridge resource management course</td>

								<td>Passport</td>

							</tr>

							<tr>

								<td>2</td>

								<td>BRM D</td>

								<td>Bridge resource management course</td>

								<td>C.D.C</td>

							</tr>

							<tr>

								<td>3</td>

								<td>BRM D</td>

								<td>Bridge resource management course</td>

								<td>Passport</td>

							</tr>

							<tr>

								<td>4</td>

								<td>BRM D</td>

								<td>Bridge resource management course</td>

								<td>Passport</td>

							</tr>

							<tr>

								<td>5</td>

								<td>BRM D</td>

								<td>Bridge resource management course</td>

								<td>C.D.C</td>

							</tr>

						</tbody>

					</table>

				    </div>

					</div>

				</div>

			</div>

		</div>-->





		

	</main>

</div>



<?php include('include/header.php');?>


</body>

</html>