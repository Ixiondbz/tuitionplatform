<?php ob_start();
?>
<?php
session_start();

function update_user_online_status()
{
    global $connection;
    $session = session_id();
    $time = time();
    $time_out_in_seconds = 60;
    $time_out = $time - $time_out_in_seconds;

    $query = queryline("SELECT * FROM users_online WHERE session = '$session'");
    $send_query = mysqli_query($connection, $query);
    $count = mysqli_num_rows($send_query);

    if ($count == NULL) {
        mysqli_query($connection, "INSERT INTO users_online(session,time) VALUES('$session','$time')");
    } else {
        mysqli_query($connection, "UPDATE users_online SET time='$time' WHERE session='$session'");
    }
}
function count_clients_online()
{
    global $connection;
    $time = time();
    $time_out_in_seconds = 60;
    $time_out = $time - $time_out_in_seconds;
    $users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
    $count_user = mysqli_num_rows($users_online_query);
    return $count_user;
}
function connect_to_db()
{
    global $connection;
    $connection = mysqli_connect('localhost', 'root', '', 'tuitionplatform');
    if (!$connection) {
        echo "Failed to connect to database! 😥";
    }
}
function queryline($query_string)
{
    return $query_string . " ";
}

function echobr($string_var)
{
    echo $string_var;
    echo "<br>";
}

