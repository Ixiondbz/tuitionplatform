<?php include "../includes/functions.php"; ?>
<?php
connect_to_db();
?>
<?php
if(is_logged_in())
{
    redirect('index.php');
}
if (is_method('post')) {
    if (isset($_POST['email_or_phone']) && isset($_POST['password'])) {
        login_user($_POST['email_or_phone'], $_POST['password']);
    } else {
        redirect('login.php');
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
                                <h2 class="text-center">Login</h2>
                                <div class="panel-body">


                                    <form id="login-form" role="form" autocomplete="on" class="form" method="post">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>

                                                <input autocomplete=on name="email_or_phone" type="text" class="form-control" placeholder="Enter your Phone/Email">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                                                <input autocomplete=on name="password" type="password" class="form-control" placeholder="Enter Password">
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <input name="login" class="btn btn-lg btn-primary btn-block" value="Login" type="submit">
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