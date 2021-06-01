<?php 
require_once '../require.php';
$page='appointment'; 
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
				<th>Patient</th>
        <th>Contact number</th>
				<th>Service</th>
        <th>Status</th>
				<th class="action">Action</th>
        </tr>
			</thead>
			<tbody>
				<?php
        $query=mysqli_query($con,"select * from `request_apnt` where status = 'Pending'");
        while($row=mysqli_fetch_array($query)){
        ?>
        
            <tr> 
            <td><?php echo date('m-d-Y', strtotime($row['app_date'])); ?></td>
							<td><?php echo date('h:i a', strtotime($row['app_time']));?></td>
							<td><?php echo $row['name']; ?></td>
              <td><?php echo $row['num']; ?></td>
              <td><?php echo $row['service'];?></td>
              <td><span class="badge badge-warning p-1"><?php echo $row['status'];?></span></td>

							<td>
                <div class="btn-action">
                <a class="btn btn-success p-2" href="accept.php?id=<?php echo $row['apnt_id']; ?>" class="tooltip-test" title="Accept request"><i class="bx bx-check text-white  "></i></a>
                  <a href="cancel.php?id=<?php echo $row['apnt_id']; ?>" class="btn btn-danger" class="tooltip-test" title="Cancel request" onclick="return confirm('Are you sure you want to cancel this appointment request?');"><i class="bx bx-x-circle d-flex align-items-center py-1"></i></a>
              
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


  <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
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
