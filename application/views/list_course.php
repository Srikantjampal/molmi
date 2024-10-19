<!DOCTYPE html>

<html lang="en">

<head>



	<title>Courses | MOLMI</title>

	<?php include('include/header.php'); ?>



</head>

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
			<?php if ($this->session->flashdata('L_strErrorMessage')) { ?>
				<div class="alert alert-success alert-dismissable" id="message_succsess" style="display:none;"></div>
			<?php } ?>
			<div class="container">

				<div class="pages-headers">

					<h2>Courses

						<a href="<?php echo $base_url; ?>course/add" class="theme-cta"><i class="las la-plus-circle"></i>
							Add Courses</a>

						<a href="<?php echo $base_url; ?>course/upload" class="theme-cta"><i
								class="las la-file-upload"></i> Upload</a>

						<a href="<?php echo $base_url; ?>course/export" class="theme-cta"><i
								class="las la-file-excel"></i> Export</a>

					</h2>

				</div>

				<div class="row mobilerows">

					<div class="col-md-12">

						<div class="infos-table">

							<div class="table-responsive">

								<table id="example" class="table table-hover nowrap">

									<thead>

										<tr>
											<th>Serial</th>
											<th>Topic</th>
											<th>Course Name</th>
											<!-- <th>C.D.C / Passport</th> -->
											<th>Course Date</th>
											<th class="text-center">Edit</th>
											<th class="text-center">Delete</th>
										</tr>

									</thead>

									<tbody>
										<?php if ($result) {
											$k = 0;
											for ($i = 0; $i < count($result); $i++) {
												$k++;
												?>
												<tr>
													<td><?php echo $k; ?></td>
													<td><?php echo $this->course_model->get_topic_name($result[$i]->topic); ?>
													</td>
													<td><?php echo $result[$i]->course_name; ?></td>
													<!-- <td><?php //echo $result[$i]->cdc_passport; ?></td> -->
													<td><?php $strtotime1 = strtotime($result[$i]->added_date);
													echo date('d-m-Y', $strtotime1); ?></td>
													<td class="text-center"><a
															href="<?php echo $base_url . "course/edit/"; ?><?php echo $result[$i]->id; ?>"
															title="Edit Course"><i class="las la-pencil-alt"></i></a></td>
													<td class="text-center"><a href="javascript:void(0);"
															onclick="deleteEntry(<?php echo $result[$i]->id; ?>);"
															title="Delete Course"><i class="las la-trash"></i></a></td>
												</tr>
												<?php
											}
										}
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



	<?php include('include/footer.php'); ?>

	<?php if ($this->session->flashdata('L_strErrorMessage') != "") { ?>
		<script>
			$(document).ready(function () {
				$('#message_succsess').html("<?php echo $this->session->flashdata('L_strErrorMessage'); ?>");
				$('#message_succsess').show().delay(0).fadeIn('show');
				$('#message_succsess').show().delay(3000).fadeOut('show');
			});
		</script>

	<?php } ?>
	<script>
		function deleteEntry(id) {
			var t = confirm('Are you sure you want to delete this entry?');
			if (t) {
				window.location.href = '<?php echo $base_url; ?>course/deleteEntry/' + id;
			} else {
				return false;
			}
		}
	</script>

</body>

</html>