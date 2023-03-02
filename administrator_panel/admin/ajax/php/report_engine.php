<?php
if($_SERVER['QUERY_STRING']!=''){
    $query='?'.$_SERVER['QUERY_STRING'].'&';
}else{
    $query='?';
}

foreach ($_POST as $key => $value){
  $query.=$key.'='.$value.'&';
}
$query=substr($query,0,strlen($query)-1);

if($query==''){
    $query='?val=1';
}

?>