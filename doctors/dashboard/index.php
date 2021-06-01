<?php 
  $page ='dashboard'; 
  include '../../include/header.php'; 
  include '../../include/connection.php'; 
  
  
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="dashboard-style.css">
    <link rel="stylesheet" href="../../css/main-container.css">
    <link rel="stylesheet" href="../../css/fontawesome/css/all.css" >
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="../../jquery/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="../patients/patients-style.css">
    <script type="text/javascript" src="../../jquery/popper.min.js"></script>
    <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #F4F8FC;">
  
  <div class="main-container">
<div class="container">
    <div class="row">
      <div class="col-sm-3 con space">
          <?php
            $query = mysqli_query($con, "select * from `patient`");
            $row = mysqli_num_rows($query);
            echo '<h1 class="count"> ' .$row. '</h1>';
          ?>
          <p class="desc">NUMBER OF PATIENTS</p>
      </div>

      <div class="col-sm-3 con space">
      <?php
            $query = mysqli_query($con, "select * from `request_apnt`");
            $row = mysqli_num_rows($query);
            echo '<h1 class="count"> ' .$row. '</h1>';
          ?>
          <p class="desc">APPOINTMENT REQUESTS</p>
      </div>

      <div class="col-sm-3 con">
          <h1 class="count">10</h1>
          <p class="desc">NUMBER OF SERVICES</p>
      </div>
    </div>
    
    
    <div class="row mt-5">
      <div class="col-sm-7 col mt-5">
      <div class="h5">Recent Appointment Request</div> 
      </button>
      </div>
      <div class="col-sm-5  mt-5">
      <input class="form-control float-right" id="search" type="text" placeholder="Search..">
      </div>
    </div>
    <div class="col-sm-12 float-right">
        <a href="../appointments/" class="float-right text-info">View all appointments >></a>
      </div>   
    <div class="row justify-content-center">
    <table class="tbl_list" id="table">
			<thead>
        <th>Date</th>   
        <th>Time</th>
				<th>Customer</th>
				<th>Service</th>
        <th>Status</th>
				
			</thead>
			<tbody>
				<?php
        $query=mysqli_query($con,"select * from `request_apnt`");
        while($row=mysqli_fetch_array($query)){
        ?>
        
            <tr> 
            <td><?php echo date('m-d-Y', strtotime($row['app_date'])); ?></td>
							<td><?php echo date('h:i a', strtotime($row['app_time']));?></td>
							<td><?php echo $row['name']; ?></td>
              <td><?php echo $row['service'];?></td>
              <td>Pending</td>

					
						</tr>
          <?php
        }
      ?>

          
			</tbody>
     
		</table>
  
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
    </div>
  
</body>
</html>
