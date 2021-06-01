<?php 
require_once '../require.php';
$page='patients'; include '../../include/header.php';
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
    <link rel="stylesheet" href="patients-style.css">
    <link rel="stylesheet" href="../../css/main-container.css">
    <link rel="stylesheet" href="../../css/scroll.css">
    <link rel="stylesheet" href="../../css/fontawesome/css/all.css" >
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/modal-style.css">
    <link rel="stylesheet" href="../../css/all.css">
    <link rel="stylesheet" href="patients-style.css">
    
    <script type="text/javascript" src="../../jquery/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
</head>
<body style="background-color: #F4F8FC;">


  
  <div class="main-container">
    <div class="row mb-5">
      <div class="col-sm-7 col">
      <button type="button" class="btn btn-info px-3" data-toggle="modal" data-target="#add-patient">
      <i class="fas fa-user-plus mr-2"></i>  Add new patient
      </button>
      </div>
      <div class="col-sm-5">
      <input class="form-control float-right" id="input" type="text" placeholder="Search..">
      </div>
    </div>
    
    <!--Modal to input new patient-->
      <div class="modal fade" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" id="add-patient">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fas fa-user-plus"></i> Add new patient</h5>
              <button type="button" class="btn bg-none text-white" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            
            <form method="POST" action="insert.php">
              <div class="modal-body px-5">
                <br>
                
              <div class="row justify-content-center">
              <h5 class="modal-title text-center">Personal Information<br>
            <center><hr class="hr" style="width: 200px"></h5></center>
              </div>
              <br>
                <div class="row mb-2">
                   <div class="col-sm-3">
                    <label>Patient Name</label>
                  </div>
                  <div class="col-sm ml-0">
                  <div class="row mr-1">
                    <input class="form-control col-sm mr-3" type="text" name="first_name" required placeholder="First name">
                    <input class="form-control col-sm" type="text" name="last_name" required  placeholder="Last name">
                  </div>
                  </div>
                </div>
                  
                <div class="row mt-0 mb-2">
                   <div class="col-sm-3 mb-3 d-flex align-items-center">
                       <label for="address">Address</label>
                   </div>
                 <div class="col-sm mr-3">
                    <div class="row mb-2">
                      <input class="form-control col-sm mr-3" type="text" name="street" required  placeholder="Street/Drive">
                      <input class="form-control col-sm" type="text" name="barangay" required  placeholder="Barangay">
                    </div>
                    <div class="row mt-0">
                    <input class="form-control col-sm" type="text" name="city" required  placeholder="City">
  
                    </div>
                  </div>            
                </div>

                <div class="row">
                <div class="col-sm-3">
                  <label for="bday">Birthdate</label>
                </div>
                
                  <input class="form-control col-sm mr-3" type="date" name="birthdate" required>
             
              </div>
                <div class="row mt-4">
                  <div class="col-sm-3">
                    <label>Sex</label>
                  </div>
                  <div class="col-sm">
                    <input type="radio" name="sex" value="Male" required> Male
                    
                  </div>
                  <div class="col-sm">
                    <input type="radio" name="sex" value="Female" required> Female
                    
                  </div>

                </div>

                <div class="row mt-3">
                <div class="col-sm-3">
                  <label>Status</label>
                </div>
                  <div class="col-sm pl-0">
                  <select class="form-control col-sm" id="status" name="status" required>
                      <option selected="" disabled="">Please select</option>
                      <option value="Single">Single</option>
                      <option value="Married">Married</option>
                      <option value="Widowed">Widowed</option>
                      <option value="Divorced">Divorced</option>
                  </select>
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-sm-3">
                    <label>Occupation</label>
                  </div>
                  
                    <input class="form-control col-sm mr-3" type="text" name="occupation" required>
                
                </div>

                <div class="row mt-3">
                <div class="col-sm-3">
                  <label>Mobile Number</label>
                </div>
                
                  <input class="form-control col-sm mr-3" type="tel" pattern="[0-9]{11}" name="mobile_num" placeholder="09" required>
               
              </div>
              <br>
              
              <div class="row mt-3 justify-content-center">
              <h5 class="modal-title text-center">Vital Signs<br>
              <center><hr class="hr" style="width: 100px"></h5></center>
              </div>
              <div class="row mt-5">
  
              <div class="col-sm-3">
                  <label>Weight</label>
                </div>
                <div class="col-sm">
                  <input class="form-control" type="text" name="weight" required>
                </div>
                <div class="col-sm">
                  <select class="select form-control" name="humid-weight" required>
                    <option value=" kg">kg</option>
                    <option value=" lbs">lbs</option>
                  </select>
                </div>
              
            </div>
                                          
               <div class="row mt-3">
                <div class="col-sm-3">
                    <label>Temperature</label>
                  </div>
                  <div class="col-sm">
                    <input class="form-control" type="text" name="temperature" required>
                    </div>
                  <div class="col-sm">
                    <select class="select form-control" name="humid-temperature" required>
                      <option value=" C">C</option>
                      <option value=" F">F</option>
                  
                    </select>
                  </div>
           
               </div>
               <div class="row mt-3">
                <div class="col-sm-3">
                    <label>Blood Pressure</label>
                  </div>
                  <div class="col-sm">
                    <input class="form-control" type="text" name="bp" required>
                  </div>
                    <div class="col-sm">
                      <select class="select form-control" name="humid-bp" required>
                        <option value=" mmHg">mmHg</option>
                      </select>
                    </div>
                </div>


               <div class="row mt-3">
                  <div class="col-sm-3">
                    <label>Pulse Rate</label>
                  </div>
                  <div class="col-sm">
                    <input class="form-control" type="text" name="pr" required> 
                    </div>
                  <div class="col-sm">
                    <select class="select form-control" name="humid-pr" required>
                    <option value=" bpm">bpm</option>
                    </select>
                  </div>
                <div>
            </div>
            </div>
              <br>  
                              
              <div class="row mt-3 justify-content-center">
              <h5 class="modal-title text-center">Medical Conditions<br>
              <center><hr class="hr" style="width: 180px"></h5></center>
              </div>
              <div class="row mt-5">
              <div class="col-sm-5">
                  <label>Bleeding</label>
                </div>
                <div class="col-sm">
                    <input type="radio" name="bleeding" value="Yes" required> Yes
                    
                  </div>
                  <div class="col-sm">
                    <input type="radio" name="bleeding" value="No" required> No
                    
                  </div>
              </div>

              <div class="row mt-3">
              <div class="col-sm-5">
                  <label>Heart Disease</label>
                </div>
                <div class="col-sm">
                    <input type="radio" name="heart" value="Yes" required> Yes
                    
                  </div>
                  <div class="col-sm">
                    <input type="radio" name="heart" value="No" required> No
                    
                  </div>
              </div>
              <div class="row mt-3">
              <div class="col-sm-5">
                  <label>Diabetes</label>
                </div>
                <div class="col-sm">
                    <input type="radio" name="diabetes" value="Yes" required> Yes
                    
                  </div>
                  <div class="col-sm">
                    <input type="radio" name="diabetes" value="No" required> No
                    
                  </div>
              </div>
              <div class="row mt-3">
              <div class="col-sm-5">
                  <label>Hypertension</label>
                </div>
                <div class="col-sm">
                    <input type="radio" name="hypertension" value="Yes" required> Yes
                    
                  </div>
                  <div class="col-sm">
                    <input type="radio" name="hypertension" value="No" required> No
                    
                  </div>
              </div>
              <div class="row mt-3">
                <div class="col-sm-5">
                  <label>Allergy</label>
                </div>
               <div class="col-sm">
                    <input type="radio" name="allergy" value="Yes" required> Yes
                    
                  </div>
                  <div class="col-sm">
                    <input type="radio" name="allergy" value="No" required> No
                    
                  </div>
              </div>
              <div class="row mt-3">
                <div class="col-sm-3">
                    <label>Other</label>
                  </div>
                  <div class="col-sm mr-2">
                <input class="form-control col-sm" type="text" name="other">
                </div>
              </div>

              </div>
              <div class="modal-footer mt-4">
             
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
              <input id="button" type="submit"  class="btn btn-outline-success" value="Save"><br><br>
              </div>
              
            </form>        
          </div>
        </div>
  
