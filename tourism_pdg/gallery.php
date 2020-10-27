<?php 
  session_start();
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

  <meta charset="utf-8">

  <title>Halal Tourism • Detail</title>

  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css"/>
  <link rel="stylesheet" href="assets/js/fancybox/jquery.fancybox.css"/>
  <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
  <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/style-responsive.css">
  <script type="text/javascript" src="html5gallery/html5gallery.js"></script>
  <!-- <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> -->
  <script src="assets/js/jquery-1.11.1.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <style>
    .mySlides {display:none}
    .w3-left, .w3-right, .w3-badge {cursor:pointer}
    .w3-badge {height:13px;width:13px;padding:0}
  </style>

  <script src="assets/js/chart-master/Chart.js"></script>

  <script src="../config_public.js"></script>
  <script src="_map.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE&sensor=true"></script>

  <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE"></script> -->

  <link rel="stylesheet" href="assets/js/mystyle.css">
  <!-- <link rel="stylesheet" type="text/css" href="assets/css/cssgue.css"> -->

  <!--LOADER-->
  <style>
    #loader {
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid #3498db;
      width: 40px;
      margin: 5px;
      height: 40px;
      -webkit-animation: spin 2s linear infinite;
      animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

      /*css scrollbar*/
      ::-webkit-scrollbar {
          width: 10px;          
      }
       
      ::-webkit-scrollbar-track {     
          background: #fff;    
      }
       
      ::-webkit-scrollbar-thumb {
          background:   #26a69a;
          border-radius:10px; 
      }

      @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)} 
        to {-webkit-transform:scale(1)}
      }

      @keyframes zoom {
        from {transform:scale(0)} 
        to {transform:scale(1)}
      }

      /* The Close Button */
      .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
      }

      .close:hover,
      .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
      }

      /* 100% Image Width on Smaller Screens */
/*      @media only screen and (max-width: 700px){
        .modalol-content {
          width: 100%;
        }
      }*/
  </style>
</head>

