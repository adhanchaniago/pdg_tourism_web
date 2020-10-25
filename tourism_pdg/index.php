<?php 
    session_start();
    $username = $_SESSION['username'];   
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website untuk pengembangan wisata Padang">
    <meta name="author" content="Imam">
    <meta name="keyword" content="Tourism, SI Unand, Unand, Wisata">

    <title>Halal Tourism • Padang</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!--  Slide -->
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

    <!-- <script type="text/javascript" src="assets/js/js.js"></script> -->

    <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE"></script> -->

    <!-- Slide gambar -->
    <link rel="stylesheet" type="text/css" href="assets/css/slider.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="assets/js/mystyle.css" rel="stylesheet">

    <style type="text/css">
      #legend {
        background: white;
        padding: 10px;
        margin: 5px;
        font-size: 12px;
        text-align: left;
        color: black;
        font-family: Arial, sans-serif;
      }
      .color {
          border: 1px solid;
          height: 14px;
          width: 18px;
          margin-right: 3px;
          float: left;
          opacity: 0.4;
      }
      .a {
          background: #FF0000;
        }
      .b {
          background: #ffd777;
        }
      .c {
          background: #00b300;
        }
      .d {
          background: #33CCFF;
        }
      .e {
          background: #337AFF;
        }
      .f {
          background: #FF9300;
        }
      .g {
          background: #66FF33;
        }
      .h {
          background: #996600;
        }
      .i {
          background: #FFFF00;
        }
      .j {
          background: #CC0099;
        }
      .k {
          background: #110094;
        }

      /*css scrollbar*/
      ::-webkit-scrollbar {
          width: 7px;    
      }
       
      ::-webkit-scrollbar-track {     
          background: #fff;    
      }
       
      ::-webkit-scrollbar-thumb {
          background:  /*white*/ #26a69a;
          border-radius:10px;   
      }
    </style>

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
    </style>  
  </head>

  <body onload="init()" >

  <section id="container" >
    <!-- Modal -->
    <div class="modal fade" id="modal_gallery" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="mg_title">Modal Header</h4>
          </div>
          <div class="modal-body" id="mg_body">

            <!--GALERY ==========================================================================================-->
            <div id="view_galery" class="row" style="display:none">
              <div class="col-md-12 col-sm-12 mb">
               <div class="row centered" style="padding:10px">
                 <div class="col-sm-1 col-xs-1"></div>
                  <div id="gal" class="col-sm-10 col-xs-10" style="height:300px;">
                    <div class="w3-content w3-display-container" style="max-height:300px;max-width:600px">
                      <div id="img_gambar"></div>
                        <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
                          <div class="col-md-6 col-sm-6 mb">
                              <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
                          </div>
                          <div class="col-md-6 col-sm-6 mb">
                              <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
                          </div>
                          <div id="span_gambar"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-1 col-xs-1"></div>
                  </div>
                </div><!-- /col-md-12 -->             
              </div><!-- /row -->   
              <div class="col-md-12 col-sm-12 mb" style="margin-top:10px">
                <p id="mg_text" ></p>
              </div><!-- /col-md-12 -->             
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" >
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="modal_title">Modal Header</h4>
            </div>
            <div class="modal-body" id="modal_body"></div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

<!-- ==============================================================================================================-->
<!-- HEADER WEB APLICATION ========================================================================================-->
<!-- ==============================================================================================================-->

    <header class="header black-bg">
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
              echo "<a href='admin/login.php' class='btn btn-default' style='background-color: #26a69a; margin-top: 10px; font-size:14px; color:white; font-family: arial;'>   <b>&nbsp&nbspLOG IN &nbsp</b> </a>";
              //echo "username $username, role $role";
            }
            else
            {
              echo "<a href='admin/act/logout.php' class='btn btn-default' style='background-color: #26a69a; margin-top: 10px; font-size:14px; color:white; font-family: arial;'> <b>&nbsp&nbspLOG OUT &nbsp</b></a>";
              //echo "username $username, role $role";
            }
          ?>
          <li>
            <div id="loader" style="display:none"></div>
          </li>
          <li id="loader_text" style="margin-top:13px;display:none"><b>Loading</b></li>
          <li class="nav pull-right top-menu"></li>
      	</ul>
      </div>
    </header>
      
