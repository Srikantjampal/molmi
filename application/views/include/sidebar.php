<div class="sidebar-brand">
	<a href="<?php echo $base_url; ?>home"><img src="<?php echo $base_url_views; ?>src/img/logo.png"></a>
</div>
<div class="sidebar-menu">
	<?php
	$permission1 = $this->session->userdata('upermission');
	$permission1 = explode(',', $permission1);
	$userRole = $this->session->userdata('user_role'); // Get the user role from the session
	?>
	<ul>
		<li><a href="<?php echo $base_url; ?>home" title="Home"><span class="las la-home"></span> <span>Home</span></a>
		</li>

		<!-- Super Admin Menu -->
		<?php if ($userRole === 'SuperAdmin') { ?>
			<?php if (in_array('1', $permission1)) { ?>
				<li><a href="<?php echo $base_url; ?>trainer/lists" title="Trainer"><span class="las la-user-tie"></span>
						<span>Trainers</span></a></li>
			<?php } ?>
			<?php if (in_array('2', $permission1)) { ?>
				<li><a href="<?php echo $base_url; ?>course/lists" title="Course"><span class="las la-book"></span>
						<span>Courses</span></a></li>
			<?php } ?>
			<?php if (in_array('3', $permission1)) { ?>
				<li><a href="<?php echo $base_url; ?>candidate/lists" title="Candidates"><span class="las la-users"></span>
						<span>Candidates</span></a></li>
			<?php } ?>
			<?php if (in_array('4', $permission1)) { ?>
				<li><a href="<?php echo $base_url; ?>certificate/lists" title="Certificates"><span
							class="las la-certificate"></span>
						<span>Certificates</span></a></li>
			<?php } ?>
		<?php } ?>

		<!-- Candidate Menu -->
		<?php if ($userRole === 'Candidate') { ?>
			<!-- <li><a href="<?php echo $base_url; ?>profile" title="Profile"><span class="las la-user"></span>
					<span>Profile</span></a></li> -->
			<li><a href="<?php echo base_url('candidate/CandidateCourse'); ?>" title="My Courses"><span
						class="las la-book"></span>
					<span>My Courses</span></a></li>
			<li><a href="<?php echo $base_url; ?>candidate/CandidateCertificates" title="My Certificates"><span
						class="las la-certificate"></span>
					<span>My Certificates</span></a></li>
		<?php } ?>

		<!-- Trainer Menu -->
		<?php if ($userRole === 'Trainer') { ?>
			<li><a href="<?php echo $base_url; ?>trainer/trainerCourse" title="His Courses"><span
						class="las la-book"></span>
					<span>My Courses</span></a></li>
			<li><a href="<?php echo $base_url; ?>trainer/trainerCandidates" title="Candidates"><span class="las la-users"></span>
					<span>Candidates</span></a></li>
			<li><a href="<?php echo $base_url; ?>trainer/JiraTicketPage" title="Jira Ticket Check"><span
						class="las la-book"></span>
					<span>Jira Ticket Check</span></a></li>
		<?php } ?>

		<!-- Logout -->
		<li class="logout-menu" title="Logout">
			<a href="<?php echo $base_url; ?>welcome/logout"><span class="las la-sign-out-alt"></span>
				<span>Logout</span></a>
		</li>
	</ul>
</div>