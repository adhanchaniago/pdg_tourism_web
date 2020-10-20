<?php

	require '../../connect.php';

	$id_event = $_GET["id_event"];

    $query = "SELECT event_tourism.id_event, event_tourism.tourism_id, event_tourism.nama_event, event_tourism.date_start, event_tourism.date_end, event_tourism.description, event_tourism.contact_person, tourism.name AS tourism_name FROM event_tourism LEFT JOIN tourism ON tourism.id = event_tourism.tourism_id  WHERE id_event = '$id_event'";

	$result = mysqli_query($conn, $query);

	while($baris = mysqli_fetch_array($result))
	{
	  $id_event = $baris['id_event'];
	  $tourism_id = $baris['tourism_id'];
	  $tourism_name = $baris['tourism_name'];
	  $nama_event = $baris['nama_event'];
	  $date_start = $baris['date_start'];
	  $date_end = $baris['date_end'];
	  $desc = $baris['description'];
	  $cp = $baris['contact_person'];
	  
	}

?>

<div class="col-sm-12">
	<div class="col-sm-6"> 
	  	<section class="panel">
	      	<header class="panel-heading">
				<!-- <h2 class="box-title" style="text-transform: capitalize; text-align: center"><b> <?php echo $nama_event ?></b><hr></h2> -->
				<h2 style="background-color: white; color: #26a69a; font-family: arial"><i class="fa fa-calendar"></i><b> Detail Event</b><hr></h2>
	        </header>

	        <div class="panel-body" style=" padding-left: 50px; padding-bottom: 50px;">
				<table style="align-items: center">
					<tbody style='vertical-align: top; font-size: 15px; '>
						<tr>
							<td width="150px">  <b>Event ID</b></td><td>   :&nbsp; </td><td style='text-transform: capitalize;'>  <?php echo $id_event ?></td>
						</tr>
						<tr>
							<td> <hr> <b>Event Name</b></td> <td> <hr>  :</td><td> <hr> <?php echo $nama_event ?></td>
						</tr>
						<tr>
							<td> <hr> <b>Event Location</b></td><td> <hr> :</td><td> <hr> <?php echo $tourism_name ?></td>
						</tr>
						<tr>
							<td> <hr> <b>Date Start</b> </td><td> <hr> : </td><td> <hr> <?php echo $date_start ?></td>
						</tr>
						<tr>
							<td> <hr> <b>Date End</b> </td><td> <hr> : </td><td> <hr> <?php echo $date_end ?></td>
						</tr>
						<tr>
							<td> <hr> <b>Description</b> </td><td> <hr> : </td><td> <hr> <?php echo $desc ?></td>
						</tr>
						<tr>
							<td> <hr> <b>Contact Person</b> </td><td> <hr> : </td><td> <hr> <?php echo $cp ?></td>
						</tr>
					</tbody>	
				</table>
				<br>


				<div class="btn-group">
					<a href="?page=event_update&id_event=<?php echo $id_event ?>" class="btn btn-default" style="background-color: #26a69a;  color: white;"><i class="fa fa-list" style="color: white;"></i>&nbsp Edit Data &nbsp&nbsp</a>
				</div>
	     	</div>
		</section>
	</div>

	<script src="/../../assets/js/jquery.js"></script>
	<script src="inc/mapupd.js" type="text/javascript"></script>
	
	<div class="col-sm-6"> 
		<div class="row">
			<div class="col-sm-12">
			    <section class="panel">
				    <header class="panel-heading">
				        <h3> Picture of Event <b> <?php echo $nama_event ?> </b></h3>
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
		</div>
	</div>
</div>	

