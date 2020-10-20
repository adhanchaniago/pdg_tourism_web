<?php
	require '../../connect.php';

	$id = $_GET["id"];

	$query = "SELECT tourism.id, tourism.name, tourism.address, tourism.open, tourism.close, tourism.ticket, tourism_type.name AS tourism_type, st_x(st_centroid(tourism.geom)) AS lon, st_y(st_centroid(tourism.geom)) AS lat from tourism left join tourism_type on tourism_type.id=tourism.id_type where tourism.id ='$id'";

	$hasil=mysqli_query($conn, $query);

	while($baris = mysqli_fetch_array($hasil))
	{
	  $id=$baris['id'];
	  $name=$baris['name'];
	  $address=$baris['address'];
	  $open=$baris['open'];
	  $close=$baris['close'];
	  $ticket=$baris['ticket'];
	  $tourism_type=$baris['tourism_type'];
	  $lng=$baris['lon'];
	  $lat=$baris['lat'];

	  if ($lat=='' || $lng=='')
	  {
	    $lat='<span style="color:red">Kosong</span>';
	    $lng='<span style="color:red">Kosong</span>';
	  }
	}

	//DATA FASILITAS
	$facility;
	$query_fasilitas = "SELECT facility_tourism.id, facility_tourism.name FROM facility_tourism left join detail_facility_tourism on detail_facility_tourism.id_facility = facility_tourism.id left join tourism on tourism.id = detail_facility_tourism.id_tourism where tourism.id = '".$id."' "; 

	$hasil3=mysqli_query($conn, $query_fasilitas);

	while($baris = mysqli_fetch_array($hasil3))
	{
	    $abc=$baris['name'];
	    $facility=$facility."<li>".$abc."</li>";
	}
