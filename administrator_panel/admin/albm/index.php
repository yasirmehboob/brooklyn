<?php
session_start();
if(!isset( $_SESSION['myusername'])){
header("location:../restricted/error.php");
}
$action = (isset($_REQUEST['action']) && !empty($_REQUEST['action']))?$_REQUEST['action']: NULL;
if(empty($action)) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../images/icon-Crystolite Pharma.PNG" type="image/png">
<title>Upload Images</title><link rel="stylesheet" media="screen and (min-width: 1274px) and (max-width: 1285px)" type="text/css" href="../c-libs/screen/1280-1024.css"><link rel="stylesheet" media="screen and (min-width: 1440px) and (max-width: 1680px)" type="text/css" href="../c-libs/screen/1440.css">
<link rel="stylesheet" media="screen and (min-width: 1024px) and (max-width: 1224px)" type="text/css" href="../c-libs/screen/1024.css">
<link rel="stylesheet" type="text/css" href="../news/style.css" />
<script type="text/javascript" src="../news/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="../news/script.js"></script>
</head>
<body oncontextmenu="return false">
<div id="outer_container">
<div id="loader" ><img src="../news/loader.gif"></div>
<div id="data" style="position:relative;">
<?php } ?>

<?php if(empty($action)) {?>
</div>
</div>
</body>
</html>
<?php }




if($action == 'ajax' || $action == 'update' || $action == 'delete') {
	require_once 'database.php';
	$db = new Database;
	function getTable() {
		GLOBAL $db;
		$data = '<button class="delall">Delete Selected</button>
		<form><table width="95%" cellspacing="0" cellpadding="2" align="center" border="0" id="data_tbl">
			<thead>
			  <tr>
			    <th width="2%"><input type="checkbox" class="selall"/></th>
			    <th width="25%">id</th>
			    <th width="25%">Album Name</th>
				<th width="25%">Action</th>
			    
			  </tr>
			 </thead>
			 <tbody>';
		$i = 1;
		$cls = false;
		foreach ($db->get_users() as $value) {
			$bg = ($cls = !$cls) ? '#ECEEF4' : '#FFFFFF';
			$data .='<tr style="background:'.$bg.'">
			    <td><input type="checkbox" class="selrow" value="'.$value['id'].'"/>
					<input type="hidden" value="'.$value['id'].'" name="id" />
				</td>
			    <td><span class="tb">'.$value['id'].' </span></td>
			    <td><span class="tb">'.$value['albm_nm'].'</span></td>
				<td align="center">
					<img src="edit.png" class="updrow" title="Update"/>&nbsp;
					<img src="delete.png" class="delrow" title="Delete"/>
				</td>
			  </tr>';
			$i++;
		}
		$data .='</tbody>
			</table></form>
			<div id="paginator">'.$db->paginate(). ' </br> <a href="../forms/add-album.php" id="link">Add New Album</a></div>';
		return $data;
	}

	if($action == 'ajax') {
		echo getTable();
	} else if($action == 'delete') {
			$db->delete($_REQUEST['id']);
			echo getTable();
	} else if($action == 'update') {
			unset($_REQUEST['action']);
			$db->update($_REQUEST);
	}
}
?>
