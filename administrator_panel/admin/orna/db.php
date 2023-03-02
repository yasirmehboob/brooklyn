<?php
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
    echo $path;
    echo "Files not found";
    return false;
}


if (!($connection = @mysql_connect($MySQL_host, $MySQL_username, $MySQL_password))){
        header("location:configure.php");
    }else{
        if (!@mysql_select_db($MySQL_database, $connection)){
            header("location:configure.php");
        }else{
            date_default_timezone_set('Asia/Dubai');
            mysql_query("set time_zone='+04:00'");
            session_start();
            if(!isset( $_SESSION['myusername'])){
            header("location:login.php");
            }else{
                
                //server configurations
                date_default_timezone_set('Asia/Dubai');
                mysql_query("set time_zone='+04:00'");
                $mysql_query = mysql_query("select * from ornasys");
                $co_nnarray=mysql_fetch_array($mysql_query);
                    $company = $co_nnarray['user'];
                    $logo = $co_nnarray['logo'];
                    $domain = $co_nnarray['domain'];
                    $icon = $co_nnarray['icon'];

                $sql_user_name ="select display_name from cms_users where name = '".$_SESSION['myusername']."'";
                $user_query =mysql_fetch_array(mysql_query($sql_user_name));
                $profile = $user_query['display_name'];
            
                function ip()
                 {
                    $ip = getenv('HTTP_CLIENT_IP')?:
                    getenv('HTTP_X_FORWARDED_FOR')?:
                    getenv('HTTP_X_FORWARDED')?:
                    getenv('HTTP_FORWARDED_FOR')?:
                    getenv('HTTP_FORWARDED')?:
                    getenv('REMOTE_ADDR');
                        return $ip;
                 }
            
            
            
            
            
            }
        }//end else
}



?>