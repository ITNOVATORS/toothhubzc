<?php 
include 'include/links.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="flickity-docs/flickity.min.css">
    <script src="flickity-docs/flickity.pkgd.min.js"></script>

    <style>
    /* external css: flickity.css */

* { box-sizing: border-box; }

body { font-family: sans-serif; }


.carousel-cell {
    margin-top: 30px;
    margin-bottom: 30px;
  width: 280px;
height: 370px;
  margin-right: 40px;
  border-radius: 5px;
}

.carousel-cell.is-selected {
  background: #ED2;
}

/* cell number */


    </style>
</head>
<body> 

<!-- Flickity HTML init -->
<div class="carousel text-dark" data-flickity='{ "contain": true}'>
  
    <?php
        include 'include/connection.php';
            
        $query=mysqli_query($con,"select * from `services`");
    
        while($row=mysqli_fetch_array($query)){
        ?>
        <div class="carousel-cell bg-light shadow pt-4">
            <div class="row h-50">
                <div class="d-flex justify-content-center">
                    <img src="<?php echo $row['img'];  ?>" alt="" class="img-fluid" width="85%" height="300">
                </div>
                
            </div>
            <hr class="mx-3"> 
            <div class="container px-4 pb-5 py-3">
                <div class="lead fs-4"><?php echo $row['service_name'];  ?></div>
                <div class="lead fs-5 fw-bold   ">&#8369; <?php echo $row['fee'];  ?></div>

                <div class="lead mt-2"><i> <?php echo $row['description'];  ?></i></div>
            </div>
        
        </div>
        
        <?php
        }   
    ?>
  
</div>

</body>
</html>