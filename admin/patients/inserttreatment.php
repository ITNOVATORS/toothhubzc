<?php 
    session_start();

	include '../../include/connection.php';
	
  
	  if($_SERVER['REQUEST_METHOD'] == "POST")
	  {
			$patient_id = $_POST['id'];
			$tooth_num=$_POST['tooth_num'];
			$b=implode(',',$tooth_num);
			$treatment = $_POST['treatment'];	
			$description = $_POST['description'];
			$fee = $_POST['fee'];

			mysqli_query($con, "
			insert into treatment(tooth_num,treatment,description,fee,patient_id)
			values('$b','$treatment','$description','$fee','$patient_id')");

			$query = mysqli_query ($con, "select balance from patient where patient_id = '$patient_id'");
			$row= mysqli_fetch_array($query);
			
			$balance = $row['balance'] + $fee;
			mysqli_query($con, "UPDATE patient SET balance = '$balance' WHERE patient_id= '$patient_id'");    


			echo '<script>alert("Treatment added!")</script>';
			echo '<script>window.location.href = "profile.php?id='.$patient_id.'"</script>';
		

	}
	
?>
			

