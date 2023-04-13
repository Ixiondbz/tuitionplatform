<?php include "includes/base.php"; ?>


<?php
if (is_logged_in()) {
    // kill all sessions
    // session_destroy();

    // set user session values to null
    
    $_SESSION['user_email']=null;
    $_SESSION['user_phone']=null;
    $_SESSION['user_full_name']=null;
    $_SESSION['user_type']=null;
    
    redirect('../client/login.php');
} else redirect('index.php');
