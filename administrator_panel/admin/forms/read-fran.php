<?php
include('../orna/ornasys.inc');
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../restricted/error.php");
};
include('../orna/db.php');	
$id=$_GET['id'];
$myquery="update cont_app set active='y' where id = " . $id;
mysql_query($myquery);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CONTESTANT'S APPLICATIONS - <?php echo $company;?></title>
<link rel="stylesheet" type="text/css" href="view-ornasys.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="../script/jq.js"></script>

</head>	
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	<?php
             $sql="select * from cont_app where id=$id";
			 $sql_query=mysql_query($sql);
			 $mail=mysql_fetch_array($sql_query);
	?>

<form id="form_806184" class="appnitro"  method="post" action="../orna/ins-type.php">
    <div class="form_description">
        <h2>Application From : <?php echo $mail['name'];?>	
			<span style="float:right;">
				<?php echo date('d-M-Y', strtotime($mail['dt']));?>	
			</span>
		</h2> 
    </div>					
<?php 
	 print "<table width=\"70%\" class=\"report\" cellpadding=\"10\">
	 	<tr>
			<td><img src=\"../../images/application/";echo $mail['dir']."/".$mail['files_2']; print"\" alt=\""; echo $mail['name'] ;print"\" width=\"300px\" heith=\"auto\"></td>
		</tr>
		
		<tr>
			<td>Name:<span>"; echo $mail['name'] ;print"</span></td>
			<td>Country:<span>"; echo $mail['country'] ;print"</span></td>
		</tr>
		<tr>
			<td>Address:<span>"; echo $mail['addr'] ;print"</span></td>
			<td>City:<span>"; echo $mail['city'] ;print"</span></td>
		</tr>
		<tr>
			<td>Telephone:<span>"; echo $mail['tel'] ;print"</span></td>
			<td>Cell No:<span>"; echo $mail['cell'] ;print"</span></td>
		</tr>
		<tr>
			<td>State:<span>"; echo $mail['state'] ;print"</span></td>
			<td>Postal Code:<span>"; echo $mail['pst_code'] ;print"</span></td>
		</tr>
		<tr>
			<td>Category:<span>"; echo $mail['category'] ;print"</span></td>
			<td>Language:<span>"; echo $mail['lang'] ;print"</span></td>
		</tr>
		<tr>
			<td>Date of Birth:<span>"; echo $mail['dob'] ;print"</span></td>
			<td>Height:<span>"; echo $mail['height'] ;print"</span></td>
		</tr>
		<tr>
			<td>Figure:<span>"; echo $mail['figure'] ;print"</span></td>
			<td>Eye Colour:<span>"; echo $mail['eye_color'] ;print"</span></td>
		</tr>
		<tr>
			<td>Hair Color:<span>"; echo $mail['hair_color'] ;print"</span></td>
			<td>Hair Length:<span>"; echo $mail['hair_len'] ;print"</span></td>
		</tr>
		<tr>
			<td>Occupation:<span>"; echo $mail['occupation'] ;print"</span></td>
			<td>E-mail:<span>"; echo $mail['email'] ;print"</span></td>
		</tr>
		<tr>
			<td colspan=\"2\">Hobbies:<span>"; echo $mail['hobbies'] ;print"</span></td>	
		</tr>
		<tr>
			<td colspan=\"2\">Why do you want to enter the contest?:<span>"; echo $mail['why_cont'] ;print"</span></td>	
		</tr>
		<tr>
			<td colspan=\"2\">How peace is possible?:<span>"; echo $mail['possible'] ;print"</span></td>	
		</tr>
		<tr>
			<td colspan=\"2\">What is your vision for peace?:<span>"; echo $mail['vision'] ;print"</span></td>	
		</tr>
		<tr>
			<td colspan=\"2\">What are your plans to serve humanity?:<span>"; echo $mail['plan'] ;print"</span></td>	
		</tr>
		<tr>
			<td colspan=\"2\">Do you have a Sponsor/Manager or National Director?:<span>"; echo $mail['sponsor'] ;print"</span></td>	
		</tr>
		<tr>
			<td colspan=\"2\">Details for past titles and participation list of beauty contests.:<span>"; echo $mail['history'] ;print"</span></td>	
		</tr>
		
		
	 </table>
	 
	 ";?>   
</form>	
		<div id="footer">
			Developed  by <a href="#">Yasir Mehboob</a> Registered to <?php echo $company;?>
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>