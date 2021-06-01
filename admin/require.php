
<?php 
    session_start();
    require_once '../../include/connection.php';

    if(!$_SESSION['role']){
        header("location: ../../index.php");
    }



    echo '<script src="../../js/smooth-scroll.js"></script>';

?>