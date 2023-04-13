<?php include "../includes/functions.php"; ?>
<?php
connect_to_db();
?>
<?php ob_start();
if (is_logged_in()) {
    redirect('index.php');
}
if (is_method('post')) {
    if (isset($_POST['email_or_phone']) && isset($_POST['password1']) && isset($_POST['password2']) && $_POST['password1'] === $_POST['password2'] && $_POST['email_or_phone'] !== '' && $_POST['password1'] !== '') {
        register_user($_POST['email_or_phone'], $_POST['password1']);
    } else {
        echo "Error! Please fill up all of the fields and follow the instructions carefully.";
    }
}

?>

<!DOCTYPE html>
<html>

<?php include "includes/header.php"; ?>

<body>
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="form-gap"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">


                                <h3><i class="fa fa-user fa-4x"></i></h3>
                                <h2 class="text-center">Register</h2>
                                <div class="panel-body">


                                    <form id="login-form" role="form" autocomplete="off" class="form" method="post">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>

                                                <input autocomplete=off name="email_or_phone" type="text" class="form-control" placeholder="Enter your Phone/Email">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                                                <input autocomplete=off name="password1" type="password" class="form-control" placeholder="Enter Password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                                                <input autocomplete=off name="password2" type="password" class="form-control" placeholder="Enter the Password above again">
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <input name="register" class="btn btn-lg btn-primary btn-block" value="Register" type="submit">
                                        </div>


                                    </form>

                                </div><!-- Body-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>



    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
</body>

</html>