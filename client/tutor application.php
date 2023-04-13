<?php include "../includes/functions.php"; ?>
<?php
connect_to_db();
?>
<!DOCTYPE html>
<html>
<?php include "includes/header.php"; ?>

<body>
    <?php include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Tuition Sidebar Widgets Column -->
            <div class=" ">
            </div>
            <!-- Tuition Entries Column -->
            <div class=" ">
                <h1 class="page-header">
                    <small></small>
                </h1>

                <div class="container">
                    <div class="row " style="margin-left:40%;">
                        <?php
                        if (!is_logged_in()) {
                            echobr("You are not logged in!");
                            // echobr("<a href='login.php'>Login</a>");
                            exit;
                        }
                        $user_phone = $_SESSION['user_phone'];
                        $user_email = $_SESSION['user_email'];

                        $result_from_db = get_result_from_db_query("SELECT user_id FROM user WHERE user_phone='$user_phone' or user_email='$user_email'");
                        while ($row = mysqli_fetch_assoc($result_from_db)) {
                            $applicant_id = $row['user_id'];
                        }
                        if (isset($_GET['id'])) {
                            $tuition_request_id = $_GET['id'];
                            $result_from_db = get_result_from_db_query("SELECT COUNT(*) FROM `tutor application` WHERE tuition_request_id=$tuition_request_id and applicant_id=$applicant_id");
                            while ($row = mysqli_fetch_assoc($result_from_db)) {
                                $count_of_applications_with_same_user_id = $row['COUNT(*)'];
                            }
                            if ($count_of_applications_with_same_user_id > 0) {
                                echo "You have already applied to the same tuition before!😔";
                                exit;
                            } else {
                                $result_from_db = get_result_from_db_query("INSERT INTO `tutor application`(applicant_id, tuition_request_id) VALUES($applicant_id,$tuition_request_id)");
                                if (!$result_from_db) {
                                    die("Query Failed" . mysqli_error($connection));
                                } else {
                                    echo "Application successful! 😊";
                                }
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>



        </div>
        <!-- /.row -->

        <hr>


    </div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <?php include "includes/footer.php"; ?>
</body>

</html>