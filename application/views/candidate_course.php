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

                    <h2>My Courses

                        <!-- <a href="<?php echo $base_url; ?>course/add" class="theme-cta"><i class="las la-plus-circle"></i> Add Courses</a> 

                    <a href="<?php echo $base_url; ?>course/upload" class="theme-cta"><i class="las la-file-upload"></i> Upload</a> 

                    <a href="<?php echo $base_url; ?>course/export" class="theme-cta"><i class="las la-file-excel"></i> Export</a> -->

                    </h2>
                    <!-- <pre>
                        <?php echo "printing" ?>
                    <?php print_r($result); ?> 
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
                                            <th>Topic</th>
                                            <th>Course Name</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        $k = 0;

                                        for ($i = 0; $i < count($result); $i++) { 
                                            for ($j = 0; $j < count($result[$i]); $j++) {
                                                $k++; ?>
                                                <tr>
                                                    <td><?php echo $k; ?></td>
                                                    <td><?php echo $this->course_model->get_topic_name($result[$i][$j]->topic);  ?>
                                                    </td>
                                                    <td><?php echo $result[$i][$j]->course_name; ?>
                                                    </td>
                                                </tr>
                                            <?php }
                                        }
                                        ?>
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