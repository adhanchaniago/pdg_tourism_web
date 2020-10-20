
        
<div class="col-sm-6"> <!-- menampilkan form add mosque-->
  <section class="panel">
    <div class="panel-body">
      <a class="btn btn-compose" style="background-color: #26a69a">Choose Recommendation</a>
      <div class="box-body">
        <div class="form-group" id="hasilcari1">
          <?php
            $query = mysqli_query($conn, "SELECT MAX(id) AS id FROM tourism");
            $result = mysqli_fetch_array($query);
            $idmax = $result['id'];
            if ($idmax==null) {$idmax=1;}
            else {$idmax++;}
          ?>
          <form role="form" action="act/tourism_add.php" enctype="multipart/form-data" method="post">
            <input type="text" class="form-control hidden" id="id" name="id" value="<?php echo $idmax ?>">
           
               <div class="form-group">
                  <label for="tourism_id">Tourism ID</label>
                  <select name="id" id="tourism_id" class="form-control">
                    <?php                 
                      $tourism2=mysqli_query($conn, "select * from tourism ");
                      while($row2 = mysqli_fetch_assoc($tourism2)){
                        echo "<option value=\"$row2[id]\">$row2[id]</option>";
                      }

                    ?>                  
                  </select>
                </div> 

                <div class="form-group">
                  <label for="tourism_name">Tourism Name</label>
                  <select name="name" id="tourism_name" class="form-control">
                    <?php               
                      $tourism3=mysqli_query($conn, "select * from tourism  ");
                      while($row3 = mysqli_fetch_assoc($tourism3)){
                        echo "<option value=\"$row3[id]\">$row3[name]</option>";
                      }
                    ?>                  
                  </select>
                </div> 
                
                <div class="form-group">
                  <label for="type">Type</label>
                  <select name="type" id="type" class="form-control">
                    <?php                 
                      $kategori=mysqli_query($conn, "select * from tourism_type ");
                      while($rowkategori = mysqli_fetch_assoc($kategori)){
                        echo "<option value=\"$rowkategori[id]\">$rowkategori[name]</option>";
                      }
                    ?>                  
                  </select>
                </div>  

            <button type="submit" class="btn btn-default pull-right" style="background-color: #2dc1d6; color: white">Save <i class="fa fa-floppy-o"></i></button>   
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
                <h3> Picture of <?php echo $name ?></h3>
              </header>
        
              <div class="panel-body">
                        <div class="html5gallery" style="max-height:700px;overflow:auto;" data-skin="horizontal" data-width="350" data-height="200" data-resizemode="fit">  
              <?php
              $id=$_GET['id'];
              $querysearch="SELECT gallery_tourism FROM tourism_gallery where id='$id'";
              $hasil=mysqli_query($conn, $querysearch);      
              $xx = 0;
                while($baris = mysqli_fetch_array($hasil)){
                  $nilai=$baris['gallery_tourism'];
                  $xx++;
            ?>
              <image src="../../_foto/<?php echo $nilai; ?>" style="width:10%;">
              <!--image src="../foto/tw002_a.jpg" style="width:10%;"-->
            <?php
                }
                if($xx==0){
            ?>
              <image src="../../_foto/no.png" style="width:10%;">
            <?php
                }
                echo "$nilai";
            ?>
            </div>
              </div>                      
          </section>
      </div>

      <div class="col-sm-12"> <!-- menampilkan peta-->
          <section class="panel">
              <header class="panel-heading">
                <h3>Upload Picture of <?php echo $name ?></h3>
            </header>
              
              <div class="panel-body">
            <form role="form" action="act/tourism_upload_photo.php" enctype="multipart/form-data" method="post">
                <div class="box-body">
                <input type="text" class="form-control hidden" name="id" value="<?php echo $id ?>">
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
              $tourism2=mysqli_query($conn, "select * from tourism ");
              while($row2 = mysqli_fetch_assoc($tourism2)){
                echo "<option value=\"$row2[id]\">$row2[name]</option>";
              }
            ?>                  
          </select>
        </div> 
  </section>
</div> -->
<script src="inc/mapupd.js" type="text/javascript"></script>