<!DOCTYPE html>

<html lang="en">

<head>



    <title>Courses | MOLMI</title>

    <?php include('include/header.php'); ?>



</head>

<body>

    <input type="checkbox" id="nav-toggle" name="">

    <div class="sidebar shadow">

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

                    <h2>My Candidates

                        <!-- <a href="<?php echo $base_url; ?>course/add" class="theme-cta"><i class="las la-plus-circle"></i> Add Courses</a> 

                    <a href="<?php echo $base_url; ?>course/upload" class="theme-cta"><i class="las la-file-upload"></i> Upload</a> 

                    <a href="<?php echo $base_url; ?>course/export" class="theme-cta"><i class="las la-file-excel"></i> Export</a> -->

                    </h2>
                    <!-- <pre>
                    <?php print_r($trainerData); ?> 
                    </pre> -->

                </div>

                <div class="row mobilerows ">

                    <div class="col-md-12 ">

                        <div class="infos-table shadow">

                            <div class="table-responsive">

                                <table id="example" class="table table-hover nowrap ">

                                    <thead>

                                        <tr>
                                            <th>Serial</th>
                                            <th>Candidates name</th>
                                            <th>email</th>
                                            <th>DOB</th>
                                            <th>Rank</th>
                                            <th>Designation</th>
                                            <th>Whatsapp</th>
                                            <th>Alternate Number</th>
                                            <th>manager</th>
                                            <th>Nationality</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        $k = 0;
                                        for ($i = 0; $i < count($result); $i++) {
                                            $k++; ?>
                                            <tr>
                                                <td><?php echo $k; ?></td>
                                                <td><?php echo $result[$i]->candidate_name; ?></td>
                                                <td><?php echo $result[$i]->email; ?></td>
                                                <td><?php echo $result[$i]->dob; ?></td>
                                                <td><?php echo $result[$i]->rank; ?></td>
                                                <td><?php echo $result[$i]->designation; ?></td>
                                                <td><?php echo $result[$i]->whatsapp; ?></td>
                                                <td><?php echo $result[$i]->alternate_mobile; ?></td>
                                                <td><?php echo $result[$i]->manager; ?></td>
                                                <td><?php echo $result[$i]->nationality; ?></td>
                                            </tr>
                                        <?php } ?>
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


</body>

</html>