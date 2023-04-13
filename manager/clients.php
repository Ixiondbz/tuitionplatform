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
                    read_clients();
                    ?>

                </table>
                <?php
                delete_clients();
                edit_clients();
                update_clients();
                ?>
            </div>

        </div>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>





</body>

</html>