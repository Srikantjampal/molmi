<!DOCTYPE html>

<html lang="en">

<head>

	

	<title>User & Permissions | MOLMI</title>

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
	<?php if($this->session->flashdata('L_strErrorMessage')) { ?>
		  <div class="alert alert-success alert-dismissable" id="message_succsess" style="display:none;"></div>
  	<?php } ?>
		<div class="container">

			<div class="pages-headers">

				<h2>User & Permissions <a href="<?php echo $base_url;?>user_permission/add" title="Add Users" class="theme-cta">Add User & Permission</a></h2>

			</div>

			<div class="row mobilerows">

				<div class="col-md-12">

					<div class="infos-table">

					<div class="table-responsive">

					<table id="example" class="table table-hover nowrap">

						<thead>

							<tr>

								<th>Sr.No.</th>

								<th>User Name</th>
								<th>Email Id</th>
								<th>Permissions</th>

								<th class="text-center">Status</th>

								<th class="text-center">Edit</th>

							</tr>

						</thead>

						<tbody>
						<?php if($result){
							$k=0;
  							for($i=0;$i<count($result);$i++){
								$k++;
						?>
							<tr>
								<td><?php echo $k; ?></td>
								<td><?php echo $result[$i]->name; ?></td>
								<td><?php echo $result[$i]->email; ?></td>
								<?php $permission =  $this->user_permission_model->get_permission_name($result[$i]->permission); ?>
								<td><?php if($permission) { foreach ($permission as $key => $permission_name) {
									echo $permission_name->pname; if(count($permission) > 1) { echo ", " ;}
								} } ?></td>
								<td class="text-center"><?php if($result[$i]->status == 0){echo "Active";}else{echo "Deactive";} ?></td>
								<td class="text-center"><a href="<?php echo $base_url."user_permission/edit/"; ?><?php echo $result[$i]->id; ?>" title="Edit Users"><i class="las la-pencil-alt"></i></a></td>
							</tr>
							<?php
						} } 
						// else {
						// 	echo 'No Banner Found';
						// }
						?>   
						</tbody>

					</table>

				    </div>

					</div>

				</div>

			</div>

		</div>

	</main>

</div>



<?php include('include/footer.php');?>
<?php if($this->session->flashdata('L_strErrorMessage') !=""){ ?>
<script>
$(document).ready(function() {
	$('#message_succsess').html("<?php echo $this->session->flashdata('L_strErrorMessage');?>");
    $('#message_succsess').show().delay(0).fadeIn('show');
    $('#message_succsess').show().delay(3000).fadeOut('show');
});
</script>

<?php } ?>


</body>

</html>