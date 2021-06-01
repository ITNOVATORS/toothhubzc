<?php 
    session_start();
  include '../../include/connection.php';
  if(isset($_POST['submit']))  
  {  
    $id = $_GET['id'];
    $pay = $_POST['pay'];  
    $query = mysqli_query ($con, "select balance from patient where patient_id = '$id'");
    $row= mysqli_fetch_array($query);
    $total = $row['balance'] - $pay;
    $query = mysqli_query($con, "UPDATE patient SET balance = '$total' WHERE patient_id= '$id'"); 
    mysqli_query($con, "insert into payments(amount, patient_id) values ('$pay', '$id')");      

      if ($query) {
        echo '<script>alert("Record updated succesfully")</script>';
        echo '<script>window.location.href = "profile.php?id='.$id.'"</script>';
      } else {
        echo "Error updating record: " . $con->error;
      }
        
  }
?>
  


	
								

