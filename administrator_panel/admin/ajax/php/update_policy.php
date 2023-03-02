<?php
$path = '../../orna/';
require_once('../../orna/db.php');

$sql = "update `policy` set `policy` = '".htmlentities($_POST['policy'])."'";
 
if(!mysql_query($sql)){
    echo $sql;
}
else{
        echo 'Updated.';
    };

?>