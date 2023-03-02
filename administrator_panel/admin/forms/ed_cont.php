<?php
include('../orna/ornasys.inc');
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../restricted/error.php");
};
include('../orna/db.php');
$t_name=$_GET['t_name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Table Edit/Delete</title>
<link rel="stylesheet" type="text/css" href="view-ornasys.css" media="all">
<link rel="stylesheet" type="text/css" href="../core-navigation/core-nav.css"/>
<script type="text/javascript" src="../script/jq.js"></script>
<script type="text/javascript" src="view.js"></script>
<link rel="stylesheet" type="text/css" href="../core-navigation/core-nav.css"/>
<script type="text/javascript" src="../script/jq.js"></script>

</head>
<body id="main_body" >
		<?php include("../core-navigation/core-nav.inc");?>	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a><?php echo $t_name;?></a></h1>
		<form id="form_806184" class="appnitro"  method="post" action="../orna/ins-type.php">
					<div class="form_description">
			<h2>Please Make Your Selection.</h2>
			<p>Chose the catagory that your want to modify. (<?php echo $company;?>)</p>
		</div>						
			<ul >
			
					<li id="li_2" >
						  <div>	
                          	<table width="100%">
                            <tr style="background-color:#ccc;">
                          	<?php	
						  		$sql='desc '.$t_name;
						  		$ed_desc_query=mysql_query($sql);
								while($ed_desc=mysql_fetch_array($ed_desc_query)){
								print"<td><b>"; echo $ed_desc['Field']; print"<b></td>";
								};
								
                            print "<td width=\"40\">Edit</td><td width=\"40\">Delete</td></tr>";
                            
								$sql_data='select * from '. $t_name;
						  		$ed_data_query=mysql_query($sql_data);
								while($ed_data=mysql_fetch_array($ed_data_query)){
								print"<tr id=\"fix_height\">";
								
								$sql='desc '.$t_name;
						  		$ed_desc_query=mysql_query($sql);
								while($ed_desc=mysql_fetch_array($ed_desc_query)){
									 	print"<td><div>"; echo $ed_data[$ed_desc['Field']]; print "</div></td>
										
										";
									 };
								print "<td><a href=\"ed_data.php?id=";echo $ed_data['id']; print "&t_name="; 
								echo $t_name; print"\"><img src=\"../menu/images/modify.png\" width=\"24\" height=\"24\" alt=\"Edit\" /></a></td>
								
								<td><a href=\"../orna/del-cont.php?id=";echo $ed_data['id']; print "&t_name="; 
								echo $t_name; print"\"><img  src=\"../menu/images/delete.png\" width=\"24\" height=\"24\" alt=\"delete\" /></a></td></tr>";
								};
							?>
                            
                            </table>
	                      </div>
                    </li>
			
            
            </ul>
		</form>	
		<div id="footer">
			Powered by <a href="http://www.ornamentsolutions.com">Ornament</a> Registered to <?php echo $company;?>
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	<script type="text/javascript" src="../script/orna.js"></script>
	</body>
</html>