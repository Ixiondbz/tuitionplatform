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
                    <div class="row " style="margin-left:30%;">
                        <?php
                        if (is_method('get')) {
                            $tuition_id = escape_special_characters($_GET['edit']);
                            // echo $tuition_id;
                            $query = queryline("SELECT `student class`,`student subjects`,`teaching location`,`additional notes` FROM `tuition request`");
                            $query .= queryline("WHERE id='{$tuition_id}'");

                            $result = mysqli_query($connection, $query);
                            // print_r($result);
                            // print($result);
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="col-md-6">
                                    <div class="card" style="border: 0.5px dotted; padding-bottom:5px ;">
                                        <div class="card-body">
                                            <h4 class="card-title"><b>Tuition</b></h4>
                                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['student class']; ?></h6>
                                            <p class="card-text"> <?php echo "Subjects: " . $row['student subjects']; ?> </p>
                                            <p class="card-text"> <?php echo "Teaching location: " . $row['teaching location']; ?> </p>
                                            <p class="card-text"> <?php echo "Notes: " . $row['additional notes']; ?> </p>
                                            <!-- <a href="" class="card-link"><button>Apply</button></a> -->

                                        </div>
                                    </div>
                                </div>
                        <?php
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