<h2>
	<label for="nav-toggle">
		<span class="las la-bars"></span>
	</label>
</h2>
<div class="user-wrapper dropdown">
	<button class="dropbtn d-flex align-items-center " onclick="redirectBasedOnUser()">
		<img class="mx-3" src="<?php echo $base_url_views; ?>src/img/user-icon-img.png" width="40px" height="40px">
		<small>
			<?php echo $this->session->userdata('uname'); ?>
		</small><br>
		<small>
			<?php echo $this->session->userdata('candidate_name'); ?>
		</small><br>
		<small>
			<?php echo $this->session->userdata('Tname'); ?>
		</small>
	</button>


	<div id="myDropdown" class="dropdown-content">
		<a href="<?php echo $base_url; ?>my-profile" title="My Profile"><i class="las la-user"></i> My Profile</a>
		<?php if ($this->session->userdata('adminId') == 1) { ?>
			<a href="<?php echo $base_url; ?>user_permission/lists" title="Users and permissions"><i
					class="las la-user-circle"></i> Users and permissions</a>
		<?php } ?>
		<a href="<?php echo $base_url; ?>welcome/logout" title="Logout"><i class="las la-sign-out-alt"></i> Logout</a>
	</div>

</div>

<script>
	function redirectBasedOnUser() {
		const userType = '<?php echo $this->session->userdata('user_role'); ?>'; 

		// if (userType === 'SuperAdmin') {
		// 	window.location.href = '<?php echo base_url('admin/profilePage'); ?>';
		// } else 
		if (userType === 'Candidate') {
			window.location.href = '<?php echo base_url('candidate/profilePage'); ?>';
		} else if (userType === 'Trainer') {
			window.location.href = '<?php echo base_url('trainer/profilePage'); ?>';
		} else {
			alert('Unknown user type'); 
		}
	}
</script>