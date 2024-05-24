<?php
include('includes/config.php');
$id=$_GET['id'];

$sql= "DELETE FROM tblhotel WHERE HotelId = :id";

$query = $dbh -> prepare($sql);
if ($query->execute([':id'=>$id])){
	header('location:manage-hotel.php');
}

?>