</div>
    <!--Table list of patients-->
  
    
    <table class="tbl_list" id="patient-table">
	
        <tr class="text-black">
        <th width=15%>Patient ID</th>
				<th width="25%">First name</th>
        <th width="25%">Last name</th>
        <th width="5%">Balance</th>
        <th width="15%" class="text-center">Status</th>
				<th width="20%" class="action">Action</th>
        </tr>
  
			<tbody id="search" class="bg-white">
				<?php
        $query=mysqli_query($con,"select * from `patient`");
        
        while($row=mysqli_fetch_array($query)){
        ?>
            <tr> 
              <td><?php echo $row['patient_id']; ?></td>
							<td><?php echo $row['first_name']; ?></td>
              <td><?php echo $row['last_name']; ?></td>
					
              <td>&#8369; <?php echo $row['balance']; ?></td>
              <td class="text-center"><span class="badge
               <?php 
               if($row['stat'] == 'linked'){
                 echo "badge-success p-1";
                 }else{
                  echo "badge-danger p-1";
                }
                   
                   ?>"><?php echo $row['stat'];?></span></td>

							
							<td>
                <div class="btn-action">
                <a href="profile.php?id=<?php echo $row['patient_id']; ?>" class="btn btn-primary" class="tooltip-test" title="View Patient"><i class="fas fa-eye"></i></a>
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
            $("#input").on("keyup", function() {
               var value = $(this).val().toLowerCase();
               $("#search").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
               });
            });
         });
      </script>
  
</body>
</html>
