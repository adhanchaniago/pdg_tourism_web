<?php
	
	include ('../../../connect.php');

	$id_event = $_POST['id_event'];
	$tourism_id = $_POST['tourism_id'];
	$event = $_POST['nama_event'];
	$date_start = $_POST['date_start'];
	$date_end = $_POST['date_end'];
	$desc = $_POST['description'];
	$cp =  $_POST['contact_person'];

	// $sql = mysqli_query($conn, "INSERT INTO event_tourism (id_eventt, tourism_id, eventt, tanggal) VALUES ('$id_event', '$tourism_id', '$event', '$date')");

	// $sql = mysqli_query($conn, "UPDATE tourism set name='$nama', address='$address', open='$open', close='$close', ticket='$ticket', id_type='$type', geom=ST_GeomFromText('$geom') where id='$id'");

	$sql = mysqli_query($conn, "UPDATE event_tourism SET id_event = '$id_event', tourism_id = '$tourism_id', nama_event = '$event', date_start = '$date_start', date_end = '$date_end', description = '$desc', contact_person = '$cp' WHERE id_event = '$id_event'");

	if ($sql)
	{
		echo "<script>alert ('Data Successfully Update');</script>";
	}
	else
	{
		echo "<script>alert ('Error');</script>";
		echo "<script>eval(\"parent.location='/pdg_tourism/tourism_pdg/admin/?page=event_update&id_event=$id_event'\");</script>";
	}
		echo "<script>eval(\"parent.location='/pdg_tourism/tourism_pdg/admin/?page=event'\");</script>";
?>