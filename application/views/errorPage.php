<!DOCTYPE html>
<html lang="en">

<head>
    <title>Access Restricted</title>
</head>

<body>
    <div style="text-align: center; margin-top: 50px;">
        <h1>Page Cannot Be Accessed</h1>
        <p><?php echo $this->session->flashdata('error'); ?></p>
        <a href="<?php echo base_url(); ?>">Go Back</a>
    </div>
</body>

</html>