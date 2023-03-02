<?php
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../index.php");
}
$path="../orna/";
include('../orna/db2.php');
include('../orna/ornasys.inc');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../images/icon-Orbit Nautrals.PNG" type="image/png">
<title>Welcom to <?php echo $company; ?></title>
<link rel="stylesheet" type="text/css" href="styles/admin-style.css"/>
<script type="text/javascript" src="../script/jq.js"></script>
<script type="text/javascript" src="../script/jq_ui.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	document.getElementById("active").focus();
	});
</script>
</head>
<body oncontextmenu="return false">
    <div id="wrapper">
        <div id="headder">
            <p><a href="#.html" title="Welcome to Admin Panel"><img src="images/<?php echo $logo; ?>" alt="Welcom to Admin Panel"  /></a>
            <a class="main-headding" href="#" title="<?php echo $company; ?>'s Web Admin">User: <span style="text-transform:uppercase;font-weight:bold;">			
            <?php echo $_SESSION['token']; ?></span>
            <a class="main-headding" href="#">|</a>  
            <a class="main-headding" href="../logout.php" title="Logout from <?php echo $company; ?>">Logout</a></p>
        </div>
        
        <table id="buttons"  cellspacing="10">
            <tr>
                <?php
				$m_sql="select * from ornasys_mnu where user='".$_SESSION['myusername']."' or user='all'";
				$m_item=mysql_query($m_sql);
				$col_count=0;
                while ($row=mysql_fetch_array($m_item)) { 
				   if ($col_count == 5) { 
					  echo '</tr><tr>'; 
					  $col_count = 0; 
				   } 
				   print "<td>
				   <a href=\"../forms/"; echo $row['f_lnk']; print ".php\" title=\""; echo $row['f_nm']; print "\"> <img src=\"images/"; echo $row['icon']; print ".png\" alt=\""; echo $row['f_nm']; print "\" width=\"64\" height=\"64\" border=\"0\" />"; echo $row['f_nm']; print "</a>
				   </td>"; 
				  $col_count++; 
				} 
				?>
            </tr>      
        </table>
        <div id="footer">
            <div style="width:1110px;float:left;">
                <a href="http://www.ornamentsolutions.com" title="http:/www.ornamentsolutions.com"> All Rights Reserved &copy; Ornament Solutions-DIT</a>
            </div>
        </div>
    </div><!-- end of wrapper-->
</body>
</html>
