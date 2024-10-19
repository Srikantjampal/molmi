<!DOCTYPE html>

<html lang="en">

<head>

	

	<title>Candidates | MOLMI</title>

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

				<h2>Candidates 

					<a href="<?php echo $base_url;?>candidate/add" class="theme-cta"><i class="las la-plus-circle"></i> Add Candidate</a>

					<a href="<?php echo $base_url;?>candidate/upload" class="theme-cta"><i class="las la-file-upload"></i> Upload</a> 

					<a href="<?php echo $base_url;?>candidate/export" class="theme-cta"><i class="las la-file-excel"></i> Export</a>

				</h2>

			</div>

			<div class="row mobilerows">

				<div class="col-md-12">

					<div class="infos-table">

					<div class="table-responsive">

					<table id="example" class="table table-hover nowrap">

						<thead>

							<tr>

								<th>Sr.No.</th>
								<th>Employee ID</th>
								<th>Title</th>
								<th>Candidate Name</th>
								<th>Designation</th>
								<th>Date Of Birth</th>
								<th>Nationality</th>
								<th class="text-center">Profile Photo</th>
								<th class="text-center">Edit</th>
								<th class="text-center">Delete</th>

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
								<td><?php echo $result[$i]->rank; ?></td>
								<td><?php echo $result[$i]->prefix; ?></td>
								<td><?php echo $result[$i]->candidate_name; ?></td>
								<td><?php echo $result[$i]->designation; ?></td>
								<td><?php $strtotime =strtotime($result[$i]->dob);
								echo date('d-m-Y',$strtotime); ?></td>
								<td><?php echo $result[$i]->nationality; ?></td>
								<td class="table-profile-img text-center">
									<?php if($result[$i]->profile_image != '') {?>
									<img src="<?php echo $front_base_url;?>upload/candidate/small/<?php echo $result[$i]->profile_image;?>">
									<?php } ?>
								</td>
								<td class="text-center"><a href="<?php echo $base_url."candidate/edit/"; ?><?php echo $result[$i]->id; ?>" title="Edit Candidate"><i class="las la-pencil-alt"></i></a></td>
								<td class="text-center"><a href="javascript:void(0);" onclick="deleteEntry(<?php echo $result[$i]->id; ?>);" title="Delete Candidate"><i class="las la-trash"></i></a></td>

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
<script>
 function deleteEntry(id){
			var t = confirm('Are you sure you want to delete this entry?');
			if(t){
				window.location.href='<?php echo $base_url;?>candidate/deleteEntry/'+id;
			}else {
				return false;
			}
		}
 </script>

</body>

</html>