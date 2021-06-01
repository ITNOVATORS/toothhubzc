<?php

require_once '../require.php';
    $page='services'; 
    include '../../include/header.php';
    include ('../../include/connection.php');
    include '../../include/links.php';  

    

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Patients</title>
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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-services">
      <span class="bx bx-plus"></span>  Add new service
    </button>
        

        <div class="row justify-content-center mt-5 mx-1">
        <table class="tbl_list" id="patient-table">
                <thead>
                
                <th>Image</th>
                <th>Service name</th>
                <th>Description</th>
                <th>Fee</th>
                    <th class="action">Action</th>
                </thead>
                <tbody>
                    <?php
            $query=mysqli_query($con,"select * from `services`");
            
            while($row=mysqli_fetch_array($query)){
            ?>
                <tr> 
                                <td><img src="../../<?php echo $row['img']; ?>" alt="" height="40"></td>
                                <td><?php echo $row['service_name']; ?></td>
                                <td ><?php echo $row['description']; ?></td>
                                <td >&#8369; <?php echo $row['fee']; ?></td>
                <td>
                    <div class="btn-action">
        
                        <a href="delete.php?id=<?php echo $row['service_id']; ?>" class="btn btn-danger" class="tooltip-test" title="Delete service" onclick="return confirm('This will delete the entire record of <?php echo $row['service_name'];?>. Continue?');"><i class="fas fa-trash"></i></a>
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
</body>

<!--modal-service-->
    <div class="modal fade" id="add-services" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="add-services.php" method="POST" enctype="multipart/form-data">
                    <div class="container px-5">
                    <div class="row mt-4">
                      <label for="">Service name: </label>  
                        <input type="text" name="name" id="" class="form-control col-sm-12">
                    </div>

                    <div class="row mt-4">
                      <label for="">Description: </label>  
                        <input type="text" name="description" id="" class="form-control col-sm-12">
                    </div> 

                    <div class="row mt-4">
                      <label for="">Fee: </label>  
                        <input type="number" name="fee" id="" class="form-control col-sm-12" placeholder="&#8369;">
                    </div>

                    <div class="row mt-4">
                      <label for="">Sameple image: </label>  
                        <input type="file" name="img" id="" class="form-control col-sm-12">
                    </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" value="Add services" class="btn btn-success" name="submit">
            </div>
            </form>
            </div>
        </div>
        </div>
        <!--end--> 