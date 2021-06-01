<!--change account-->
<?php 
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
    <form action="update.php" class="" method="POST">
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
            <label for="password">Old Password: </label>
            </div>
            <div class="col-sm">
            <input type="password" class="form-control  " name="old_pass" required><br>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3 pt-2">
            <label for="password">New Password: </label>
            </div>
            <div class="col-sm">
            <input type="password" class="form-control" name="new_pass" required><br>
            </div>
        </div>

        <div class="row">
                <div class=" text-center">
                      <?php if(isset($_GET['error'])) {?>
                        <div class="alert alert-danger py-2 col-sm-7 ml-5" role="alert">
                        <?php echo $_GET['error']; ?>
                        </div>
                      <?php } ?>  
                </div>  
        </div>
    </div>
        <div class="col-sm float-right ml-5">
            <div class="row">
            <button type="submit" class="btn btn-primary" >
                <i class="fas fa-edit pr-2" ></i>Change password
            </button>
            </div>

            <div class="row">
            <a href="index.php" class="btn btn-danger d-flex align-items-center justify-content-center">
            <i class="bx bx-x-circle fs-5 pr-2" ></i>Cancel
            </a>
            </div>
        </div>
        </form>
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

            
         