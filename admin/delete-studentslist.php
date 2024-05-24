<?php
include('includes/config.php');
$id=$_GET['id'];

$sql= "DELETE FROM  tblapplyschool WHERE id = :id";

$query = $dbh -> prepare($sql);
if ($query->execute([':id'=>$id])){
	header('location:school-student.php');
}

?>