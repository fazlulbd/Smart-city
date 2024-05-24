<?php 
include('includes/config.php');
$id=$_GET['id'];
$status=$_GET['status'];
$qul= "UPDATE  tblbdonor SET status =$status WHERE id=:id";
$query = $dbh -> prepare($qul);
if ($query->execute([':id'=>$id])){
    header('location:donor-list.php');
}

?>
