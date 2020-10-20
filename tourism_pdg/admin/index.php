<?php 

  session_start();
  if(!isset($_SESSION['A']))
  {
  	echo"<script language='JavaScript'>document.location='login.php'</script>";
    exit();
  }
  include("../../connect.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Google Analytics -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-180150823-1', 'auto');
      ga('send', 'pageview');
    </script>
    <!-- End Google Analytics -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180150823-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-180150823-1');
    </script>

    <title>Halal Tourism • Admin</title>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
	  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../assets/lineicons/style.css">    
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style-responsive.css">
	  <link rel="stylesheet" type="text/css" href="plugins/datatables/dataTables.bootstrap.css" />

    <script type="text/javascript" src="inc/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&callback=initialize&libraries=drawing"></script>
    
    <script type="text/javascript" src="../assets/js/chart-master/Chart.js"></script>
    <script type="text/javascript" src="../html5gallery/html5gallery.js"></script>
    <script type="text/javascript" src="../assets/js/jquery-1.11.1.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-fileupload/bootstrap-fileupload.css" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-datepicker/css/datepicker.css" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-daterangepicker/daterangepicker.css" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-timepicker/compiled/timepicker.css" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="../assets/js/bootstrap-datetimepicker/datertimepicker.html" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="../assets/css/skin/_all-skins.css" /> -->
    
    <!-- <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> -->
    
    <!-- <script src="../assets/js/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/datatable.min.css"> -->

    <!-- SLIDER -->
    <link rel="stylesheet" type="text/css" href="../assets/css/carousel.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- TOMBOL ADD DI ADMIN (FLOATING BUTTON) -->
    <style type="text/css">
      .act-btn
      {
          background: #26a69a;
          display: block;
          width: 50px;
          height: 50px;
          line-height: 50px;
          text-align: center;
          color: white;
          font-size: 30px;
          font-weight: bold;
          border-radius: 50%;
          -webkit-border-radius: 50%;
          text-decoration: none;
          transition: ease all 0.3s;
          position: fixed;
          right: 30px;
          bottom:30px;
      }
      .act-btn:hover{background: #363636}
    </style>


  </head>

  <body>

    <section id="container" >
      <header class="header black-bg">
        <?PHP include("inc/header.php"); ?>
      </header>
      <aside>
        <div id="sidebar"  class="nav-collapse ">
          <?PHP include("inc/sidebar.php"); ?>
        </div>
      </aside>

    <section id="main-content">
      <section class="wrapper">
  		  <div class="row mt">
    			<?php
      			$p = $_GET['page'];
      			$page="pages/".$p.".php";
      			if(file_exists($page)){
      				include($page);
      			}elseif($p==""){
      				include('pages/home.php');
      			}else{
      				include('pages/404.php');
      			}
    		  ?>
			  </div>
      </section>
    </section>
  </section>

  <script type="text/javascript" src="../assets/js/jquery.js"></script>
  <script type="text/javascript" src="../assets/js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js" class="include"></script>
  <script type="text/javascript" src="../assets/js/jquery.scrollTo.min.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" src="../assets/js/jquery.sparkline.js"></script>
  <script type="text/javascript" src="plugins/datatables/jquery.dataTables.js"></script>
  <script type="text/javascript" src="plugins/datatables/dataTables.bootstrap.js"></script>
  <script type="text/javascript" src="../assets/js/common-scripts.js"></script>
  <script type="text/javascript" src="../assets/js/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="../assets/js/gritter-conf.js"></script>
  <script type="text/javascript" src="../assets/js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- <script type="text/javascript" src="../assets/js/bootstrap-fileupload/bootstrap-fileupload.js"></script>	 -->
  <!-- <script type="text/javascript" src="../assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> -->
  <!-- <script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/date.js"></script> -->
  <!-- <script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/daterangepicker.js"></script> -->
  <!-- <script type="text/javascript" src="../assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script> -->
  <!-- <script type="text/javascript" src="../assets/js/bootstrap-daterangepicker/moment.min.js"></script> -->
  <!-- <script type="text/javascript" src="../assets/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script> -->
<!-- <script src="../assets/js/advanced-form-components.js"></script>     -->
  <script type="text/javascript">
    $(function () {
      $('#example1, #example2, #example3').dataTable({
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
    "iDisplayLength": 10,
    "oLanguage": {
  	 "sInfo": "Showing _START_ to _END_ of _TOTAL_ entries",
  	 "sLengthMenu": "Show _MENU_ entries",
  	 "sSearch": "Search:"
  	}
      });
    });
  </script>
  </body>
</html>