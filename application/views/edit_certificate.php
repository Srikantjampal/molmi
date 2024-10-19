<!DOCTYPE html>

<html lang="en">

<head>

	

	<title>Edit Certificate | MOLMI</title>

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

			<div class="theme-form-header">

				<h2><a href="<?php echo $base_url;?>certificate/lists"><i class="las la-arrow-left"></i></a> <?php echo $this->certificate_model->get_candidate_name($candidate_id); ?></h2>

			</div>

			<div class="form-white-bg">

			<form role="form" id="form" method="post" action="<?php echo $base_url;?>certificate/edit/<?php echo $id; ?>" enctype="multipart/form-data" >
		 		<INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
				<INPUT TYPE="hidden" NAME="action" VALUE="edit_certificate">
				<INPUT TYPE="hidden" NAME="hiddenaction" VALUE="<?php echo $id;?>">

					<div class="row">

						<div class="col-md-3">
							<div class="theme-form">
								<label for="certificate_no">Certificate No.</label>
								<input type="text" id="certificate_no" name="certificate_no" value="<?php echo $certificate_no; ?>" readonly>
							</div>
						</div>

						<div class="col-md-3">
							<div class="theme-form">
								<label for="type">Type</label>
								<select id="type" name="type" required>
									<option value="">---</option>
									<option value="DNV / LNG" <?php if($type == 'DNV / LNG'){ echo "selected";} ?>>DNV / LNG</option>
									<option value="DNV-ST0029" <?php if($type == 'DNV-ST0029'){ echo "selected";} ?>>DNV-ST0029</option>
									<option value="Others" <?php if($type == 'Others'){ echo "selected";} ?>>Others</option>
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="theme-form">
								<label for="topic">Topic</label>
								<select id="topic" name="topic" required>
									<option value="">---</option>
									<?php  if($all_topics !='' && count($all_topics) > 0){
                                            foreach($all_topics as $topics){ ?>
                                        <option value="<?php echo $topics->id; ?>" <?php if($topics->id == $topic){ echo "selected";} ?>><?php echo $topics->name; ?></option>
                                    <?php } }  ?>
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="theme-form">
								<label for="course_level">Course Level</label>
								<select id="course_level" name="course_level" required>
									<option value="">---</option>
									<option value="Operational"<?php if($course_level == 'Operational'){ echo "selected";} ?>>Operational</option>
									<option value="Management"<?php if($course_level == 'Management'){ echo "selected";} ?>>Management</option>
								</select>
							</div>
						</div>

						<div class="col-md-6">
							<div class="theme-form">
								<label for="course_id">Course Name</label>
								<select id="course_id" name="course_id" onchange="getDescription(this.value);" required>
									<option value="">---</option>
									<?php  if($all_course !='' && count($all_course) > 0){
                                            foreach($all_course as $course){ ?>
                                        <option value="<?php echo $course->id; ?>" <?php if($course_id == $course->id){ echo "selected";} ?>><?php echo $course->course_name; ?></option>
                                    <?php } }  ?>
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="theme-form">
								<label for="candidate_id">Candidate Name</label>
								<input type="hidden" id="candidate_id" name="candidate_id" value="<?php echo $candidate_id; ?>">
								<input type="text" value="<?php echo $this->certificate_model->get_candidate_name($candidate_id); ?>" disabled>
							</div>
						</div>

						<div class="col-md-3">
							<div class="theme-form">
								<label for="location">Location</label>
								<select id="location" name="location" required>
									<option value="">---</option>
									<option value="Online"<?php if($location == 'Online'){ echo "selected";} ?>>Online</option>
									<option value="Mumbai"<?php if($location == 'Mumbai'){ echo "selected";} ?>>Mumbai</option>
									<option value="Kolkata"<?php if($location == 'Kolkata'){ echo "selected";} ?>>Kolkata</option>
									<option value="Delhi"<?php if($location == 'Delhi'){ echo "selected";} ?>>Delhi</option>
									<option value="MOLTC"<?php if($location == 'MOLTC'){ echo "selected";} ?>>MOLTC</option>
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="theme-form">
								<label for="trainer_id">Trainers</label>
								<select id="trainer_id" name="trainer_id" required>
									<option value="">---</option>
									<?php  if($all_trainer !='' && count($all_trainer) > 0){
                                            foreach($all_trainer as $trainer){ ?>
                                        <option value="<?php echo $trainer->id; ?>" <?php if($trainer_id == $trainer->id){ echo "selected";} ?>><?php echo $trainer->trainer_name; ?></option>
                                    <?php } }  ?>
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="theme-form">
								<label for="status">Status</label>
								<select id="status" name="status">
									<option value="0"<?php if($status == '0'){ echo "selected";} ?>>Valid</option>
									<option value="1"<?php if($status == '1'){ echo "selected";} ?>>In Valid</option>
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="theme-form">
								<label for="from_date">From Date</label>
								<!-- <input type="date" id="from_date" name="from_date" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d", strtotime('+7 days')); ?>" value="<?php echo $from_date;?>" required> -->
								<input type="date" id="from_date" name="from_date" value="<?php echo $from_date;?>" required>
							</div>
						</div>

						<div class="col-md-3">
							<div class="theme-form">
								<label for="to_date">To Date</label>
								<!-- <input type="date" id="to_date" name="to_date" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d", strtotime('+7 days')); ?>" value="<?php echo $to_date;?>" required> -->
								<input type="date" id="to_date" name="to_date" value="<?php echo $to_date;?>" required>
							</div>
						</div>

						<div class="col-md-2">
							<div class="theme-form">
								<label for="days">Days</label>
								<input type="text" id="days" name="days" value="<?php echo $days;?>" value="">
							</div>
						</div>

						<div class="col-md-4">
							<div class="theme-form">
								<label for="issue_date">Issue Date</label>
								<!-- <input type="date" id="issue_date" name="issue_date" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d", strtotime('+7 days')); ?>" value="<?php echo $issue_date;?>" required> -->
								<input type="date" id="issue_date" name="issue_date" value="<?php echo $issue_date;?>" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="theme-form"><br>
								<label for="show_logo">
								<input type="checkbox" id="show_logo" name="show_logo" value="1" <?php if($show_logo == '1'){ echo "checked";} ?> style="width: auto;margin-right: 5px;">Display Logo</label>
							</div>
						</div>

						<div class="col-md-12">
							<div class="theme-form">
								<label for="editorDescpOne">Description</label>
								<span id="prod1">
								<textarea id="editorDescpOne" name="description1"><?php echo $description1; ?></textarea>
								<span>
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
							<?php if($i>2){ ?>
							<a href="javascript:void(0);" 
							onclick="singledelete('<?php echo $base_url . 'certificate/removeAtt/'; ?><?php echo $addition_item[$i]->cid; ?>/<?php echo $addition_item[$i]->id; ?>');"
							style="margin-right: 0;color: red;text-align: right;float: right;margin-top: -15px;margin-bottom: 10px;">Remove</a>
						<?php } $k++; }

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
								<textarea id="editorRemark" name="remarks"><?php echo $remarks; ?></textarea>
							</div>
						</div>

						<span id="contact_error" class="error" style="display: none;color: red;margin-bottom: 10px;"></span>

						<div class="col-md-12">

							<div class="theme-form">

							<button type="button" onclick="javascript:validate();return false;">Save</button>

							</div>

						</div>

					</div>

				</form>

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
	$('#from_date').change(function() {
		$('#to_date').val('');
		$('#days').val('');
		var from_date = $(this).val();
		//alert(date);
		var nextDay = new Date(from_date);
		nextDay.setDate(nextDay.getDate() + 7);
		var year = nextDay.toLocaleString("default", { year: "numeric" });
		var month = nextDay.toLocaleString("default", { month: "2-digit" });
		var day = nextDay.toLocaleString("default", { day: "2-digit" });

		var formattedDate = year + "-" + month + "-" + day;
		//alert(formattedDate);
		// $("#to_date").attr({  
		// 	"max" : formattedDate,  
		// 	"min" : from_date
		// }); 
	});

	$('#to_date').change(function() {
		var to_date = $(this).val();
		var from_date = $('#from_date').val();
		//alert(from_date);
		if(from_date != '' & to_date != ''){
			var date1 = new Date(from_date);
			var date2 = new Date(to_date);
			var Difference_In_Time = date2.getTime() - date1.getTime();
			var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24) + 1;
			if(Difference_In_Days == 0){
				Difference_In_Days = 1;
			}
			$('#days').val(Difference_In_Days);
		}
	});
	function validate(){

		var certificate_no = $("#certificate_no").val();
        if (certificate_no == '') {
         $('#contact_error').html("Please Enter Certificate No.");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

		var type = $("#type").val();
        if (type == '') {
         $('#contact_error').html("Please Select Type");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

		var topic = $("#topic").val();
        if (topic == '') {
         $('#contact_error').html("Please Select Topic");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

		var course_level = $("#course_level").val();
        if (course_level == '') {
         $('#contact_error').html("Please Select Course Level");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

		var course_id = $("#course_id").val();
        if (course_id == '') {
         $('#contact_error').html("Please Select Course Name");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

		var candidate_id = $("#candidate_id").val();
    	if(candidate_id == '' || candidate_id == undefined){
			$("#contact_error").html("Please Select Candidate Name.");
			$('#contact_error').show().delay(0).fadeIn('show');
			$('#contact_error').show().delay(2000).fadeOut('show');
			return false;
    	}

		var location = $("#location").val();
        if (location == '') {
         $('#contact_error').html("Please Select Location");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

		var trainer_id = $("#trainer_id").val();
        if (trainer_id == '') {
         $('#contact_error').html("Please Select Trainers");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

		var from_date = $("#from_date").val();
        // if (from_date == '') {
        //  $('#contact_error').html("Please Select From Date.");
        //  $('#contact_error').show().delay(0).fadeIn('show');
        //  $('#contact_error').show().delay(2000).fadeOut('show');
        //     return false;
        // }

		var to_date = $("#to_date").val();
        // if (to_date == '') {
        //  $('#contact_error').html("Please Select To Date.");
        //  $('#contact_error').show().delay(0).fadeIn('show');
        //  $('#contact_error').show().delay(2000).fadeOut('show');
        //     return false;
        // }

		var days = $("#days").val();
        if (days == '') {
         $('#contact_error').html("Please Enter Days.");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

		var issue_date = $("#issue_date").val();
        // if (issue_date == '') {
        //  $('#contact_error').html("Please Select Issue Date.");
        //  $('#contact_error').show().delay(0).fadeIn('show');
        //  $('#contact_error').show().delay(2000).fadeOut('show');
        //     return false;
        // }

		var oldCertificateNo = '<?php echo $certificate_no; ?>';

        if (certificate_no != oldCertificateNo) {
			var url = '<?php echo $base_url;?>certificate/checkCertiNo';
			$.ajax({
				url: url,
				type: 'post',
				data: 'certificate_no=' + certificate_no,
				success: function(msg) {
				//alert (msg);
					if (msg == "0") {
						$("#contact_error").html("Certificate No. is already assigned.");
						$('#contact_error').show().delay(0).fadeIn('show');
						$('#contact_error').show().delay(2000).fadeOut('show');
						return false;
						
					}else
					{      
						$('#form').submit(); 
					}
				}
			});
		}
		else{
			$('#form').submit(); 
		}
	}

</script>
<script type="text/javascript" language="javascript">
$(document).ready(function() {

    var max_fields = 50;

    var wrapper = $(".input_fields_wrap12");

    var add_button = $("#add_field_button12");
	<?php if ($addition_item != '') { ?>
		var b = <?php echo count($addition_item); ?>;
	<?php } else { ?>
    	var b = 3;
	<?php } ?>

    $(add_button).click(function(e) {

        e.preventDefault();

        if (b < max_fields) {

            b++;

            $(wrapper).append(
                '<div class="col-md-12"><div class="theme-form"><label for="editorDescp_'+b+'">Description '+b+'</label><textarea id="editorDescp_'+b+'" name="description1[]"></textarea></div><a href="javascript:void(0);" class="remove_field1" style="margin-right: 0;color: red;text-align: right;float: right;margin-top: -15px;margin-bottom: 10px;">Remove</a></div>'
            );

            ClassicEditor.create( document.querySelector( '#editorDescp_'+b+'' )).then( editor => {console.log( editor );} ).catch( error => {console.error( error );} );

        }

    });

    $(wrapper).on("click", ".remove_field1", function(e) {

        e.preventDefault();

        $(this).parent('div').remove();
        b--;

    })

});

<?php if ($addition_item != '') {
    for ($i = 0; $i < count($addition_item); $i++) { ?>
	ClassicEditor.create( document.querySelector( '#editorDescpu_<?php echo $i + 1; ?>' )).then( editor => {console.log( editor );} ).catch( error => {console.error( error );} );
<?php } }?>

function singledelete(url) {
	var t = confirm('Are you sure you want to delete this entry?');
	if(t){
		window.location.href = url;
	}else {
		return false;
	}
}
function getDescription(course_id) {
    var course_id = $("#course_id").val();
	//alert(course_id);
    var url = '<?php echo $base_url ?>certificate/getDescription';
    $.ajax({
        url: url,
        type: 'post',
        data: 'course_id=' + course_id,
        success: function(msg) {
            document.getElementById('prod1').innerHTML = msg;
			ClassicEditor.create( document.querySelector( '#editorDescpOne' )).then( editor => {console.log( editor );} ).catch( error => {console.error( error );} );
        }
    });
}

function updateDropdowns() {
    var selectedValue = document.getElementById('type').value;
    var secondDropdown = document.getElementById('topic');
    var courseDropdown = document.getElementById('course_id');

    var options = secondDropdown.options;
    var courseOptions = courseDropdown.options;

    // Define an object with arrays to specify which options to hide based on the first dropdown selection
    var hideOptions = {
        'DNV-ST0029': ['47', '42', '48', '23', '16', '29']
    };

    var hideOptionsCourse = {
        'DNV-ST0029': ['67', '42', '43', '36', '37', '34']
    };

    // Show all options before hiding specific ones
    for (var i = 0; i < options.length; i++) {
        options[i].style.display = 'block';
    }

    for (var i = 0; i < courseOptions.length; i++) {
        courseOptions[i].style.display = 'block';
    }

    // Get the array of options to hide based on the selected value
    var optionsToHide = hideOptions[selectedValue] || [];
    var courseOptionsToHide = hideOptionsCourse[selectedValue] || [];

    // Hide the specific options in the second dropdown
    for (var i = 0; i < options.length; i++) {
        if (optionsToHide.includes(options[i].value)) {
            options[i].style.display = 'none';
        }
    }

    for (var i = 0; i < courseOptions.length; i++) {
        if (courseOptionsToHide.includes(courseOptions[i].value)) {
            courseOptions[i].style.display = 'none';
        }
    }
}

// Call the function on page load
window.onload = function() {
    updateDropdowns();
};

// Call the function when the dropdown changes
document.getElementById('type').addEventListener('change', function() {
    updateDropdowns();
});
</script>

</body>

</html>