<!-- ==============================================================================================================-->
<!-- MAIN SIDEBAR APPLICATION =====================================================================================-->
<!-- ==============================================================================================================-->
      
    <?php 
      include 'menu.php';
    ?>

<!-- ==============================================================================================================-->
<!-- MAIN CONTENT =================================================================================================-->
<!-- ==============================================================================================================-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div  class="col-lg-8 main-chart">    

            <!--PETA-->
            <div class="row" id="maps1">                   
              <div class="col-md-12 col-sm-12 mb">
                <div class="white-panel pns">
                  <header class="panel-heading" style="float:left">
                    <label style="color: black; margin-right:20px">Google Map with Location List
                    </label>
                      <input type="hidden" id="myLatLocation" value="0">
                      <input type="hidden" id="myLngLocation" value="0">
                      <a class="btn btn-default" style="background-color: #26a69a" role="button" data-toggle="collapse" onclick="posisisekarang()" title="Current Position" style="margin-right:5px"><i class="fa fa-location-arrow" style="color: white;"></i></a>
                      <a class="btn btn-default" style="background-color: #26a69a" role="button" data-toggle="collapse" onclick="lokasimanual()" title=" Manual Position" style="margin-right:5px"><i class="fa fa-map-marker" style="color: white;"></i></a>
                      <label id="tombol">
                      <a class="btn btn-default" style="background-color: #26a69a" role="button" id="showlegenda" data-toggle="collapse" onclick="legenda()" title="Legend" style="margin-right:5px"><i class="fa fa-eye" style="color: white;"></i></a>
                      </label>
                  </header>
                  <div class="row">
                    <div class="col-sm-6 col-xs-6"></div>
                  </div>                        
                  <div id="map" class="centered" style="height: 485px;"></div>
                </div>
              </div>               
            </div>

            <!--INFO OBJEK-->         
            <div id="view_data_tengah1" class="row" style="display:none">
              <div class="col-md-12 col-sm-12 mb">
                <div class="white-panel pns" style="height:auto;padding-bottom:20px">
                  <div style="margin:0px 20px 10px 20px">
                    <h5 class="btn btn-compose" style="color: white; background-color: #26a69a;" >Object Information</h5>
                  </div>

                  <div class="row centered" style='margin-top:20px;color:black;'>
                    <div class="col-sm-1 col-xs-1"></div>
                    <div class="col-sm-10 col-xs-10">
                      <!--table class="table table-hover" id='view_table_tengah'>
                      </table-->
                      <table class="table" id='table_tengah_info'>
                        <tbody  style='vertical-align:top;'>
                        </tbody> 
                      </table> 
                    </div>
                  <div class="col-sm-1 col-xs-1"></div>
                  </div>
                </div>
              </div><!-- /col-md-12 -->             
            </div><!-- /row -->                 

            <!--HASIL TRACKING-->
            <div id="view_tracking" class="row" style="display:none;color:black">
              <div class="col-md-12 col-sm-12 mb">
                <div class="white-panel pns" style="height:200px">
                  <div class="white-header">
                    <h5 style='color:black'>Angkot Recommendations</h5>
                  </div>
                  <div class="row centered">
                    <div class="col-sm-1 col-xs-1"></div>
                    <div class="col-sm-10 col-xs-10">
                    <table class="table table-bordered">
                      <tbody id="view_tracking_table" style='color:black'></tbody>
                    </table>  
                  </div>
                  <div class="col-sm-1 col-xs-1"></div>
                </div>
              </div>
            </div><!-- /col-md-12 -->             
            </div><!-- /row -->  

            <!--HASIL TRACKING-->
            <div id="view_tracking2" class="row" style="display:none;color:black">
              <div class="col-md-12 col-sm-12 mb">
                <div class="white-panel pns" style="">
                  <div class="white-header">
                    <h5 style='color:black'>Route</h5>
                  </div>
                  <div class="row centered">
                    <div class="col-sm-1 col-xs-1"></div>
                    <div class="col-sm-10 col-xs-10">
                      <table class="table table-bordered">
                        <tbody id="view_tracking_table2" style='color:black'></tbody>
                      </table>  
                    </div>
                    <div class="col-sm-1 col-xs-1"></div>
                  </div>
                </div>
              </div><!-- /col-md-12 -->             
            </div><!-- /row -->  
          </div><!-- /col-lg-9 END SECTION MIDDLE -->         

          <!-- GALLERY RECOMMENDATION -->
          <div class="row" style="font-family: arial;"  id="galleryrecommendxxx">
            <div  class="col-lg-4 main-chart">  
              <div class="row">                   
                <div class="col-sm-12 col-sm-12 mb">
                  <div class="white-panel pns" style="height: auto; width: auto;" >
                    <header class="panel-heading" style=" width: 100%;">
                      <!-- <h4 style="color: #26a69a;"><b>Recommendation</b></h4> -->
                      <!-- <hr> -->
                    </header>
                    <?php 
                      require '../connect.php';

                      $gallery_tm = "SELECT id, gallery_tourism, rating FROM tourism_gallery 
                                      LEFT JOIN review ON tourism_gallery.id = review.id_ow 
                                      WHERE serial_number = 1 
                                      GROUP BY tourism_gallery.id HAVING AVG(rating) >= 3 
                                      ORDER BY review.rating DESC";

                      $result = mysqli_query($conn, $gallery_tm);

                      $gallery_worship = "SELECT worship_place_gallery.id, gallery_worship_place, name 
                                          FROM worship_place_gallery 
                                          LEFT JOIN worship_place ON worship_place_gallery.id = worship_place.id 
                                          WHERE serial_number = 1 && park_area_size >= 30";

                      $result2 = mysqli_query($conn, $gallery_worship);

                      $gallery_hot = "SELECT id, gallery_hotel, rating FROM hotel_gallery 
                                      LEFT JOIN review ON hotel_gallery.id = review.id_hotel 
                                      WHERE serial_number = 1";

                      $result3 = mysqli_query($conn, $gallery_hot);                                     

                      $gallery_sou = "SELECT id, gallery_souvenir, rating FROM souvenir_gallery 
                                      LEFT JOIN review ON souvenir_gallery.id = review.id_souvenir 
                                      WHERE serial_number = 1";
                                      // GROUP BY souvenir_gallery.id HAVING AVG(rating) >= 1 
                                      // ORDER BY review.rating DESC";

                      $result4 = mysqli_query($conn, $gallery_sou);

                      $gallery_res = "SELECT id, gallery_restaurant, rating FROM restaurant_gallery 
                                      LEFT JOIN review ON restaurant_gallery.id = review.id_restaurant 
                                      WHERE serial_number = 1";

                      $result5 = mysqli_query($conn, $gallery_res);

                    ?>
                    <div style="height: 560px; overflow-y: scroll; ">  
                    <br>  
                      <!-- TOURISM -->
                      <b style="color: black">Tourism</b>
                      <div class="imam-slider" id="galleryTourism">
                        <div class="isi-slider">
                          <?php
                              while ($rows = mysqli_fetch_array($result)) 
                              {
                                $id_tm = $rows['id'];
                                $gambar = $rows['gallery_tourism'];                             
                                if( mysqli_num_rows($result) >= 4) {
                                  ?><a href="" onclick="galleryreco('<?php echo $id_tm ?>')"><img src="../_foto/<?php echo $gambar?>"></a><?php
                                }
                                else {
                                  $array_id_tm[]=$rows['id'];
                                  $array_gambar[]=$rows['gallery_tourism'];
                                  ?>
                                  <a href="" onclick="galleryreco('<?php echo $array_id_tm[array_rand($array_id_tm)] ?>')"><img src="../_foto/<?php echo $array_gambar[array_rand($array_gambar)]?>"></a>
                                  <a href="" onclick="galleryreco('<?php echo $array_id_tm[array_rand($array_id_tm)] ?>')"><img src="../_foto/<?php echo $array_gambar[array_rand($array_gambar)]?>"></a>
                                  <a href="" onclick="galleryreco('<?php echo $array_id_tm[array_rand($array_id_tm)] ?>')"><img src="../_foto/<?php echo $array_gambar[array_rand($array_gambar)]?>"></a>
                                  <a href="" onclick="galleryreco('<?php echo $array_id_tm[array_rand($array_id_tm)] ?>')"><img src="../_foto/<?php echo $array_gambar[array_rand($array_gambar)]?>"></a>
                                  <?php
                                  //echo $array_id_tm[array_rand($array_id_tm)];
                                }
                              }
                          ?>
                        </div>
                      </div>
                      <!-- MESJID -->
                      <b style="color: black">Mosque</b>
                      <div class="imam-slider" id="galleryMesjid">
                        <div class="isi-slider">
                          <?php
                              while ($rows = mysqli_fetch_array($result2)) 
                              {
                                $id_worship = $rows['id'];
                                $gambar_worship = $rows['gallery_worship_place'];                             
                                if( mysqli_num_rows($result2) >= 4) {
                                  ?><a href="" onclick="galleryrecomes('<?php echo $id_worship ?>')"><img src="../_foto/foto_mesjid/<?php echo $gambar_worship?>"></a><?php
                                }
                                else {
                                  $array_id_worship[]=$rows['id'];
                                  $array_gambar_worship[]=$rows['gallery_worship_place'];
                                  ?>
                                  <a href="" onclick="galleryrecomes('<?php echo $array_id_worship[array_rand($array_id_worship)] ?>')"><img src="../_foto/foto_mesjid/<?php echo $array_gambar_worship[array_rand($array_gambar_worship)]?>"></a>

                                  <a href="" onclick="galleryrecomes('<?php echo $array_id_worship[array_rand($array_id_worship)] ?>')"><img src="../_foto/foto_mesjid/<?php echo $array_gambar_worship[array_rand($array_gambar_worship)]?>"></a>

                                  <a href="" onclick="galleryrecomes('<?php echo $array_id_worship[array_rand($array_id_worship)] ?>')"><img src="../_foto/foto_mesjid/<?php echo $array_gambar_worship[array_rand($array_gambar_worship)]?>"></a>

                                  <a href="" onclick="galleryrecomes('<?php echo $array_id_worship[array_rand($array_id_worship)] ?>')"><img src="../_foto/foto_mesjid/<?php echo $array_gambar_worship[array_rand($array_gambar_worship)]?>"></a>
                                  <?php
                                  //echo $array_id_tm[array_rand($array_id_tm)];
                                }
                              }
                          ?>
                        </div>
                      </div>
                      <!-- HOTEL -->
                      <b style="color: black">Hotel</b>
                      <div class="imam-slider" id="galleryHotel">
                        <div class="isi-slider">
                          <?php
                              while ($rows = mysqli_fetch_array($result3)) 
                              {
                                $id_hot = $rows['id'];
                                $gambar_hot = $rows['gallery_hotel'];                             
                                if( mysqli_num_rows($result3) >= 4) {
                                  ?><a href="" onclick="galleryrecohot('<?php echo $id_hot ?>')"><img src="../_foto/foto_hotel/<?php echo $gambar_hot?>"></a><?php
                                }
                                else {
                                  $array_id_hot[]=$rows['id'];
                                  $array_gambar_hot[]=$rows['gallery_hotel'];
                                  ?>
                                  <a href="" onclick="galleryrecohot('<?php echo $array_id_hot[array_rand($array_id_hot)] ?>')"><img src="../_foto/foto_hotel/<?php echo $array_gambar_hot[array_rand($array_gambar_hot)]?>"></a>

                                  <a href="" onclick="galleryrecohot('<?php echo $array_id_hot[array_rand($array_id_hot)] ?>')"><img src="../_foto/foto_hotel/<?php echo $array_gambar_hot[array_rand($array_gambar_hot)]?>"></a>

                                  <a href="" onclick="galleryrecohot('<?php echo $array_id_hot[array_rand($array_id_hot)] ?>')"><img src="../_foto/foto_hotel/<?php echo $array_gambar_hot[array_rand($array_gambar_hot)]?>"></a>

                                  <a href="" onclick="galleryrecohot('<?php echo $array_id_hot[array_rand($array_id_hot)] ?>')"><img src="../_foto/foto_hotel/<?php echo $array_gambar_hot[array_rand($array_gambar_hot)]?>"></a>

                                  <?php
                                  //echo $array_id_tm[array_rand($array_id_tm)];
                                }
                              }
                          ?>
                        </div>
                      </div>
                      <!-- SOUVENIR -->
                      <b style="color: black">Souvenir</b>
                      <div class="imam-slider" id="gallerySouvenir">
                        <div class="isi-slider">
                          <?php
                              while ($rows = mysqli_fetch_array($result4)) 
                              {
                                $id_sou = $rows['id'];
                                $gambar_sou = $rows['gallery_souvenir'];                             
                                if( mysqli_num_rows($result4) >= 4) {
                                  ?><a href="" onclick="galleryrecosou('<?php echo $id_sou ?>')"><img src="../_foto/foto_souvenir/<?php echo $gambar_sou?>"></a><?php
                                }
                                else {
                                  $array_id_sou[]=$rows['id'];
                                  $array_gambar_sou[]=$rows['gallery_souvenir'];
                                  ?>
                                  <a href="" onclick="galleryrecosou('<?php echo $array_id_sou[array_rand($array_id_sou)] ?>')"><img src="../_foto/foto_souvenir/<?php echo $array_gambar_sou[array_rand($array_gambar_sou)]?>"></a>

                                  <a href="" onclick="galleryrecosou('<?php echo $array_id_sou[array_rand($array_id_sou)] ?>')"><img src="../_foto/foto_souvenir/<?php echo $array_gambar_sou[array_rand($array_gambar_sou)]?>"></a>

                                  <a href="" onclick="galleryrecosou('<?php echo $array_id_sou[array_rand($array_id_sou)] ?>')"><img src="../_foto/foto_souvenir/<?php echo $array_gambar_sou[array_rand($array_gambar_sou)]?>"></a>

                                  <a href="" onclick="galleryrecosou('<?php echo $array_id_sou[array_rand($array_id_sou)] ?>')"><img src="../_foto/foto_souvenir/<?php echo $array_gambar_sou[array_rand($array_gambar_sou)]?>"></a>
                                  <?php
                                  //echo $array_id_tm[array_rand($array_id_tm)];
                                }
                              }
                          ?>
                        </div>
                      </div>
                      <!-- RESTAURANT -->
                      <b style="color: black">Restaurant</b>
                      <div class="imam-slider" id="galleryRestaurant">
                        <div class="isi-slider">
                          <?php
                              while ($rows = mysqli_fetch_array($result5)) 
                              {
                                $id_res = $rows['id'];
                                $gambar_res = $rows['gallery_restaurant'];                             
                                if( mysqli_num_rows($result5) >= 4) {
                                  ?><a href="" onclick="galleryrecores('<?php echo $id_res ?>')"><img src="../_foto/foto_restaurant/<?php echo $gambar_res?>"></a><?php
                                }
                                else {
                                  $array_id_res[]=$rows['id'];
                                  $array_gambar_res[]=$rows['gallery_restaurant'];
                                  ?>
                                  <a href="" onclick="galleryrecores('<?php echo $array_id_res[array_rand($array_id_res)] ?>')"><img src="../_foto/foto_restaurant/<?php echo $array_gambar_res[array_rand($array_gambar_res)]?>"></a>

                                  <a href="" onclick="galleryrecores('<?php echo $array_id_res[array_rand($array_id_res)] ?>')"><img src="../_foto/foto_restaurant/<?php echo $array_gambar_res[array_rand($array_gambar_res)]?>"></a>

                                  <a href="" onclick="galleryrecores('<?php echo $array_id_res[array_rand($array_id_res)] ?>')"><img src="../_foto/foto_restaurant/<?php echo $array_gambar_res[array_rand($array_gambar_res)]?>"></a>

                                  <a href="" onclick="galleryrecores('<?php echo $array_id_res[array_rand($array_id_res)] ?>')"><img src="../_foto/foto_restaurant/<?php echo $array_gambar_res[array_rand($array_gambar_res)]?>"></a>

                                  <?php
                                  //echo $array_id_tm[array_rand($array_id_tm)];
                                }
                              }
                          ?>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>                
              </div>
            </div>
          </div>   
                  
