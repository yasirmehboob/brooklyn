<?php
$path = '../../orna/';
if (file_exists($path."duf") AND file_exists($path."dpf") AND file_exists($path."dnf") AND file_exists($path."dhf")) {
    
    //user
    $user_enc = fread(fopen($path."duf", "r"), filesize($path."duf"));
    $MySQL_username = $user_enc;
    //pass
    $pass_enc = fread(fopen($path."dpf", "r"), filesize($path."dpf"));
    $MySQL_password = $pass_enc;
    //DB Name
    $dbn_enc = fread(fopen($path."dnf", "r"), filesize($path."dnf"));
    $MySQL_database = $dbn_enc;    
    //DB Host
    $dhf_enc = fread(fopen($path."dhf", "r"), filesize($path."dhf"));
    $MySQL_host = $dhf_enc;        
}else{
    echo "Files not found";
    return false;
}



if (!($connection = @mysql_connect($MySQL_host, $MySQL_username, $MySQL_password))){
        header("location:../../../configure.php");
        exit();
    }else{
        if (!@mysql_select_db($MySQL_database, $connection)){
            header("location:../../../configure.php");
            exit();
        }
}


$tbl_name="cms_users"; // Table name 

// username and password sent from form 
$myusername=$_POST['user']; 
$mypassword=$_POST['pass'];


// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$mypassword = md5($mypassword);

$login="SELECT * FROM $tbl_name WHERE name='$myusername' and password='$mypassword'";
$result=mysql_query($login);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

session_start();
$_SESSION['token']=$myusername; 
// Register $myusername, $mypassword and redirect to file "menu"
$_SESSION['myusername']=$myusername; // for new version
$_SESSION['mypassword']=$mypassword; // for new version

//session_start('myusername'); // for previous version of php lower then 5.3
//session_start('mypassword'); // for previous version of php lower then 5.3

echo "true";
    
}else{
    echo "false";
    }
?>