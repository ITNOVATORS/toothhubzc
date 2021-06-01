<!DOCTYPE html>
<html>
<head>
	<title>Tooth Hub Dental Clinic</title>
	<link rel="icon" type="image" href="images/logo.png">
	<link rel="stylesheet" href="css/style-index.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/fontawesome/css/fontawesome.css">
	<link href="css/fontawesome/css/all.css" rel="stylesheet">
	
	
	<style>

	.error-msg h2{

	}
	.error-msg{
		background: rgba(225,0,0,0.3);
		margin: 30px 30px 0px 30px;
		padding: 15px;
		font-size: 17px;
		color: red;
		font-family: sans-serif;
	
	}

	i.fa-exclamation-circle{
		color: red;
		font-size: 20px;
		margin-right: 10px;
	}

	.field-icon {
		float: right;
		margin-left: -25px;
		margin-top: -25px;
		position: relative;
		z-index: 2;
		}
	</style>
</head>
<body>	
		<header>
			<div class="logo-header">
				<img src="images/logo4.png">
			</div>
			<div class="text-header">
				<h>Tooth Hub Dental Clinic</h>
			</div>
		</header>


<?php 
		session_start();
			include("include/connection.php");
			include("include/functions.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$admin = "admin";

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
						//read from database
						$query = "select * from users where user_name = '$user_name'";
						$result = mysqli_query($con, $query);

						// Validate password strength
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

						if($result)
						{
							if($result && mysqli_num_rows($result) > 0)
							{

								$user_data = mysqli_fetch_assoc($result);
								
								if($user_data['password'] === $password)
								{
									$_SESSION['user_id'] = $user_data['user_id'];
									mysqli_query($con, "insert into log_user(user_name) values ('$user_name')");
									header("Location: admin/dashboard/");

									die;
								}
								else{
												echo '<div class="error-msg"><i class="fas fa-exclamation-circle"></i>Invalid username or password!</div>';

								}
								
							}
						}
			}
	}
?>


<?php 

		include("include/connection.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
						//read from database
						$query = "select * from user_doc where user_name = '$user_name'";
						$result = mysqli_query($con, $query);

						if($result)
						{
							if($result && mysqli_num_rows($result) > 0)
							{
								$user_data = mysqli_fetch_assoc($result);
								
								if($user_data['password'] === $password)
								{
									$_SESSION['user_id'] = $user_data['user_id'];
									mysqli_query($con, "insert into log_user(user_name) values ('$user_name')");
									header("Location: doctors/dashboard/");

									
									die;
								}
								else{
									echo '<div class="error-msg"><i class="fas fa-exclamation-circle"></i>Invalid username or password!</div>';

					}
							}
						}
					}
				}
?>

<?php 

include("include/connection.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
//something was posted
$user_name = $_POST['user_name'];
$password = $_POST['password'];

if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
{
				//read from database
				$query = "select * from patient where user_name = '$user_name'";
				$result = mysqli_query($con, $query);

				if($result)
				{
					if($result && mysqli_num_rows($result) > 0)
					{
						$user_data = mysqli_fetch_assoc($result);
						
						if($user_data['password'] === $password)
						{
							$_SESSION['user_id'] = $user_data['user_id'];
							mysqli_query($con, "insert into log_user(user_name) values ('$user_name')");
							header("Location: userprofile/");
							die;
						}
						else{
							echo '<div class="error-msg"><i class="fas fa-exclamation-circle"></i>Invalid username or password!</div>';
			}
					}
				}
			}
		}
?>
		


								
		<!--<div class="main">
			<div class="container">
				<div class="title"><span>Login</span></div>
				<form method="POST"> For the mean time
					<div class="row">
						<i class="fas fa-user"></i>
						<input class="inp" type="text" id="user_name" name="user_name" placeholder="Username" required>
					</div>
					
					<div class="row">
						<i class="fas fa-lock"></i>
						<input class="inp" type="password" id="password" name="password" placeholder="Password" required>
						<input type="checkbox" onclick="show_pass()" style = "margin-left:148px" > Show password   
					</div>

					<div class="row ">
					Already have an account?<a href=""> Sign in</a>
					</div>

					<div class="row">
						<input class="btn sub" type="submit" value="Login">

					</div>
			<p style="font-size:13px; text-align: center;">No account? <a href="#" style="padding-left: 2px; color: blue;">Sign up Now!</a></p>
					
						
				</form>
			</div>
		</div>-->




		<script>
			function show_pass() {
			var x = document.getElementById("password");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
			}
		</script>
		
</body>
</html>