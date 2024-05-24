<?php
include('includes/config.php');
$id=$_GET['id'];

$sql= "DELETE FROM tblschoolinfo WHERE id = :id";

$query = $dbh -> prepare($sql);
if ($query->execute([':id'=>$id])){
	header('location:manage-school.php');
}

?>