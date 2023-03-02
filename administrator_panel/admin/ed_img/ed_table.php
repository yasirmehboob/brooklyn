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
<link rel="stylesheet" type="text/css" href="../forms/view-ornasys.css" media="all">
<script type="text/javascript" src="../forms/view.js"></script>
<script type="text/javascript" src="../script/jq.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="../forms/top.png" alt="">
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
                          	
						  		<td><b>ID<b></td>
                                <td><b>CONTESTANT NAME<b></td>
                                <td><b>UPLOADED ON<b></td>
                                <td><b>IMAGE ID<b></td>
                                <td><b>PREVIEW<b></td>
								
                            <td width="40">Edit</td><td width="40">Delete</td></tr>
                            	<?php
								$sql_data='select * from '. $t_name;
						  		$ed_data_query=mysql_query($sql_data);
								while($ed_data=mysql_fetch_array($ed_data_query)){
								print"<tr id=\"fix_height\">";
									 	print"<td><div>"; echo $ed_data['id']; print "</div></td>
										<td><div>"; echo $ed_data['name']; print "</div></td>
										<td><div>"; echo $ed_data['dt']; print "</div></td>
										<td><div>"; echo $ed_data['files_2']; print "</div></td>
										
										<td><div>";
										$file_sql="select * from ".$t_name." where id ='".$ed_data['id']."'";
										$file_query=mysql_query($file_sql);
										$file=mysql_fetch_array($file_query);
										print "
										<a href=\"../scanned/"; echo $file['name']; print "/";echo $ed_data['files_2']; print"\" >
										<img src=\"../scanned/"; echo $file['name']; print "/";echo $ed_data['files_2']; print"\" width=\"35\" height=\"35\" alt=\"uploaded image\" />
										</a>
										</div></td>
										
										<td><a href=\"ed_data.php?id=";echo $ed_data['id']; print "&t_name="; 
								echo $t_name; print "&img="; 
								echo $ed_data['files_1']; print"&file="; echo $file['name']; print "\"><img src=\"../menu/images/modify.png\" width=\"24\" height=\"24\" alt=\"Edit\" /></a></td>
								
								<td><a href=\"../orna/ed-del.php?id=";echo $ed_data['id']; print "&t_name="; 
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
	<img id="bottom" src="../forms/bottom.png" alt="">
	</body>
</html>