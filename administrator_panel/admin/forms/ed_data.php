<?php
include('../orna/ornasys.inc');
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../restricted/error.php");
};
$id=$_GET['id'];
$t_name=$_GET['t_name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Edit Contant</title>
<link rel="stylesheet" type="text/css" href="view-ornasys.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body">
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a><?php echo $t_name;?></a></h1>
		<form id="form_806184" class="appnitro"  method="post" action="../orna/ed-upd.php?t_name=<?php echo $t_name?>&id=<?php echo $id?>">
					<div class="form_description">
			<h2>Edit Content.. (<?php echo $company;?>)</h2>
			Make Changes and press save
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
                            
								$sql_data='select * from '. $t_name.' where id='.$id;
						  		$ed_data_query=mysql_query($sql_data);
								while($ed_data=mysql_fetch_array($ed_data_query)){
								print"<tr id=\"fix_height\">";
								
								$sql='desc '.$t_name;
						  		$ed_desc_query=mysql_query($sql);
								while($ed_desc=mysql_fetch_array($ed_desc_query)){
									 	print"<td><input type=\"text\" value=\""; echo $ed_data[$ed_desc['Field']]; print"\" name=\""; echo stripslashes($ed_desc['Field']); print "\"/></td>
										
										";
									 };
								};
							?>
                			</tr>            
                            </table>
	                      </div>
                    </li>
                    
                <li class="buttons">
                <input type="hidden" name="form_id" value="726427" />
                
                <input id="saveForm" class="button_text" type="submit" name="update" value="Save" />
                </li>
			</ul>
		</form>	
		<div id="footer">
			Powered by <a href="http://www.ornamentsolutions.com">Ornament</a> Registered to <?php echo $company;?>
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>