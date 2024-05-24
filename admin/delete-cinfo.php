<?php
include('includes/config.php');
$id=$_GET['id'];

$sql= "DELETE FROM tblcollegeinfo WHERE id = :id";

$query = $dbh -> prepare($sql);
if ($query->execute([':id'=>$id])){
	header('location:manage-college.php');
}

?>