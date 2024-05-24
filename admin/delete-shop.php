<?php
include('includes/config.php');
$id=$_GET['id'];

$sql= "DELETE FROM tblshop WHERE id = :id";

$query = $dbh -> prepare($sql);
if ($query->execute([':id'=>$id])){
	header('location:manage-shop.php');
}

?>