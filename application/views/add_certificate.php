<!DOCTYPE html>

<html lang="en">

<head>

	

	<title>Add Certificate | MOLMI</title>

	<?php include('include/header.php');?>
	<link href="<?php echo $base_url_views;?>src/css/fSelect.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo $base_url_views;?>src/js/fSelect.js"></script>
<script>
(function($) {
    $(function() {
        window.fs_test = $('.test').fSelect({
    placeholder: 'Select Candidate Name',
    numDisplayed: 4,
    overflowText: '{n} selected',
    noResultsText: 'No results found',
    searchText: 'Search',
    showSearch: true
});
    });
})(jQuery);
</script>


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

		<div class="container">

			<div class="theme-form-header">

				<h2><a href="<?php echo $base_url;?>certificate/lists"><i class="las la-arrow-left"></i></a> Add Certificate</h2>

			</div>

			<div class="form-white-bg">

			<form role="form" id="form" method="post" action="<?php echo $base_url;?>certificate/add" enctype="multipart/form-data">
         		<INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
				<INPUT TYPE="hidden" NAME="action" VALUE="add_certificate">

					<div class="row">

						<div class="col-md-2">
							<div class="theme-form">
								<label for="type">Type</label>
								<select id="type" name="type" required>
									<option value="">---</option>
									<option value="DNV / LNG">DNV / LNG</option>
									<option value="DNV-ST0029">DNV-ST0029</option>
									<option value="Others">Others</option>
								</select>
							</div>
						</div>

						<div class="col-md-2">
							<div class="theme-form">
								<label for="topic">Topic</label>
								<select id="topic" name="topic" required>
									<option value="">---</option>
									<?php  if($all_topics !='' && count($all_topics) > 0){
                                            foreach($all_topics as $topic){ ?>
                                        <option value="<?php echo $topic->id; ?>"><?php echo $topic->name; ?></option>
                                    <?php } }  ?>
								</select>
							</div>
						</div>

						<div class="col-md-2">
							<div class="theme-form">
								<label for="course_level">Course Level</label>
								<select id="course_level" name="course_level" required>
									<option value="">---</option>
									<option value="Operational">Operational</option>
									<option value="Management">Management</option>
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
                                        <option value="<?php echo $course->id; ?>"><?php echo $course->course_name; ?></option>
                                    <?php } }  ?>
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="theme-form">
								<label for="candidate_id">Candidate Name</label>
								<div class="multiselect">
									<select class="test" id="candidate_id" name="candidate_id[]" multiple="multiple">
										<option value="">---</option>
										<?php  if($all_candidate !='' && count($all_candidate) > 0){
												foreach($all_candidate as $candidate){ ?>
											<option value="<?php echo $candidate->id; ?>"><?php echo $candidate->candidate_name; ?> (<?php echo $candidate->rank; ?>)</option>
										<?php } }  ?>
									</select>
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="theme-form">
								<label for="location">Location</label>
								<select id="location" name="location" required>
									<option value="">---</option>
									<option value="Online">Online</option>
									<option value="Mumbai">Mumbai</option>
									<option value="Kolkata">Kolkata</option>
									<option value="Delhi">Delhi</option>
									<option value="MOLTC">MOLTC</option>
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
                                        <option value="<?php echo $trainer->id; ?>"><?php echo $trainer->trainer_name; ?></option>
                                    <?php } }  ?>
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="theme-form">
								<label for="status">Status</label>
								<select id="status" name="status">
									<option value="0">Valid</option>
									<option value="1">In Valid</option>
								</select>
							</div>
						</div>

						<div class="col-md-3">
							<div class="theme-form">
								<label for="from_date">From Date</label>
								<!-- <input type="date" id="from_date" name="from_date" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d", strtotime('+7 days')); ?>" required> -->
								<input type="date" id="from_date" name="from_date" required>
							</div>
						</div>

						<div class="col-md-3">
							<div class="theme-form">
								<label for="to_date">To Date</label>
								<!-- <input type="date" id="to_date" name="to_date" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d", strtotime('+7 days')); ?>" required> -->
								<input type="date" id="to_date" name="to_date" required>
							</div>
						</div>

						<div class="col-md-2">
							<div class="theme-form">
								<label for="days">Days</label>
								<input type="text" id="days" name="days" value="1">
							</div>
						</div>

						<div class="col-md-4">
							<div class="theme-form">
								<label for="issue_date">Issue Date</label>
								<!-- <input type="date" id="issue_date" name="issue_date" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d", strtotime('+7 days')); ?>" required> -->
								<input type="date" id="issue_date" name="issue_date" required>
							</div>
						</div>

						<div class="col-md-4">
							<div class="theme-form">
								<label for="show_logo">
								<input type="checkbox" id="show_logo" name="show_logo" value="1" style="width: auto;margin-right: 5px;">Display Logo</label>
							</div>
						</div>

						<div class="col-md-12">
							<div class="theme-form">
								<label for="editorDescpOne">Description</label>
								<span id="prod1">
								<textarea id="editorDescpOne" name="description1"></textarea>
								<span>
							</div>
						</div>

						<!-- <div class="col-md-12">
							<div class="theme-form">
								<label for="editorDescpOne">Description 1</label>
								<textarea id="editorDescpOne" name="description[]"></textarea>
							</div>
						</div>

						<div class="col-md-12">
							<div class="theme-form">
								<label for="editorDescpTwo">Description 2</label>
								<textarea id="editorDescpTwo" name="description[]"></textarea>
							</div>
						</div>

						<div class="col-md-12">
							<div class="theme-form">
								<label for="editorDescpThree">Description 3</label>
								<textarea id="editorDescpThree" name="description[]"></textarea>
							</div>
						</div>

						<div class="input_fields_wrap12"></div>

						<div class="col-md-12">
							<a href="javascript:void(0);" id="add_field_button12" class="theme-form-add">Add More</a>
						</div> -->

						<div class="col-md-12">
							<div class="theme-form">
								<label for="editorRemark">Remarks</label>
								<textarea id="editorRemark" name="remarks"></textarea>
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
			var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24) +1;
			if(Difference_In_Days == 0){
				Difference_In_Days = 1;
			}
			$('#days').val(Difference_In_Days);
		}
	});
	function validate(){

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

        $('#form').submit();

	}

