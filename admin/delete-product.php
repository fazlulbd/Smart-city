<?php
include('includes/config.php');
$id=$_GET['id'];
$shop_id=$_GET['shop_id'];

$sql= "DELETE FROM tblproduct WHERE id = :id";

$query = $dbh -> prepare($sql);
if ($query->execute([':id'=>$id])){
	header('manage-shop.php');
}

?>