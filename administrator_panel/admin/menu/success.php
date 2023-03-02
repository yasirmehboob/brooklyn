<?php
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../index.php");
}
?>

<html>
<body oncontextmenu="return false">

<a href ="../logout.php">Logout</a>
</body>
</html>