<?php
$path = '../../orna/';
require_once('../../orna/db.php');

$sql =$_POST['sql'];
$query = mysql_query($sql);
$options  = "<option value=\"\">Choose Option</option>";
while($dropdown = mysql_fetch_array($query)){
    $options.= "<option value=\"".$dropdown['id']."\">".$dropdown[$_POST['option_text']]."</option>";
}
echo $options;

?>