?>

	<div class="col-sm-12">
		<div class="col-sm-6"> 
		  	<section class="panel">
		      	<header class="panel-heading">
					<h2 class="box-title" style="text-transform:capitalize;"><b> <?php echo $name ?></b></h2>
		        </header>

		        <div class="panel-body">
					<table>
						<tbody style='vertical-align:top;'>
							<tr><td width="150px"><b>Address</b></td><td> :&nbsp; </td><td style='text-transform:capitalize;'><?php echo $address ?></td></tr>
							<tr><td><b>Open</b></td><td>:</td><td><?php echo $open ?></td></tr>
							<tr><td><b>Close</b></td> <td> :</td><td><?php echo $close ?></td></tr>
							<tr><td><b>Ticket<b> </td><td>: </td><td><?php echo $ticket ?></td></tr>
							<tr><td><b>Type<b> </td><td>: </td><td><?php echo $tourism_type ?></td></tr>
							<tr><td><b>Coordinat<b> </td><td>: </td><td><b>Latitude</b> : <?php echo $lat ?> <br><b>Longitude</b> : <?php echo $lng ?></td></tr>
							<tr><td><b>Facility</b> </td><td>: </td><td><?php echo $facility ?></td></tr>
						</tbody>	
					</table>

					<table>
						<tbody>
							<tr>
								<td><a href="?page=formsetF&id=<?php echo $id ?>" class="btn btn-default" style="color: white; background-color: #26a69a; margin: 10px"><i class="fa fa-caret-square-o-down" style="color: white"></i>&nbsp Set Facility</a>
								</td>

								<td><a href="?page=event_add&id=<?php echo $id ?>" class="btn btn-default" style="color: white; background-color: #26a69a; margin: 10px"><i class="fa fa-calendar" style="color: white"></i>&nbsp Add Event &nbsp</a>
								</td>
							</tr>
						</tbody>
					</table>

					<div class="btn-group">
						<a href="?page=tourism_update&id=<?php echo $id ?>" class="btn btn-default" style="background-color: #26a69a; margin: 10px; color: white;"><i class="fa fa-list" style="color: white;"></i>&nbsp Edit Data &nbsp&nbsp</a>

						<a class="btn btn-default" style="background-color: #26a69a; color: white; margin: 10px" role="button" data-toggle='collapse' href='#info' onclick='' title='' aria-controls='Nearby'><i class='fa fa-comment' style='color: white;'></i>&nbsp Add Info &nbsp&nbsp&nbsp&nbsp</a>
					</div>

					<div class='collapse' id='info'>
						<form method="post" action="act/addinfo.php">
							<input type="text" class="form-control hidden " id="id" name="id" value="<?php echo $id ?>">
							<input type="text" class="form-control hidden " id="username" name="username" value="<?php echo $username ?>">
							<table class="table">
								<tbody  style='vertical-align:top;'>
									<tr><td><b>Essential Information :</td><td><textarea cols="40" rows="5" name="info"></textarea></td></tr>
			                        <tr><td><input type="submit" value="Post Information"/></td><td></td></tr>	
								</tbody>					
							</table>
						</form>
			     	</div>
		     	<?php  
					$id = $_GET["id"];
					//echo "ini $id";

					if(strpos($id,"HT") !== false){
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

					$result = mysqli_query($conn, $sqlreview);
                    ?>
                    <table class="table">
                    	<thead>
                    		<th>Tanggal</th>
                    		<th class="centered">Info</th>
                    		<th>action</th>
                    	</thead>
                    <?php  
                      	while ($rows = mysqli_fetch_array($result)) 
                        {
                          $tgl = $rows['tanggal'];
                          $info = $rows['informasi'];
                          $id_info = $rows['id_informasi'];

                          echo "<tr><td>$tgl</td><td>$info</td><td><a data-href='act/info_delete.php?id_informasi=$id_info' data-toggle='modal' data-target='#confirm-delete".$id_info."' class='btn btn-sm btn-danger' onclick='modalDelete(this.getAttribute('data-href'));' title='Delete'><i class='fa fa-trash-o'></i></a></td></tr>";

                          echo '
                          	<div class="modal fade" id="confirm-delete'.$id_info.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		                        <div class="modal-dialog">
		                            <div class="modal-content">
		                                <div style="background-color: #26a69a" class="modal-header">
		                                    <h4 style="color: white">Confirm Delete</h4>
		                                </div>
		                                <div class="modal-body">
		                                    <span>Do you want to delete this data ?</span>
		                                </div>
		                                <div class="modal-footer">
		                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		                                    <a id="delete_mod" class="btn btn-danger btn-ok" href="../admin/act/info_delete.php?id_informasi='.$id_info.'&tourism_id='.$id.'">Delete</a>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
                          ';
                        }
                    ?>               
                 	</table>

                    
		     	</div>
			</section>
		</div>

		<script src="/../../assets/js/jquery.js"></script>
		<script>
		    function modalDelete(hrev){
		        // console.log(hrev);
		        document.getElementById('delete_mod').setAttribute("href", hrev);
		    }
		    $(document).ready(function() {
		        $('#confirm-delete').on('show.bs.modal', function(e) {
		            // $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
		            //console.log('gue');
		        });
		    });
		</script>
	
		<div class="col-sm-6"> 
			<div class="row">
				<div class="col-sm-12">
				    <section class="panel">
					    <header class="panel-heading">
					        <h3> Picture of <b><?php echo $name ?></b></h3>
				        </header>
				  
				        <div class="panel-body">
				        	<div class="slideshow-container-aku">
		        			 	<?php
									$id = $_GET['id'];
									
									$querysearch  ="SELECT gallery_tourism FROM tourism_gallery where id = '$id'";
									$hasil = mysqli_query($conn, $querysearch);	

									$xx = 0;
							     	while($baris = mysqli_fetch_array($hasil))
							     	{
						     			$nilai = $baris['gallery_tourism'];
						     			$xx++;
							 		?>
					        		<div class="slideAku">
										<img src="../../_foto/<?php echo $nilai; ?>" style="width:100%;">
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
								?>
								<a class="prevv" onclick="plusSlides(-1)">&#10094;</a>
								<a class="nextt" onclick="plusSlides(1)">&#10095;</a>
				        	</div>
<!-- 				        	<br>
				        	<div style="text-align:center">
							  <span class="dot" onclick="currentSlide(1)"></span> 
							  <span class="dot" onclick="currentSlide(2)"></span> 
							  <span class="dot" onclick="currentSlide(3)"></span> 
							  <span class="dot" onclick="currentSlide(4)"></span> 
							</div> -->
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
				          <h3>Upload Picture for <b><?php echo $name ?></b></h3>
					    </header>
				        
				        <div class="panel-body">
							<form role="form" action="act/tourism_upload_photo.php" enctype="multipart/form-data" method="post">
					  			<div class="box-body">
									<input type="text" class="form-control hidden" name="id_images" value="<?php echo $id ?>">
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

				<!-- VIDEO UPLOAD AND SHOW IN EDIT -->
				<div class="col-sm-12">
				    <section class="panel">
					    <header class="panel-heading">
					        <h3> Videos of <b><?php echo $name ?></b></h3>
				        </header>
				  
				        <div class="panel-body">
				        	<div class="text-center">
	                            <video id="vids" controls style="width: 400px">
		                            <?php
		                                $querysearch = "SELECT video_tourism FROM tourism_video where id = '$id'";

		                                $hasil = mysqli_query($conn, $querysearch);   
		                                $xx = 0;

		                                while($baris = mysqli_fetch_array($hasil))
		                                {
		                                  $nilai = $baris['video_tourism'];
		                                  $xx++;
		                                ?>
		                                <source src="../../_video/<?php echo $nilai; ?>" type="video/mp4">
		                                <?php
		                                }
		                                if($xx==0){
		                                  
		                                ?>
		                                  <source src="../../_video/novideo.mp4" type="video/mp4" >
		                                <?php
		                                }
		                            ?>
	                            </video>
                            </div>
				        </div>				  					  
				    </section>
				</div>

				<div class="col-sm-12"> 
				  	<section class="panel">
				      	<header class="panel-heading">
				          <h3>Videos for <b><?php echo $name ?></b></h3>
					    </header>
				        
				        <div class="panel-body">
							<form role="form" action="act/tourism_upload_video.php" enctype="multipart/form-data" method="post">
					  			<div class="box-body">
									<input type="text" class="form-control hidden" name="id_videos" value="<?php echo $id ?>">
									<div class="form-group">
						 				<input type="file" class="" style="background:none;border:none;" name="file_video" required>
									</div>
									<span style="color:red;">*Maximum video size 100MB</span>
					  			</div><!-- /.box-body -->

								<div class="box-footer">
									<button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Upload New Video</button>
							    </div>
							</form>
				        </div>			  
				  	</section>
				</div>

			</div>
		</div>
	</div>