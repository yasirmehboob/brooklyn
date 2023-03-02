<?php

$db_name = $_POST['db_name'];
$db_username = $_POST['db_username'];
$db_password = $_POST['db_password'];
$db_host = $_POST['db_host'];


//database name file
$data = $db_name;
$file_path="../../orna/dnf";
$new_file=fopen($file_path,"w");
fwrite($new_file,$data);
fclose($new_file);


//database User Name file
$data = $db_username;
$file_path="../../orna/duf";
$new_file=fopen($file_path,"w");
fwrite($new_file,$data);
fclose($new_file);


//database Password file
$data = $db_password;
$file_path="../../orna/dpf";
$new_file=fopen($file_path,"w");
fwrite($new_file,$data);
fclose($new_file);


//database Host file
$data = $db_host;
$file_path="../../orna/dhf";
$new_file=fopen($file_path,"w");
fwrite($new_file,$data);
fclose($new_file);

echo "true";
?>