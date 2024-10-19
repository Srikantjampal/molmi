<!DOCTYPE html>

<html lang="en">

<head>

	

	<title>Add Candidate | MOLMI</title>

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

				<h2><a href="<?php echo $base_url;?>candidate/lists"><i class="las la-arrow-left"></i></a> Add Candidate</h2>

			</div>

			<div class="form-white-bg">

			<form role="form" id="form" method="post" action="<?php echo $base_url;?>candidate/add" enctype="multipart/form-data">
         		<INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
				<INPUT TYPE="hidden" NAME="action" VALUE="add_candidate">

					<div class="row">

						<div class="col-md-9">

							<div class="theme-form">

								<label for="candidate_name">Candidate Name</label>

								<input type="text" id="candidate_name" name="candidate_name" required>

							</div>

						</div>

						<div class="col-md-3">

							<div class="theme-form">

								<label for="cdc_passport">C.D.C / Passport</label>

								<input type="text" id="cdc_passport" name="cdc_passport">

							</div>

						</div>

						<div class="col-md-2">

							<div class="theme-form">

								<label for="rank">Employee ID</label>

								<input type="text" id="rank" name="rank">

							</div>

						</div>

						<div class="col-md-2">

							<div class="theme-form">

							<label for="prefix">Prefix</label>

							<select id="prefix" name="prefix" required>

								<option value="">---</option>

								<option value="Mr">Mr</option>

								<option value="Miss">Miss</option>

								<option value="Mrs">Mrs</option>

								<option value="Capt">Capt</option>

							</select>

							</div>

						</div>

						

						<div class="col-md-2">

							<div class="theme-form">

							<label for="designation">Designation</label>

							<input type="text" id="designation" name="designation" required>

							</div>

						</div>

						<div class="col-md-3">

							<div class="theme-form">

								<label for="dob">Date Of Birth</label>

								<input type="date" id="dob" name="dob" required>

							</div>

						</div>

						<div class="col-md-3">
							<div class="theme-form">
								<label for="nationality">Nationality</label>
								<select id="nationality" name="nationality"  required>
									<option value="">---</option>
									<option value="Afghanistan">Afghanistan</option>
									<option value="Albania">Albania</option>
									<option value="Algeria">Algeria</option>
									<option value="Andorra">Andorra</option>
									<option value="Angola">Angola</option>
									<option value="Antigua and Barbuda">Antigua and Barbuda</option>
									<option value="Argentina">Argentina</option>
									<option value="Armenia">Armenia</option>
									<option value="Australia">Australia</option>
									<option value="Austria">Austria</option>
									<option value="Azerbaijan">Azerbaijan</option>
									<option value="Bahamas">Bahamas</option>
									<option value="Bahrain">Bahrain</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="Barbados">Barbados</option>
									<option value="Belarus">Belarus</option>
									<option value="Belgium">Belgium</option>
									<option value="Belize">Belize</option>
									<option value="Benin">Benin</option>
									<option value="Bhutan">Bhutan</option>
									<option value="Bolivia">Bolivia</option>
									<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
									<option value="Botswana">Botswana</option>
									<option value="Brazil">Brazil</option>
									<option value="Brunei">Brunei</option>
									<option value="Bulgaria">Bulgaria</option>
									<option value="Burkina Faso">Burkina Faso</option>
									<option value="Burundi">Burundi</option>
									<option value="Côte d'Ivoire">Côte d'Ivoire</option>
									<option value="Cabo Verde">Cabo Verde</option>
									<option value="Cambodia">Cambodia</option>
									<option value="Cameroon">Cameroon</option>
									<option value="Canada">Canada</option>
									<option value="Central African Republic">Central African Republic</option>
									<option value="Chad">Chad</option>
									<option value="Chile">Chile</option>
									<option value="China">China</option>
									<option value="Colombia">Colombia</option>
									<option value="Comoros">Comoros</option>
									<option value="Congo (Congo-Brazzaville)">Congo (Congo-Brazzaville)</option>
									<option value="Costa Rica">Costa Rica</option>
									<option value="Croatia">Croatia</option>
									<option value="Cuba">Cuba</option>
									<option value="Cyprus">Cyprus</option>
									<option value="Czechia (Czech Republic)">Czechia (Czech Republic)</option>
									<option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
									<option value="Denmark">Denmark</option>
									<option value="Djibouti">Djibouti</option>
									<option value="Dominica">Dominica</option>
									<option value="Dominican Republic">Dominican Republic</option>
									<option value="Ecuador">Ecuador</option>
									<option value="Egypt">Egypt</option>
									<option value="El Salvador">El Salvador</option>
									<option value="Equatorial Guinea">Equatorial Guinea</option>
									<option value="Eritrea">Eritrea</option>
									<option value="Estonia">Estonia</option>
									<option value="Eswatini (fmr. Swaziland)">Eswatini (fmr. "Swaziland")</option>
									<option value="Ethiopia">Ethiopia</option>
									<option value="Fiji">Fiji</option>
									<option value="Finland">Finland</option>
									<option value="France">France</option>
									<option value="Gabon">Gabon</option>
									<option value="Gambia">Gambia</option>
									<option value="Georgia">Georgia</option>
									<option value="Germany">Germany</option>
									<option value="Ghana">Ghana</option>
									<option value="Greece">Greece</option>
									<option value="Grenada">Grenada</option>
									<option value="Guatemala">Guatemala</option>
									<option value="Guinea">Guinea</option>
									<option value="Guinea-Bissau">Guinea-Bissau</option>
									<option value="Guyana">Guyana</option>
									<option value="Haiti">Haiti</option>
									<option value="Holy See">Holy See</option>
									<option value="Honduras">Honduras</option>
									<option value="Hungary">Hungary</option>
									<option value="Iceland">Iceland</option>
									<option value="India">India</option>
									<option value="Indonesia">Indonesia</option>
									<option value="Iran">Iran</option>
									<option value="Iraq">Iraq</option>
									<option value="Ireland">Ireland</option>
									<option value="Israel">Israel</option>
									<option value="Italy">Italy</option>
									<option value="Jamaica">Jamaica</option>
									<option value="Japan">Japan</option>
									<option value="Jordan">Jordan</option>
									<option value="Kazakhstan">Kazakhstan</option>
									<option value="Kenya">Kenya</option>
									<option value="Kiribati">Kiribati</option>
									<option value="Kuwait">Kuwait</option>
									<option value="Kyrgyzstan">Kyrgyzstan</option>
									<option value="Laos">Laos</option>
									<option value="Latvia">Latvia</option>
									<option value="Lebanon">Lebanon</option>
									<option value="Lesotho">Lesotho</option>
									<option value="Liberia">Liberia</option>
									<option value="Libya">Libya</option>
									<option value="Liechtenstein">Liechtenstein</option>
									<option value="Lithuania">Lithuania</option>
									<option value="Luxembourg">Luxembourg</option>
									<option value="Madagascar">Madagascar</option>
									<option value="Malawi">Malawi</option>
									<option value="Malaysia">Malaysia</option>
									<option value="Maldives">Maldives</option>
									<option value="Mali">Mali</option>
									<option value="Malta">Malta</option>
									<option value="Marshall Islands">Marshall Islands</option>
									<option value="Mauritania">Mauritania</option>
									<option value="Mauritius">Mauritius</option>
									<option value="Mexico">Mexico</option>
									<option value="Micronesia">Micronesia</option>
									<option value="Moldova">Moldova</option>
									<option value="Monaco">Monaco</option>
									<option value="Mongolia">Mongolia</option>
									<option value="Montenegro">Montenegro</option>
									<option value="Morocco">Morocco</option>
									<option value="Mozambique">Mozambique</option>
									<option value="Myanmar (formerly Burma)">Myanmar (formerly Burma)</option>
									<option value="Namibia">Namibia</option>
									<option value="Nauru">Nauru</option>
									<option value="Nepal">Nepal</option>
									<option value="Netherlands">Netherlands</option>
									<option value="New Zealand">New Zealand</option>
									<option value="Nicaragua">Nicaragua</option>
									<option value="Niger">Niger</option>
									<option value="Nigeria">Nigeria</option>
									<option value="North Korea">North Korea</option>
									<option value="North Macedonia">North Macedonia</option>
									<option value="Norway">Norway</option>
									<option value="Oman">Oman</option>
									<option value="Pakistan">Pakistan</option>
									<option value="Palau">Palau</option>
									<option value="Palestine State">Palestine State</option>
									<option value="Panama">Panama</option>
									<option value="Papua New Guinea">Papua New Guinea</option>
									<option value="Paraguay">Paraguay</option>
									<option value="Peru">Peru</option>
									<option value="Philippines">Philippines</option>
									<option value="Poland">Poland</option>
									<option value="Portugal">Portugal</option>
									<option value="Qatar">Qatar</option>
									<option value="Romania">Romania</option>
									<option value="Russia">Russia</option>
									<option value="Rwanda">Rwanda</option>
									<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
									<option value="Saint Lucia">Saint Lucia</option>
									<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
									<option value="Samoa">Samoa</option>
									<option value="San Marino">San Marino</option>
									<option value="Sao Tome and Principe">Sao Tome and Principe</option>
									<option value="Saudi Arabia">Saudi Arabia</option>
									<option value="Senegal">Senegal</option>
									<option value="Serbia">Serbia</option>
									<option value="Seychelles">Seychelles</option>
									<option value="Sierra Leone">Sierra Leone</option>
									<option value="Singapore">Singapore</option>
									<option value="Slovakia">Slovakia</option>
									<option value="Slovenia">Slovenia</option>
									<option value="Solomon Islands">Solomon Islands</option>
									<option value="Somalia">Somalia</option>
									<option value="South Africa">South Africa</option>
									<option value="South Korea">South Korea</option>
									<option value="South Sudan">South Sudan</option>
									<option value="Spain">Spain</option>
									<option value="Sri Lanka">Sri Lanka</option>
									<option value="Sudan">Sudan</option>
									<option value="Suriname">Suriname</option>
									<option value="Sweden">Sweden</option>
									<option value="Switzerland">Switzerland</option>
									<option value="Syria">Syria</option>
									<option value="Tajikistan">Tajikistan</option>
									<option value="Tanzania">Tanzania</option>
									<option value="Thailand">Thailand</option>
									<option value="Timor-Leste">Timor-Leste</option>
									<option value="Togo">Togo</option>
									<option value="Tonga">Tonga</option>
									<option value="Trinidad and Tobago">Trinidad and Tobago</option>
									<option value="Tunisia">Tunisia</option>
									<option value="Turkey">Turkey</option>
									<option value="Turkmenistan">Turkmenistan</option>
									<option value="Tuvalu">Tuvalu</option>
									<option value="Uganda">Uganda</option>
									<option value="Ukraine">Ukraine</option>
									<option value="United Arab Emirates">United Arab Emirates</option>
									<option value="United Kingdom">United Kingdom</option>
									<option value="United States of America">United States of America</option>
									<option value="Uruguay">Uruguay</option>
									<option value="Uzbekistan">Uzbekistan</option>
									<option value="Vanuatu">Vanuatu</option>
									<option value="Venezuela">Venezuela</option>
									<option value="Vietnam">Vietnam</option>
									<option value="Yemen">Yemen</option>
									<option value="Zambia">Zambia</option>
									<option value="Zimbabwe">Zimbabwe</option>
								</select>
							</div>
						</div>

						<div class="col-md-4">

							<div class="theme-form">

								<label for="profile_image">Profile Image</label>

								<input type="file" id="profile_image" name="profile_image">

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

		var candidate_name = $("#candidate_name").val();
        if (candidate_name == '') {
         $('#contact_error').html("Please Enter Candidate Name");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

      var cdc_passport = $("#cdc_passport").val();
        if (cdc_passport == '') {
         $('#contact_error').html("Please Enter C.D.C/Passport");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var rank = $("#rank").val();
        if (rank == '') {
         $('#contact_error').html("Please Enter Employee ID");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

        // var prefix = $("#prefix").val();
        // if (prefix == '') {
        //  $('#contact_error').html("Please Select Prefix");
        //  $('#contact_error').show().delay(0).fadeIn('show');
        //  $('#contact_error').show().delay(2000).fadeOut('show');
        //     return false;
        // }

		var designation = $("#designation").val();
        if (designation == '') {
         $('#contact_error').html("Please Enter Designation");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

		var dob = $("#dob").val();
        if (dob == '') {
         $('#contact_error').html("Please Select Date of Birth");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

		var nationality = $("#nationality").val();
        if (nationality == '') {
         $('#contact_error').html("Please Select Nationality");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

		$('#form').submit();

	}

</script>
</body>

</html>