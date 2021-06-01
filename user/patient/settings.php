<?php 

require_once '../require.php';
include '../../include/links.php';
include '../../include/connection.php';
$id = $_SESSION['id'];
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
            <li><a class="dropdown-item" href="../logout.php" onclick="return confirm('Are you sure you want to logout?')" href="../../include/logout.php">Log out</a></li> 
            
          </ul>
        </li>
    </div>
      

  </div>
</nav>

        <div class="container mt-5">
        <nav aria-label="breadcrumb ">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Settings</li>
  </ol>
</nav>
            <div class="lead fs-1 mt-5 mb-5">SETTINGS</div>

         
            <?php
    include ("../../include/connection.php");
    $query=mysqli_query($con,"select * from `users` where id = $id");
    $row=mysqli_fetch_array($query);
    ?>
   
  
    <div class="row bg-white shadow rounded p-4 pt-5 mx-2">
     
      <div class="col-sm-8">
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
            <label for="password">Password: </label>
            </div>
            <div class="col-sm">
            <input type="password" class="form-control " value="<?php echo $row['password']; ?>" disabled><br>
            </div>
        </div>

     

        
    </div>
        <div class="col-sm d-flex justify-content-center my-4">
           
            <a href="change-pass.php" class="btn btn-primary col-sm-5" >
                <i class="bx bx-edit pr-2" ></i>Change password
            </a>
            

        </div>
       
      </div>

            </div>
        </div>
        
                
        <script src="assets/app.js"></script>
    </body>
</html>