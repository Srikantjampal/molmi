<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form | MOLMI</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <style>
        .registration-content {
            background-color: #f8f9fa;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-white-bg {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .required-asterisk {
            color: red;
        }

        .error {
            color: red;
            display: none;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="registration-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-white-bg">
                        <form id="registrationForm" method="post" action="<?php echo base_url('candidate/insert_registration'); ?>">
                            <div class="text-center mb-4">
                                <a href="index.php"><img src="<?php echo $base_url_views; ?>src/img/logo.png"></a>
                            </div>

                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="empId" class="form-label">Employee Id/Passport Number</label>
                                    <span class="required-asterisk">*</span>
                                    <input type="text" name="empId" id="empId" class="form-control" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <span class="required-asterisk">*</span>
                                    <input type="text" name="firstName" id="firstName" class="form-control" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="middleName" class="form-label">Middle Name</label>
                                    <span class="required-asterisk">*</span>
                                    <input type="text" name="middleName" id="middleName" class="form-control" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <span class="required-asterisk">*</span>
                                    <input type="text" name="lastName" id="lastName" class="form-control" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <span class="required-asterisk">*</span>
                                    <input type="date" name="dob" id="dob" class="form-control" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="rank" class="form-label">Rank Last Served on Vessel</label>
                                    <span class="required-asterisk">*</span>
                                    <select name="rank" id="rank" class="form-select" required>
                                        <option value="" disabled selected>Select Rank</option>
                                        <option value="Captain">Captain</option>
                                        <option value="First Officer">First Officer</option>
                                        <option value="Second Officer">Second Officer</option>
                                    </select>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="manager" class="form-label">Manager(Last Served)</label>
                                    <span class="required-asterisk">*</span>
                                    <select name="manager" id="manager" class="form-select" required>
                                        <option value="" disabled selected>Select Manager</option>
                                        <option value="Manager A">Manager A</option>
                                        <option value="Manager B">Manager B</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="whatsapp" class="form-label">WhatsApp Number</label>
                                    <span class="required-asterisk">*</span>
                                    <input type="text" name="whatsapp" id="whatsapp" class="form-control" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="alternate_number" class="form-label">Alternate Number</label>
                                    <span class="required-asterisk">*</span>
                                    <input type="tel" name="alternate_number" id="alternate_number" class="form-control" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <span class="required-asterisk">*</span>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="indos_no" class="form-label">INDOS NO: (For Indian Seafarers)</label>
                                    <span class="required-asterisk">*</span>
                                    <input type="text" name="indos_no" id="indos_no" class="form-control" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="nationality" class="form-label">Nationality</label>
                                    <span class="required-asterisk">*</span>
                                    <input type="text" name="nationality" id="nationality" class="form-control" required>
                                </div>

                                <div class="col-12 mb-3">
                                    <input name="declaration" id="declaration" type="checkbox" required>
                                    <label for="declaration" class="form-label">Declaration</label>
                                </div>
                                <span id="contact_error" class="error"></span>
                                <div class="d-grid gap-2">
                                    <button type="button" onclick="validateForm();" class="btn btn-primary">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            var empId = document.getElementById('empId').value;
            var firstName = document.getElementById('firstName').value;
            var middleName = document.getElementById('middleName').value;
            var lastName = document.getElementById('lastName').value;
            var dob = document.getElementById('dob').value;
            var rank = document.getElementById('rank').value;
            var manager = document.getElementById('manager').value;
            var whatsapp = document.getElementById('whatsapp').value;
            var alternate_number = document.getElementById('alternate_number').value;
            var email = document.getElementById('email').value;
            var indos_no = document.getElementById('indos_no').value;
            var nationality = document.getElementById('nationality').value;
            var declaration = document.getElementById('declaration').checked;

            var errorElement = document.getElementById('contact_error');
            var errorMessage = '';

            // Basic validation
            if (empId === '') errorMessage = 'Employee Id/Passport Number is required';
            else if (firstName === '') errorMessage = 'First Name is required';
            else if (middleName === '') errorMessage = 'Middle Name is required';
            else if (lastName === '') errorMessage = 'Last Name is required';
            else if (dob === '') errorMessage = 'Date of Birth is required';
            else if (rank === '') errorMessage = 'Rank is required';
            else if (manager === '') errorMessage = 'Manager is required';
            else if (whatsapp === '') errorMessage = 'WhatsApp Number is required';
            else if (alternate_number === '') errorMessage = 'Alternate Number is required';
            else if (email === '') errorMessage = 'Email is required';
            else if (indos_no === '') errorMessage = 'INDOS Number is required';
            else if (nationality === '') errorMessage = 'Nationality is required';
            else if (!declaration) errorMessage = 'You must accept the declaration';

            if (errorMessage) {
                errorElement.textContent = errorMessage;
                errorElement.style.display = 'block';
            } else {
                errorElement.style.display = 'none';
                document.getElementById('registrationForm').submit();
            }
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
