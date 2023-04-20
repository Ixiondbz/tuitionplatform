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
                            $tuition_id = escape_special_characters($_GET['id']);
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
                                            <a href="tutor application.php?id=<?php echo $tuition_id; ?>" class="card-link"><button>Apply</button></a>

                                            <!-- Load Facebook SDK for JavaScript -->
                                            <!-- <div id="social_media_share"></div>
                                            <script>
                                                (function(d, s, id) {
                                                    var js, fjs = d.getElementsByTagName(s)[0];
                                                    if (d.getElementById(id)) return;
                                                    js = d.createElement(s);
                                                    js.id = id;
                                                    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                                                    fjs.parentNode.insertBefore(js, fjs);
                                                }(document, 'script', 'facebook-jssdk'));
                                            </script>

                                            <div class="fb-share-button" data-href="<?php $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>" data-layout="button">
                                            </div>
                                            <div class="whatsapp-share-button">
                                                <a href="whatsapp://send?text=<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>" data-action="share/whatsapp/share">
                                                    <img src="https://www.freepnglogos.com/uploads/whatsapp-logo-png-31.png" alt="" ">
                                                </a>
                                            </div> -->

                                            <div class="share-buttons">
                                                <a href="https://www.facebook.com/sharer.php?u=<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
                                                    <img src="../logo/fb.png" alt="Share on Facebook">
                                                </a>
                                                <a href="whatsapp://send?text=<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>" data-action="share/whatsapp/share">
                                                    <img src="../logo/whatsapp.png" alt="Share on Whatsapp">
                                                </a>
                                                <a href="https://twitter.com/intent/tweet?text=<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
                                                    <img src="../logo/twitter.png" alt="Share on Twitter">
                                                </a>
                                                <a href="https://www.reddit.com/submit?url=<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
                                                    <img src="../logo/reddit.png" alt="Share on Reddit">
                                                </a>
                                                <a href="mailto:?subject=[Tuition Post]&body=[<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>]">
                                                    <img src="../logo/mail.png" alt="Share via Email">
                                                </a>
                                            </div>

                                            <?php

                                            ?>
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