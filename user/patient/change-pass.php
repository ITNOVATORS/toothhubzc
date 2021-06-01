<?php 

require_once '../require.php';
include '../../include/links.php';
include '../../include/connection.php';
$id = $_SESSION['id'];


	include('../../include/connection.php');
	

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$old_pass = $_POST['old_pass'];
		$new_pass = $_POST['new_pass'];
		
		if(($_POST['old_pass']) && ($_POST['new_pass'])){
			$sql = mysqli_query($con, "select * from users where id = '$id'");
  
			if(mysqli_num_rows($sql) == 1){

				while($row = mysqli_fetch_assoc($sql)){

					if ($new_pass == $row['password']){
						header("location: change-pass.php?error=New password is the same with the current password");
					} 
					else if ($old_pass != $row['password']) {
						header("location: change-pass.php?error=Current password is incorrect");
					}
					else{
						mysqli_query($con,"update users set password = '$new_pass' where id = '$id'");
						header("location: settings.php");
					}
				}
				
			}

	
		
		
		}
	}


?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image" href="../../images/logo.png">
        <link rel="stylesheet" href="../../css/all.css">
        <link rel="stylesheet" href="assets/custom-file.css">
        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <title>Tooth Hub Dental Clinic</title>
        <!--========== CSS ==========-->
        <link rel="stylesheet" href="assets/style.css">
        
    </head>
    <body>
 


    
   <nav class="navbar navbar-expand-lg navbar-light bg-blue ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> <img src="../../images/logo4.png" alt="" class=" ml-0" height=35></a>
    <div class="mx-auto">
        <div class="lead text-white">TOOTH HUB DENTAL CLINIC</div>
      </div>
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars text-white fs-2"></span>
    </button>
      
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <div class="mx-auto"></div>
      <li class=" nav-link dropdown mr-0 ml-0 pl-0 pr-0">
          <a class="nav-link dropdown-toggle  ml-auto pl-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ACCOUNT
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            
            <li><a class="dropdown-item" href="settings.php">Settings</a></li>
            <li><a class="dropdown-item" href="../logout.php" onclick="return confirm('Are You sure you want to logout?')" href="../../include/logout.php">Log out</a></li> 
            
          </ul>
        </li>
    </div>
      

  </div>
</nav>

        <div class="container">
            <div class="lead fs-1 mt-5 mb-5">SETTINGS</div>

         
            <?php
    include ("../../include/connection.php");
    $query=mysqli_query($con,"select * from `users` where id = '$id'");
    $row=mysqli_fetch_array($query);
    ?>
    
    <form action="change-pass.php" class="" method="POST">
    <div class="row bg-white shadow rounded p-4 pt-5">
    <div class="row d-flex justify-content-center mb-4">
                <div class=" text-center">
                      <?php if(isset($_GET['error'])) {?>
                        <div class="alert alert-danger py-2 mx-5" role="alert">
                        <?php echo $_GET['error']; ?>
                        </div>
                      <?php } ?>  
                </div>  
        </div>
    
        <div class="row mb-4">
            <div class="col-sm-4">
                <label for="email">Email: </label>
            </div>
            <div class="col-sm">
            <input type="text" class="form-control" value="<?php echo $row['email']; ?>" disabled>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 pt-2">
            <label for="password">Old Password: </label>
            </div>
            <div class="col-sm">
            <input type="password" class="form-control  " name="old_pass" required><br>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 pt-2">
            <label for="password">New Password: </label>
            </div>
            <div class="col-sm">
            <input type="password" class="form-control" name="new_pass" required><br>
            </div>
        </div>

        
    
        <div class="row d-flex justify-content-center mb-4">
        <div class="col-sm-6">
            <div class="row">
            <div class="col-sm mt-4">
                <button type="submit" class="btn btn-primary px-4" >
                    <i class="bx bx-edit pr-2"></i>Change password
                </button>
            </div>

            <div class="col-sm mt-4">
           
                <a href="settings.php" class="btn btn-danger">
                <i class="bx bx-x-circle fs-5 pr-2"></i>Cancel
            </a>
            </div>
            </div>
        </div>
        </form>
        </div>
      </div>
        
                
        <script src="assets/app.js"></script>
    </body>
</html>