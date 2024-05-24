<?php
include('includes/config.php');
$id=$_GET['id'];

$sql= "DELETE FROM tblhouse WHERE HouseId = :id";

$query = $dbh -> prepare($sql);
if ($query->execute([':id'=>$id])){
	header('location:manage-house.php');
}

?>