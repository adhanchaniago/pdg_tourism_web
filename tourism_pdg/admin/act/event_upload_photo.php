<?php 

	include ('../../../connect.php');

	$id_event = $_POST['id_event'];

	$querysearch = "SELECT serial_number FROM event_gallery WHERE id_event = '$id_event' ORDER BY serial_number DESC LIMIT 1";


	 $hasil=mysqli_query($conn, $querysearch);
	 $serial_number = 1;

	 while($baris = mysqli_fetch_array($hasil))
	 {
	 	$angka = $baris['serial_number'] + 1;
	 	$serial_number = $angka;
	 }

	$jenis_gambar=$_FILES['image']['type'];

	if(($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif"  || $jenis_gambar == "image/png") && ($_FILES["image"]["size"] <= 5000000))
	{
		$sourcename = $_FILES["image"]["name"];
		$name = $sourcename;
		$name = $id_event.$serial_number.".jpg";
		$filepath = "../../../_foto/event_foto/".$name;
		move_uploaded_file($_FILES["image"]["tmp_name"],$filepath);

		$sql = mysqli_query($conn, "INSERT INTO event_gallery(serial_number, id_event, gallery_event) VALUES ('$serial_number','$id_event','$name')");

		if($sql)
		{

			header("location:../index.php?page=event_add&id_event=$id_event");
		}
	}

	else{
		echo "The Picture Isn't Valid!<br>";
		echo "Go Back To <a href='../index.php?page=event_add&id_event=$id_event'></a>";
	}
?>