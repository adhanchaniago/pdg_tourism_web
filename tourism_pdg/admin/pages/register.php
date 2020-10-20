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

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Registration</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.css" >
    <!--external css-->
    <link rel="stylesheet" href="../../assets/font-awesome/css/font-awesome.css"  />
        
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="../../assets/css/style.css" >
    <link rel="stylesheet" href="../../assets/css/style-responsive.css" >

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <body >

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <div id="login-page">
      <div class="container">
      
          <form class="form-login" action="../act/regis.php" method="POST" role="form">
            <h2 class="form-login-heading" style="background:#26a69a;border-color:white">REGISTRATION</h2>
            <div class="login-wrap">   
              <input type="text" name="nama" class="form-control" placeholder="name" autofocus required="">
              <br>
              <input type="email" name="email" class="form-control" placeholder="E-mail" required=""> 
              <br>
              <input type="text" class="form-control" placeholder="Phone" name="hp" autofocus required="">
              <input type="text" class="form-control hidden" name="role" value="C">
              <br>
              <input type="address" class="form-control" placeholder="Address" name="address" required="">
              <br>
              <input type="text" class="form-control" placeholder="Username" name="username" autofocus required="">
              <br>
              <input type="password" class="form-control" placeholder="Password" name="password" required="">
              <br>
              <button class="btn btn-theme btn-block" name="regis" type="submit" style="background:#26a69a"><i class="fa fa-lock"></i> SIGN UP</button>          
            </div>
          </form>     
      </div>
    </div>    

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="../../assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("../../../_foto/1.jpg", {speed: 500});
    </script>

  </body>

<!-- Mirrored from demo.gridgum.com/templates/AdminDashboard/DashGum/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 Apr 2017 13:34:16 GMT -->
</html>