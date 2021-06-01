<?php 
$page='settings'; 
include '../../include/header.php'; 
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../images/logo.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/style-patients.css">
    <link rel="stylesheet" href="../../css/main-container.css">
    <link rel="stylesheet" href="../../css/fontawesome/css/all.css" >
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/modal-style.css">
    <link rel="stylesheet" href="patients-style.css">
    <script type="text/javascript" src="../../jquery/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
    <form >
    <div class="row">
     
      <div class="col-sm-6">
      <div class="row mb-4">
          <div class="col-sm-4">
            <label for="username">Username: </label>
          </div>
        <div class="col-sm-7">
          <input type="text" class="form-control" value="<?php echo $row['user_name']; ?>" disabled>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-4">
          <label for="password">Password: </label>
        </div>
        <div class="col-sm-7">
          <input type="password" id="password" class="form-control" value="<?php echo $row['password']; ?>" disabled><br>
        </div>
      </div>
      </div>
      <div class="col-sm-6 align-items-center">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-account" style="float:right;">
      <i class="fas fa-edit pr-2" ></i>Change password
      </button>
      </div>
      </form>
      </div>


   
      
      <!--change account-->
      <div class="modal" id="edit-account">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Change password</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <form method="POST" action="update.php">
              <div class="modal-body pt-5">
                <div class="row mb-4">
                <div class="col-sm-4">
                <label for="username">Username: </label>
                  </div>
                  <input type="text" id="user_name" class="form-control" name="user_name">      
                </div>
                  
                <div class="row mb-4 ">
                <div class="col-sm-4">
                <label for="password">Password: </label>
                  </div>

                <input type="text" id="current_password"  class="form-control" name="current_password" >
                </div>

                <div class="row">
                <div class="col-sm-4">
                <label for="password">New Password: </label>
                  </div>
                
                <input type="text" id="new_password" class="form-control" name="new_password" >
                </div>
              </div>
              <div class="modal-footer mt-5">
                <input type="submit"  class="btn btn-success" value="Save">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
            </form>
          </div>
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
