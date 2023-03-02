<?php 
$path ='orna/';
session_start();
if(isset( $_SESSION['myusername'])){
header("location:index.php");
}
session_destroy();
?>