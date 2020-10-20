<?php
include ('../../../connect.php');
$id = $_POST['id'];
$nama = $_POST['name'];
$address = $_POST['address'];
$open = $_POST['open'];
$close = $_POST['close'];
$ticket = (int)$_POST['ticket'];
$type = $_POST['type'];
$geom = $_POST['geom'];

if (!$geom){
	echo "<script>alert ('Data Geom cannot be null!');</script>";
	echo "<script>eval(\"parent.location='/pdg_tourism/tourism_pdg/admin/?page=tourism_add'\");</script>";
}

$sql = mysqli_query($conn, "insert into tourism (id, name, address, open, close, geom, ticket, id_type) values ('$id', '$nama', '$address', '$open', '$close', ST_GeomFromText('$geom'), '$ticket', '$type')");

if ($sql){
	echo "<script>alert ('Data Successfully Added');</script>";
}else{
	echo "<script>alert ('Error');</script>";
	echo "<script>eval(\"parent.location='/pdg_tourism/tourism_pdg/admin/?page=tourism_add'\");</script>";
}
echo "<script>eval(\"parent.location='../'\");</script>";
?>