<?php
	
	include ('../../../connect.php');
	
	$id_event = $_GET['id_event'];
	
		// $sql1 = mysqli_query($conn, "Delete from tourism_gallery where id ='$id'");
		// $sql2 = mysqli_query($conn, "Delete from detail_facility_tourism where id_tourism = '$id'");
		
		$sql   = "DELETE FROM event_tourism WHERE id_event = '$id_event'";

		$delete = mysqli_query($conn, $sql);

		if ($delete){
			echo "<script>
			alert (' Data Successfully Delete');
			</script>";
		}
		else{
			echo "<script>
			alert ('Error');
			</script>";
		}

		echo "<script>
		eval(\"parent.location='../?page=event'\");
		</script>";

?>