/* this is more manager page */
function read_tuition_requests()
{
    global $connection;
    // GET INFO FROM DATABASE
    $query = queryline("SELECT * FROM `tuition request`");

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed" . mysqli_error($connection));
    } else {
        while ($row = mysqli_fetch_assoc($result)) {

            $id = $row['id'];

?>
            <tr>
                <?php
                foreach ($row as $key => $value) {
                ?>
                    <td>
                        <?php
                        echo $value;
                        ?>
                    </td>

                <?php
                }

                ?>
                <?php
                echo "<td>
                 <a href='tuition requests.php?delete={$id}'>Delete</a>
                 </td>";
                echo "<td>
                 <a href='tuition requests.php?edit={$id}'>Edit</a>
                 </td>";
                ?>

            </tr>


        <?php
        }
    }
}
function read_tuition_requests_with_id()
{
    global $connection;
    // GET INFO FROM DATABASE
    $query = queryline("SELECT `id`,`student class`, `student subjects`, 
    `teaching location` 
    FROM `tuition request`");

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed" . mysqli_error($connection));
    } else {
        while ($row = mysqli_fetch_assoc($result)) {

        ?>

            <?php

            ?>


            <div class="col-md-6">
                <div class="card" style="border: 0.5px dotted; padding-bottom:5px ;">
                    <div class="card-body">
                        <h5 class="card-title">Tutor needed for</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['student class'] . ", " . $row['teaching location']; ?></h6>
                        <p class="card-text"> <?php echo "Subjects: " . $row['student subjects']; ?> </p>
                        <a href="tuition info.php?edit=<?php echo $row['id']; ?>" class="card-link">See more details..</a>

                    </div>
                </div>
            </div>
            <?php


            ?>



        <?php
        }
    }
}
function get_count_of_records_in_a_table($table)
{
    global $connection;
    $query = queryline("SELECT COUNT(*) FROM `{$table}`");
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $count_of_records_in_the_table = $row['COUNT(*)'];
    }
    return $count_of_records_in_the_table;
}
function read_tuition_requests_without_id()
{
    global $connection;
    // GET INFO FROM DATABASE
    $query = queryline("SELECT `student class`, `student subjects`, 
    `teaching location` 
    FROM `tuition request`");

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed" . mysqli_error($connection));
    } else {
        while ($row = mysqli_fetch_assoc($result)) {

        ?>

            <?php

            ?>


            <div class="col-md-6">
                <div class="card" style="border: 0.5px dotted; padding-bottom:5px ;">
                    <div class="card-body">
                        <h5 class="card-title">Tutor needed for</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['student class'] . ", " . $row['teaching location']; ?></h6>
                        <p class="card-text"> <?php echo "Subjects: " . $row['student subjects']; ?> </p>
                        <a href="tuition info.php?edit=<?php echo $row['asd']; ?>" class="card-link">See more details..</a>

                    </div>
                </div>
            </div>
            <?php


            ?>



        <?php
        }
    }
}
function read_tuition_requests_with_id_LIMIT($num_of_rows_skipped, $num_of_results)
{
    global $connection;
    // GET INFO FROM DATABASE
    $query = queryline("SELECT `id`,`student class`, `student subjects`, 
    `teaching location` 
    FROM `tuition request`");
    $query .= queryline("LIMIT $num_of_rows_skipped,$num_of_results");

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed" . mysqli_error($connection));
    } else {
        while ($row = mysqli_fetch_assoc($result)) {

        ?>

            <?php

            ?>


            <div class="col-md-6">
                <div class="card" style="border: 0.5px dotted; padding-bottom:5px ;">
                    <div class="card-body">
                        <h5 class="card-title">Tutor needed for</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['student class'] . ", " . $row['teaching location']; ?></h6>
                        <p class="card-text"> <?php echo "Subjects: " . $row['student subjects']; ?> </p>
                        <a href="tuition info.php?edit=<?php echo $row['id']; ?>" class="card-link">See more details..</a>

                    </div>
                </div>
            </div>
            <?php


            ?>



        <?php
        }
    }
}
function escape_special_characters($string_with_special_characters)
{
    global $connection;

    $string_without_special_characters = mysqli_real_escape_string($connection, $string_with_special_characters);
    return $string_without_special_characters;
}
function update_tuition_requests()
{
    /* This function receives the post request of the selected id(row in the table)
        and updates it in the db table
    */

    global $connection;
    // UPDATE QUERY
    if (isset($_POST['update'])) {
        $edit_id = escape_special_characters($_POST['edit_id']);

        $parent_name = escape_special_characters($_POST['parent_name']);
        $student_name = escape_special_characters($_POST['student_name']);
        $student_class = escape_special_characters($_POST['student_class']);
        $student_subjects = escape_special_characters($_POST['student_subjects']);
        $teaching_location = escape_special_characters($_POST['teaching_location']);
        $additional_notes = escape_special_characters($_POST['additional_notes']);


        $query = queryline("UPDATE `tuition request` 
        SET `student name`='{$student_name}', `parent name`='{$parent_name}',
        `student class`='{$student_class}', `student subjects`='{$student_subjects}',
        `teaching location`='{$teaching_location}', `additional notes`='{$additional_notes}'
        WHERE id={$edit_id} ");

        $update_query = mysqli_query($connection, $query);

        if (!$update_query) {
            die("QUERY FAILED");
        } else {
            // echo "Query successful 😄";
            echo "Updated 😄. <a href='../client/tuition info.php?edit=" . $edit_id . "'>View the post</a>";
        }
    }
}
function update_clients()
{
    /* This function receives the post request of the selected id(row in the table)
        and updates it in the db table
    */

    global $connection;
    // UPDATE QUERY
    if (isset($_POST['update'])) {
        $user_id = escape_special_characters($_POST['user_id']);
        $user_full_name = escape_special_characters($_POST['user_full_name']);
        $user_email = escape_special_characters($_POST['user_email']);
        $user_phone = escape_special_characters($_POST['user_phone']);
        $user_type = escape_special_characters($_POST['user_type']);

        $user_image = $_FILES['image']['name'];
        $user_image_temp = $_FILES['image']['tmp_name'];

        move_uploaded_file($user_image_temp, "../images/$user_image");

        if (empty($user_image)) {
            $query = queryline("SELECT user_image FROM user WHERE user_id=$user_id");
            $user_image = mysqli_query($connection, $query);
            $row = mysqli_fetch_row($user_image);
            $user_image = $row[0];
        }

        $query = queryline("UPDATE `user` 
        SET `user_full_name`='{$user_full_name}', `user_email`='{$user_email}',
        `user_phone`='{$user_phone}', `user_type`='{$user_type}',
        `user_image`='{$user_image}'
        WHERE user_id={$user_id} ");

        $update_query = mysqli_query($connection, $query);

        if (!$update_query) {
            die("QUERY FAILED");
        } else {
            echo "Query successful 😄";
            header("Location: clients.php");
        }
    }
}

function get_tuition_info()
{
}

function update_profile()
{
    global $connection;
    global $email, $phone;
    if (isset($_POST['update'])) {
        // echo $email;
        // echo $phone;
        $user_full_name = escape_special_characters($_POST['user_full_name']);
        $user_type = escape_special_characters($_POST['user_type']);
        $user_email = escape_special_characters($_POST['user_email']);
        $user_phone = escape_special_characters($_POST['user_phone']);

        $user_image = $_FILES['image']['name'];
        $user_image_temp = $_FILES['image']['tmp_name'];

        move_uploaded_file($user_image_temp, "../images/$user_image");

        if (empty($user_image)) {
            $query = queryline("SELECT user_image FROM user");
            $query .= queryline("WHERE user_email='{$email}' OR user_phone='{$phone}'");
            $user_image_result = mysqli_query($connection, $query);
            $row = mysqli_fetch_row($user_image_result);
            $user_image = $row[0];
        }

        $query = queryline("UPDATE user ");
        $query .= queryline("SET user_full_name = ?, user_type = ?, user_email = ?, user_phone = ?, user_image = ?");
        $query .= queryline("WHERE user_phone='{$phone}' OR user_email='{$email}'");
        $statement = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param(
            $statement,
            'sssss',
            $user_full_name,
            $user_type,
            $user_email,
            $user_phone,
            $user_image,

        );
        mysqli_stmt_execute($statement);

        if (!mysqli_stmt_affected_rows($statement) === 0) {
            die("QUERY FAILED" . mysqli_error($connection));
        }

        // echo "<div class='alert alert-success' role='alert'> Saved 😊. <a href='profile.php'>Reload</a>
        // </div>";
        // echo "Saved 😊. <a href='profile.php'>Reload</a>";

        echo "Saved 😊. <a href='profile.php'>Reload</a> ";
    }
}
function edit_tuition_requests()
{
    /* This function generates a form of text boxes prefilled with the information of the selected id(row in the table)*/
    global $connection;
    // EDIT QUERY
    if (isset($_GET['edit'])) {
        $edit_id = $_GET['edit'];
        $query = queryline("SELECT * FROM `tuition request` WHERE id={$edit_id}");
        $tuition_request = mysqli_query($connection, $query);

        // GENERATE TEXT BOXES SHOWING INFO OF THE SELECTED ROW
        while ($row = mysqli_fetch_assoc($tuition_request)) {
            $id = $row['id'];
            $parent_name = $row['parent name'];
            $student_name = $row['student name'];
            $student_class = $row['student class'];
            $student_subjects = $row['student subjects'];
            $teaching_location = $row['teaching location'];
            $additional_notes = $row['additional notes'];
        ?>

            <form action="tuition requests.php" method="post">

                <input type="hidden" name="edit_id" value="<?php if (isset($id)) {
                                                                echo $id;
                                                            } ?>" />


                <input value="<?php if (isset($parent_name)) {
                                    echo $parent_name;
                                } ?>" type="text" name="parent_name" id="">

                <input value="<?php if (isset($student_name)) {
                                    echo $student_name;
                                } ?>" type="text" name="student_name" id="">

                <input value="<?php if (isset($student_class)) {
                                    echo $student_class;
                                } ?>" type="text" name="student_class" id="">

                <input value="<?php if (isset($student_subjects)) {
                                    echo $student_subjects;
                                } ?>" type="text" name="student_subjects" id="">

                <input value="<?php if (isset($teaching_location)) {
                                    echo $teaching_location;
                                } ?>" type="text" name="teaching_location" id="">

                <input value="<?php if (isset($additional_notes)) {
                                    echo $additional_notes;
                                } ?>" type="text" name="additional_notes" id="">


                <input type="submit" name="update" value="update">

            </form>

        <?php
        }
    }
}
function read_clients()
{
    // Read all rows from 'user' table such that it doesn't have 'manager' as its user_type
    global $connection;

    $query = queryline("DESC user");
    $statement = mysqli_prepare($connection, $query);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    echo "<tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['Field'] === 'user_password') {
            continue;
        } else {
            echo "<th>";
            echo $row['Field'];
            echo "</th>";
        }
    }

    echo "</tr>";


    $excluded_user_type = 'manager';
    $query = queryline("SELECT * FROM user");
    $query .= queryline("WHERE user_type != ? ");
    $statement = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($statement, 's', $excluded_user_type);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);



    while ($row = mysqli_fetch_assoc($result)) {
        $user_id = $row['user_id'];
        echo "<tr>";
        foreach ($row as $key => $value) {
            if ($key === 'user_password') {
                continue;
            } else if ($key === 'user_image') {
                echo "<td><img width='40' src='../images/$value' alt='image'></td>";
            } else {
                echo "<td>" . $value . "</td>";
            }
        }
        echo "<td>
                 <a href='clients.php?delete={$user_id}'>Delete</a>
                 </td>";
        echo "<td>
                 <a href='clients.php?edit={$user_id}'>Edit</a>
                 </td>";

        echo "</tr>";
    }
}

