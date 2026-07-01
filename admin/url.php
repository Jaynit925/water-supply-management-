<?php 
session_start();

$url=$_GET['url_v'];
$_SESSION['alert']=1;
$_SESSION['alert_title']="Inserted Successfully";
echo "<script>window.location.href='".$url."'</script>";

 ?>