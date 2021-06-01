<?php 
require_once '../require.php';
$page='history'; include '../../include/header.php';
include ('../../include/connection.php');
include '../../include/links.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Patients</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../images/logo.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/style-patients.css">
    <link rel="stylesheet" href="../../css/main-container.css">
    <link rel="stylesheet" href="../../css/fontawesome/css/all.css" >
    <link rel="stylesheet" href="../../css/scroll.css">
    <link href="../css/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/modal-style.css">
    <link rel="stylesheet" href="../patients/patients-style.css">
    <script type="text/javascript" src="../../jquery/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color: #F4F8FC;">


  
  <div class="main-container">
  
  <div class="row">
      
      <div class="col-sm-7">
        <a href="delete.php" onclick="return confirm('This will clear the log history. Continue?');" class="btn btn-danger"> <i class="fas fa-trash"></i> Clear history</a>
      </div>

      <div class="col-sm-5">
        <input class="form-control float-right" id="search" type="text" placeholder="Search..">
      </div>
  </div>
    

    <!--Table list of patients-->
<div class="row">
  <div class="container">
    <table  style="width:100%" class="tbl_list" id=table>
				<th width="30%">User</th>
				<th>Login time</th>
				<th>Logout time</th>
			
			</thead>
			<tbody>
				<?php
        $query=mysqli_query($con,"select * from `log_user`");
        
        while($row=mysqli_fetch_array($query)){
        ?>
            <tr> 
							<td><?php echo $row['user_name']; ?></td>
							<td><?php echo $row['login']; ?></td>
              <td><?php echo $row['logout'];?></td>					
              </tr>
          <?php
        }
      ?>

          
			</tbody>
     
		</table>
    </div>
  </div>

  </div>
  <script>
  $(document).ready(function(){
    $("#search").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#table tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>
  
</body>
</html>

// <?php
//require_once ('connections.php');
// this is logout page when user click button logout in system page

//session_start();
//$time = date("H:i:s");
//$date = date("Y-m-d");
//mysqli_query($conn, "UPDATE log_user SET logout = '$time' WHERE user_name = '$_SESSION[user_name]'");
//$_SESSION = NULL;
//$_SESSION = [];
//session_unset();
//session_destroy();
//header("location:index.php");
//?>