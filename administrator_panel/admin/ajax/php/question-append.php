<?php
$path  = '../../orna/';
require_once('../../orna/db.php');

$number = $_POST['rowid'];
if ($number % 2 == 0) {
  $class="background";
}else{
    $class="";
}

print"<div class=\"col-md-12 ".$class."--\" id=\"". $_POST['rowid']."\"  style=\"margin-bottom:0.5em\">

    <div class=\"col-md-12\">
        
         <select id=\"selected". $_POST['rowid']."\" required=\"required\" class=\"form-control\" name=\"question_id[]\">";
            
                $sql="select * from questions where del ='N'";
                $query=mysql_query($sql);
                while($ques=mysql_fetch_array($query)){
                    print "<option value=\"".$ques['id']."\">".$ques['question']."</option>";    
                }
            print"
        </select>
    </div>
    <input type=\"hidden\" name=\"survey_mast_id[]\" value=\"".$_POST['survey_mast_id']."\">

    <div id=\"rem_append".$_POST['rowid']."\">
        <button type=\"button\" class=\"remove_row btn btn-danger\" id=\"remove_row".$_POST['rowid']."\" style=\"float:right;margin:10px 10px 0 0; \">Remove</button>
    </div>
    
    <input type=\"hidden\" name=\"mul[]\" value=\"\">
</div>";
?>