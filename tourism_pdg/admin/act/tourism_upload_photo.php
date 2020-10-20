<?php 
	session_start();
	include ('../../../connect.php');

	$id = $_POST['id_images'];
	$querysearch = "SELECT serial_number FROM tourism_gallery WHERE id = '$id' ORDER BY serial_number DESC LIMIT 1";

	$hasil = mysqli_query($conn, $querysearch);
	$serial_number = 1;

	while($baris = mysqli_fetch_array($hasil))
	{
		$angka = $baris['serial_number'] + 1;
		$serial_number = $angka;
	}

	$jenis_gambar = $_FILES['image']['type'];
	
	if(($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif"  || $jenis_gambar=="image/png") && ($_FILES["image"]["size"] <= 5000000))
	{
		$sourcename=$_FILES["image"]["name"];
		$name=$sourcename;
		$name=$id.$serial_number.".jpg";
		$filepath="../../../_foto/".$name;
		move_uploaded_file($_FILES["image"]["tmp_name"],$filepath);
		$sql = mysqli_query($conn, "INSERT INTO tourism_gallery(serial_number, id, gallery_tourism) VALUES('$serial_number','$id','$name')");
		if($sql){
			//header("location:../index.php?page=tourism_detail&id=$id");
			if(isset($_SESSION['A']))
			{
				//echo "<script>eval(\"location:../?page=hotel_detail&id=$tourism_id\");</script>";
				echo '<meta http-equiv="REFRESH" content="0.1;url=../?page=tourism_detail&id='.$id.'">';
			}
			else if(isset($_SESSION['P']))
			{
				//echo "<script>eval(\"location:../indexu.php?page=hotel_detail&id=$tourism_id\");</script>";
				echo '<meta http-equiv="REFRESH" content="0.1;url=../indexu.php?page=tourism_detail&id='.$id.'">';
			}
		}
	}

	else{
		echo "The Picture Isn't Valid!<br>";
		if(isset($_SESSION['A']))
		{
			echo "Go Back To <a href='../index.php?page=tourism_detail&id=$id'>detail</a>";
		}
		else if(isset($_SESSION['P']))
		{
			echo "Go Back To <a href='../indexu.php?page=tourism_detail&id=$id'>detail</a>";
		}
	}
?>