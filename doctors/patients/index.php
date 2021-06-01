<?php $page='patients'; include '../../include/header.php';
include ('../../include/connection.php');

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
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/modal-style.css">
    <link rel="stylesheet" href="patients-style.css">
    >
    <script type="text/javascript" src="../../jquery/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
</head>
<body style="background-color: #F4F8FC;">


  
  <div class="main-container">
    <div class="row">
      <div class="col-sm-7 col">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-patient">
      <i class="fas fa-user-plus"></i>  Add new patient
      </button>
      </div>
      <div class="col-sm-5">
      <input class="form-control float-right" id="myInput" type="text" placeholder="Search..">
      </div>
    </div>
    <!--Modal to input new patient-->
      <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" id="add-patient">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fas fa-user-plus"></i> Add new patient</h5>
              <button type="button" class="btn bg-none text-white" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            
            <form method="POST" action="insert.php">
              <div class="modal-body">
                <br>
                
              <div class="row justify-content-center">
              <h5 class="modal-title text-center">Personal Information<br><hr class="hr" style="width: 180px;"></h5>
              </div>
              <br>
                <div class="row">
                <div class="col-sm-4">
                    <label for="occupation">Patient Name</label>
                  </div>
                  <div class="col-sm-7">
                    <input class="form-control" type="text" name="name" required focus placeholder="First name"><br>
                    <input class="form-control" type="text" name="humid-lname" required focus placeholder="Last name">
                  </div>
                </div>
                  
                <div class="row">
                <div class="col-sm-4">
                  <label for="address">Address</label>
                </div>
                  <div class="col-sm-7">
                    <input class="form-control" type="text" name="address" required>
                  </div>
                </div>

                <div class="row">
                <div class="col-sm-4">
                  <label for="bday">Birthdate</label>
                </div>
                <div class="col-sm-7">
                  <input class="form-control" type="date" name="birthdate" required>
                </div>
              </div>
                <div class="row">
                  <div class="col-sm-4">
                    <label>Sex</label>
                  </div>
                  <div class="col-sm-7">
                    <input type="radio" name="sex" value="Male" required> Male
                    <input type="radio" name="sex" VALUE="Female" required> Female
                  </div>
                </div>

                <div class="row">
                <div class="col-sm-4">
                  <label>Status</label>
                </div>
                  <div class="col-sm-7">
                  <select class="form-control" id="status" name="status" required>
                      <option>Please select</option>
                      <option value="Single">Single</option>
                      <option value="Married">Married</option>
                      <option value="Widowed">Widowed</option>
                      <option value="Divorced">Divorced</option>
                  </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <label>Occupation</label>
                  </div>
                  <div class="col-sm-7">
                    <input class="form-control" type="text" name="occupation" required>
                  </div>
                </div>

                <div class="row">
                <div class="col-sm-4">
                  <label>Mobile Number</label>
                </div>
                <div class="col-sm-7">
                  <input class="form-control" type="tel" pattern="[0-9]{11}" name="mobile_num" required>
                </div>
              </div>
              <br>
              
              <div class="row justify-content-center">
              <h5 class="modal-title text-center">Vital Signs<br><hr class="hr" style="width: 85px;"></h5>
              </div>
              <div class="row">
  
              <div class="col-sm-4">
                  <label>Weight</label>
                </div>
                <div class="col-sm-5">
                  <input class="form-control" type="text" name="weight" required>
                </div>
                <div class="col-sm-3">
                  <select class="select form-control" name="humid-weight" required>
                    <option value=" kg">kg</option>
                    <option value=" lbs">lbs</option>
                  </select>
                </div>
              
            </div>
                                          
               <div class="row">
                <div class="col-sm-4">
                    <label>Temperature</label>
                  </div>
                  <div class="col-sm-5">
                    <input class="form-control" type="text" name="temperature" required>
                    </div>
                  <div class="col-sm-3">
                    <select class="select form-control" name="humid-temperature" required>
                      <option value=" C">C</option>
                      <option value=" F">F</option>
                  
                    </select>
                  </div>
           
               </div>
               <div class="row">
                <div class="col-sm-4">
                    <label>Blood Pressure</label>
                  </div>
                  <div class="col-sm-5">
                    <input class="form-control" type="text" name="bp" required>
                  </div>
                    <div class="col-sm-3">
                      <select class="select form-control" name="humid-bp" required>
                        <option value=" mmHg">mmHg</option>
                      </select>
                    </div>
                </div>


               <div class="row">
                  <div class="col-sm-4">
                    <label>Pulse Rate</label>
                  </div>
                  <div class="col-sm-5">
                    <input class="form-control" type="text" name="pr" required> 
                    </div>
                  <div class="col-sm-3">
                    <select class="select form-control" name="humid-pr" required>
                    <option value=" bpm">bpm</option>
                    </select>
                  </div>
                <div>
            </div>
            </div>
              <br>  
                              
              <div class="row justify-content-center">
              <h5 class="modal-title text-center">Medical Conditions<br><hr class="hr" style="width: 160px;"></h5>
              </div>
              <div class="row">
              <div class="col-sm-4">
                  <label>Bleeding</label>
                </div>
                <div class="col-sm-7">
                  <select class="form-control" id="bleeding" name="bleeding" required>
                      <option disabled>Please select</option>
                      <option value="None">None</option>
                      <option value="Yes">Yes</option>
                      
                  </select>
                  </div>
              </div>

              <div class="row">
              <div class="col-sm-4">
                  <label>Heart Disease</label>
                </div>
                <div class="col-sm-7">
                  <select class="form-control" id="heart" name="heart" required>
                  <option disabled>Please select</option>
                      <option value="None">None</option>
                      <option value="Yes">Yes</option>
                  </select>
                  </div>
              </div>
              <div class="row">
              <div class="col-sm-4">
                  <label>Diabetes</label>
                </div>
                <div class="col-sm-7">
                  <select class="form-control" id="diabetes" name="diabetes" required>
                  <option disabled>Please select</option>
                      <option value="None">None</option>
                      <option value="Yes">Yes</option>
                  </select>
                  </div>
              </div>
              <div class="row">
              <div class="col-sm-4">
                  <label>Hypertension</label>
                </div>
                <div class="col-sm-7">
                  <select class="form-control" id="hypertension" name="hypertension" required>
                  <option disabled>Please select</option>
                      <option value="None">None</option>
                      <option value="Yes">Yes</option>
                  </select>             
                  </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <label>Allergy</label>
                </div>
                <div class="col-sm-7">
                  <select class="form-control" id="allergy" name="allergy" required>
                  <option disabled>Please select</option>
                      <option value="None">None</option>
                      <option value="Yes">Yes</option>
                  </select>
                  </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                    <label>Other</label>
                  </div>
                  <div class="col-sm-7">
                <input class="form-control" type="text" name="other">
                </div>
              </div>

              </div>
              <div class="modal-footer">
             
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
              <input id="button" type="submit"  class="btn btn-outline-success" value="Save"><br><br>
              </div>
              
            </form>        
          </div>
        </div>
  
</div>
    <!--Table list of patients-->
  
    
    <div class="row justify-content-center">
    <table class="tbl_list" id="patient-table">
			<thead>
        <th>Patient ID</th>
				<th>Name</th>
				<th>Address</th>
        <th>Balance</th>
				<th class="action">Action</th>
			</thead>
			<tbody>
				<?php
        $query=mysqli_query($con,"select * from `patient`");
        
        while($row=mysqli_fetch_array($query)){
        ?>
            <tr> 
            <td><?php echo $row['patient_id']; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td ><?php echo $row['address']; ?></td>
              <td>0</td>
							<td>
                <div class="btn-action">
                <a href="profile.php?id=<?php echo $row['patient_id']; ?>" class="btn btn-primary" class="tooltip-test" title="View Patient"><i class="fas fa-eye"></i></a>
								<a href="delete-patient.php?id=<?php echo $row['patient_id']; ?>" class="btn btn-danger" class="tooltip-test" title="Delete patient" onclick="return confirm('This will delete the entire record of <?php echo $row['name'];?>. Continue?');"><i class="fas fa-trash"></i></a>
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
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#patient-table tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>
  
</body>
</html>
