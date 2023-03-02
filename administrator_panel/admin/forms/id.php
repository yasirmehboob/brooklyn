<?php
include('../orna/db.php');

$id_query="SELECT max(id) FROM install_mast";
		$sql=mysql_query($id_query);
		$sql=mysql_fetch_array($sql);
		if($sql['max(id)']==""){$sql['max(id)']=000000;}
		$new_num=substr($sql['max(id)'],-6)+1;
		$max_id="INS-".date("ym").'-'.str_pad($new_num,6,"0",STR_PAD_LEFT);
		echo $max_id;
		
?>
