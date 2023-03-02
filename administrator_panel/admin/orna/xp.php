<?php 
$l_xp = fread(fopen("lef", "r"), filesize("lef"));
$lxp=base64_decode($l_xp);
if(isset($_POST['lpass'])){
	$lpass=$_POST['lpass'];
	$lxp=$lxp/4410465*4831488/4410465;
		if($lpass>=$lxp){
			echo json_encode(array('error' => "error"));
			}
        else{
            echo json_encode(array('error' => "no-error"));
        }
	}
?>