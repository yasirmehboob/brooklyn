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
  <div id="w_r">
    <div id="content2">
    <h1><span>Search Resut</span></h1>
    
<?php
$filter=$_POST['filter'];
$word=$_POST['s'];
$submit=$_POST['searchbtn'];

	if($filter=="*"){			
		$sql="SELECT * FROM doc where doc_nm like '%".$word."%'";
		$search=mysql_query($sql);
		while($result=mysql_fetch_array($search)){
			echo "Document id = ".$result['id']."<br> File Id = ".$result['file_id']."<br> Document Name = ".$result['doc_nm']."<br> File Link Name = ".$result['doc_link']."<br> Uploaded ON = ".$result['dt']."<br> Uploaded By = ".$result['user']."<br><hr><br>";}
		}
	else if($filter=="file_id"){
		$sql= "SELECT * FROM file where file_nm like '%".$word."%'";
		$search=mysql_query($sql);
		while($result=mysql_fetch_array($search)){
		echo "File id = ".$result['id']."<br> File Name = ".$result['file_nm']."<br> Rack ID = ".$result['rack_id']."<br><hr><br>";}}
		
	else if($filter=="rack_id"){
		$sql= "SELECT * FROM rack where rack_nm like '%".$word."%'";
		$search=mysql_query($sql);
		while($result=mysql_fetch_array($search)){
		echo "Rack id = ".$result['id']."<br> Rack Name = ".$result['rack_nm']."<br><hr><br>";}}
		
	else if($filter=="section_id"){
		$sql= "SELECT * FROM section where section_nm like '%".$word."%'";
		$search=mysql_query($sql);
		while($result=mysql_fetch_array($search)){
		echo "Section id = ".$result['id']."<br> Section Name = ".$result['section_nm']."<br> File ID = ".$result['file_id']."<br><hr><br>";}}
	
	




?>
	
    </div><!-- @end #content -->
  </div><!-- @end #w -->
</body>
</html>

<!--function chk_filter($filter,$word){	
	if($filter=="*"){			
		return "SELECT * FROM doc where doc_nm like '%".$word."%'";}
	else if($filter=="file_id"){
		return "SELECT * FROM file where file_nm like '%".$word."%'";}
	else if($filter=="rack_id"){
		return "SELECT * FROM rack where rack_nm like '%".$word."%'";}
	else if($filter=="section_id"){
		return "SELECT * FROM section where section_nm like '%".$word."%'";}
}//function end
	
	
$search_query=chk_filter($filter,$word);
$search=mysql_query($search_query);
	while($result=mysql_fetch_array($search)){
			if(strlen($result['id'])<=0){
			echo "No Data Found";}
			else {echo $result['id'];}
	}-->
