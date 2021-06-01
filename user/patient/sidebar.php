<div class="navbar bg-dark">

</div>
<div class="sidebar">
    <div class="logo-content">
      <div class="logo">
         
                
      </div>
      <i class='bx bx-menu' id="btn" ></i>
    </div>
    <!--nav-list-->
    <ul class="nav-list">
      <li>
            
           

      </li>
      <li>
        <a href="index.php" class="<?php if($page=='Dashboard'){echo "active";}?>">
          <i class='bx bx-grid-alt' ></i>
          <span class="links-name">Dashboard</span>
        </a>
        <span class="tooltip">Dashboard</span>
      </li>
      
      <!--profile-->
      <li>
        <a href="profile.php" class="<?php if($page=='Profile'){echo "active";}?>">
          <i class='bx bx-user' ></i>
          <span class="links-name">Profile</span>
        </a>
        <span class="tooltip">Profile</span>
      </li>

      <!--products-->
      <li>
        <a href="products.php" class="<?php if($page=='Products'){echo "active";}?>">
          <i class='bx bx-shopping-bag' ></i>
          <span class="links-name">Manage products</span>
        </a>
        <span class="tooltip">Products and pets</span>
      </li>
      
      <!--Pets-->
      <li>
        <a href="pets.php" class="<?php if($page=='pets'){echo "active";}?>">
          <i class='fa fa-dog ml-3 mr-3'></i>
          <span class="links-name">Manage Pets</span>
        </a>
        <span class="tooltip">Manage Pets</span>
      </li>

      <!--sales-->
      <li>
        <a href="sales.php" class="<?php if($page=='Sales'){echo "active";}?>">
          <i class='bx bx-chart' ></i>
          <span class="links-name">View Sales</span>
        </a> 
        <span class="tooltip">View sales</span>
      </li>

      <!--history-->
      <li>
        <a href="orders.php" class="<?php if($page=='Orders'){echo "active";}?>">
          <i class='bx bx-package'></i>
          <span class="links-name">Orders</span>
        </a>
        <span class="tooltip">Orders</span>
      </li>

      <!--history-->
      <li>
        <a href="history.php" class="<?php if($page=='History'){echo "active";}?>">
          <i class='bx bx-history'></i>
          <span class="links-name">Order History</span>
        </a>
        <span class="tooltip">Order History</span>
      </li>

      <!--settings-->
      <li>
        <a href="settings.php" class="<?php if($page=='Settings'){echo "active";}?>">
          <i class='bx bx-cog' ></i>
          <span class="links-name">Settings</span>
        </a>
        <span class="tooltip">Settings</span>
      </li>
      
    </ul>

    <div class="profile_content">
      <div class="profile d-flex justify-content-center align-items-center">
        <span class="links-name  py-2 text-dark">Log out</span>
        <a onclick='confirm("Are you sure you want to log out?");' href="../index.php"><i class='bx bx-log-out' id="log-out"></i></a>
        
      </div> 
    </div>
    
</div>



  <script src='assets/sidebar.js'></script>