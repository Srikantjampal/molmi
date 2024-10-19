<!DOCTYPE html>
<html lang="en">
<head>
	<title>Topics | MOLMI</title>
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

				<h2>Topics 

					<a href="<?php echo $base_url;?>topic/add" title="Add topic" class="theme-cta"><i class="las la-plus-circle"></i> Add topic</a>

					<!-- <a href="<?php echo $base_url;?>topic/upload" class="theme-cta"><i class="las la-file-upload"></i> Upload</a> 
					<a href="<?php echo $base_url;?>topic/export" class="theme-cta"><i class="las la-file-excel"></i> Export</a> -->

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
								<th>Topics Name</th>
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
								<td><?php echo $result[$i]->name; ?></td>
								<td class="text-center"><a href="<?php echo $base_url."topic/edit/"; ?><?php echo $result[$i]->id; ?>" title="Edit topic"><i class="las la-pencil-alt"></i></a></td>
								<td class="text-center"><a href="javascript:void(0);" onclick="deleteEntry(<?php echo $result[$i]->id; ?>);" title="Delete topic"><i class="las la-trash"></i></a></td>
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
				window.location.href='<?php echo $base_url;?>topic/deleteEntry/'+id;
			}else {
				return false;
			}
		}
 </script>

</body>

</html>