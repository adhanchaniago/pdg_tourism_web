<?php 
	session_start();
	$_FILES["file_video"]['type'];
	$_FILES["file_video"]["size"];
	include ('../../../connect.php');

	$id = $_POST['id_videos'];
	

	$querysearch = "SELECT serial_number FROM tourism_video WHERE id = '$id' ORDER BY serial_number DESC LIMIT 1";

	$hasil = mysqli_query($conn, $querysearch);
	$serial_number = 1;

	while($baris = mysqli_fetch_array($hasil))
	{
		$angka = $baris['serial_number'] + 1;
		$serial_number = $angka;
	}

	$jenis_video = $_FILES["file_video"]['type'];
	
	if(($jenis_video=="video/mp4" || $jenis_video=="video/avi" || $jenis_video=="video/mov") && ($_FILES["file_video"]["size"] <= 1000000000))
	{
		$searchvideo = "SELECT video_tourism FROM tourism_video WHERE id = '$id'";	
		$cari = mysqli_query($conn, $searchvideo);

		while($file = mysqli_fetch_array($cari))
		{
			$filenya = $file['video_tourism'];
			$video_file = '../../../_video/'.$filenya;
	    	unlink($video_file);
		}


		$sql_hapus = mysqli_query($conn, "DELETE FROM tourism_video where id = '$id'");
		$sourcename = $_FILES["file_video"]["name"];
		$name = $sourcename;
		$name = $id.$serial_number.".mp4";
		$filepath = "../../../_video/".$name;
		move_uploaded_file($_FILES["file_video"]["tmp_name"],$filepath);
		$sql = mysqli_query($conn, "INSERT INTO tourism_video(serial_number, id, video_tourism) VALUES('$serial_number','$id','$name')");
		if($sql){
			if(isset($_SESSION['A']))
			{
				echo '<meta http-equiv="REFRESH" content="0.1;url=../?page=tourism_detail&id='.$id.'">';
			}
			else if(isset($_SESSION['P']))
			{
				echo '<meta http-equiv="REFRESH" content="0.1;url=../indexu.php?page=tourism_detail&id='.$id.'">';
			}
		}
	}

	else{
		echo " The Video Isn't Valid!<br>";
		if(isset($_SESSION['A']))
		{
			//echo "<script>eval(\"location:../?page=hotel_detail&id=$tourism_id\");</script>";
			echo "Go Back To <a href='../index.php?page=tourism_detail&id=$id'>tourism info</a>";
		}
		else if(isset($_SESSION['P']))
		{
			//echo "<script>eval(\"location:../indexu.php?page=hotel_detail&id=$tourism_id\");</script>";
			echo "Go Back To <a href='../indexu.php?page=tourism_detail&id=$id'>tourism info</a>";
		}
		//echo "Go Back To <a href='../index.php?page=tourism_detail&id=$id'>tourism info</a>";
	}
?>