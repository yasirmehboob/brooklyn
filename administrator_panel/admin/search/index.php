<?php
include('../orna/ornasys.inc');
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../restricted/error.php");
};
?>
<!doctype html>
<html lang="en-US">
<head>
  <title>Search</title>
  <link rel="stylesheet" type="text/css" media="all" href="styles.css">
  <script src="../script/jq.min.js"></script>
  <script type="text/javascript" src="jsinput.js"></script>
</head>

<body>
  <div id="topbar"><a href="../menu/menu.php">Back to FMS</a></div>
  <div id="w">
    <div id="content">
    <h1><span>Search Document</span></h1>
    
    <form id="searchform" name="searchform" method="POST" action="result.php">
      <div class="fieldcontainer">
        <select name="filter" id="filter" >
        <option value="*">ALL</option>
        <option value="*">Name</option>
        <option value="rack_id">Rack</option>
        <option value="file_id">File</option>
        <option value="section_id">Section</option>
        <option value="*">Subject</option>
        </select>
        <br><br>
        <input type="text" name="s" id="s" value="" class="searchfield" placeholder="Keywords..." tabindex="1">
        <input type="submit" name="searchbtn" id="searchbtn" value=""> 
        
      </div><!-- @end .fieldcontainer -->
    </form> 
    </div><!-- @end #content -->
  </div><!-- @end #w -->
		  <div id="footer">
			 <a href="http://www.ornamentsolutions.com">Powered by Ornament</a>
		</div>
</body>
</html>