<body onload="init();data_tourism_1_info('<?php echo $_GET["idgallery"] ?>');">

  <section id="container" >
    <header class="header black-bg" style="background:#26a69a">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" style="color: white" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.php" class="logo" style="font-family: arial"><b>WEBGIS</b> • Padang Tourism</a>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <?php 
            //echo "username $username, role $role";
            if($_SESSION['C'] == false)
            {
              echo "<a href='admin/login.php' class='btn btn-default' style='background-color: #26a69a; font-size: 14px; margin-top: 10px; color: white; font-family: arial;'>
              <b>&nbsp&nbspLOG IN &nbsp</b></a>";
              //echo "username $username, role $role";
            }
            else{
              echo "<a href='admin/act/logout.php' class='btn btn-default' style='background-color: #26a69a; font-size:14px; color: white; margin-top: 10px;  font-family: arial;'>
              <b>LOG OUT</b></a>";
              //echo "username $username, role $role";
            }
          ?>
          <li><div id="loader" style="display:none"></div></li>
          <li id="loader_text" style="margin-top:13px;display:none"><b>Loading</b></li>
            <li class="nav pull-right top-menu"></li>
        </ul>
      </div>
    </header>

    <aside>
      <div id="sidebar"  class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">
          <!--p class="centered"><a href="profile.html"><img src="assets/img/masjid.png" class="img-circle" width="90"></a></p-->          
          <li class="sub-menu">
            <a href="index.php">
              <i class="fa fa-chevron-circle-left"></i>
              <span>Back To Home</span>
            </a>
          </li> 
        </ul>
      </div>
    </aside>

    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row">
          <div class="col-lg-12 main-chart"> 
            <div class="col-sm-12">
              <div class="col-sm-6"> 

                <!-- INFORMATION ==================================================================================== -->
                <section class="panel">
                  <header class="panel-heading">
                    <h2 class="box-title" style="text-transform:capitalize; text-align: center;"><b> Information</b></h2>
                  </header>

                  <div class="panel-body">
                    <table id="table_tengah_info" class="table">
                      <tbody  style='vertical-align:top;'></tbody>          
                    </table> 
                  </div> 
                </section>

                <!-- EVENT ========================================================================================== -->
                <section class="panel">
                  <header class="panel-heading">
                    <h2 class="box-title" style="text-transform:capitalize; text-align: center"><b> Upcoming Event</b></h2>
                  </header>
                    <?php 
                      require '../connect.php';
                      $id = $_GET["idgallery"];
                                        
                      $sql = "SELECT event_tourism.id_event, event_tourism.tourism_id, event_tourism.nama_event, 
                              event_tourism.date_start, event_tourism.date_end, event_tourism.description, 
                              event_tourism.contact_person, tourism.name AS tourism_name From event_tourism 
                              LEFT JOIN tourism ON tourism.id = event_tourism.tourism_id WHERE tourism_id = '$id'";
                      $result = mysqli_query($conn, $sql);
                    ?>

                  <table class="table">
                    <thead></thead>
                      <?php  
                        while ($rows = mysqli_fetch_array($result)) 
                        {
                          $id_event = $rows['id_event'];
                          $tourism_id = $rows['tourism_id'];
                          $tourism_name = $rows['tourism_name'];
                          $event = $rows['nama_event'];
                          $date_start = $rows['date_start'];
                          $date_end = $rows['date_end'];
                          $desc = $rows['description'];
                          $cp = $rows['contact_person'];
                          ?>
                      <tr>
                        <td><?php echo $date_start; ?></td>
                        <td><?php echo $event; ?></td>
                        <td>
                          <div class='btn-group'>
                            <a data-href='<?php echo $id_event; ?>' title='Detail' data-toggle='modal' data-target='#detail_event<?= $id_event ?>' class='btn btn-sm btn-default' style='background-color: #26a69a; color: white'><i class='fa fa-list'></i></a>

                            <div class="modal fade" id="detail_event<?= $rows['id_event'] ?>" role="dialog" >
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div style="background-color:" class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 style="color: white; font-size: 20px">Detail Event <b><?= $event ?></b> </h4>
                                  </div>

                                  <div class="modal-body" style="height: 450px; overflow: auto; ">
                                    <div class="content">
                                      <div class="text-center">
                                      
                                      <div class="html5gallery" style=" width: auto; height: 330px; overflow:hidden;" data-skin="darkness" data-width="535" data-height="300" data-resizemode="fit"
                                      id="foto-event">

                                        <?php
                                          $querysearch = "SELECT gallery_event FROM event_gallery where id_event = '$id_event'";

                                          $hasil = mysqli_query($conn, $querysearch);   
                                          $xx = 0;

                                          while($baris = mysqli_fetch_array($hasil))
                                          {
                                            $nilai = $baris['gallery_event'];
                                            $xx++;
                                          ?>
                                          <image src="../_foto/event_foto/<?php echo $nilai; ?>" style="width:10%;">
                                       
                                          <?php
                                              }
                                              if($xx==0){
                                          ?>
                                          <image src="../_foto/mugen.jpg" style="width:10%;">
                                          <?php
                                              }
                                              echo "$nilai";
                                        ?>                    
                                      </div>
                                      </div>
                                    </div>
                                    <br>
                                    <table class="table">
                                      <tbody id="bodi">
                                        <tr><td>Event Name</td><td>:</td><td><?= $event ?></td></tr>
                                        <tr><td>Location</td><td>:</td><td><?= $tourism_name ?></td></tr>
                                        <tr><td>Date Start</td><td>:</td><td><?= $date_start ?></td></tr>
                                        <tr><td>Date End</td><td>:</td><td><?= $date_end ?></td></tr>
                                        <tr><td>Description</td><td>:</td><td><?= $desc ?></td></tr>
                                        <tr><td>Contact Person</td><td>:</td><td><?= $cp ?></td></tr>
                                      </tbody>
                                    </table>
                                  </div>
                                              
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-default" style="background-color: #26a69a;" data-dismiss="modal"><b style="color: white">Close</b></button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                        <?php
                        }
                      ?>               
                  </table>

                  <div class="panel-body">
                    <table id="" class="table">
                      <tbody  style='vertical-align:top;'></tbody>          
                    </table> 
                  </div> 
                </section>

                <!-- INFO =========================================================================================== -->
                <section class="panel">
                  <header class="panel-heading">
                    <h2 class="box-title" style="text-transform:capitalize; text-align: center;"><b>Info</b></h2>
                  </header>
                    <?php 
                     require '../connect.php';
                      $id = $_GET["idgallery"];
                      //echo $id;

                      if(strpos($id,"H") !== false){
                        $sqlreview = "SELECT * from information_admin where id_hotel = '$id'";
                      }elseif (strpos($id,"RM") !== false) {
                        $sqlreview = "SELECT * from information_admin where id_kuliner = '$id'";
                      }elseif (strpos($id, "SO") !== false) {
                        $sqlreview = "SELECT * from information_admin where id_souvenir = '$id'";
                      }elseif (strpos($id,"IK") !== false) {
                         $sqlreview = "SELECT * from information_admin where id_ik = '$id'";
                      }elseif (strpos($id,"TM")!== false) {
                         $sqlreview = "SELECT * from information_admin where id_ow = '$id'";
                      }
                      // echo $sqlreview;
                      $result = mysqli_query($conn, $sqlreview);
                    ?>

                  <table class="table">
                    <thead>
                      <!-- <th>Date</th>
                      <th>Info</th> -->
                    </thead>
                      <?php  
                        while ($rows = mysqli_fetch_array($result)) 
                        {
                          $tgl = $rows['tanggal'];
                          $info = $rows['informasi'];
                          $id_info =$rows['id_informasi'];
                          echo "<tr><td>$tgl</td><td>$info</td></tr>";
                        }
                      ?>
                  </table>

                  <div class="panel-body">
                    <table id="" class="table">
                      <tbody  style='vertical-align:top;'>
                      </tbody>          
                    </table>
                </section>
              </div>

                <!-- GALLERY ======================================================================================== -->
                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-12"> 
                      <section class="panel">
                        <div class="panel-body">
                            <!-- <a class="btn btn-compose" style="background:#26a69a">Gallery</a> -->
                          <header>
                            <h2 class="box-title" style="text-transform:capitalize; text-align: center;"> <b>Gallery</b></h2>
                          </header>  
                          <br>
                          <div class="content">
                            <div class="html5gallery" style="width: 100%; max-width: 300px; overflow:auto;" data-skin="horizontal" data-width="350" data-height="200" data-resizemode="fit">  
                              <?php
                                if (strpos($id,"HT") !== false)  //Hotel
                                {  
                                  $querysearch  ="SELECT a.id, b.gallery_tourism FROM tourism as a left join tourism_gallery as b on a.id=b.id where a.id='$id' ";       
                                  
                                  $hasil=mysqli_query($conn, $querysearch);
                                  
                                  while($baris = mysqli_fetch_assoc($hasil))
                                  {
                                    if(($baris['gallery_tourism']=='-')||($baris['gallery_tourism']==''))
                                    {
                                      echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                    }
                                    else
                                    {
                                      echo "<a href='../_foto/".$baris['gallery_tourism']."'><img src='../_foto/".$baris['gallery_tourism']."'></a>";
                                    }
                                  }
                        
                                } 
                                elseif (strpos($id,"TM") !== false) //Tourism
                                {  
                                  $querysearch  ="SELECT a.id, b.gallery_tourism FROM tourism as a left join tourism_gallery as b on a.id=b.id where a.id='$id' ";       
                                  
                                  $hasil=mysqli_query($conn, $querysearch);
                                  
                                  while($baris = mysqli_fetch_assoc($hasil))
                                  {
                                    if(($baris['gallery_tourism']=='-')||($baris['gallery_tourism']==''))
                                    {
                                      echo "<a href='../_foto/mugen.jpg'><img src='../_foto/mugen.jpg' ></a>";
                                    }
                                    else
                                    {
                                      echo "<a href='../_foto/".$baris['gallery_tourism']."'><img src='../_foto/".$baris['gallery_tourism']."'></a>";
                                    }
                                  }
                                } 
                                elseif (strpos($id,"SO") !== false) //Souvenir
                                {  
                                  $querysearch  ="SELECT a.id, b.gallery_souvenir FROM souvenir as a left join souvenir_gallery as b on a.id=b.id where a.id='$id' ";       
                                  
                                  $hasil=mysqli_query($conn, $querysearch);
                                  
                                  while($baris = mysqli_fetch_assoc($hasil))
                                  {
                                    if(($baris['gallery_souvenir']=='-')||($baris['gallery_souvenir']==''))
                                    {
                                      echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                    }
                                    else
                                    {
                                      echo "<a href='../_foto/".$baris['gallery_souvenir']."'><img src='../_foto/".$baris['gallery_souvenir']."'></a>";
                                    }
                                  }
                                } 
                                elseif (strpos($id,"RM") !== false) //Kuliner
                                {  
                                  $querysearch  ="SELECT a.id, b.gallery_culinary FROM culinary_place as a left join culinary_gallery as b on a.id=b.id where a.id='$id' ";       

                                  $hasil=mysqli_query($conn, $querysearch);
                                  while($baris = mysqli_fetch_assoc($hasil))
                                  {
                                    if(($baris['gallery_culinary']=='-')||($baris['gallery_culinary']==''))
                                    {
                                      echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                    }
                                    else
                                    {
                                      echo "<a href='../_foto/".$baris['gallery_culinary']."'><img src='../_foto/".$baris['gallery_culinary']."'></a>";
                                    }
                                  }
                                } 
                                elseif (strpos($id,"M") !== false) 
                                {  //Worship

                                  $querysearch  ="SELECT a.id, b.gallery_worship_place FROM worship_place as a left join worship_place_gallery as b on a.id=b.id where a.id='$id' ";       
                                  
                                  $hasil=mysqli_query($conn, $querysearch);
                                  
                                  while($baris = mysqli_fetch_assoc($hasil))
                                  {
                                    if(($baris['gallery_worship_place']=='-')||($baris['gallery_worship_place']==''))
                                    {
                                      echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                    }
                                    else{
                                      echo "<a href='../_foto/".$baris['gallery_worship_place']."'><img src='../_foto/".$baris['gallery_worship_place']."'></a>";
                                    }
                                  }
                                } 
                                elseif (strpos($id,"IK") !== false) //Industry
                                {  

                                  $querysearch  ="SELECT a.id, b.gallery_industry FROM small_industry as a left join industry_gallery as b on a.id=b.id where a.id='$id' "; 

                                  $hasil=mysqli_query($conn, $querysearch);
                                  while($baris = mysqli_fetch_assoc($hasil))
                                  {
                                    if(($baris['gallery_industry']=='-')||($baris['gallery_industry']==''))
                                    {
                                      echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                    }
                                    else
                                    {
                                      echo "<a href='../_foto/".$baris['gallery_industry']."'><img src='../_foto/".$baris['gallery_industry']."'></a>";
                                    }
                                  }
                                } 
                                elseif (strpos($id,"R") !== false) //Restoran
                                {  
                                  $querysearch  ="SELECT a.id, b.gallery_restaurant FROM restaurant as a left join restaurant_gallery as b on a.id=b.id where a.id='$id' "; 

                                  $hasil=mysqli_query($conn, $querysearch);
                                  while($baris = mysqli_fetch_assoc($hasil))
                                  {
                                    if(($baris['gallery_restaurant']=='-')||($baris['gallery_restaurant']==''))
                                    {
                                      echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                    }
                                    else{
                                      echo "<a href='../_foto/".$baris['gallery_restaurant']."'><img src='../_foto/".$baris['gallery_restaurant']."'></a>";
                                    }
                                  }
                                } 
                                else //Angkot
                                {  

                                  $querysearch  ="SELECT a.id, b.gallery_angkot FROM angkot as a left join angkot_gallery as b on a.id=b.id where a.id='$id' "; 

                                  //echo "$querysearch";     
                                  echo "<script language='javascript'>alert('$querysearch');</script>";   
                                  $hasil=mysqli_query($conn, $querysearch);
                                  while($baris = mysqli_fetch_assoc($hasil))
                                  {
                                    if(($baris['gallery_angkot']=='-')||($baris['gallery_angkot']==''))
                                    {
                                      echo "<a href='../_foto/foto.jpg'><img src='../_foto/foto.jpg' ></a>";
                                    }
                                    else{
                                      echo "<a href='../_foto/".$baris['gallery_angkot']."'><img src='../_foto/".$baris['gallery_angkot']."'></a>";
                                    }
                                  }
                                }
                              ?>            
                            </div>
                          </div>
                          <br>
                          <div class="text-center">
                            <a data-href="" title="Videos" data-toggle="modal" data-target="#play-videos" class="btn btn-compose" style=" color: white; height: 40px; width: 100%; max-width: 450px; padding: 2px" onclick="playVids()" ><i class="fa fa-play"></i>PLAY VIDEOS</a>
                              
                            <div class="modal fade" id="play-videos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog" style="width: 800px;">
                                <div class="modal-content">
                                  <div style="background-color: " class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" onclick="pauseVids()">&times;</button>
                                    <h4 style="color: white; text-align: left; font-size: 20px;">Videos of<b> <?php echo $id; ?></b></h4>
                                  </div>

                                  <div class="modal-body">
                                    <video id="vids" controls style="width: 640px">
                                      <?php
                                        $querysearch = "SELECT video_tourism FROM tourism_video where id = '$id'";

                                        $hasil = mysqli_query($conn, $querysearch);   
                                        $xx = 0;

                                        while($baris = mysqli_fetch_array($hasil))
                                        {
                                          $nilai = $baris['video_tourism'];
                                          $xx++;
                                        ?>
                                        <source src="../_video/<?php echo $nilai; ?>" type="video/mp4">
                                        <?php
                                        }
                                        if($xx==0){
                                          
                                        ?>
                                          <source src="../_video/novideo.mp4" type="video/mp4" >
                                        <?php
                                        }
                                          echo "$nilai";
                                      ?>
                                    </video>
                                      <!-- <iframe width="640" height="480" 
                                      src="https://www.youtube.com/embed/7-BbAx4fgCY?autoplay=1&mute=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: #26a69a; color: white;" onclick="pauseVids()"><b>Close</b></button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>

                <!-- RATING & REVIEWS =============================================================================== -->
                <div class="col-sm-12">
                  <div class="row">
                    <section class="panel">
                      <header class="panel-heading">
                        <h2 class="box-title" style="text-transform:capitalize; text-align: center"><b> Rating & Review</b></h2>
                      </header>

                      <div class="panel-body">
                      <form method="POST" action="_add_comment.php">
                        <input type="hidden" name="id" value="<?php echo $_GET['idgallery']?>" >
                          <table id="" class="table">
                            <tbody  style='vertical-align:top;'>
                              <?php 
                                echo $username;
                                if ($_SESSION['C'] == true) 
                                {
                                ?>
                                <tr>
                                  <td>
                                    <input type="text name='gidr'" id='gidr' value='' hidden=''> 
                                      <div id='star-containerz'> Rating :  
                                        <i class='fa fa-star star2' id='star2-1'></i>
                                        <i class='fa fa-star star2' id='star2-2'></i>
                                        <i class='fa fa-star star2' id='star2-3'></i>
                                        <i class='fa fa-star star2' id='star2-4'></i>
                                        <i class='fa fa-star star2' id='star2-5'></i>
                                      </div>
                                      <input type='text' name='rateid' id='rateid' value='' hidden=''>
                                      <br>  
                                      Name 
                                      <br> <input class='form-control' cols='40' rows='1' name='nama' readonly="" required="" value="<?php echo $username = $_SESSION['username'];?>">
                                      <br>
                                      Comment 
                                      <br> <textarea class='form-control' cols='40' rows='5' name='comment' required=""></textarea>
                                      <br>
                                    <input type='submit' name='' class='btn btn-primary pull-right' style=" color: white" value='Post' >
                                  </td>
                                </tr>
                                <?php        
                                }
                              ?> 
                            </tbody>          
                          </table>
                        </form>

                        <?php
                          require '../connect.php'; 
                          $id = $_GET["idgallery"];

                          if(strpos($id,"HT") != false){
                            $sqlreview = "SELECT * from review where id_hotel = '$id' ORDER BY tanggal DESC";
                          }elseif (strpos($id,"RM") !== false) {
                            $sqlreview = "SELECT * from review where id_kuliner = '$id' ORDER BY tanggal DESC";
                          }elseif (strpos($id, "SO") !== false) {
                            $sqlreview = "SELECT * from review where id_souvenir = '$id' ORDER BY tanggal DESC";
                          }elseif (strpos($id,"IK") !== false) {
                             $sqlreview = "SELECT * from review where id_ik = '$id' ORDER BY tanggal DESC";
                          }elseif (strpos($id,"TM")!== false) {
                             $sqlreview = "SELECT * from review where id_ow = '$id' ORDER BY tanggal DESC";
                          }
                          $result = mysqli_query($conn, $sqlreview);
                        ?>

                        <?php 
                          //echo "username $username, role $role";
                          if($_SESSION['C'] == false)
                          {
                            echo "<h6 style='background-color: white; color: black; text-align: center' href='./admin/login.php'>Silahkan login untuk Memberi Rating & Review</h6><br>";
                          }
                          else
                          {
                            echo "";
                            //echo "username $username, role $role";
                          }
                        ?>
                        <div style="padding-bottom: 10px">
                          <b>Review :</b>
                        </div>
                        <div style="height: 310px; overflow-y: scroll; ">
                          <table class="table">
                                                                        
                          <?php  
                            while ($rows = mysqli_fetch_array($result)) 
                            {
                              $rating = $rows['rating'];
                              $tanggal = $rows['tanggal'];
                              $nama = $rows['name'];
                              $komen = $rows['comment'];
                              ?>
                              <tr>
                                <td>
                                  <div id='star-containerz'> 
                                    <i class="fa fa-star star2 <?php echo $rating >= 1 ? "star-checked" : ""; ?>"></i>
                                    <i class="fa fa-star star2 <?php echo $rating >= 2 ? "star-checked" : ""; ?>"></i>
                                    <i class="fa fa-star star2 <?php echo $rating >= 3 ? "star-checked" : ""; ?>"></i>
                                    <i class="fa fa-star star2 <?php echo $rating >= 4 ? "star-checked" : ""; ?>"></i>
                                    <i class="fa fa-star star2 <?php echo $rating == 5 ? "star-checked" : ""; ?>"></i>
                                  </div>
                                  <?php
                                    echo "$tanggal oleh <b>$nama</b> <br>
                                    $komen <br>"
                                  ?>
                                </td>
                              </tr>
                              <?php
                              }
                            ?>               
                            </table>
                          </div>
                      <tr colspan></tr>
                    </section>
                  </div>
                </div>
              </div>

                <div class="col-sm-12"> 
                  <div class="white-panel pns">
                    <header class="panel-heading" style="float:left">
                      <label style="color: black; margin-right:20px">Google Map with Location List</label>
                        <a class="btn btn-default" role="button" data-toggle="collapse" onclick="lokasimanual()" title=" Manual Position" ><i class="fa fa-location-arrow" style="color:black;"></i></a>
                        <a class="btn btn-default" role="button" data-toggle="collapse" onclick="posisisekarang()" title="Current Position" style="margin-right:10px"   ><i class="fa fa-map-marker" style="color:black;"></i></a>
                    </header>
                    <div class="row">
                      <div class="col-sm-6 col-xs-6"></div>
                    </div>                        
                    <div id="map" class="centered" style="height:260px"></div>
                  </div>
                </div>

                </div> 
              </div>
            </div>
          </div>
        </div>
      </section>
    </section>
  </section>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/jquery-1.8.3.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="assets/js/fancybox/jquery.fancybox.js"></script>    
  <script src="assets/js/jquery.scrollTo.min.js"></script>
  <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="assets/js/jquery.sparkline.js"></script>
  <script src="_map.js" type="text/javascript"></script>
  <script src="assets/js/common-scripts.js"></script>

  <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
  <!-- <script src="assets/js/advanced-form-components.js"></script>   -->

  <script type="text/javascript">
    var id_cek = 0;
    function r(){
       console.log('Coti ya');
       $('.fa-info').click(function(){
        console.log('hy, atashi no namae wa Coti desu');
        $("#star2-1,#star2-2,#star2-3,#star2-4,#star2-5").removeClass('star-checked');
      });
    }
    $('.star').click(function(){

    //get the id of star
    var star_id = $(this).attr('id');
    var star_index = $(this).attr("id").split("-")[1];
    $("#ratecari").val(star_index);
    switch (star_id){
      case "star-1":
        $("#star-1").addClass('star-checked');
        $("#star-2,#star-3,#star-4,#star-5").removeClass('star-checked');
        break;
      case "star-2":
        $("#star-1,#star-2").addClass('star-checked');
        $("#star-3,#star-4,#star-5").removeClass('star-checked');
        break;
      case "star-3":
        $("#star-1,#star-2,#star-3").addClass('star-checked');
        $("#star-4,#star-5").removeClass('star-checked');
        break;
      case "star-4":
        $("#star-1,#star-2,#star-3,#star-4").addClass('star-checked');
        $("#star-5").removeClass('star-checked');
        break;
      case "star-5":
        $("#star-1,#star-2,#star-3,#star-4,#star-5").addClass('star-checked');
        break;
      }
    });

    //memilih rating add review
    $('.star2').click(function(){

      //get the id of star
      var star_id = $(this).attr('id');
      var star_index = $(this).attr("id").split("-")[1];
      $("#rateid").val(star_index);
      switch (star_id){
        case "star2-1":
          $("#star2-1").addClass('star-checked');
          $("#star2-2,#star2-3,#star2-4,#star2-5").removeClass('star-checked');
          break;
        case "star2-2":
          $("#star2-1,#star2-2").addClass('star-checked');
          $("#star2-3,#star2-4,#star2-5").removeClass('star-checked');
          break;
        case "star2-3":
          $("#star2-1,#star2-2,#star2-3").addClass('star-checked');
          $("#star2-4,#star2-5").removeClass('star-checked');
          break;
        case "star2-4":
          $("#star2-1,#star2-2,#star2-3,#star2-4").addClass('star-checked');
          $("#star2-5").removeClass('star-checked');
          break;
        case "star2-5":
          $("#star2-1,#star2-2,#star2-3,#star2-4,#star2-5").addClass('star-checked');
          break;
      }
    });
  </script>

  <script type="text/javascript"> // TOURISM VIDEO
    
    var vid = document.getElementById("vids"); 

    function playVids() { 
      vid.play(); 
    } 

    function pauseVids() { 
      vid.pause(); 
    } 

  </script>

  <script type="text/javascript">
    $(function() {
      //    fancybox
        jQuery(".fancybox").fancybox();
    });
  </script>

  <script>
    var slideIndex = 1;
    //showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function currentDiv(n) {
      showDivs(slideIndex = n);
    }

    function showDivs(n) 
    {
      var i;
      var x = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      if (n > x.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
         dots[i].className = dots[i].className.replace(" w3-white", "");
      }
      x[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " w3-white";
    }
  </script>
  </body>
</html>
<tr> 