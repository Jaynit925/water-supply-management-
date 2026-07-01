<?php 

session_start();
include("../../code/connection.php");

$id=$_GET['id'];
$url=$_GET['url'];
$tbl=$_GET['tbl'];
$_SESSION['alert']=1;
$_SESSION['alert_title']="Successfully Deleted";

$sql="DELETE FROM $tbl WHERE id=$id";

$run=mysqli_query($con,$sql);

if ($run) {
    // code...

  echo "<script>window.location='../".$url."'</script>";

}




 ?>