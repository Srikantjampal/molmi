
<!DOCTYPE html>

<html lang="en">

<head>

	<title>Candidate | MOLMI</title>

	<?php include('include/header.php'); ?>



</head>
<style>
	.form-group{
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
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="card p-3 rounded border-1 shadow">
							<h2 class="text-center mb-4">Profile Page</h2>
							<?php if (!$this->session->userdata('candidateId')): ?>
								<p class="text-center">No Candidate detail found</p>
							<?php else: ?>
							<div class="form-group">
								<label>User Email:</label>
								<span><?php echo $this->session->userdata('userEmail'); ?></span>
							</div>
							<div class="form-group">
								<label>First Name:</label>
								<span><?php echo $this->session->userdata('first_name'); ?></span>
							</div>
							<div class="form-group">
								<label>Middle Name:</label>
								<span><?php echo $this->session->userdata('middle_name'); ?></span>
							</div>
							<div class="form-group">
								<label>Last Name:</label>
								<span><?php echo $this->session->userdata('last_name'); ?></span>
							</div>
							<div class="form-group">
								<label>Date of Birth: </label>
								<span><?php echo $this->session->userdata('dob'); ?></span>
							</div>
							<div class="form-group">
								<label>Rank: </label>
								<span><?php echo $this->session->userdata('rank'); ?></span>
							</div>
							<div class="form-group">
								<label>Manager: </label>
								<span><?php echo $this->session->userdata('manager'); ?></span>
							</div>
							<div class="form-group">
								<label>WhatsApp:</label>
								<span><?php echo $this->session->userdata('whatsapp'); ?></span>
							</div>
							<div class="form-group">
								<label>Alternate Mobile:</label>
								<span><?php echo $this->session->userdata('alternate_number'); ?></span>
							</div>
							<div class="form-group">
								<label>Nationality:</label>
								<span><?php echo $this->session->userdata('nationality'); ?></span>
							</div>
							<div class="form-group">
								<label>INDOS Number:</label>
								<span><?php echo $this->session->userdata('indos_no'); ?></span>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
	<?php include('include/header.php'); ?>
</body>

</html>