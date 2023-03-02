
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
	require_once '../news/database.php';
	$db = new Database;
	function getTable() {
		GLOBAL $db;
		$data = '<button class="delall">Delete Selected</button>
		<form><table width="95%" cellspacing="0" cellpadding="2" align="center" border="0" id="data_tbl">
			<thead>
			  <tr>
			    <th width="2%"><input type="checkbox" class="selall"/></th>
			    <th width="25%">Main Heading</th>
			    <th width="25%">Brief heading</th>
			    <th width="6%">Date</th>
			    <th width="18%">Delete</th>
				<th width="10%">Detail Descp</th>
				<th width="10%">Brief Detail Descp</th>
				<th width="10%">User</th>
				<th width="10%">Image S</th>
				<th width="10%">Image L</th>
				<th width="10%">Position</th>
				<th width="10%">Action</th>
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
			    <td><span class="tb">'.$value['m_hd'].' </span></td>
			    <td><span class="tb">'.$value['s_hd'].'</span></td>
			    <td><span class="tb">'.$value['dt'].'</span></td>
				<td><span class="tb">'.$value['del_yn'].'</span></td>
			    <td><span class="tb">'.$value['news_detail'].'</span></td>
				<td><span class="tb">'.$value['news_short'].'</span></td>
				<td><span class="tb">'.$value['post_by'].'</span></td>
				<td><span class="tb">'.$value['img_sml'].'</span></td>
				<td><span class="tb">'.$value['img_lrg'].'</span></td>
				<td><span class="tb">'.$value['nws_position'].'</span></td>
				<td align="center">
					<img src="edit.png" class="updrow" title="Update"/>&nbsp;
					<img src="delete.png" class="delrow" title="Delete"/>
				</td>
			  </tr>';
			$i++;
		}
		$data .='</tbody>
			</table></form>
			<div id="paginator">'.$db->paginate(). ' </br> <a href="../forms/image-gallery.php" id="link">Upload Images</a></div>';
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
