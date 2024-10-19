<!DOCTYPE html>

<html lang="en">

<head>

	

	<title>Add Course | MOLMI</title>

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

		<div class="container">

			<div class="theme-form-header">

				<h2><a href="<?php echo $base_url;?>course/lists"><i class="las la-arrow-left"></i></a> Add Course</h2>

			</div>

			<div class="form-white-bg">

			<form role="form" id="form" method="post" action="<?php echo $base_url;?>course/add" enctype="multipart/form-data">
         		<INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
				<INPUT TYPE="hidden" NAME="action" VALUE="add_course">

					<div class="row">

						<div class="col-md-6">
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

						<div class="col-md-6">
							<div class="theme-form">
								<label for="course_name">Course Name</label>
								<input type="text" id="course_name" name="course_name" required>
							</div>
						</div>

						<!-- <div class="col-md-3">
							<div class="theme-form">
								<label for="start_serial">Start Serial</label>
								<input type="text" id="start_serial" name="start_serial" required>
							</div>
						</div> -->

						<!-- <div class="col-md-4">
							<div class="theme-form">
								<label for="cdc_passport">C.D.C / Passport</label>
								<select id="cdc_passport" name="cdc_passport" required>
									<option value="">---</option>
									<option value="C.D.C">C.D.C</option>
									<option value="Passport">Passport</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="theme-form">
								<label for="cert_competency">Cert. of competency</label>
								<select id="cert_competency" name="cert_competency" required>
									<option value="">---</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
						</div> -->

						<div class="col-md-12">
							<div class="theme-form">
								<label for="editorDescpOne">Description</label>
								<textarea id="editorDescpOne" name="description1"></textarea>
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
						</div>-->

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
	function validate(){

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
</script>

</body>

</html>