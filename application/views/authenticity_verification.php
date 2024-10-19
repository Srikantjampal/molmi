<!DOCTYPE html>

<html lang="en">

<head>

	<title>Authenticity Verification | MOLMI</title>

	<?php include('include/header.php');?>

</head>

<body>

	<section class="authenticity-section">

	<div class="container">

		<div class="row">

			<div class="col-lg-12">

			<div class="form-white-bg">

			<div class="authenticity-table">

				<img src="<?php echo $base_url_views;?>src/img/verification-logo.jpg">

				<h3>Authenticity Verification</h3>

				<table>

					<tr>

						<td><strong>Candidate Name</strong></td>

						<td><?php echo $detail->caprefix; ?>. <?php echo $detail->candidate_name; ?></td>

					</tr>

					<tr>

						<td><strong>Date Of Birth</strong></td>

						<td><?php $strtotime1 =strtotime($detail->dob);
										echo date('d/m/Y',$strtotime1); ?></td>

					</tr>

					<tr>

						<td><strong>Course Name</strong></td>

						<td><?php echo $detail->course_name; ?></td>

					</tr>

					<tr>

						<td><strong>Course Duration</strong></td>

						<td><?php $strtotime2 =strtotime($detail->from_date);echo date('d/m/Y',$strtotime2); ?> - <?php $strtotime3 =strtotime($detail->to_date);echo date('d/m/Y',$strtotime3); ?></td>

					</tr>

					<tr>

						<td><strong>Certificate Number</strong></td>

						<td><?php echo $detail->certificate_no; ?></td>

					</tr>

					<tr>

						<td><strong>Location</strong></td>

						<td><?php echo $detail->location; ?></td>

					</tr>

					<tr>

						<td><strong>Date Issued</strong></td>

						<td><?php $strtotime4 =strtotime($detail->issue_date);echo date('d/m/Y',$strtotime4); ?></td>

					</tr>

					<tr>

						<td><strong>Status</strong></td>

						<td>
							<?php if($detail->status == 0){ ?>
							<span class="valid">VALID</span>
							<?php }else{ ?>
							<span class="invalid">INVALID</span></td>
							<?php } ?>

					</tr>

					<tr>

						<td><strong>Signers</strong></td>

						<td><?php echo $detail->tprefix; ?>. <?php echo $detail->trainer_name; ?></td>

					</tr>

				</table>

			</div>

		    </div>

			</div>

		</div>

		

	</div>

	</section>

	<?php include('include/footer.php');?>

</body>

</html>