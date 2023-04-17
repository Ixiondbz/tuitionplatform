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
                    <?php include "../includes/delete_modal.php"; ?>
                    <div class="col-xs-13">
                        <table class="table table-bordered table-hover">
                            <!-- <tr>
                                <th>id</th>
                                <th>parent name</th>
                                <th>student name</th>
                                <th>class</th>
                                <th>subjects</th>
                                <th>location</th>
                                <th>additional notes</th>
                            </tr> -->

                            <?php
                            read_all_tuition_requests();
                            ?>


                        </table>
                    </div>
                    <?php
                    delete_tuition_request();

                    edit_tuition_request();

                    update_tuition_request();
                    ?>

                </div>

            </div>
        </div>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <script>
            $(document).ready(function() {
                $(".delete_link").on('click', function() {
                    var id = $(this).attr("rel");
                    var delete_url = "tuition requests.php?delete=" + id + "";
                    $(".modal_delete_link").attr("href", delete_url);
                    $("#myModal").modal('show');
                });
            })
        </script>
    </div>




</body>

</html>