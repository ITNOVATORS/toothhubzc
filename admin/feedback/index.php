<?php 
require_once '../require.php';
$page='feedback'; include '../../include/header.php';
include ('../../include/connection.php');
include '../../include/links.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Feedback</title>
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
  <div class="row mb-4">
    <div class="col-sm-7">
    <h3 class="float-left">Feedback</h3>
    </div>
    <div class="col-sm-5">
      <input class="form-control float-right" id="search" type="text" placeholder="Search..">
      </div>
  </div>
    

    <div class="d-flex align-items-center">
    <table class="tbl_list" id="table">
			<thead>
        <tr class="text-warning">
          <th width="30%">Recipient</th>
          <th width="50%">Message</th>
          <th width="20">Time </th>
          <th width="10%">Action</th>
        </tr>
      </thead>
    <tbody>
				<?php
        $query=mysqli_query($con,"select * from `contact_us` ORDER BY time_sent DESC");
        
        while($row=mysqli_fetch_array($query)){
        ?>
            <tr> 
							<td>
              <?php echo $row['name'];?>
                <p><small><?php echo $row['email'];?><small></p>
              </td>
							<td><h6><?php echo $row['message']; ?></h6></td>
              <td>
               
                <small><?php echo $row['time_sent'];?>
        </small></td>
							<td>
                <div class="btn-action">
								<a href="delete-msg.php?id=<?php echo $row['id']; ?>" id="pop-up" class="btn btn-danger p-2" class="tooltip-test" title="Delete message" onclick="return confirm('Are you sure you want to delete this message? ');"><i class="fas fa-trash"></i></a>
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
