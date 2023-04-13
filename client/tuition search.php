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

                <!-- Tuition Search Well -->
                <div class="well">
                    <h4>Tuition Search</h4>
                    <!-- <p>Search for tuitions near you 😊</p> -->

                    <form action="tuition search.php" method="post">
                        <div class="input-group">
                            <input class="form-control" type="search" name="search" id="" placeholder="search by locations">
                            <span class="input-group-btn">
                                <button name="submit" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>

                    <!-- /.input-group -->
                </div>



            </div>
            <!-- Tuition Entries Column -->
            <div class=" ">

                <h1 class="page-header">
                    <small></small>
                </h1>

                <div class="container">
                    <div class="row">
                        <?php
                        search_tuitions_by_location();
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