function delete_clients()
{
    global $connection;
    // DELETE QUERY
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $query = queryline("DELETE FROM `user` WHERE id={$delete_id}");
        $delete_query = mysqli_query($connection, $query);
        echo "Deleted successfully";
        header("Location: clients.php");
    }
}

function edit_clients()
{
    /* This function generates a form of text boxes prefilled with the information of the selected id(row in the table)*/
    global $connection;
    // EDIT QUERY
    if (isset($_GET['edit'])) {
        $edit_id = $_GET['edit'];
        $query = queryline("SELECT * FROM `user` WHERE user_id={$edit_id}");
        $tuition_request = mysqli_query($connection, $query);

        // GENERATE TEXT BOXES SHOWING INFO OF THE SELECTED ROW
        while ($row = mysqli_fetch_assoc($tuition_request)) {
            $user_id = $row['user_id'];
            $user_full_name = $row['user_full_name'];
            $user_email = $row['user_email'];
            $user_phone = $row['user_phone'];
            $user_type = $row['user_type'];
            $user_image = $row['user_image'];
        ?>

            <form action="clients.php" method="post" enctype="multipart/form-data">

                <input type="hidden" name="user_id" value="<?php if (isset($user_id)) {
                                                                echo $user_id;
                                                            } ?>" />




                <div class="form-group">
                    <label for="">Name</label>
                    <input value="<?php if (isset($user_full_name)) {
                                        echo $user_full_name;
                                    } ?>" type="text" name="user_full_name" id="">
                </div>
                <div class="form-group">
                    <label for="">Email</label>

                    <input value="<?php if (isset($user_email)) {
                                        echo $user_email;
                                    } ?>" type="text" name="user_email" id="">
                </div>
                <!-- <div class="form-group">
