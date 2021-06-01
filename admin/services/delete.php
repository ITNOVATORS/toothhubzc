<?php 
include '../../include/connection.php';

    $id = $_GET['id'];

    mysqli_query($con, "delete from services where service_id = '$id'");

    header("location: index.php");

?>