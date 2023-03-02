<?php
include('../orna/ornasys.inc');
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../restricted/error.php");
};
include('../orna/db.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Installment  Summary <?php echo $company;?></title>
<link rel="stylesheet" type="text/css" href="view-ornasys.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="../script/jq.js"></script>
<script type="text/javascript" src="calendar.js"></script>
</head>	
<body id="main_body">
	<img id="top" src="top.png" alt="">
	<div id="form_container">
<form id="form_806184" class="appnitro"  method="post" action="install-detail.php">
    <div class="form_description">
        <h2>Installment Summary</h2> 
    </div>
    <ul>
      <table align="center"><tr>
        <td width="400">
            <li id="li_3" >
            <label class="description" for="element_3">Select Plan</label>
            <div>
            <select class="element select large" id="id" name="id" > 
			<option value="" selected="selected"></option>
			<?php
			$mast_query="Select plan_id,name from install_mast";
			$sql_mast=mysql_query($mast_query);
			while($mast_name=mysql_fetch_array($sql_mast)){
            print "<option value=\""; echo $mast_name['plan_id']; print "\" >"; echo $mast_name['name']; print "</option>";
			}
            ?>
		</select>
            </div> 
            </li></td>            
            <td width="10">
            <li id="li_3" >
            <label class="description" for="element_3">OR</label>
            </li></td>
            <td width="400">
            <li id="li_3" >
            <label class="description" for="element_3">Enter Plan ID</label>
            <div>
            <input type="text" class="element text large"  id="id_2" name="id_2" >
            </div> 
            </li></td>
        <td><li class="buttons">
			    <input type="hidden" name="form_id" value="849410" />
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Search" />
		</li></td>
      </tr></table>
    </ul>
</form>	
		<div id="footer">
			Powered by <a href="http://www.ornamentsolutions.com">Ornament</a> Registered to <?php echo $company;?>
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>