</script>
<script type="text/javascript" language="javascript">
$(document).ready(function() {

    var max_fields = 50;

    var wrapper = $(".input_fields_wrap12");

    var add_button = $("#add_field_button12");

    var b = 3;

    $(add_button).click(function(e) {

        e.preventDefault();

        if (b < max_fields) {

            b++;

            $(wrapper).append(
                '<div class="col-md-12"><div class="theme-form"><label for="editorDescp_'+b+'">Description '+b+'</label><textarea id="editorDescp_'+b+'" name="description[]"></textarea></div><a href="javascript:void(0);" class="remove_field1" style="margin-right: 0;color: red;text-align: right;float: right;margin-top: -15px;margin-bottom: 10px;">Remove</a></div>'
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

document.getElementById('type').addEventListener('change', function() {
    var selectedValue = this.value;
    var secondDropdown = document.getElementById('topic');
	var courceDropdown = document.getElementById('course_id');

    var options = secondDropdown.options;
    var cource_options = courceDropdown.options;


    // Define an object with arrays to specify which options to hide based on the first dropdown selection
    var hideOptions = {
        'DNV-ST0029': ['47','42','48','23','16','29']
    };

	var hideOptions_cource = {
        'DNV-ST0029': ['67','42','43','36','37','34']
    };

    // Show all options before hiding specific ones
    for (var i = 0; i < options.length; i++) {
        options[i].style.display = 'block';
    }

	for (var i = 0; i < cource_options.length; i++) {
        cource_options[i].style.display = 'block';
    }

    // Get the array of options to hide based on the selected value
    var optionsToHide = hideOptions[selectedValue] || [];

	var courceoptionsToHide = hideOptions_cource[selectedValue] || [];

    // Hide the specific options in the second dropdown
    for (var i = 0; i < options.length; i++) {
        if (optionsToHide.includes(options[i].value)) {
            options[i].style.display = 'none';
        }
    }
	for (var i = 0; i < cource_options.length; i++) {
        if (courceoptionsToHide.includes(cource_options[i].value)) {
            cource_options[i].style.display = 'none';
        }
    }
});

</script>

</body>

</html>