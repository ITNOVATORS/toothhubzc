<?php
//this is logout page when user click button logout in system page
session_start();
  //  mysqli_query($con, "UPDATE log_user SET logout = date_date=now() WHERE user_id = '$_SESSION[user_name]'");
    
    //mysqli_query($con, "UPDATE log_user SET logout = GETDATE()");
    $_SESSION = NULL;
    session_unset();
    session_destroy();
    header("Location: ../index.php");

    exit;
?>
