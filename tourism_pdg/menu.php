
<aside>
  <div id="sidebar"  class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
    	  <p class="centered"><a href="index.php"><img src="icon/aaa.jpg" class="img-circle" width="60"></a></p>
    	  <h5 class="centered">
          <?php 
            if(isset( $_SESSION['username']))
            {
              echo "Hello, ";
              echo $username = $_SESSION['username'];
            }
            else
            {
              echo "Hello, Visitor!"; 
            }
          ?>  
        </h5>

<!--    <li class="sub">
            <a onclick="init();gallery2();" style="cursor:pointer;background:none"><i class="fa fa-home"></i>&nbsp Dashboard</a>
        </li> -->

<!-- MENAMPILKAN LIST OBJEK WISATA -->
        <li class="sub">
            <a onclick="init();listTourism();" style="cursor:pointer;background:none"><i class="fa fa-list-ul"></i>&nbsp List Tourism</a>
        </li>

<!-- OBJEK WISATA DISEKITAR PENGGUNA -->
        <li class="sub">
            <a onclick="" style="cursor:pointer;background:none"><i class="fa fa-compass"></i>&nbsp Tourism Around You</a>
            <ul class="treeview-menu">

              <div class=" form-group" style="color: white;" >

                <label for="inputradius" style="font-size: 10pt";>Radius : </label>
                <label  id="nilai"  style="font-size: 10pt";>0</label> m
                
                <input  type="range" onchange="init();tourism_sekitar_user();cekkk();" id="inputradius" 
                        name="inputradius" data-highlight="true" min="0" max="20" value="0" >
                <script>
                  function cekkk()
                  {
                    document.getElementById('nilai').innerHTML=document.getElementById('inputradius').value*100
                  }
                </script>
              </div>
            </ul>                     
        </li>


<!-- SEMUA PENCARIAN OBJEK WISATA  -->
        <li class="sub-menu">
          <a href="javascript:;" >
              <i class="fa fa-search"></i>
              <span>Search Tourism By</span>
          </a>

          <ul class="sub">
        
            <li class="sub">
                <a style="cursor:pointer;background:none"><i class="fa fa-sort-alpha-asc"></i> By Name</a>
                <ul class="sub">
                  <li style="margin-top:10px"><input id="input_name" type="text" class="form-control"></li>                             
                  <li><a onclick="init();cari_tourism(1)" style="cursor:pointer;background:none">Search</a></li>
                </ul>
            </li>

            <li class="sub">
                <a style="cursor:pointer;background:none"><i class="fa fa-bookmark-o"></i> By Address</a>
                <ul class="sub">
                  <li style="margin-top:10px"><input id="input_address" type="text" class="form-control"></li>                             
                  <li><a onclick="init();cari_tourism(2)" style="cursor:pointer;background:none">Search</a></li>
                </ul>
            </li>

            <li class="sub">
                <a style="cursor:pointer;background:none"><i class="fa fa-tags"></i> By Type</a>
                <ul class="sub">
                  <li style="margin-top:10px">
                    <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="select_jenis">
                      <?php                      
                        include('../connect.php');

                        $querysearch="SELECT id, name FROM tourism_type"; 
                        $hasil=mysqli_query($conn, $querysearch);

                        while($baris = mysqli_fetch_array($hasil))
                        {
                            $id=$baris['id'];
                            $name=$baris['name'];
                            echo "<option value='$id'>$name</option>";
                        }
                      ?>
                    </select>
                  </li>                             
                  <li>
                    <a onclick="init();cari_tourism(3)" style="cursor:pointer;background:none">Search</a>
                  </li>
                </ul>
            </li>

            <li class="sub">
              <a style="cursor:pointer;background:none"><i class="fa fa-folder-o"></i> By Facility</a>
                <ul class="sub">
                  <li style="margin-top:10px">
                    <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="select_facility">
                      <?php                      
                        include('../connect.php');  

                        $querysearch="SELECT id, name FROM facility_tourism"; 
                        $hasil=mysqli_query($conn, $querysearch);

                        while($baris = mysqli_fetch_array($hasil))
                        {
                            $id=$baris['id'];
                            $name=$baris['name'];
                            echo "<option value='$id'>$name</option>";
                        }
                      ?>
                    </select>
                  </li>                             
                  <li>
                    <a onclick="init();cari_tourism(5)" style="cursor:pointer;background:none">Search</a>
                  </li>
                </ul>
            </li>

            <li class="sub-menu">
              <a href="javascript:;" >
                  <i class="fa fa-star-o"></i>
                  <span>By Rating</span>
              </a>
                <ul class="sub">
                  <div  class="panel-body" >
                    <div id="star-container" style="font-size: 11pt; color: white ">&nbsp
                      <i class="fa fa-star star" id="star-1" onclick=""></i>
                      <i class="fa fa-star star" id="star-2"></i>
                      <i class="fa fa-star star" id="star-3"></i>
                      <i class="fa fa-star star" id="star-4"></i>
                      <i class="fa fa-star star" id="star-5"></i>
                    </div>

                    <input type="text" class="form-control hidden" name="ratecari" id="ratecari" value="">
                    <li>
                      <a id="carikategori"  value="cari" onclick="btncarirate()" style="cursor:pointer;background:none">Search</a>
                    </li>

                    <!-- <button type="submit" class="btn btn-default" id="carikategori"  value="cari" onclick='btncarirate()'><i class="fa fa-search"></i></button> -->

                    <!-- <li><a onclick="btncarirate()" style="cursor:pointer;background:none">Search</a></li> -->
                  </div>
                </ul>
              </li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" >
                <i class="fa fa-gear"></i>
                <span>Tourism Have in Area</span>
            </a>
            <ul class="sub">                  
              <li class="sub">
                  <a style="color: white"> Mosque & Restaurant</a>
                  <!-- <a style=""><i class="fa fa-bookmark-o"></i> Restaurant</a> -->
              </li>

              <li class="sub">
                   <a onclick="init();tourismHave()" style="cursor:pointer;background:none">&nbspSearch</a> 
              </li>                             
              </li>
            </ul>
          </li>

          <!-- <li class="sub">
              <a href="apps.apk" download>
              <i class="fa fa-download" ></i>Download Android Apps</a>
          </li> -->

          <li class="sub-menu">
            <a class="" href=".././">
                <i class="fa fa-chevron-circle-left"></i>
                <span>Dashboard</span>
            </a>
          </li>

    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
<!--sidebar end