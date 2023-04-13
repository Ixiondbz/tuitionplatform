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
            <div class="row">
                <div class="container-fluid">
                    <div class="col-xs-13">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>id</th>
                                <th>parent name</th>
                                <th>student name</th>
                                <th>class</th>
                                <th>subjects</th>
                                <th>location</th>
                                <th>additional notes</th>
                            </tr>

                            <?php
                            read_tuition_requests();
                            ?>


                        </table>
                    </div>
                    <?php
                    delete_tuition_requests();

                    edit_tuition_requests();

                    update_tuition_requests();
                    ?>

                </div>

            </div>
        </div>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </div>




</body>

</html>