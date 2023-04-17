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

                <table class="table table-bordered table-hover">



                    <?php
                    read_all_clients();
                    ?>

                </table>
                <?php
                delete_client();
                edit_client();
                update_client();
                ?>
            </div>

        </div>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>





</body>

</html>