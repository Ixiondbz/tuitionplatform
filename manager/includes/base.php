<?php include "../includes/functions.php"; ?>
<?php 
connect_to_db();
?>
<?php

if (!is_manager()) {
    redirect('../client/index.php');
}
?>