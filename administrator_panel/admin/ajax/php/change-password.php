<?php
$path = '../../orna/';
include('../../orna/db.php');

@$user=$_SESSION['myusername'];
@$user=stripslashes($user);
@$opwd = md5($_POST['opwd']);
@$pwd = $_POST['pwd'];
@$cpwd = $_POST['cpwd'];

$login="SELECT * FROM cms_users WHERE name= '$user' AND `password`='$opwd'";
$result=mysql_query($login);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

    if($pwd===$cpwd){
        
        //if using old pasword as new password
        if(md5($pwd)==$opwd){
            echo "Your new password is similar to old one!";
        }else{
            $pwd=md5($pwd);
            $sql="UPDATE `cms_users` SET `password`='$pwd' WHERE name='$user' AND `password` = '$opwd'";

                if(!mysql_query($sql)){
                    die('Error updating Password ' . mysql_error());
                    }	
                else { 
                    echo "Password Changed!";
                }
        }
        
    }
    else{
        echo "Password not Matched!";
    }
}
else{ 
    echo 'Your old password is incorrect!'; 
    }
?>


