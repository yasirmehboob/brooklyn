<?php
include('../news/database.php');
$db = new Database;

$max_id="SELECT * FROM  `news` ORDER BY  `id` DESC LIMIT 0 , 1";
$max_id= mysql_query($max_id);
$max_id=mysql_fetch_array($max_id);
$max_id=$max_id['id'];
$max_id=$max_id+1;
 echo $max_id;
 ?>