
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="icon" type="image" href="../../images/logo.png">
  <link rel="stylesheet" href="../css/dashboard-main.css">
  <link rel="stylesheet" href="../css/main-container.css">
  <link href="../css/fontawesome/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/fontawesome/css/all.css" >
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript" src="../jquery/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <link rel="stylesheet" href="../../css/modal-style.css">
  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  

</head>
<body>

    <div class="row bg-blue d-flex align-items-center fixed-top">
      <div class="col-sm-10">
        <div class="row-sm-12 d-flex align-items-center py-3">
          <img class="img-top" src="../../images/logo4.png"><div class="text text-white pl-1">TOOTH HUB MANAGEMENT SYSTEM</div> 
          </div>
      </div>

    <div class="col-sm-2 text-right pr-5">
        <a type="button" class="btn btn-none text-white dropdown-toggle " data-toggle="dropdown">
          ADMIN
        </a>

  
        <div class="dropdown-menu">
          <p class="pl-4">Admin</p><hr>
          <a class="dropdown-item" href="../settings/">Go to account</a>
          <a class="dropdown-item"  onclick="return confirm('Are You sure you want to logout?')" href="../../include/logout.php">Log out</a>
        </div>
      </div>
      </div>
      <div class="row">
  <div class="sidenav shadow">
    
    <button class="<?php if($page=='dashboard'){echo "active";}?>"><a class="nav" href="../dashboard/"><i class="fas fa-columns"></i>Dashboard</a></button>
    <button class="<?php if($page=='appointment'){echo "active";}?>"><a class="nav" href="../appointments/"><i class="far fa-calendar-check"></i>Requests</a></button>
    <button class="<?php if($page=='patients'){echo "active";}?>"><a class="nav" href="../patients/"><i class="fas fa-users mr-4 pr-2"></i>Patients</a></button>
    <button class="<?php if($page=='schedules'){echo "active";}?>"><a class="nav" href="../schedules/"><i class="fas fa-calendar-alt"></i>Appointments</a></button>
    <button class="<?php if($page=='feedback'){echo "active";}?>"><a class="nav" href="../feedback/"><i class="fas fa-envelope"></i>
    Feedback</a>
        <?php
        include ('../../include/connection.php');
            $query = mysqli_query($con, "select * from `contact_us` where DATE(`time_sent`) = CURDATE()");
            $row = mysqli_num_rows($query);
          ?>
          <span class="badge badge-info"> <?php echo $row; ?></span></button>
          
    <button class="<?php if($page=='settings'){echo "active";}?>"><a class="nav" href="../settings/"><i class="fas fa-sliders-h"></i>Settings</a></button>
    <button class="<?php if($page=='services'){echo "active";}?>"><a class="nav" href="../services/"><i class="fas fa-wrench"></i>Services</a></button>
   
  </div>
  </div>
</body>
</html>
