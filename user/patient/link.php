<?php 

require_once '../require.php';
include '../../include/links.php';
include '../../include/connection.php';
$id = $_SESSION['id'];
$name = $_SESSION['first_name'];


	include('../../include/connection.php');
	

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$account = $_POST['account'];
		
		if(isset($_POST['account'])){
			
			$sql = mysqli_query($con, "select * from patient where patient_id = '$account' && first_name = '$name'");
  
			if(mysqli_num_rows($sql) == 1){

				while($row = mysqli_fetch_assoc($sql)){
					mysqli_query($con,"update patient set user_id = '$id' where patient_id = $account");
					mysqli_query($con,"update treatment set user_id = '$id' where patient_id = $account");
					mysqli_query($con,"update users set patient_id = '$account' where id= $id");
					mysqli_query($con,"update payments set user_id = '$id' where patient_id = $account");
					mysqli_query($con,"update patient set linked = 1, stat = 'linked' where patient_id = $account");

					$_SESSION['patient_id'] = $account;
					header("location: index.php");
				}
				
			}else{
				echo '<script> alert("No records to link.")</script>';
				echo '<script>window.location.href="index.php"</script>';
			}

	
		
		
		}
	}


?>