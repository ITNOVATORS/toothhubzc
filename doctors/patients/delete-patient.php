<?php
	$id=$_GET['id'];
	include('../../include/connection.php');
	mysqli_query($con,"delete from `med_stat` where med_id = '$id'");
	mysqli_query($con,"delete from `patient` where patient_id = '$id'");
	mysqli_query($con,"alter table patient auto_increment=1"); 
	mysqli_query($con,"alter table med_stat auto_increment=1"); 
	
	header('location:index.php');
?>