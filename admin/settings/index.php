<!--change account-->
<?php 

require_once '../require.php';
$page='settings'; 
include '../../include/header.php'; 
include '../../include/links.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="dashboard-style.css">
    <link rel="stylesheet" href="../../css/main-container.css">
    <link rel="stylesheet" href="../../css/fontawesome/css/all.css" >
    <link rel="stylesheet" href="../../css/scroll.css">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="../../jquery/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="../patients/patients-style.css">
    <script type="text/javascript" src="../../jquery/popper.min.js"></script>
    <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>

</head>
<body style="background-color: #F4F8FC;">
  
  <div class="main-container">
  <?php
    include ("../../include/connection.php");
    $query=mysqli_query($con,"select * from `users`");
    $row=mysqli_fetch_array($query);
    ?>
    <h2 class="mb-2">User Account</h2>
    <hr>
    <br>
  
    <div class="row bg-white shadow rounded p-4 pt-5">
     
      <div class="col-sm-9">
        <div class="row mb-4">
            <div class="col-sm-3">
                <label for="email">Email: </label>
            </div>
            <div class="col-sm">
            <input type="text" class="form-control" value="<?php echo $row['email']; ?>" disabled>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3 pt-2">
            <label for="password">Password: </label>
            </div>
            <div class="col-sm">
            <input type="password" class="form-control " value="<?php echo $row['password']; ?>" disabled><br>
            </div>
        </div>

     

        
    </div>
        <div class="col-sm float-right ml-5">
            <div class="row">
            <a href="change-pass.php" class="btn btn-primary" >
                <i class="fas fa-edit pr-2" ></i>Change password
            </a>
            </div>

        </div>
       
      </div>


   
      
      
  
  


</div>
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

            
         