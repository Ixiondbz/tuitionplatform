<?php include "../includes/functions.php"; ?>

<?php
#connect to xampp database
connect_to_db();
?>

<!DOCTYPE html>
<html>

<?php include "includes/header.php"; ?>


<body>
    <div id="wrapper">
        <?php include "includes/navigation.php"; ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="container-fluid">
                    <div class="col-xs-13">
                        <table class="table table-bordered table-hover">
                            <!-- <tr>
                                <th>Class</th>
                                <th>Subjects</th>
                                <th>Location</th>
                                <th>Additional notes</th>
                            </tr> -->

                            <div class="container">
                                <div class="row">
                                    <?php
                                    $num_of_results = 3;
                                    if (isset($_GET['page'])) {
                                        $page = $_GET['page'];
                                    } else {
                                        $page = "";
                                    }
                                    if ($page == "" || $page == 1) {
                                        $page_1 = 0;
                                    } else {
                                        // number of rows to be skipped
                                        $page_1 = ($page * $num_of_results) - $num_of_results;
                                    }

                                    read_tuition_requests_with_id_LIMIT($page_1, $num_of_results);
                                    ?>
                                </div>

                            </div>


                        </table>
                    </div>
                </div>

            </div>

            <ul class="pager">
                <?php
                $count = get_count_of_records_in_a_table("tuition request");
                $count = ceil($count / $num_of_results);
                for ($i = 1; $i <= $count; $i++) {
                    if ($i == $page) {
                        echo "<li><a class='active_link' href='tuition list.php?page={$i}'>{$i}</a></li>";
                    } else {
                        echo "<li><a href='tuition list.php?page={$i}'>{$i}</a></li>";
                    }
                }
                ?>
            </ul>
        </div>
    </div>


    <?php include "includes/footer.php"; ?>


</body>

</html>