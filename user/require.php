
<?php 
    session_start();
    require_once '../../include/connection.php';

    if(!$_SESSION['id']){
        header("location: ../../index.php");
    }

?>