</div> -->

                <div class="form-group">
                    <label for="">Phone</label>

                    <input value="<?php if (isset($user_phone)) {
                                        echo $user_phone;
                                    } ?>" type="text" name="user_phone" id="">
                </div>




                <div class="form-group">
                    <label for="">Type</label>
                    <select name="user_type" id="">
                        <?php
                        $d_query = queryline("SELECT * FROM `user type`");
                        $user_types = mysqli_query($connection, $d_query);

                        // The value returned by the database should be chosen in dropdown menu by default
                        if (isset($user_type))
                            echo "<option selected'>{$user_type}</option>";
                        while ($row = mysqli_fetch_assoc($user_types)) {
                            $user_type_id = $row['id'];
                            $user_type_name = $row['type_name'];

                            // if (isset($user_type) and $user_type === $user_type_name)
                            //     echo "<option selected'>{$user_type}</option>";
                            // else
                            if ($user_type !== $user_type_name)
                                echo "<option value='$user_type_name'>{$user_type_name}</option>";
                        }

                        ?>

                    </select>

                </div>

                <div class="form-group">
                    <label for="">Image</label>

                    <img width="100" src="../images/<?php
                                                    if (isset($user_image)) {
                                                        echo $user_image;
                                                    }
                                                    ?>" alt="">
                    <input type="file" name="image">
                </div>

                <input type="submit" name="update" value="update">

            </form>

            <?php
        }
    }
}



