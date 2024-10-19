<!DOCTYPE html>

<html lang="en">

<head>

	

	<title>Certificates | MOLMI</title>

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
	<?php if($this->session->flashdata('CertiAlready')) { ?>
		  <div class="alert" id="message_succsess1" style="display: none;color: #C70039;font-size: 14px;line-height: 20px;"></div>
  	<?php } ?>
		<div class="container">

			<div class="pages-headers">

				<h2>Certificates  

					<a href="<?php echo $base_url;?>certificate/add" class="theme-cta"><i class="las la-plus-circle"></i> Add Certificate</a>

					<a href="<?php echo $base_url;?>certificate/upload" class="theme-cta"><i class="las la-file-upload"></i> Upload</a> 

					<a href="<?php echo $base_url;?>certificate/export" class="theme-cta"><i class="las la-file-excel"></i> Export</a>

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
								<th class="text-center">Print</th>
								<th class="text-center">Edit</th>
								<th>Certificate No.</th>
								<th>Type</th>
								<th>Topic</th>
								<th>Course Level</th>
								<th>Course Name</th>
								<th>Candidate Name</th>
								<th>Employee ID</th>
								<th>Designation</th>
								<th>Location</th>
								<th>Trainers</th>
								<th>From Date</th>
								<th>To Date</th>
								<th>Days</th>
								<th>Issue Date</th>
								<th>Status</th>
								<th class="text-center">Delete</th>
							</tr>

						</thead>

						<tbody>
						<?php if($result){
							$k=0;
  							for($i=0;$i<count($result);$i++){
								$k++;
								$candiDetail = $this->certificate_model->get_candidate_name_list($result[$i]->candidate_id);
						?>
							<tr>
								<td><?php echo $k; ?></td>
								<?php if($result[$i]->type == 'Others'){ ?>
								<td class="text-center"><a href="<?php echo $base_url."certificate/course_certificate/"; ?><?php echo $result[$i]->id; ?>" target="_blank" title="Print Certificate"><i class="las la-print"></i></a></td>
								<?php } elseif($result[$i]->type == 'DNV-ST0029'){ ?>
									<td class="text-center"><a href="<?php echo $base_url."certificate/course_certificate/"; ?><?php echo $result[$i]->id; ?>" target="_blank" title="Print Certificate"><i class="las la-print"></i></a></td>
								
								<?php }else{ ?>
									<td class="text-center"><a href="<?php echo $base_url."certificate/lng_certificate/"; ?><?php echo $result[$i]->id; ?>" target="_blank" title="Print Certificate"><i class="las la-print"></i></a></td>
								<?php } ?>
								<td class="text-center"><a href="<?php echo $base_url."certificate/edit/"; ?><?php echo $result[$i]->id; ?>" title="Edit Certificate"><i class="las la-pencil-alt"></i></a></td>
								<td><?php echo $result[$i]->certificate_no; ?></td>
								<td><?php echo $result[$i]->type; ?></td>
								<td><?php echo $this->certificate_model->get_topic_name($result[$i]->topic); ?></td>
								<td><?php echo $result[$i]->course_level; ?></td>
								<td><?php echo $this->certificate_model->get_course_name($result[$i]->course_id); ?></td>
								<td><?php echo $candiDetail->candidate_name; ?></td>
								<td><?php echo $candiDetail->rank; ?></td>
								<td><?php echo $candiDetail->designation; ?></td>
								<td><?php echo $result[$i]->location; ?></td>
								<td><?php echo $this->certificate_model->get_trainer_name($result[$i]->trainer_id); ?></td>

								<td><?php
								if($result[$i]->from_date != '0000-00-00'){
									$strtotime =strtotime($result[$i]->from_date);
									echo date('d-m-Y',$strtotime);	
								}?></td>

								<td><?php 
								if($result[$i]->to_date != '0000-00-00'){
									$strtotime1 =strtotime($result[$i]->to_date);
									echo date('d-m-Y',$strtotime1);	
								}?></td>

								<td><?php echo $result[$i]->days; ?></td>

								<td><?php 
								if($result[$i]->issue_date != '0000-00-00'){
									$strtotime2 =strtotime($result[$i]->issue_date);
									echo date('d-m-Y',$strtotime2);
								}?></td>

								<td><?php if($result[$i]->status == 0){echo "Valid";}else{echo "In Valid";} ?></td>
								<td class="text-center"><a href="javascript:void(0);" onclick="deleteEntry(<?php echo $result[$i]->id; ?>);" title="Delete Certificate"><i class="las la-trash"></i></a></td>
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

<?php if($this->session->flashdata('CertiAlready') !=""){ ?>
<script>
$(document).ready(function() {
	$('#message_succsess1').html("<?php echo $this->session->flashdata('CertiAlready');?>");
    $('#message_succsess1').show().delay(0).fadeIn('show');
    //$('#message_succsess1').show().delay(3000).fadeOut('show');
});
</script>

<?php } ?>
<script>
 function deleteEntry(id){
			var t = confirm('Are you sure you want to delete this entry?');
			if(t){
				window.location.href='<?php echo $base_url;?>certificate/deleteEntry/'+id;
			}else {
				return false;
			}
		}
 </script>

</body>

</html>