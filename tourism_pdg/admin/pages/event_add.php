<div class="col-sm-6"> 
  <section class="panel">
    <div class="panel-body">
      <!-- <a class="btn btn-compose" style="background-color: #26a69a">Add Event</a> -->
      <h2 style="background-color: white; color: #26a69a; font-family: arial; text-align: center;"><i class="fa fa-calendar"></i> <b>Add Event</b></h2>

        <div class="box-body">
          <div class="form-group" id="hasilcarievent">
            <?php

              $query = mysqli_query($conn, "SELECT MAX(id_event) AS id_event FROM event_tourism");
              $result = mysqli_fetch_array($query);

              $idmax = $result['id_event'];

              if ($idmax == null) {$idmax=1;}
              else {$idmax++;}
              
            ?>
            
            <form role="form" action="act/event_add.php" enctype="multipart/form-data" method="post">
            <input type="text" class="form-control hidden" id="id" name="id_event" value="<?php echo $idmax ?>">
           
               <div class="form-group">
                  <label for="tourism_id">Tourism</label>
                  <select name="tourism_id" id="tourism_id" class="form-control">
                    <?php                 
                      $tourism2 = mysqli_query($conn, "SELECT * FROM tourism ");

                      while($row2 = mysqli_fetch_assoc($tourism2))
                      {
                        echo "<option value=\"$row2[id]\">$row2[name]</option>";
                      }
                    ?>                  
                  </select>
                </div> 

                <div class="form-group">
                  <label for="nama_event">Event Name</label>
                  <input type="text" class="form-control" name="nama_event" value="">
                </div>

                <div class="form-group">
                  <label for="date_start">Date Start</label>
                  <input type="date" class="form-control" id="date_start" name="date_start" value="">
                </div>

                <div class="form-group">
                  <label for="date_end">Date End</label>
                  <input type="date" class="form-control" id="date_end" name="date_end" value="">
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea type="text" class="form-control" name="description" value=""></textarea>
                </div>

                <div class="form-group">
                  <label for="contact_person">Contact Person</label>
                  <input type="text" class="form-control" name="contact_person" value="">
                </div>

                <button type="submit" class="btn btn-primary pull-right" style=" color: white">Save <i class="fa fa-floppy-o"></i></button>
          </form> 
        </div><!-- Form Group -->
      </div><!-- Box Body -->                   
    </div><!-- Panel Body --> 
  </section>
</div>

  <div class="col-sm-6"> 
    <div class="row">
      <div class="col-sm-12">
        <section class="panel">
          <header class="panel-heading">
              <h3> Picture Event</h3>
          </header>
      
            <div class="panel-body">
              <div class="slideshow-container-aku" style="width: auto"> 
                <?php
                  $id_event = $_GET['id_event'];

                  $querysearch = "SELECT gallery_event FROM event_gallery where id_event = '$id_event'";
                  $hasil = mysqli_query($conn, $querysearch); 

                  $xx = 0;
                    while($baris = mysqli_fetch_array($hasil))
                    {
                      $nilai = $baris['gallery_event'];
                      $xx++;
                  ?>
                    <div class="slideAku">
                      <img src="../../_foto/event_foto/<?php echo $nilai; ?>" style="width:100%;">
                    </div>
                    <?php
                      }
                      if($xx==0){
                    ?>
                    <div class="slideAku">
                      <img src="../../_foto/mugen.jpg" style="width:100%;">
                    </div>
                  <?php
                    }
                    // echo "$nilai";
                ?>
              <a class="prevv" onclick="plusSlides(-1)">&#10094;</a>
              <a class="nextt" onclick="plusSlides(1)">&#10095;</a>
            </div>
          </div>                      
          </section>
      </div>
      <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
          showSlides(slideIndex += n);
        }

        function currentSlide(n) {
          showSlides(slideIndex = n);
        }

        function showSlides(n) {
          var i;
          var slides = document.getElementsByClassName("slideAku");
          var dots = document.getElementsByClassName("dot");
          if (n > slides.length) {slideIndex = 1}    
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
        }
      </script>

      <div class="col-sm-12">
        <section class="panel">
          <header class="panel-heading">
            <h3>Upload Picture of Event <?php echo $name ?></h3>
          </header>
            
          <div class="panel-body">
            <form role="form" action="act/event_upload_photo.php" enctype="multipart/form-data" method="post">
              <div class="box-body">
                <input type="text" class="form-control hidden" name="id_event" value="<?php echo $id_event ?>">
                  <div class="form-group">
                    <input type="file" class="" style="background:none;border:none;" name="image" required>
                  </div>
                  <span style="color:red;">*Maximum image size 500kb</span>
              </div><!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
              </div>
            </form>
          </div>        
        </section>
      </div>

<!-- <div class="col-sm-6"> 
  <section class="panel">
    <header class="panel-heading">
      <h3>                    
        <input id="latlng" type="text" class="form-control" style="width:200px; margin-bottom: 10px;" value="" placeholder="Latitude, Longitude">
          <button class="btn btn-default my-btn" id="btnlatlng" type="button" title="Geocode"><i class="fa fa-search"></i></button>
          <button class="btn btn-default my-btn" id="delete-button" type="button" title="Remove shape"><i class="fa fa-trash"></i></button>
      </h3>              
    </header>
      
    <div class="panel-body">
        <div class="form-group">
          <label for="type">Tourism Name</label>
          <select name="type" id="tourism_name" class="form-control">
            <?php                 
              $tourism2=mysqli_query($conn, "SELECT * FROM tourism ");
              while($row2 = mysqli_fetch_assoc($tourism2)){
                echo "<option value=\"$row2[id]\">$row2[name]</option>";
              }
            ?>                  
          </select>
        </div> 
  </section>
</div> -->
<script src="inc/mapupd.js" type="text/javascript"></script>

