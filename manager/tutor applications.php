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
                <?php include "../includes/delete_modal.php"; ?>

                <table class="table table-bordered table-hover">



                    <?php
                    read_all_tutor_applications();
                    ?>

                </table>
                <?php
                delete_tutor_application();
                ?>
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
                    var delete_url = "tutor applications.php?delete=" + id + "";
                    $(".modal_delete_link").attr("href", delete_url);
                    $("#myModal").modal('show');
                });
            })
        </script>




</body>

</html>