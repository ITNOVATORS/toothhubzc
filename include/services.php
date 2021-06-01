        <div class="carousel " data-flickity='{ "contain": true}'>
                  <?php
                  include 'include/connection.php';
                        $query= "select * from `services`";
                        $result = mysqli_query($con,$query);
                        if(mysqli_num_rows($result) > 0){

                              while ($row = mysqli_fetch_array($result)) {
                              ?>
                              <div class="carousel-cell pt-5">
                                   
                                          <div class="row">
                                                <div class=" col-sm space">
                                                      <div class="item">
                                                            <div class=" shadow p-3 bg-white rounded mb-5" > 
                                                                 
                                                                  <img src="<?php echo $row['img']?>" class="img-responsive" alt="" height="190" width="180"><hr class="text-light">
                                                           
                                                                  <p class="prod_name">
                                                                        <?php echo $row['service_name'];?>
                                                                      
                                                                  </p>
                                                                  <p>
                                                                        <img src="images/peso.png" alt="" height="20" class="img-responsive float-left my-0"> 
                                                                        <div class="ml-4 text-warning">
                                                                              <?php echo $row['fee']?>
                                                                        </div>
                                                                  </p>
                                                                  
                                                
                                                                  
                                                                
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    
                              </div>
                              <?php
                              }
                        }
                        ?> 
            
            
                  </div>