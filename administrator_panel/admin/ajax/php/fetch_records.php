<?php
/*session_start();
if(!isset( $_SESSION['myusername'])){
header("location:index.php");}*/
$path = '../../orna/';
require_once('../../orna/db.php');
//fetch function start
function fetch($table,$id){
$sql='SELECT * FROM '.$table. ' WHERE id='.$id;
$query=mysql_query($sql);
$data=array();
    while($result=mysql_fetch_assoc($query)){
    $data[]=$result;
};
    return json_encode($data);
}
//fetch function ends

echo fetch($_POST['table'],$_POST['id']);
?>