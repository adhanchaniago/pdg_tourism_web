<?php 
	session_start();

	include '../../../connect.php';

	$id   = $_POST['id'];
	$nama = $_SESSION['username'];
	$info = $_POST['info'];

	//$user = $_SESSION['userusername'];
	//echo "ini id $id, ini user $user, ini info $info, $role,$nama";

	$cariMax  = "SELECT max(id_informasi) AS max FROM information_admin";
	$queryMax = mysqli_query($conn, $cariMax);
	$dataMax  = mysqli_fetch_array($queryMax);

	$id_informasi = 0;

		if($dataMax['max'] == null)
		{
			$id_informasi = 1;
		} 
		else 
		{
			$id_informasi = $dataMax['max'] + 1;
		}

	$tanggal = date("Y-m-d");

	$sql = "";

	if(strpos($id,"H") !== false)
	{
		$sql = "INSERT INTO information_admin(username,id_hotel,informasi,tanggal,id_informasi) VALUES('$nama','$id','$info','$tanggal','$id_informasi')";
	} 
	else if(strpos($id,"SO") !== false)
	{
		$sql = "INSERT INTO information_admin(username,id_souvenir,informasi,tanggal,id_informasi) VALUES('$nama','$id','$info','$tanggal','$id_informasi')";
	} 
	else if(strpos($id,"IK") !== false)
	{
		$sql = "INSERT INTO information_admin(username,id_ik,informasi,tanggal,id_informasi) VALUES('$nama','$id','$info','$tanggal','$id_informasi')";
	} 
	else if(strpos($id,"RM") !== false)
	{
		$sql = "INSERT INTO information_admin(username,id_kuliner,informasi,tanggal,id_informasi) VALUES('$nama','$id','$info','$tanggal','$id_informasi')";
	} 
	else if(strpos($id,"TM") !== false)
	{
		$sql = "INSERT INTO information_admin(username,id_ow,informasi,tanggal,id_informasi) VALUES('$nama','$id','$info','$tanggal','$id_informasi')";
	}

	$query_sql = mysqli_query($conn, $sql);

	if($query_sql)
	{
		echo "<script>alert('Info Successfully Added');</script>";

		if($_SESSION['A']===true)
		{
			echo '<meta http-equiv="REFRESH" content="0.1;url=../?page=tourism_detail&id='.$id.'">';
			//header("location:../?page=tourism_detail&id=$id");
		}
		elseif($_SESSION['P']===true)
		{
			echo '<meta http-equiv="REFRESH" content="0.1;url=../indexu.php?page=tourism_detail&id='.$id.'">';
			//header("location:../indexu.php?page=tourism_detail&id=$id");
		}
		else
		{
			echo "<script>alert ('Error');</script>";
		}
	}


	// if($query_sql)
	// {
	// 	echo "<script>alert('Info Successfully Added');</script>";

	// 	if($_SESSION['A']===true)
	// 	{
	// 		header("location:../?page=tourism_detail&id=$id");
	// 	}
	// 	elseif($_SESSION['P']===true)
	// 	{
	// 		header("location:../indexu.php?page=tourism_detail&id=$id");
	// 	}
	// 	else
	// 	{
	// 		echo "<script>alert ('Error');</script>";
	// 	}
	// }

?>