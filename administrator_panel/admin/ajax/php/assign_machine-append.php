<?php
$path  = '../../orna/';
require_once('../../orna/db.php');

$number = $_POST['rowid'];
if ($number % 2 == 0) {
  $class="background";
}else{
    $class="";
}

print"<div class=\"col-md-12 ".$class."\" id=\"". $_POST['rowid']."\"  style=\"margin-bottom:0.5em\">

    <div class=\"col-md-4\">
        <select required=\"required\" class=\"form-control manufacturer\" name=\"manufacturer_id[]\" id=\"manuf".$_POST['rowid']."\">
            <option >Select Manufacturer</option>";
            
                $sql="select * from manufacturer where del ='N'";
                $query=mysql_query($sql);
                while($man=mysql_fetch_array($query)){
                    print "<option value=\"".$man['id']."\">".$man['manufacturer']."</option>";    
                }
           print"
        </select>
    </div>

    <div class=\"col-md-4\">
        <select required=\"required\" class=\"form-control classification\" name=\"classification_id[]\" id=\"class".$_POST['rowid']."\">
        <option >No Manufacturer Selected</option>
        </select>
    </div>

    <div class=\"col-md-4\">
        <select required=\"required\" class=\"form-control machine\" name=\"machine_id[]\" id=\"machine".$_POST['rowid']."\">
           <option >No Classification Selected</option> 
        </select>
    </div>

    <input type=\"hidden\" name=\"user_id[]\" value=\"".$_GET['user_id']."\">
    <input type=\"hidden\" name=\"mul[]\" value=\"\">
    <input type=\"hidden\" name=\"del[]\" value=\"N\">
    <input type=\"hidden\" name=\"dt[]\" value=\"".time()."\">
    <input type=\"hidden\" name=\"user[]\" value=\"".$_SESSION['myusername']."\">


    <div id=\"rem_append".$_POST['rowid']."\">
        <button type=\"button\" class=\"remove_row btn btn-danger\" id=\"remove_row".$_POST['rowid']."\" style=\"float:right;margin:10px 10px 0 0; \">Remove</button>
    </div>
</div>";
?>