<?php
	
	include ('../../../connect.php');

	$id_event = $_POST['id_event'];
	$tourism_id = $_POST['tourism_id'];
	$event = $_POST['nama_event'];
	$date_start = $_POST['date_start'];
	$date_end = $_POST['date_end'];
	$desc = $_POST['description'];
	$cp =  $_POST['contact_person'];


	$sql = mysqli_query($conn, "INSERT INTO event_tourism (id_event, tourism_id, nama_event, date_start, date_end, description, contact_person) VALUES ('$id_event', '$tourism_id', '$event', '$date_start', '$date_end', '$desc', '$cp')");


	if ($sql)
	{
		echo "<script>alert ('Data Successfully Added');</script>";
	}
	else
	{
		echo "<script>alert ('Error');</script>";
		echo "<script>eval(\"parent.location='/pdg_tourism/tourism_pdg/admin/?page=event_add&id_event=$id_event'\");</script>";
	}
		echo "<script>eval(\"parent.location='/pdg_tourism/tourism_pdg/admin/?page=event'\");</script>";
?>