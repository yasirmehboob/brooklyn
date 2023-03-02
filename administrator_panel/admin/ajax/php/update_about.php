<?php
/*session_start();
if(!isset( $_SESSION['myusername'])){
header("location:index.php");}*/
$path = '../../orna/';
require_once('../../orna/db.php');

$sql = "update `about` set `descp` = '".htmlentities($_POST['descp'])."'";
 
if(!mysql_query($sql)){
    echo $sql;
}
else{
        echo 'Updated.';
    };

?>