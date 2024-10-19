<!DOCTYPE html>

<html lang="en">

<head>



	<title>Edit Course | MOLMI</title>

	<?php include('include/header.php'); ?>

	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->


	<!-- Bootstrap CSS -->
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
	<!-- Bootstrap Select CSS -->
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">

	<!-- jQuery -->
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->

	<!-- Bootstrap JS -->
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
	<!-- Bootstrap Select JS -->

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

				<div class="theme-form-header">

					<h2><a href="<?php echo $base_url; ?>course/lists"><i class="las la-arrow-left"></i></a>
						<?php echo $course_name; ?></h2>

				</div>
				<div class="container mt-5">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab"
								aria-controls="details" aria-selected="true" style="color:black;">Details</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="attendance-tab" data-toggle="tab" href="#attendance" role="tab"
								aria-controls="attendance" aria-selected="false" style="color:black;">Attendance</a>
						</li>
					</ul>

					<!-- Tab content -->
					<div class="tab-content mt-3">
						<div class="tab-pane fade show active" id="details" role="tabpanel"
							aria-labelledby="details-tab">
							<div class="form-white-bg mb-3">

								<form role="form" id="form" method="post"
									action="<?php echo $base_url; ?>course/edit/<?php echo $id; ?>"
									enctype="multipart/form-data">
									<INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand(); ?>">
									<INPUT TYPE="hidden" NAME="action" VALUE="edit_course">
									<INPUT TYPE="hidden" NAME="hiddenaction" VALUE="<?php echo $id; ?>">

									<div class="row">
										<div class="col-md-6">
											<div class="theme-form">
												<label for="topic">Topic</label>
												<select id="topic" name="topic" required>
													<option value="">---</option>
													<?php if ($all_topics != '' && count($all_topics) > 0) {
														foreach ($all_topics as $topics) { ?>
															<option value="<?php echo $topics->id; ?>" <?php if ($topics->id == $topic) {
																   echo "selected";
															   } ?>><?php echo $topics->name; ?></option>
														<?php }
													} ?>
												</select>
											</div>
										</div>

										<div class="col-md-6">

											<div class="theme-form">

												<label for="course_name">Course Name</label>

												<input type="text" id="course_name" name="course_name"
													value="<?php echo $course_name; ?>" required>

											</div>

										</div>

										<!-- <div class="col-md-3">
							<div class="theme-form">
								<label for="start_serial">Start Serial</label>
								<input type="text" id="start_serial" name="start_serial" value="<?php //echo $start_serial; ?>" required>
							</div>
						</div> -->

										<!-- <div class="col-md-4">
							<div class="theme-form">
								<label for="cdc_passport">C.D.C / Passport</label>
								<select id="cdc_passport" name="cdc_passport" required>
									<option value="">---</option>
									<option value="C.D.C" <?php //if($cdc_passport == 'C.D.C'){ echo "selected";} ?>>C.D.C</option>
									<option value="Passport" <?php //if($cdc_passport == 'Passport'){ echo "selected";} ?>>Passport</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="theme-form">
								<label for="cert_competency">Cert. of competency</label>
								<select id="cert_competency" name="cert_competency" required>
									<option value="">---</option>
									<option value="Yes" <?php //if($cert_competency == 'Yes'){ echo "selected";} ?>>Yes</option>
									<option value="No" <?php //if($cert_competency == 'No'){ echo "selected";} ?>>No</option>
								</select>
							</div>
						</div> -->

										<div class="col-md-12">
											<div class="theme-form">
												<label for="editorDescpOne">Description</label>
												<textarea id="editorDescpOne"
													name="description1"><?php echo $description1; ?></textarea>
											</div>
										</div>

										<!-- <?php
										$k = 0;
										if ($addition_item != '') { ?>
						<input type="hidden" name="description1[]" value="">
						<?php for ($i = 0; $i < count($addition_item); $i++) { ?>

							<input type="hidden" name="updateid1xxx[]" id="updateid1xxx<?php echo $i + 1; ?>"
										value="<?php echo $addition_item[$i]->id; ?>">
							<div class="col-md-12">
								<div class="theme-form">
									<label for="editorDescpu_<?php echo $i + 1; ?>">Description <?php echo $i + 1; ?></label>
									<textarea id="editorDescpu_<?php echo $i + 1; ?>" name="descriptionu[]"><?php echo $addition_item[$i]->description; ?></textarea>
								</div>
							</div>
							<?php if ($i > 2) { ?>
							<a href="javascript:void(0);" 
							onclick="singledelete('<?php echo $base_url . 'course/removeAtt/'; ?><?php echo $addition_item[$i]->cid; ?>/<?php echo $addition_item[$i]->id; ?>');"
							style="margin-right: 0;color: red;text-align: right;float: right;margin-top: -15px;margin-bottom: 10px;">Remove</a>
						<?php }
							$k++;
						}

										} else { ?>

						<div class="col-md-12">
							<div class="theme-form">
								<label for="editorDescpOne">Description 1</label>
								<textarea id="editorDescpOne" name="description1[]"></textarea>
							</div>
						</div>

						<div class="col-md-12">
							<div class="theme-form">
								<label for="editorDescpTwo">Description 2</label>
								<textarea id="editorDescpTwo" name="description1[]"></textarea>
							</div>
						</div>

						<div class="col-md-12">
							<div class="theme-form">
								<label for="editorDescpThree">Description 3</label>
								<textarea id="editorDescpThree" name="description1[]"></textarea>
							</div>
						</div>
						<?php } ?>

						<div class="input_fields_wrap12"></div>

						<div class="col-md-12">
							<a href="javascript:void(0);" id="add_field_button12" class="theme-form-add">Add More</a>
						</div> -->

										<div class="col-md-12">

											<div class="theme-form">

												<label for="editorRemark">Remarks</label>

												<textarea id="editorRemark"
													name="remarks"><?php echo $remarks; ?></textarea>

											</div>

										</div>
										<span id="contact_error" class="error"
											style="display: none;color: red;margin-bottom: 10px;"></span>

										<!-- <pre>
								<?php print_r($trainersList) ?>
							</pre> -->
										<!-- <div class="col-md-6">
								<div class="theme-form">
									<label for="primary_trainer_id">Primary Trainer</label>
									<select id="primary_trainer_id" name="primary_trainer_id" class="form-select"
										required>
										<option value="">---</option>
										<?php if (!empty($trainersList) && count($trainersList) > 0) {
											foreach ($trainersList as $trainer) { ?>
												<option value="<?php echo $trainer->id; ?>" <?php if ($trainer->id == $primary_trainer_id) {
													   echo "selected";
												   } ?>>
													<?php echo $trainer->trainer_name; ?>
												</option>
											<?php }
										} ?>
									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="theme-form">
									<label for="secondary_trainer_id">Secondary Trainer</label>
									<select id="secondary_trainer_id" name="secondary_trainer_id" class="form-select"
										required>
										<option value="">---</option>
										<?php if (!empty($trainersList) && count($trainersList) > 0) {
											foreach ($trainersList as $trainer) {
												// Filter out the primary trainer from the secondary trainer dropdown
												if ($trainer->id != $primary_trainer_id) { ?>
													<option value="<?php echo $trainer->id; ?>" <?php if ($trainer->id == $secondary_trainer_id) {
														   echo "selected";
													   } ?>>
														<?php echo $trainer->trainer_name; ?>
													</option>
												<?php }
											}
										} ?>
									</select>

								</div>
							</div> -->

										<div class="col-md-6">
											<div class="theme-form">
												<label for="primary_trainer_id">Primary Trainer</label>
												<select id="primary_trainer_id" name="primary_trainer_id"
													class="form-select" required>
													<option value="">---</option>
													<?php if (!empty($trainersList) && count($trainersList) > 0) {
														foreach ($secondaryTrainersList as $trainer) { ?>
															<option value="<?php echo $trainer->id; ?>" <?php if ($trainer->id == $primary_trainer_id) {
																   echo "selected";
															   } ?>>
																<?php echo $trainer->trainer_name; ?>
															</option>
														<?php }
													} ?>
												</select>
											</div>
										</div>
										<?php print_r(json_encode($secondary_trainer_ids)); ?>
										<div class="col-md-6">
											<div class="form-group">
												<label for="secondary_trainer_id">Secondary Trainers</label>
												<select id="multi-select" name="secondary_trainer_id[]"
													class="selectpicker form-control" multiple data-live-search="true"
													title="Select options" style="width: 100%;">
													<?php if (!empty($secondaryTrainersList) && count($secondaryTrainersList) > 0) {
														foreach ($secondaryTrainersList as $trainer) { ?>
															<option value="<?php echo $trainer->id; ?>" <?php if (in_array($trainer->id, $secondary_trainer_id)) {
																   echo "selected";
															   } ?>>
																<?php echo $trainer->trainer_name; ?>
															</option>
														<?php }
													} ?>
												</select>
											</div>
										</div>


										<div class="col-md-12">

											<div class="theme-form">

												<button type="button"
													onclick="javascript:validate();return false;">Save</button>

											</div>

										</div>

									</div>

								</form>

							</div>

							<div class="form-white-bg">
								<h3>Candidates</h3>
								<div class="row">
									<div class="col-md-4">
										<form role="candidate-form" id="candidate-form" method="post">
											<INPUT TYPE="hidden" NAME="action" VALUE="edit_candidate">
											<div class="theme-form">
												<label for="topic">Candidate</label>
												<select id="topic" name="topic" onchange="showAddButton(this)">
													<option value="">---</option>
													<?php if (!empty($candidatesList) && count($candidatesList) > 0) {
														foreach ($candidatesList as $candidate) { ?>
															<option value="<?php echo $candidate->id; ?>">
																<?php echo $candidate->candidate_name; ?>
															</option>
														<?php }
													} ?>
												</select>

												<div id="add-button-container" style="display: none; margin-top: 10px;">
													<button type="button" class="btn btn-primary" id="add-button"
														onclick="addCandidate()">
														Add Candidate
													</button>
												</div>

											</div>
										</form>
									</div>

									<div class="col-md-8">
										<?php if (count($candidatesDataList) > 0): ?>
											<div id="candidate-table-container" style="margin-top: 20px;">
												<table class="table" id="candidate-table">
													<thead>
														<tr>
															<th>Candidate ID</th>
															<th>Candidate Name</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody id="candidate-table-body">
														<?php foreach ($candidatesDataList as $candidate): ?>
															<tr>
																<td><?= $candidate->candidate_id ?></td>
																<td><?= $this->candidate_model->get_candidate_name_by_Id($candidate->candidate_id) ?>
																</td>
																<td>
																	<form method="post" id="delete_candidate" action="">
																		<input type="hidden" name="action"
																			value="delete_candidate">
																		<input type="hidden" name="candidate_id"
																			value="<?= $candidate->candidate_id ?>">
																		<button type="submit" class="btn btn-danger"
																			onclick="return confirm('Are you sure you want to delete this candidate?');">
																			Delete
																		</button>
																	</form>

																</td>
															</tr>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										<?php else: ?>
											<div id="no-candidate-message" style="margin-top: 20px;">
												<p>No candidates available.</p>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="attendance" role="tabpanel" aria-labelledby="attendance-tab">
							<div class="form-white-bg mb-3">
								<div class="col-md-12">

									<!-- <pre>
												<?php print_r($candidatesDataList) ?>
											</pre> -->
									<div class="table-responsive">

										<table id="example" class="table table-hover nowrap">

											<thead>

												<tr>
													<th>Serial</th>
													<th>Id</th>
													<th>Candidates Name</th>
													<th>Present</th>
													<th>Absent</th>
													<th>Course Date</th>
												</tr>

											</thead>

											<tbody>
												<?php if ($candidatesDataList) {
													$k = 0;
													for ($i = 0; $i < count($candidatesDataList); $i++) {
														$k++;
														?>
														<tr>
															<td><?php echo $k; ?></td>

															<td><?php echo $candidatesDataList[$i]->candidate_id; ?></td>
															<td><?php echo $this->candidate_model->get_candidate_name_by_Id($candidatesDataList[$i]->candidate_id) ?>
															</td>
															<td><?php echo $candidatesDataList[$i]->Present; ?></td>
															<td><?php echo $candidatesDataList[$i]->Absent; ?></td>

															<td><?php $strtotime1 = strtotime($candidatesDataList[$i]->added_date);
															echo date('d-m-Y', $strtotime1); ?></td>

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
				</div>


			</div>

		</main>

	</div>



	<?php include('include/footer.php'); ?>

	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
	<script>
		$(document).ready(function () {
			$('.selectpicker').select2();
			$('.selectpicker').val(<?php echo $secondary_trainer_id; ?>); // Select the option with a value of '1'
			$('.selectpicker').trigger('change'); // Notify any JS components that the value changed

		});
	</script>

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
		$(document).ready(function () {
			const trainersList = <?php echo json_encode($trainersList); ?>;

			$('#primary_trainer_id').change(function () {
				const selectedPrimaryId = $(this).val();

				$('#secondary_trainer_id').empty();

				$('#secondary_trainer_id').append('<option value="">---</option>');

				trainersList.forEach(function (trainer) {
					if (trainer.id != selectedPrimaryId) {
						$('#secondary_trainer_id').append(
							`<option value="${trainer.id}">${trainer.trainer_name}</option>`
						);
					}
				});
			});
		});

	</script>
	<script>
		let selectedCandidateId = null;

		function showAddButton(selectElement) {
			selectedCandidateId = selectElement.value;
			if (selectedCandidateId !== "") {
				document.getElementById('add-button-container').style.display = 'block';
			} else {
				document.getElementById('add-button-container').style.display = 'none';
			}
		}

		function addCandidate() {
			$("#candidate-form").submit();
		}


		function removeCandidate(candidateId) {
			$('#delete_candidate').submit();
		}

		function validate() {

			var topic = $("#topic").val();
			if (topic == '') {
				$('#contact_error').html("Please Enter Topic");
				$('#contact_error').show().delay(0).fadeIn('show');
				$('#contact_error').show().delay(2000).fadeOut('show');
				return false;
			}

			var course_name = $("#course_name").val();
			if (course_name == '') {
				$('#contact_error').html("Please Enter Course Name.");
				$('#contact_error').show().delay(0).fadeIn('show');
				$('#contact_error').show().delay(2000).fadeOut('show');
				return false;
			}

			// var start_serial = $("#start_serial").val();
			// if (start_serial == '') {
			//  $('#contact_error').html("Please Enter Start Serial.");
			//  $('#contact_error').show().delay(0).fadeIn('show');
			//  $('#contact_error').show().delay(2000).fadeOut('show');
			//     return false;
			// }

			// var cdc_passport = $("#cdc_passport").val();
			// if (cdc_passport == '') {
			//  $('#contact_error').html("Please Select C.D.C/Passport");
			//  $('#contact_error').show().delay(0).fadeIn('show');
			//  $('#contact_error').show().delay(2000).fadeOut('show');
			//     return false;
			// }

			// var cert_competency = $("#cert_competency").val();
			// if (cert_competency == '') {
			//  $('#contact_error').html("Please Select Cert. Of Competency");
			//  $('#contact_error').show().delay(0).fadeIn('show');
			//  $('#contact_error').show().delay(2000).fadeOut('show');
			//     return false;
			// }

			$('#form').submit();

		}

	</script>
	<script type="text/javascript" language="javascript">
		$(document).ready(function () {

			var max_fields = 50;

			var wrapper = $(".input_fields_wrap12");

			var add_button = $("#add_field_button12");
			<?php if ($addition_item != '') { ?>
				var b = <?php echo count($addition_item); ?>;
			<?php } else { ?>
				var b = 3;
			<?php } ?>

			$(add_button).click(function (e) {

				e.preventDefault();

				if (b < max_fields) {

					b++;

					$(wrapper).append(
						'<div class="col-md-12"><div class="theme-form"><label for="editorDescp_' + b + '">Description ' + b + '</label><textarea id="editorDescp_' + b + '" name="description1[]"></textarea></div><a href="javascript:void(0);" class="remove_field1" style="margin-right: 0;color: red;text-align: right;float: right;margin-top: -15px;margin-bottom: 10px;">Remove</a></div>'
					);

					ClassicEditor.create(document.querySelector('#editorDescp_' + b + '')).then(editor => { console.log(editor); }).catch(error => { console.error(error); });

				}

			});

			$(wrapper).on("click", ".remove_field1", function (e) {

				e.preventDefault();

				$(this).parent('div').remove();
				b--;

			})

		});

		<?php if ($addition_item != '') {
			for ($i = 0; $i < count($addition_item); $i++) { ?>
				ClassicEditor.create(document.querySelector('#editorDescpu_<?php echo $i + 1; ?>')).then(editor => { console.log(editor); }).catch(error => { console.error(error); });
			<?php }
		} ?>

		function singledelete(url) {
			var t = confirm('Are you sure you want to delete this entry?');
			if (t) {
				window.location.href = url;
			} else {
				return false;
			}
		}

	</script>
</body>

</html>



<!-- <label for="secondary_trainer_id">Secondary Trainer</label>
<select id="multi-select" name="secondary_trainer_id"
	class="selectpicker form-control " multiple data-live-search="true"
	title="Select options">
	<option value="">---</option>
	<?php if (!empty($secondaryTrainersList) && count($secondaryTrainersList) > 0) {
		foreach ($trainersList as $trainer) { ?>
			<option value="<?php echo $trainer->id; ?>" <?php if ($trainer->id == $secondary_trainer_id) {
				   echo "selected";
			   } ?>>
				<?php echo $trainer->trainer_name; ?>
			</option>
		<?php }
	} ?>
</select> -->