<?php
include('../orna/ornasys.inc');
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../restricted/error.php");
};
include('../orna/db.php');
if(!isset($_POST['filter']) or !isset($_POST['section'])) {
	$where=" ";}
	else{
		 $where="where ". $_POST['filter']."='".$_POST['section']."'";};
	
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
	

<form id="form_806184" class="appnitro"  method="post" action="../orna/ins-type.php">
    <div class="form_description">
        <h2>CONTESTANT'S APPLICATIONS	
			<span style="float:right;">
				<?php echo date('d-M-Y D');?>	
			</span>
		</h2> 
    </div>						
    <ul >
        <li id="li_2" >
          <div>	
            <table width="100%">
            <tr style="background-color:#ccc;">
                <td width="150"><strong>Date</strong></td>
                <td width="300"><strong>Name</strong></td>
                <td width="150"><strong>Country</strong></td>
                <td width="150"><strong>Category</strong></td>
                <td width="150"><strong>Language</strong></td>
                <td width="150"><strong>Tell</strong></td>
                <td width="150"><strong>Cell</strong></td>
                <td width="150"><strong>E-mail</strong></td>
                <td width="30"><strong>Delete</strong></td>
             </tr>
             
             <?php
             $sql="select * from cont_app $where order by id DESC";
			 $sql_query=mysql_query($sql);
			 while($status=mysql_fetch_array($sql_query)){
			 print "<tr class=\"";echo $status['active'];print"\">
					<td width=\"150\">";echo date('d-M-Y', strtotime($status['dt']));; print "</td>
					<td width=\"300\"> <a href=\"read-cont.php?id=";echo $status['id'];print"\">";echo $status['name']; print "</a></td>
					<td width=\"150\">";echo $status['country']; print "</td>
					<td width=\"150\">";echo $status['category']; print "</td>
					<td width=\"150\">";echo $status['lang']; print "</td>
					<td width=\"150\">";echo $status['tel']; print "</td>
					<td width=\"150\">";echo $status['cell']; print "</td>
					<td width=\"150\">";echo $status['email']; print "</td>
					<td width=\"30\"><a href=\"../orna/ed-del.php?id=";echo $status['id'];print"&t_name=cont_app\"><img src=\"../menu/images/delete.png\" width=\"24\" height=\"24\" alt=\"Edit\" /></a></td>
				 </tr>";}
			 ?>
             
            </table>
          </div>
        </li>
    </ul>
</form>	
		<div id="footer">
			Developed  by <a href="#">Yasir Mehboob</a> Registered to <?php echo $company;?>
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>