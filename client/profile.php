<?php include "../includes/functions.php"; ?>
<?php
connect_to_db();
?>
<?php
if (is_logged_in()) {
    // FETCH PROFILE INFORMATION
    $user_phone = $_SESSION['user_phone'];
    $user_email = $_SESSION['user_email'];

    $query = queryline("SELECT user_full_name,user_email,user_phone,user_type,user_image FROM user");
    $query .= queryline("WHERE user_phone=? OR user_email=?");
    $statement = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($statement, 'ss', $user_phone, $user_email);
    mysqli_stmt_execute($statement);
    mysqli_stmt_bind_result($statement, $user_full_name, $user_email, $user_phone, $user_type, $user_image);
    mysqli_stmt_fetch($statement);

    if (!mysqli_stmt_num_rows($statement) === 0) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
    mysqli_stmt_close($statement);

    global $email, $phone;
    $email = $user_email;
    $phone = $user_phone;
    update_profile();
} else
    redirect('index.php');
?>
<!DOCTYPE html>
<html>

<?php include "includes/header.php"; ?>

<body>
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container-fluid">

        <div class="row">
            <!-- Tuition Entries Column -->
            <div class="col-lg-12">
                <!-- <h4>Profile</h4> -->



            </div>

            <!-- Tuition Sidebar Widgets Column -->
            <div class="">
            <h2>Profile</h2>
                <!-- Tuition Search Well -->
                <div class="well">
                    
                    <form action="profile.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="post_content">Name</label>
                            <input name="user_full_name" class="form-control" type="text" value="<?php echo $user_full_name; ?>">
                        </div>

                        <div class="form-group">
                            <label for="post_content">Type</label>
                            <select name="user_type" id="">
                                <?php
                                $d_query = queryline("SELECT * FROM `user type`");
                                $user_types = mysqli_query($connection,$d_query);
                                if (isset($user_type))
                            echo "<option selected'>{$user_type}</option>";
                                while($row = mysqli_fetch_assoc($user_types))
                                {
                                    $user_type_id = $row['id'];
                                    $user_type_name = $row['type_name'];

                                    if ($user_type !== $user_type_name)
                                    echo "<option value='$user_type_name'>{$user_type_name}</option>";
                                }
                                
                                ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="post_content">Email</label>
                            <input name="user_email" class="form-control" type="text" value="<?php echo $user_email; ?>">
                        </div>

                        <div class="form-group">
                            <label for="post_content">Phone</label>
                            <input name="user_phone" class="form-control" type="text" value="<?php echo $user_phone; ?>">
                        </div>

                        <div class="form-group">
                            <label for="post_content">Image</label>
                            <img width="100" src="../images/<?php
                                                            if (isset($user_image)) {
                                                                echo $user_image;
                                                            }
                                                            ?>" alt="">
                            <input name="image" class="form-control" type="file" value="<?php echo $user_image; ?>">
                        </div>

                        <div class="form-group">
                            <input name="update" class="btn btn-primary" type="submit" value="Save">
                        </div>
                    </form>

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

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
</body>

</html>