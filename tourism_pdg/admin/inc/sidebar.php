<ul class="sidebar-menu" id="nav-accordion">              
  <p class="centered"><a href="index.php"><img src="../icon/aaa.jpg" class="img-circle" width="60"></a></p>
  <h5 class="centered" style="font-family: sans-serif; font-size: 18px">

      <?php
        echo "Hello, ";
        echo $_SESSION['username']; 
      ?>

   </h5>
                  
  <li class="mt">
      <a href="../">
        <i class="fa fa-reply"></i>
          <span>User Access</span>
      </a>
  </li>
  <li class="sub-menu">
      <a href="?page=analitycs">
        <i class="fa fa-bar-chart"></i>
          <span>Website Analitycs</span>
      </a>
  </li>
  <li class="sub-menu">
      <a href="?page=home">
          <i class="fa fa-bars"></i>
          <span>List Tourism</span>
      </a>
  </li>   
  <li class="sub-menu">
      <a href="?page=fasilitas">
          <i class="fa fa-caret-square-o-down"></i>
          <span>Facility</span>
      </a>
  </li>
  <li class="sub-menu">
      <a href="?page=event">
          <i class="fa fa-calendar"></i>
          <span>Events</span>
      </a>
  </li>
<!--   <li class="sub-menu">
      <a href="?page=recommendation">
          <i class="fa fa-image"></i>
          <span>Recommendation</span>
      </a>
  </li> -->
  <li class="sub-menu">
      <a href="?page=user_management">
          <i class="fa fa-users"></i>
          <span>Manage User</span>
      </a>
  </li>
  <li class="sub-menu">
      <a href="?page=pass_change">
          <i class="fa fa-key"></i>
          <span>Change Password</span>
      </a>
  </li>
  <li class="sub-menu">
      <a class="" href="../../">
          <i class="fa fa-chevron-circle-left"></i>
          <span>Dashboard</span>
      </a>
  </li>
</ul> 