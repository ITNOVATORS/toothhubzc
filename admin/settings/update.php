<?php
	include('../../include/connection.php');
	

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$old_pass = $_POST['old_pass'];
		$new_pass = $_POST['new_pass'];
		
		if(($_POST['old_pass']) && ($_POST['new_pass'])){
			$sql = mysqli_query($con, "select * from users where access='admin'");
  
			if(mysqli_num_rows($sql) == 1){

				while($row = mysqli_fetch_assoc($sql)){

					if ($new_pass == $row['password']){
						header("location: change-pass.php?error=New password is the same with the current password");
					} 
					else if ($old_pass != $row['password']) {
						header("location: change-pass.php?error=Current password is incorrect");
					}
					else{
						mysqli_query($con,"update users set password = '$new_pass' where id = 1");
						header("location: index.php");
					}
				}
				
			}

	
		
		
		}
	}
?>
