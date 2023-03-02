<?php
$sql_plugin = "select * from ornasys_menu_plugin where del='N' and access_to = '".$_SESSION['myusername']."' order by `sort` ASC";
$query_plugin = mysql_query($sql_plugin);
while($plugin = mysql_fetch_array($query_plugin)){
    include($plugin['plugin']);
}
?>