function delete_tuition_requests()
{
    global $connection;
    // DELETE QUERY
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $query = queryline("DELETE FROM `tuition request` WHERE id={$delete_id}");
        $delete_query = mysqli_query($connection, $query);
        echo "Deleted successfully";
        header("Location: tuition requests.php");
    }
}

function search_tuitions_by_location()
{
    global $connection;

    if (isset($_POST['submit'])) {
        $search_string = escape_special_characters($_POST['search']);

        $query = queryline("SELECT `id`,`student class`, `student subjects`, 
        `teaching location` FROM `tuition request`
                           WHERE `teaching location` LIKE '%$search_string%'");

        $search_query = mysqli_query($connection, $query);
        if (!$search_query) {
            die('QUERY FAILED');
        } else {
            $count = mysqli_num_rows($search_query);
            if ($count == 0) {
                echo "no search results found ☹️";
            } else {
            ?>
                <?php
                if (!$search_query) {
                    die("Query Failed" . mysqli_error($connection));
                } else {
                    while ($row = mysqli_fetch_assoc($search_query)) {



                ?>
                        <div class="col-md-6">
                            <div class="card" style="border: 0.5px dotted; padding-bottom:5px ;">
                                <div class="card-body">
                                    <h5 class="card-title">Tutor needed for</h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['student class'] . ", " . $row['teaching location']; ?></h6>
                                    <p class="card-text"> <?php echo "Subjects: " . $row['student subjects']; ?> </p>
                                    <a href="tuition info.php?edit=<?php echo $row['id']; ?>" class="card-link">See more details..</a>

                                </div>
                            </div>
                        </div>


                <?php
                    }
                }

                ?>

            <?php
            }
        }
    }
}

function search_tuitions_by_location_LIMIT($num_of_rows_skipped, $num_of_results)
{
    global $connection;

    if (isset($_POST['submit'])) {
        $search_string = escape_special_characters($_POST['search']);

        $query = queryline("SELECT `id`,`student class`, `student subjects`, 
        `teaching location` FROM `tuition request`
                           WHERE `teaching location` LIKE '%$search_string%'");
        $query .= queryline("LIMIT $num_of_rows_skipped,$num_of_results");

        $search_query = mysqli_query($connection, $query);
        if (!$search_query) {
            die('QUERY FAILED');
        } else {
            $count = mysqli_num_rows($search_query);
            if ($count == 0) {
                echo "no search results found ☹️";
            } else {
            ?>
                <?php
                if (!$search_query) {
                    die("Query Failed" . mysqli_error($connection));
                } else {
                    while ($row = mysqli_fetch_assoc($search_query)) {



                ?>
                        <div class="col-md-6">
                            <div class="card" style="border: 0.5px dotted; padding-bottom:5px ;">
                                <div class="card-body">
                                    <h5 class="card-title">Tutor needed for</h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['student class'] . ", " . $row['teaching location']; ?></h6>
                                    <p class="card-text"> <?php echo "Subjects: " . $row['student subjects']; ?> </p>
                                    <a href="tuition info.php?edit=<?php echo $row['id']; ?>" class="card-link">See more details..</a>

                                </div>
                            </div>
                        </div>


                <?php
                    }
                }

                ?>

<?php
            }
        }
    }
}

function get_count_of_records_in_tuitions_by_location($location)
{
    global $connection;
    $query = queryline("SELECT COUNT(*) FROM `tuition request`");
    $query .= queryline("WHERE `teaching location` LIKE '%$location%'");
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $count_of_records_in_the_table = $row['COUNT(*)'];
    }
    return $count_of_records_in_the_table;
}

function is_method($method = null)
{
    if ($_SERVER['REQUEST_METHOD'] == strtoupper($method)) {

        return true;
    }

    return false;
}

function redirect($location)
{
    header("Location:" . $location);
    exit;
}

function login_user($email_or_phone, $password)
{
    global $connection;
    $email_or_phone = mysqli_real_escape_string($connection, trim($email_or_phone));
    $password = mysqli_real_escape_string($connection, trim($password));

    $query = queryline("SELECT * from user WHERE user_email = ? OR user_phone = ?");
    $statement = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($statement, 'ss', $email_or_phone, $email_or_phone);
    mysqli_stmt_execute($statement);
    mysqli_stmt_bind_result($statement, $user_id, $user_full_name, $user_email, $user_phone, $user_type, $user_password, $user_image);
    mysqli_stmt_fetch($statement);

    if (!mysqli_stmt_num_rows($statement) === 0) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    $db_user_id = $user_id;
    $db_user_full_name = $user_full_name;
    $db_user_email = $user_email;
    $db_user_phone = $user_phone;
    $db_user_type = $user_type;
    $db_user_password = $user_password;
    $db_user_image = $user_image;


    if (password_verify($password, $db_user_password)) {

        $_SESSION['user_email'] = $db_user_email;
        $_SESSION['user_phone'] = $db_user_phone;
        $_SESSION['user_full_name'] = $db_user_full_name;
        $_SESSION['user_type'] = $db_user_type;
        // return;
        redirect("index.php");
    } else {
        echo "authentication failed";

        return false;
    }


    return true;
}
function get_email_or_blank($str)
{
    $email_regex = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E\\pL\\pN]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F\\pL\\pN]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E\\pL\\pN]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F\\pL\\pN]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iDu';
    if (preg_match($email_regex, $str)) {
        return $str;
    }
    return '';
}
function get_phone_or_blank($str)
{
    $phone_regex = '/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/';
    if (preg_match($phone_regex, $str)) {
        return $str;
    }
    return '';
}
function register_user($email_or_phone, $password)
{

    global $connection;

    $email_or_phone = mysqli_real_escape_string($connection, $email_or_phone);
    $password = password_hash(mysqli_real_escape_string($connection, $password), PASSWORD_BCRYPT, array('cost' => 12));
    // echo "asd";
    // return;
    $email = get_email_or_blank($email_or_phone);
    $phone = get_phone_or_blank($email_or_phone);

    $query = queryline("INSERT INTO user(user_email, user_phone, user_password)");
    $query .= queryline("VALUES(?,?,?)"); // order: user_email, user_phone, user_password
    $statement = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($statement, 'sss', $email, $phone, $password);
    mysqli_stmt_execute($statement);

    if (!mysqli_stmt_affected_rows($statement) === 0) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    echo "Registration successful! You can Login now. 😊";
}

function is_logged_in()
{
    return (isset($_SESSION['user_email']) or isset($_SESSION['user_phone']));
}
function is_manager()
{
    return is_logged_in() and ($_SESSION['user_type'] === 'manager');
}
?>