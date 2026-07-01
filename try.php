<?php
$current_url =$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
echo $current_url;
?>

<br>
<?php 

 echo $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
 ?>
<br>
 <?php 

$s = 'localhost/boys/water/try.php';


var_export(strstr($s, 'r/', false));
  ?>