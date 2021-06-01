<?php 
require_once '../require.php';
$page='schedules'; 
include '../../include/header.php';
include '../../include/links.php';?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Appointments</title>
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
    <div class="row">
      <div class="col-sm-7 col">
      <h3>Appointments</h3>
      </button>
      </div>
      <div class="col-sm-5">
      <input class="form-control float-right" id="search" type="text" placeholder="Search..">
      </div>
    </div>
  <div class="row justify-content-center">
    <table class="tbl_list" id="table">
			<thead>
        <tr>
        <th>Date</th>   
        <th>Time</th>
				<th>Customer</th>
				<th>Service</th>
        <th>Status</th>
				<th class="action">Action</th>
        </tr>
			</thead>
			<tbody>
				<?php
        $query=mysqli_query($con,"select * from `request_apnt` where accepted = 1");
        while($row=mysqli_fetch_array($query)){
        ?>
        
            <tr> 
            <td><?php echo date('m-d-Y', strtotime($row['app_date'])); ?></td>
							<td><?php echo date('h:i a', strtotime($row['app_time']));?></td>
							<td><?php echo $row['name']; ?></td>
              <td><?php echo $row['service'];?></td>
              <td><span class="badge badge-success text-white p-1"><?php echo $row['status'];?></span></td>

							<td>
                <div class="btn-action">
                
                  <a href="delete-rq.php?id=<?php echo $row['apnt_id']; ?>" class="btn btn-primary" class="tooltip-test" title="Mark as done" onclick="return confirm('Mark as done?');"><i class="bx bx-check-double fs-5 d-flex align-items-center py-1"></i></a>
                </div>
              </td>
						</tr>
          <?php
        }
      ?>

          
			</tbody>
     
		</table>
  
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
