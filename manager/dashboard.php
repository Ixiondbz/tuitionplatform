<?php include "includes/base.php"; ?>


<!DOCTYPE html>
<html>

<?php
include "includes/header.php";
?>

<body>
    <div id="wrapper">

        <?php
        include "includes/navigation.php";
        ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- displays the total number of tuition requests -->
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <?php

                                    $query = queryline("SELECT COUNT(*) FROM `tuition request`");
                                    $statement = mysqli_prepare($connection, $query);
                                    mysqli_stmt_execute($statement);
                                    $result = mysqli_stmt_get_result($statement);
                                    if (!$result) {
                                        die("Query Failed" . mysqli_error($connection));
                                    } else {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo $row['COUNT(*)'];
                                        }
                                    }
                                    ?>


                                    <div>Tuition requests</div>
                                </div>
                            </div>
                        </div>
                        <a href="tuition requests.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- displays the total number of clients -->
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <?php
                                    $excluded_user_type = 'manager';

                                    $query = queryline("SELECT COUNT(*) FROM user");
                                    $query .= queryline("WHERE user_type != ? ");
                                    $statement = mysqli_prepare($connection, $query);
                                    mysqli_stmt_bind_param($statement, 's', $excluded_user_type);
                                    mysqli_stmt_execute($statement);
                                    $result = mysqli_stmt_get_result($statement);
                                    if (!$result) {
                                        die("Query Failed" . mysqli_error($connection));
                                    } else {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo $row['COUNT(*)'];
                                        }
                                    }

                                    ?>


                                    <div>Clients</div>
                                </div>
                            </div>
                        </div>
                        <a href="clients.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>


</body>

</html>