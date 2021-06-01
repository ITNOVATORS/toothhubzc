<?php 
$page='settings'; 
include '../../include/header.php'; 
$query=mysqli_query($con,"select * from `users` where id='$id'");
$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Basic MySQLi Commands</title>
</head>
<body>
	<h2>Edit</h2>
	<form method="POST" action="update.php?id=<?php echo $id; ?>">
	</form>
</body>
</html>