<!-- ==============================================================================================================-->
<!-- RIGHT SIDEBAR ================================================================================================-->
<!-- ==============================================================================================================-->
                                       
          <div id="view_kanan_table" class="col-md-4 col-sm-4 mb" style="margin-top:0px; display:none;">
            <div class="white-panel pns" style="height:510px">
              <div class="white-header" style="height:40px;margin:20px;background:white;color:black">
                <h5 class="btn btn-compose" id="judul_table" style="background-color: #26a69a;">List Tourism</h5>
              </div>
              <div class="row">
                <div class="col-sm-6 col-xs-6"></div>
              </div>
              <div style="height:410px; overflow-y: scroll; margin:20px;">
                <table style="color:black" class="table table-bordered">
                  <tbody id='kanan_table'></tbody>
                </table>
              </div>
            </div>
          </div>

          <div id="view_kanan_table1" class="col-md-4 col-sm-4 mb" style="margin-top:0px; display:none;">
            <div class="white-panel pns" style="padding-left: 20px; padding-right: 20px; padding-bottom: 20px">
              <div class="white-header" style="background:white;color:black">
                <h5 class="btn btn-compose" style="color: white; background-color: #26a69a;" id="judul_table">Object Arround</h5>
              </div>
              <div class="row">
                <div class="col-sm-6 col-xs-6"></div>
              </div>
              <div style=" margin: 10px;">
                <table style="color:black" class="table table-bordered">
                  <!-- <tr id="kanan_table1"></tr> -->
                  <tbody id='kanan_table1'></tbody>
                </table>
              </div>
            </div>
          </div>
                          
          <!-- DATA TABLE OBJEK SEKITAR-->
          <div id="view_table_sekitar" class="col-md-4 col-sm-4 mb" style="display:none">
            <div class="white-panel pns" style="height:510px">
              <div class="white-header" style="height:40px;margin:20px;margin-top:0px;background:white;color:black">
                <h5 class="btn btn-compose" style="color: white; background-color: #26a69a;">Search Results Object Around</h5>
              </div>
              <div class="row">
                <div class="col-sm-6 col-xs-6"></div>
              </div>
              <div style="height:410px; margin:20px; overflow-y: scroll;">
                <table id="table_hotel" class="table table-bordered">
                  <tbody id='table_kanan_hotel' style='color:black'></tbody>
                </table>  
                <table id="table_tourism" class="table table-bordered">
                  <tbody id='table_kanan_tourism' style='color:black'></tbody>
                </table>  
                <table id="table_worship" class="table table-bordered">
                  <tbody id='table_kanan_worship' style='color:black'></tbody>
                </table>  
                <table id="table_souvenir" class="table table-bordered">
                  <tbody id='table_kanan_souvenir' style='color:black'></tbody>
                </table>  
                <table id="table_culinary" class="table table-bordered">
                  <tbody id='table_kanan_culinary' style='color:black'></tbody>
                </table>  
                <table id="table_industry" class="table table-bordered">
                  <tbody id='table_kanan_industry' style='color:black'></tbody>
                </table>  
                <table id="table_restaurant" class="table table-bordered">
                  <tbody id='table_kanan_restaurant' style='color:black'></tbody>
                </table>  
                <table id="table_angkot" class="table table-bordered">
                  <tbody id='table_kanan_angkot' style='color:black'></tbody>
                </table>  
              </div>
            </div>
          </div><!-- /col-md-12 -->        

          <!-- FROM TRACKING ANGKOT -->
          <div id="view_kanan_track" class="col-md-4 col-sm-4 mb" style="margin-top:20px;display:none">
            <div class="white-panel pns">
              <div class="white-header" style="height:40px;margin:20px;background:white;color:white">
                <h5 class="btn btn-compose" style="color: white; background-color: #26a69a;" id="judul_select">Angkot Recommendations</h5>
              </div>
              <div class="row">
                <div class="col-sm-6 col-xs-6"></div>
              </div>
              <div style="padding:20px" >                            
                <div class="row" style="margin:5px">
                  <div class="col-sm-5 col-xs-5">
                    <input id="input_posisi_awal_lng" type="text" class="form-control" style="display:none">
                    <input id="input_posisi_awal_lat" type="text" class="form-control" style="display:none">
                      <a role='button' class='btn btn-default text-center' onclick='posisi_manual_1();' id='btnik' style="width: 100%;">Position Start </a>
                  </div>
                  <div id="text_awal" class="col-sm-7 col-xs-7" style="font-size:12px;text-align:left">
                    <div class="alert alert-warning" style="display: inline-block;padding: 6px 12px;width:100%"><b>Click</b> For setting position start</div>
                  </div>
                </div>
                <div class="row" style="margin:5px">
                  <div class="col-sm-5 col-xs-5">
                  <input id="input_posisi_tujuan_lat" type="text" class="form-control" style="display:none">
                  <input id="input_posisi_tujuan_lng" type="text" class="form-control" style="display:none">
                    <a role='button' class='btn btn-default text-center' onclick='posisi_manual_2();' id='btnik' style="width: 100%;">Position End </a>
                  </div>
                  <div id="text_tujuan" class="col-sm-7 col-xs-7" style="font-size:12px;text-align:left">
                    <div class="alert alert-warning" style="display: inline-block;padding: 6px 12px;width:100%"><b>Click</b> For setting position end</div>
                  </div>
                </div> 
                <div class="row" style="margin:5px">
                  <div class="col-sm-12 col-xs-12" id="kanan_rute"></div>
                </div>                           
                  <a role='button' class='btn btn-default text-center' style="margin-top:10px" onclick='call_rute_1();' id='btnik'>Process </a>
                  <a role='button' class='btn btn-default text-center' style="margin-top:10px" onclick='reset_rute();' id='btnik'>Reset </a>
              </div>
            </div>
          </div>
        </div>

<!-- ==============================================================================================================-->
<!-- FULL CONTENT= ================================================================================================-->
<!-- ==============================================================================================================-->

      </section>
    </section>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>

    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
  	<script src="assets/js/zabuto_calendar.js"></script>	


<!--********************************************-->
<!--MENGUBAH ANGKA MENJADI BINTANG UNTUK REVIEW -->
<!--********************************************-->

    <script type="text/javascript">
      
      var id_cek = 0;

      function r()
      {
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

      switch (star_id)
      {
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
    $('.star2').click(function()
    {
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
  	
    <script>
      var slideIndex = 1;
      //showDivs(slideIndex);

      function plusDivs(n) 
      {
        showDivs(slideIndex += n);
      }

      function currentDiv(n) 
      {
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