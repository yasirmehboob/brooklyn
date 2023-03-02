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
<title>CONTESTANTS</title>
<link rel="stylesheet" type="text/css" href="view-ornasys.css" media="all">
<link rel="stylesheet" type="text/css" href="../core-navigation/core-nav.css"/>
<script type="text/javascript" src="../script/jq.js"></script>
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
   $("#cont_typ").change(
   function(){
	var type=$(this).val();
	if(type=="title holder"){
		$("#title").show('fast');}
			else{$("#title").hide('fast');
				$("#title").val("");
				}
		});
	
	});
//rack change end
</script>
</head>
<body id="main_body" >
		<?php include("../core-navigation/core-nav.inc");?>	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>CONTESTANTS</a></h1>
		<form id="form_895435" class="appnitro" enctype="multipart/form-data" method="post" action="../orna/ins-cont.php">
					<div class="form_description">
			<h2>CONTESTANTS</h2>
			<p>fill all the fields carefully</p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="name">Name </label>
		<div>
			<input id="name" name="name" class="element text medium" type="text" maxlength="255" value="" required="required"/> 
		</div> 
		</li>
        
        <li id="li_5" style="background-color:#CFF;" >
		<label class="description" for="cont_typ">Contestant Type </label>
		<div>
		<select class="element select large" id="cont_typ" name="cont_typ" required="required"> 
			<option required x-moz-errormessage="" value="" selected="selected">Choose Type</option>
				<option value="title holder">Title Holder</option>
                <option value="mupho">MUPHO Contestant</option>
                <option value="contestant">Contestant</option>
		</select>
		</div> 
		</li>
        <li id="title" style="display:none;background-color:#FCF;">
		<label class="description" for="title">Title Holder For</label>
		<div>
			<input id="title" name="title" class="element text medium" type="text" maxlength="255" value="" accept="image/jpeg"/> 
		</div> 
		</li>
        <li id="li_8" >
		<label class="description" for="country">Country </label>
		<div>
			<select class="element select large" id="country" name="country"> 
			<option required x-moz-errormessage="" value="" selected="selected">Select Country</option>                                             
            <?php					
                 $contry_query= mysql_query('SELECT * FROM country where status ="Y" ');
  				while( $country = mysql_fetch_array($contry_query)){
				print "<option value=\"";echo $country['id']; print "\" >"; echo  $country['name'];  print "</option>";
			};
			?>
            </select>
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="descp">Description </label>
		<div>
			<textarea id="descp" name="descp" class="element textarea medium"></textarea> 
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Upload a Image </label>
		<div>
			<input required x-moz-errormessage="" id="files[]" name="files[]" class="files[]" type="file" multiple/> 
		</div>  
		</li>		<li id="li_5" >
		<label class="description" for="albm_id">Select Gallery </label>
		<div>
		<select class="element select large" id="albm" name="albm"> 
			<option required x-moz-errormessage="" value="" selected="selected">Choose Album</option>
			<?php					
                 $albm_query= mysql_query('SELECT * FROM albm ');
  				while( $albm = mysql_fetch_array($albm_query)){
				print "<option value=\"";echo $albm['id']; print "\" >"; echo  $albm['albm_nm'];  print "</option>";
			};
			?>

		</select>
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="video">Video Link / Embed  </label>
		<div>
			<textarea id="video" name="video" class="element textarea medium"></textarea> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="895435" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
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