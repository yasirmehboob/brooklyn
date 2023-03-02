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
<link rel="shortcut icon" href="../../images/event" type="image/png">
<title>Post News/Updates</title> 
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" oncontextmenu="return false" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Post News/Updates</a></h1>
		<form id="" class="" enctype="multipart/form-data" method="post" action="../orna/insert_news.php">
					<div class="form_description">
			<h2>Post News/Updates</h2>
			<p>POST <?php echo $company;?> NEWS AND UPDATE</p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">News  Heading  </label>
		<div>
			<input required x-moz-errormessage="" name="m_hd" type="text" class="element text large" id="m_hd" value="" maxlength="255" /> 
		</div><p class="guidelines" id="guide_1"><small>This is the main heading of news which will be display on detailed news page</small></p> 
		</li><li id="li_3" >
		<label class="description" for="news_detail">Detail</label>
		<div>
			<textarea required x-moz-errormessage="" id="news_detail" name="news_detail" class="element textarea medium"></textarea> 
		</div><p class="guidelines" id="guide_3"><small>Body of the news for detail page</small></p> 
		</li><li id="li_5" >
		<label class="description" for="photo">Display Image (Home Page)</label>
		<div>
			<input required x-moz-errormessage="" id="photo" name="photo" class="element file" type="file"/> 
		</div> <p class="guidelines" id="guide_5"><small>Pic size should be w219 x h117 (px).</small></p> 
		</li>		<li id="li_6" >
		<label class="description" for="photo_news_gallery[]">Related Photos</label>
		<div>
			<input required x-moz-errormessage="" id="photo_news_gallery[]" name="photo_news_gallery[]" class="element file" type="file" multiple="multiple"/> 
		</div> <p class="guidelines" id="guide_6"><small>Image for news gallery.</small></p> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="726427" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
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