<?php
	include('../../backend/connection.php');
	$id=$_GET['id'];
	
	$name = $_POST['name'];
	$address = $_POST['address'];
	$birthdate = date('Y-m-d',strtotime($_POST['birthdate']));
	$sex = $_POST['sex'];
	$status = $_POST['status'];
	$occupation = $_POST['occupation'];
	$mobile_num = $_POST['mobile_num'];
	
	header('location:index.php');
?>