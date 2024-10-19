<!DOCTYPE html>

<html lang="en">

<head>

	

	<title>Edit Trainer | MOLMI</title>

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

				<h2><a href="<?php echo $base_url;?>trainer/lists"><i class="las la-arrow-left"></i></a> <?php echo $trainer_name; ?></h2>

			</div>

			<div class="form-white-bg">

         <form role="form" id="form" method="post" action="<?php echo $base_url;?>trainer/edit/<?php echo $id; ?>" enctype="multipart/form-data" >
		 		<INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
				<INPUT TYPE="hidden" NAME="action" VALUE="edit_trainer">
				<INPUT TYPE="hidden" NAME="hiddenaction" VALUE="<?php echo $id;?>">

					<div class="row">

						<div class="col-md-2">

							<div class="theme-form">

								<label for="prefix">Prefix</label>

								<select id="prefix" name="prefix" required>

									<option value="">---</option>

									<option value="Mr" <?php if($prefix == 'Mr'){ echo "selected";} ?>>Mr</option>
									<option value="Miss" <?php if($prefix == 'Miss'){ echo "selected";} ?>>Miss</option>
									<option value="Mrs" <?php if($prefix == 'Mrs'){ echo "selected";} ?>>Mrs</option>
									<option value="Capt" <?php if($prefix == 'Capt'){ echo "selected";} ?>>Capt</option>

								</select>

							</div>

						</div>

						<div class="col-md-2">

							<div class="theme-form">

								<label for="officer">Officer</label>

								<select id="officer" name="officer" required>

									<option value="">---</option>

									<option value="Deck" <?php if($officer == 'Deck'){ echo "selected";} ?>>Deck</option>

									<option value="Engine" <?php if($officer == 'Engine'){ echo "selected";} ?>>Engine</option>

								</select>

							</div>

						</div>

						<div class="col-md-2">

							<div class="theme-form">

								<label for="designation">Designation</label>

								<input type="text" id="designation" name="designation" value="<?php echo $designation; ?>" required>

							</div>

						</div>

						<div class="col-md-6">

							<div class="theme-form">

								<label for="trainer_name">Trainer Name</label>

								<input type="text" id="trainer_name" name="trainer_name" value="<?php echo $trainer_name; ?>" required>

							</div>

						</div>
						
						<div class="col-md-4">
							<div class="theme-form">
								<label for="nationality">Nationality</label>
								<select id="nationality" name="nationality"  required>
									<option value="">---</option>
									<option value="Afghanistan" <?php if($nationality == 'Afghanistan'){echo "selected";}?>>Afghanistan</option>
									<option value="Albania" <?php if($nationality == 'Albania'){echo "selected";}?>>Albania</option>
									<option value="Algeria" <?php if($nationality == 'Algeria'){echo "selected";}?>>Algeria</option>
									<option value="Andorra" <?php if($nationality == 'Andorra'){echo "selected";}?>>Andorra</option>
									<option value="Angola" <?php if($nationality == 'Angola'){echo "selected";}?>>Angola</option>
									<option value="Antigua and Barbuda" <?php if($nationality == 'Antigua and Barbuda'){echo "selected";}?>>Antigua and Barbuda</option>
									<option value="Argentina" <?php if($nationality == 'Argentina'){echo "selected";}?>>Argentina</option>
									<option value="Armenia" <?php if($nationality == 'Armenia'){echo "selected";}?>>Armenia</option>
									<option value="Australia" <?php if($nationality == 'Australia'){echo "selected";}?>>Australia</option>
									<option value="Austria" <?php if($nationality == 'Austria'){echo "selected";}?>>Austria</option>
									<option value="Azerbaijan" <?php if($nationality == 'Azerbaijan'){echo "selected";}?>>Azerbaijan</option>
									<option value="Bahamas" <?php if($nationality == 'Bahamas'){echo "selected";}?>>Bahamas</option>
									<option value="Bahrain" <?php if($nationality == 'Bahrain'){echo "selected";}?>>Bahrain</option>
									<option value="Bangladesh" <?php if($nationality == 'Bangladesh'){echo "selected";}?>>Bangladesh</option>
									<option value="Barbados" <?php if($nationality == 'Barbados'){echo "selected";}?>>Barbados</option>
									<option value="Belarus" <?php if($nationality == 'Belarus'){echo "selected";}?>>Belarus</option>
									<option value="Belgium" <?php if($nationality == 'Belgium'){echo "selected";}?>>Belgium</option>
									<option value="Belize" <?php if($nationality == 'Belize'){echo "selected";}?>>Belize</option>
									<option value="Benin" <?php if($nationality == 'Benin'){echo "selected";}?>>Benin</option>
									<option value="Bhutan" <?php if($nationality == 'Bhutan'){echo "selected";}?>>Bhutan</option>
									<option value="Bolivia" <?php if($nationality == 'Bolivia'){echo "selected";}?>>Bolivia</option>
									<option value="Bosnia and Herzegovina" <?php if($nationality == 'Bosnia and Herzegovina'){echo "selected";}?>>Bosnia and Herzegovina</option>
									<option value="Botswana" <?php if($nationality == 'Botswana'){echo "selected";}?>>Botswana</option>
									<option value="Brazil" <?php if($nationality == 'Brazil'){echo "selected";}?>>Brazil</option>
									<option value="Brunei" <?php if($nationality == 'Brunei'){echo "selected";}?>>Brunei</option>
									<option value="Bulgaria" <?php if($nationality == 'Bulgaria'){echo "selected";}?>>Bulgaria</option>
									<option value="Burkina Faso" <?php if($nationality == 'Burkina Faso'){echo "selected";}?>>Burkina Faso</option>
									<option value="Burundi" <?php if($nationality == 'Burundi'){echo "selected";}?>>Burundi</option>
									<option value="Côte d Ivoire" <?php if($nationality == 'Côte d Ivoire'){echo "selected";}?>>Côte d'Ivoire</option>
									<option value="Cabo Verde" <?php if($nationality == 'Cabo Verde'){echo "selected";}?>>Cabo Verde</option>
									<option value="Cambodia" <?php if($nationality == 'Cambodia'){echo "selected";}?>>Cambodia</option>
									<option value="Cameroon" <?php if($nationality == 'Cameroon'){echo "selected";}?>>Cameroon</option>
									<option value="Canada" <?php if($nationality == 'Canada'){echo "selected";}?>>Canada</option>
									<option value="Central African Republic" <?php if($nationality == 'Central African Republic'){echo "selected";}?>>Central African Republic</option>
									<option value="Chad" <?php if($nationality == 'Chad'){echo "selected";}?>>Chad</option>
									<option value="Chile" <?php if($nationality == 'Chile'){echo "selected";}?>>Chile</option>
									<option value="China" <?php if($nationality == 'China'){echo "selected";}?>>China</option>
									<option value="Colombia" <?php if($nationality == 'Colombia'){echo "selected";}?>>Colombia</option>
									<option value="Comoros" <?php if($nationality == 'Comoros'){echo "selected";}?>>Comoros</option>
									<option value="Congo (Congo-Brazzaville)" <?php if($nationality == 'Congo (Congo-Brazzaville)'){echo "selected";}?>>Congo (Congo-Brazzaville)</option>
									<option value="Costa Rica" <?php if($nationality == 'Costa Rica'){echo "selected";}?>>Costa Rica</option>
									<option value="Croatia" <?php if($nationality == 'Croatia'){echo "selected";}?>>Croatia</option>
									<option value="Cuba" <?php if($nationality == 'Cuba'){echo "selected";}?>>Cuba</option>
									<option value="Cyprus" <?php if($nationality == 'Cyprus'){echo "selected";}?>>Cyprus</option>
									<option value="Czechia (Czech Republic)" <?php if($nationality == 'Czechia (Czech Republic)'){echo "selected";}?>>Czechia (Czech Republic)</option>
									<option value="Democratic Republic of the Congo" <?php if($nationality == 'Democratic Republic of the Congo'){echo "selected";}?>>Democratic Republic of the Congo</option>
									<option value="Denmark" <?php if($nationality == 'Denmark'){echo "selected";}?>>Denmark</option>
									<option value="Djibouti" <?php if($nationality == 'Djibouti'){echo "selected";}?>>Djibouti</option>
									<option value="Dominica" <?php if($nationality == 'Dominica'){echo "selected";}?>>Dominica</option>
									<option value="Dominican Republic" <?php if($nationality == 'Dominican Republic'){echo "selected";}?>>Dominican Republic</option>
									<option value="Ecuador" <?php if($nationality == 'Ecuador'){echo "selected";}?>>Ecuador</option>
									<option value="Egypt" <?php if($nationality == 'Egypt'){echo "selected";}?>>Egypt</option>
									<option value="El Salvador" <?php if($nationality == 'El Salvador'){echo "selected";}?>>El Salvador</option>
									<option value="Equatorial Guinea" <?php if($nationality == 'Equatorial Guinea'){echo "selected";}?>>Equatorial Guinea</option>
									<option value="Eritrea" <?php if($nationality == 'Eritrea'){echo "selected";}?>>Eritrea</option>
									<option value="Estonia" <?php if($nationality == 'Estonia'){echo "selected";}?>>Estonia</option>
									<option value="Eswatini (fmr. Swaziland)" <?php if($nationality == 'Eswatini (fmr. Swaziland)'){echo "selected";}?>>Eswatini (fmr. "Swaziland")</option>
									<option value="Ethiopia" <?php if($nationality == 'Ethiopia'){echo "selected";}?>>Ethiopia</option>
									<option value="Fiji" <?php if($nationality == 'Fiji'){echo "selected";}?>>Fiji</option>
									<option value="Finland" <?php if($nationality == 'Finland'){echo "selected";}?>>Finland</option>
									<option value="France" <?php if($nationality == 'France'){echo "selected";}?>>France</option>
									<option value="Gabon" <?php if($nationality == 'Gabon'){echo "selected";}?>>Gabon</option>
									<option value="Gambia" <?php if($nationality == 'Gambia'){echo "selected";}?>>Gambia</option>
									<option value="Georgia" <?php if($nationality == 'Georgia'){echo "selected";}?>>Georgia</option>
									<option value="Germany" <?php if($nationality == 'Germany'){echo "selected";}?>>Germany</option>
									<option value="Ghana" <?php if($nationality == 'Ghana'){echo "selected";}?>>Ghana</option>
									<option value="Greece" <?php if($nationality == 'Greece'){echo "selected";}?>>Greece</option>
									<option value="Grenada" <?php if($nationality == 'Grenada'){echo "selected";}?>>Grenada</option>
									<option value="Guatemala" <?php if($nationality == 'Guatemala'){echo "selected";}?>>Guatemala</option>
									<option value="Guinea" <?php if($nationality == 'Guinea'){echo "selected";}?>>Guinea</option>
									<option value="Guinea-Bissau" <?php if($nationality == 'Guinea-Bissau'){echo "selected";}?>>Guinea-Bissau</option>
									<option value="Guyana" <?php if($nationality == 'Guyana'){echo "selected";}?>>Guyana</option>
									<option value="Haiti" <?php if($nationality == 'Haiti'){echo "selected";}?>>Haiti</option>
									<option value="Holy See" <?php if($nationality == 'Holy See'){echo "selected";}?>>Holy See</option>
									<option value="Honduras" <?php if($nationality == 'Honduras'){echo "selected";}?>>Honduras</option>
									<option value="Hungary" <?php if($nationality == 'Hungary'){echo "selected";}?>>Hungary</option>
									<option value="Iceland" <?php if($nationality == 'Iceland'){echo "selected";}?>>Iceland</option>
									<option value="India" <?php if($nationality == 'India'){echo "selected";}?>>India</option>
									<option value="Indonesia" <?php if($nationality == 'Indonesia'){echo "selected";}?>>Indonesia</option>
									<option value="Iran" <?php if($nationality == 'Iran'){echo "selected";}?>>Iran</option>
									<option value="Iraq" <?php if($nationality == 'Iraq'){echo "selected";}?>>Iraq</option>
									<option value="Ireland" <?php if($nationality == 'Ireland'){echo "selected";}?>>Ireland</option>
									<option value="Israel" <?php if($nationality == 'Israel'){echo "selected";}?>>Israel</option>
									<option value="Italy" <?php if($nationality == 'Italy'){echo "selected";}?>>Italy</option>
									<option value="Jamaica" <?php if($nationality == 'Jamaica'){echo "selected";}?>>Jamaica</option>
									<option value="Japan" <?php if($nationality == 'Japan'){echo "selected";}?>>Japan</option>
									<option value="Jordan" <?php if($nationality == 'Jordan'){echo "selected";}?>>Jordan</option>
									<option value="Kazakhstan" <?php if($nationality == 'Kazakhstan'){echo "selected";}?>>Kazakhstan</option>
									<option value="Kenya" <?php if($nationality == 'Kenya'){echo "selected";}?>>Kenya</option>
									<option value="Kiribati" <?php if($nationality == 'Kiribati'){echo "selected";}?>>Kiribati</option>
									<option value="Kuwait" <?php if($nationality == 'Kuwait'){echo "selected";}?>>Kuwait</option>
									<option value="Kyrgyzstan" <?php if($nationality == 'Kyrgyzstan'){echo "selected";}?>>Kyrgyzstan</option>
									<option value="Laos" <?php if($nationality == 'Laos'){echo "selected";}?>>Laos</option>
									<option value="Latvia" <?php if($nationality == 'Latvia'){echo "selected";}?>>Latvia</option>
									<option value="Lebanon" <?php if($nationality == 'Lebanon'){echo "selected";}?>>Lebanon</option>
									<option value="Lesotho" <?php if($nationality == 'Lesotho'){echo "selected";}?>>Lesotho</option>
									<option value="Liberia" <?php if($nationality == 'Liberia'){echo "selected";}?>>Liberia</option>
									<option value="Libya" <?php if($nationality == 'Libya'){echo "selected";}?>>Libya</option>
									<option value="Liechtenstein" <?php if($nationality == 'Liechtenstein'){echo "selected";}?>>Liechtenstein</option>
									<option value="Lithuania" <?php if($nationality == 'Lithuania'){echo "selected";}?>>Lithuania</option>
									<option value="Luxembourg" <?php if($nationality == 'Luxembourg'){echo "selected";}?>>Luxembourg</option>
									<option value="Madagascar" <?php if($nationality == 'Madagascar'){echo "selected";}?>>Madagascar</option>
									<option value="Malawi" <?php if($nationality == 'Malawi'){echo "selected";}?>>Malawi</option>
									<option value="Malaysia" <?php if($nationality == 'Malaysia'){echo "selected";}?>>Malaysia</option>
									<option value="Maldives" <?php if($nationality == 'Maldives'){echo "selected";}?>>Maldives</option>
									<option value="Mali" <?php if($nationality == 'Mali'){echo "selected";}?>>Mali</option>
									<option value="Malta" <?php if($nationality == 'Malta'){echo "selected";}?>>Malta</option>
									<option value="Marshall Islands" <?php if($nationality == 'Marshall Islands'){echo "selected";}?>>Marshall Islands</option>
									<option value="Mauritania" <?php if($nationality == 'Mauritania'){echo "selected";}?>>Mauritania</option>
									<option value="Mauritius" <?php if($nationality == 'Mauritius'){echo "selected";}?>>Mauritius</option>
									<option value="Mexico" <?php if($nationality == 'Mexico'){echo "selected";}?>>Mexico</option>
									<option value="Micronesia" <?php if($nationality == 'Micronesia'){echo "selected";}?>>Micronesia</option>
									<option value="Moldova" <?php if($nationality == 'Moldova'){echo "selected";}?>>Moldova</option>
									<option value="Monaco" <?php if($nationality == 'Monaco'){echo "selected";}?>>Monaco</option>
									<option value="Mongolia" <?php if($nationality == 'Mongolia'){echo "selected";}?>>Mongolia</option>
									<option value="Montenegro" <?php if($nationality == 'Montenegro'){echo "selected";}?>>Montenegro</option>
									<option value="Morocco" <?php if($nationality == 'Morocco'){echo "selected";}?>>Morocco</option>
									<option value="Mozambique" <?php if($nationality == 'Mozambique'){echo "selected";}?>>Mozambique</option>
									<option value="Myanmar (formerly Burma)" <?php if($nationality == 'Myanmar (formerly Burma)'){echo "selected";}?>>Myanmar (formerly Burma)</option>
									<option value="Namibia" <?php if($nationality == 'Namibia'){echo "selected";}?>>Namibia</option>
									<option value="Nauru" <?php if($nationality == 'Nauru'){echo "selected";}?>>Nauru</option>
									<option value="Nepal" <?php if($nationality == 'Nepal'){echo "selected";}?>>Nepal</option>
									<option value="Netherlands" <?php if($nationality == 'Netherlands'){echo "selected";}?>>Netherlands</option>
									<option value="New Zealand" <?php if($nationality == 'New Zealand'){echo "selected";}?>>New Zealand</option>
									<option value="Nicaragua" <?php if($nationality == 'Nicaragua'){echo "selected";}?>>Nicaragua</option>
									<option value="Niger" <?php if($nationality == 'Niger'){echo "selected";}?>>Niger</option>
									<option value="Nigeria" <?php if($nationality == 'Nigeria'){echo "selected";}?>>Nigeria</option>
									<option value="North Korea" <?php if($nationality == 'North Korea'){echo "selected";}?>>North Korea</option>
									<option value="North Macedonia" <?php if($nationality == 'North Macedonia'){echo "selected";}?>>North Macedonia</option>
									<option value="Norway" <?php if($nationality == 'Norway'){echo "selected";}?>>Norway</option>
									<option value="Oman" <?php if($nationality == 'Oman'){echo "selected";}?>>Oman</option>
									<option value="Pakistan" <?php if($nationality == 'Pakistan'){echo "selected";}?>>Pakistan</option>
									<option value="Palau" <?php if($nationality == 'Palau'){echo "selected";}?>>Palau</option>
									<option value="Palestine State" <?php if($nationality == 'Palestine State'){echo "selected";}?>>Palestine State</option>
									<option value="Panama" <?php if($nationality == 'Panama'){echo "selected";}?>>Panama</option>
									<option value="Papua New Guinea" <?php if($nationality == 'Papua New Guinea'){echo "selected";}?>>Papua New Guinea</option>
									<option value="Paraguay" <?php if($nationality == 'Paraguay'){echo "selected";}?>>Paraguay</option>
									<option value="Peru" <?php if($nationality == 'Peru'){echo "selected";}?>>Peru</option>
									<option value="Philippines" <?php if($nationality == 'Philippines'){echo "selected";}?>>Philippines</option>
									<option value="Poland" <?php if($nationality == 'Poland'){echo "selected";}?>>Poland</option>
									<option value="Portugal" <?php if($nationality == 'Portugal'){echo "selected";}?>>Portugal</option>
									<option value="Qatar" <?php if($nationality == 'Qatar'){echo "selected";}?>>Qatar</option>
									<option value="Romania" <?php if($nationality == 'Romania'){echo "selected";}?>>Romania</option>
									<option value="Russia" <?php if($nationality == 'Russia'){echo "selected";}?>>Russia</option>
									<option value="Rwanda" <?php if($nationality == 'Rwanda'){echo "selected";}?>>Rwanda</option>
									<option value="Saint Kitts and Nevis" <?php if($nationality == 'Saint Kitts and Nevis'){echo "selected";}?>>Saint Kitts and Nevis</option>
									<option value="Saint Lucia" <?php if($nationality == 'Saint Lucia'){echo "selected";}?>>Saint Lucia</option>
									<option value="Saint Vincent and the Grenadines" <?php if($nationality == 'Saint Vincent and the Grenadines'){echo "selected";}?>>Saint Vincent and the Grenadines</option>
									<option value="Samoa" <?php if($nationality == 'Samoa'){echo "selected";}?>>Samoa</option>
									<option value="San Marino" <?php if($nationality == 'San Marino'){echo "selected";}?>>San Marino</option>
									<option value="Sao Tome and Principe" <?php if($nationality == 'Sao Tome and Principe'){echo "selected";}?>>Sao Tome and Principe</option>
									<option value="Saudi Arabia" <?php if($nationality == 'Saudi Arabia'){echo "selected";}?>>Saudi Arabia</option>
									<option value="Senegal" <?php if($nationality == 'Senegal'){echo "selected";}?>>Senegal</option>
									<option value="Serbia" <?php if($nationality == 'Serbia'){echo "selected";}?>>Serbia</option>
									<option value="Seychelles" <?php if($nationality == 'Seychelles'){echo "selected";}?>>Seychelles</option>
									<option value="Sierra Leone" <?php if($nationality == 'Sierra Leone'){echo "selected";}?>>Sierra Leone</option>
									<option value="Singapore" <?php if($nationality == 'Singapore'){echo "selected";}?>>Singapore</option>
									<option value="Slovakia" <?php if($nationality == 'Slovakia'){echo "selected";}?>>Slovakia</option>
									<option value="Slovenia" <?php if($nationality == 'Slovenia'){echo "selected";}?>>Slovenia</option>
									<option value="Solomon Islands" <?php if($nationality == 'Solomon Islands'){echo "selected";}?>>Solomon Islands</option>
									<option value="Somalia" <?php if($nationality == 'Somalia'){echo "selected";}?>>Somalia</option>
									<option value="South Africa" <?php if($nationality == 'South Africa'){echo "selected";}?>>South Africa</option>
									<option value="South Korea" <?php if($nationality == 'South Korea'){echo "selected";}?>>South Korea</option>
									<option value="South Sudan" <?php if($nationality == 'South Sudan'){echo "selected";}?>>South Sudan</option>
									<option value="Spain" <?php if($nationality == 'Spain'){echo "selected";}?>>Spain</option>
									<option value="Sri Lanka" <?php if($nationality == 'Sri Lanka'){echo "selected";}?>>Sri Lanka</option>
									<option value="Sudan" <?php if($nationality == 'Sudan'){echo "selected";}?>>Sudan</option>
									<option value="Suriname" <?php if($nationality == 'Suriname'){echo "selected";}?>>Suriname</option>
									<option value="Sweden" <?php if($nationality == 'Sweden'){echo "selected";}?>>Sweden</option>
									<option value="Switzerland" <?php if($nationality == 'Switzerland'){echo "selected";}?>>Switzerland</option>
									<option value="Syria" <?php if($nationality == 'Syria'){echo "selected";}?>>Syria</option>
									<option value="Tajikistan" <?php if($nationality == 'Tajikistan'){echo "selected";}?>>Tajikistan</option>
									<option value="Tanzania" <?php if($nationality == 'Tanzania'){echo "selected";}?>>Tanzania</option>
									<option value="Thailand" <?php if($nationality == 'Thailand'){echo "selected";}?>>Thailand</option>
									<option value="Timor-Leste" <?php if($nationality == 'Timor-Leste'){echo "selected";}?>>Timor-Leste</option>
									<option value="Togo" <?php if($nationality == 'Togo'){echo "selected";}?>>Togo</option>
									<option value="Tonga" <?php if($nationality == 'Tonga'){echo "selected";}?>>Tonga</option>
									<option value="Trinidad and Tobago" <?php if($nationality == 'Trinidad and Tobago'){echo "selected";}?>>Trinidad and Tobago</option>
									<option value="Tunisia" <?php if($nationality == 'Tunisia'){echo "selected";}?>>Tunisia</option>
									<option value="Turkey" <?php if($nationality == 'Turkey'){echo "selected";}?>>Turkey</option>
									<option value="Turkmenistan" <?php if($nationality == 'Turkmenistan'){echo "selected";}?>>Turkmenistan</option>
									<option value="Tuvalu" <?php if($nationality == 'Tuvalu'){echo "selected";}?>>Tuvalu</option>
									<option value="Uganda" <?php if($nationality == 'Uganda'){echo "selected";}?>>Uganda</option>
									<option value="Ukraine" <?php if($nationality == 'Ukraine'){echo "selected";}?>>Ukraine</option>
									<option value="United Arab Emirates" <?php if($nationality == 'United Arab Emirates'){echo "selected";}?>>United Arab Emirates</option>
									<option value="United Kingdom" <?php if($nationality == 'United Kingdom'){echo "selected";}?>>United Kingdom</option>
									<option value="United States of America" <?php if($nationality == 'United States of America'){echo "selected";}?>>United States of America</option>
									<option value="Uruguay" <?php if($nationality == 'Uruguay'){echo "selected";}?>>Uruguay</option>
									<option value="Uzbekistan" <?php if($nationality == 'Uzbekistan'){echo "selected";}?>>Uzbekistan</option>
									<option value="Vanuatu" <?php if($nationality == 'Vanuatu'){echo "selected";}?>>Vanuatu</option>
									<option value="Venezuela" <?php if($nationality == 'Venezuela'){echo "selected";}?>>Venezuela</option>
									<option value="Vietnam" <?php if($nationality == 'Vietnam'){echo "selected";}?>>Vietnam</option>
									<option value="Yemen" <?php if($nationality == 'Yemen'){echo "selected";}?>>Yemen</option>
									<option value="Zambia" <?php if($nationality == 'Zambia'){echo "selected";}?>>Zambia</option>
									<option value="Zimbabwe" <?php if($nationality == 'Zimbabwe'){echo "selected";}?>>Zimbabwe</option>
								</select>
							</div>
						</div>

						<div class="col-md-4">

							<div class="theme-form">

								<label for="digital_signature">Digital Signature</label>

								<input type="file" id="digital_signature" name="digital_signature">

								<?php if($digital_signature != '') {?>
									<img class="form-signature" src="<?php echo $front_base_url;?>upload/trainer/<?php echo $digital_signature;?>">
								<?php } ?>

							</div>

						</div>

						<div class="col-md-4">

							<div class="theme-form">

								<label for="profile_photo">Profile Photo</label>

								<input type="file" id="profile_photo" name="profile_photo">

								<?php if($profile_photo != '') {?>
									<img class="form-profile" src="<?php echo $front_base_url;?>upload/trainer/<?php echo $profile_photo;?>">
								<?php } ?>

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

		// var prefix = $("#prefix").val();
  //       if (prefix == '') {
  //        $('#contact_error').html("Please Select Prefix");
  //        $('#contact_error').show().delay(0).fadeIn('show');
  //        $('#contact_error').show().delay(2000).fadeOut('show');
  //           return false;
  //       }

      var officer = $("#officer").val();
        if (officer == '') {
         $('#contact_error').html("Please Select Officer");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var designation = $("#designation").val();
        if (designation == '') {
         $('#contact_error').html("Please Enter Designation");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var trainer_name = $("#trainer_name").val();
        if (trainer_name == '') {
         $('#contact_error').html("Please Enter Trainer Name");
         $('#contact_error').show().delay(0).fadeIn('show');
         $('#contact_error').show().delay(2000).fadeOut('show');
            return false;
        }

		$('#form').submit();

	}

</script>

</body>

</html>