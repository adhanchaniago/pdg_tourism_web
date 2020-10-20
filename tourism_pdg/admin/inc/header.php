<!-- <div class="sidebar-toggle-box">
  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation">
  </div>
</div> -->

<header class="header black-bg">  
  <div class="sidebar-toggle-box">
    <div class="fa fa-bars tooltips" style="color: white" data-placement="right" data-original-title="Toggle Navigation"></div>
  </div>         
  <a class="logo" style="font-family: arial">
  	<?php 
  		if($_SESSION['A'])
  		{
  			echo "<b>WEBGIS</b> • Admin Tourism</a>";
  		}
  		else if($_SESSION['P'])
  		{
  			echo "<b>WEBGIS</b> • Owner Tourism</a>";
  		}
  	?>
  </a>
  <ul class="nav pull-right top-menu">
    <a href="act/logout.php" class="btn btn-default" style="background-color: #26a69a; color: white; margin-top: 10px; font-size:14px; font-family: arial;"> <b>LOG OUT</b></a>
  </ul>
</header>        