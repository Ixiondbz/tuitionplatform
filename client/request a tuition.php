<?php include "../includes/functions.php"; ?>
<?php
connect_to_db();



if (isset($_POST["submit"])) {
    $parent_name = mysqli_real_escape_string($connection,$_POST['parent_name']);  
    $student_name = mysqli_real_escape_string($connection,$_POST['student_name']);
    $student_class = mysqli_real_escape_string($connection,$_POST['student_class']);
    $student_subjects = mysqli_real_escape_string($connection,$_POST['student_subjects']);
    $teaching_location = mysqli_real_escape_string($connection,$_POST['teaching_location']);
    $additional_notes = mysqli_real_escape_string($connection,$_POST['additional_notes']);


    // SAVE INFO TO DATABASE
    $query = queryline("INSERT INTO `tuition request`( `parent name`, `student name`, `student class`, `student subjects`, `teaching location`, `additional notes`) 
                        VALUES ( '$parent_name', '$student_name', '$student_class', '$student_subjects', '$teaching_location', '$additional_notes')");

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed" . mysqli_error($connection));
    } else {
        echo "Form submitted successfully! 😁";
    }
}
?>

<!DOCTYPE html>
<html>

<?php include "includes/header.php"; ?>

<body>
    <?php include "includes/navigation.php"; ?>

    <h1>Request for a tuition </h1>
    <form action="request a tuition.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="parent_name">parent name</label>
            <input type="text" class="form-control" name="parent_name">
        </div>

        <div class="form-group">
            <label for="student_name">student name</label>
            <input type="text" class="form-control" name="student_name">
        </div>

        <div class="form-group">
            <label for="student_class">student class</label>
            <input type="text" class="form-control" name="student_class">
        </div>

        <div class="form-group">
            <label for="student_subjects">student subjects</label>
            <input type="text" class="form-control" name="student_subjects">
        </div>

        <div class="form-group">
            <label for="teaching_location">teaching location</label>
            <input type="text" class="form-control" name="teaching_location">
        </div>

        <div class="form-group">
            <label for="additional_notes">additional notes</label>
            <input type="text" class="form-control" name="additional_notes">
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="submit" value="submit">
        </div>
    </form>


    <?php include "includes/footer.php"; ?>
</body>

</html>