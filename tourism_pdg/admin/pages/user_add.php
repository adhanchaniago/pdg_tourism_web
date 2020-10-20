<div class="col-sm-12"> <!-- menampilkan form add facility-->
  <section class="panel">
    <div class="panel-body">
      <!-- <a class="btn btn-compose" style="background-color: #26a69a">Add User</a> -->
      <h2 style="background-color: white; color: #26a69a; font-family: arial; "><i class="fa fa-users"></i><b> Add User</b></h2>
      <br>
      <div class="box-body" >

        <div class="form-group">
          <?php 
            if (!isset($_GET['user']))
            { 
          ?>

        <form class="form-horizontal style-form" role="form" action="act/add_user.php" method="post" >
            
          <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label" for="user">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" value="">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label" for="user">Stewardship Period</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="periode" value="">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label" for="user">Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="alamat" value="">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label" for="user">Contact</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="no_hp" value="">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label" for="user">Role</label>
            <div class="col-sm-10">
<!--               <select required name="role" class="form-control">
                <option value="A">Admin</option>
                <option value="P">Owner's Admin</option>                       
              </select> -->
              <select required name="role" class="form-control">
                <option <?php if($data['role']=='A') {echo "selected";}?> value="A">Admin</option>
                <option <?php if($data['role']=='P') {echo "selected";}?> value="P">Owner's Admin</option>        
                <option <?php if($data['role']=='C') {echo "selected";}?> value="C">Visitor</option>       
              </select>   
            </div>
          </div>

          <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label" for="id_hotel">Tourism</label>
              <div class="col-sm-10">
                <select  name="id[]" multiple id="id" class="form-control"> 
                  <option value="">None</option>
                    
                    <?php 

                      $tourism = mysqli_query($conn, "SELECT * FROM tourism WHERE username is null or username = ' '"); 
                      
                      while($tm = mysqli_fetch_assoc($tourism)) 
                      { 
                        echo"<option value=".$tm['id'].">".$tm['name']."</option>"; 
                      } 
                    ?>

                  <option value=""> </option>    
                    
                    <?php                 
                      $kuliner=mysqli_query($conn, "SELECT * FROM cullinary_place WHERE username is null or username = ' ' "); 
                       
                      while($kul = mysqli_fetch_assoc($kuliner)) 
                      { 
                        echo"<option value=".$kul['id'].">".$kul['name']."</option>"; 
                      } 
                    ?> 

                    <option value=""> </option>

                    <?php                   
                      $hotel=mysqli_query($conn, "SELECT * FROM hotel WHERE username is null or username = ' '"); 
                      
                      while($hot = mysqli_fetch_assoc($hotel)) 
                      { 
                        echo"<option value=".$hot['id'].">".$hot['name']."</option>"; 
                      } 
                    ?>

                    <option value=""> </option> 

                    <?php                   
                      $souvenir=mysqli_query($conn, "SELECT * FROM souvenir WHERE username is null or username = ' '"); 
                      
                      while($sou = mysqli_fetch_assoc($souvenir)) 
                      { 
                        echo"<option value=".$sou['id'].">".$sou['name']."</option>"; 
                      } 
                    ?>

                    <option value=""> </option>

                    <?php                   
                      $ik=mysqli_query($conn, "SELECT * FROM small_industry WHERE username is null or username = ' '"); 
                    
                      while($tw = mysqli_fetch_assoc($ik)) 
                      { 
                        echo"<option value=".$tw['id'].">".$tw['name']."</option>"; 
                      } 
                    ?>                     
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label" for="user">Username</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="username" value="">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label" for="pass">Password</label>
              <div class="col-sm-10">
                  <input type="password" class="form-control" name="password" value="">
              </div>
            </div> 

            <button type="submit" class="btn btn-primary pull-right" style="background-color: #26a69a">Save <i class="fa fa-floppy-o"></i></button>  
        
        </form>
        
        <?php 
          } 
        ?>
        
        </form>
      </div>
    </div>
  </section>
</div>