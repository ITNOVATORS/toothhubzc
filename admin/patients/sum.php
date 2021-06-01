<?php 

include ('../../include/connection.php');

    $id = $_GET['id'];
    $query = mysqli_query ($con, "select sum(fee) from treatment where patient_id = '$id'");
    $row= mysqli_fetch_array($query);
    $totalbalance = $row['balance'];
    $query = mysqli_query($con, "UPDATE patient SET balance = '$totalbalance' WHERE patient_id= '$id'");       
      if ($query) {
        echo '<script>alert("Record updated succesfully")</script>';
        echo '<script>window.location("profile.php")</script>';
      } else {
        echo "Error updating record: " . $con->error;
      }


   ?>