<?php
include('includes/config.php');
$id=$_GET['id'];

$sql= "DELETE FROM tbltour WHERE TourId = :id";

$query = $dbh -> prepare($sql);
if ($query->execute([':id'=>$id])){
	header('location:manage-tour.php');
}

?>