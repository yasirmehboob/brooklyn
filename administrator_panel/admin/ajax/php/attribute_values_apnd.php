<?php $path="../../orna/";
require_once('../../orna/db.php');
print"  
        <div id=\"";echo $_POST['rowid']; print"\" style=\"margin-top:4px !important;\">
            <div class=\"col-md-3\"><input type=\"text\" value=\"\" placeholder=\"Attribute Value\" name=\"value[]\" id=\"attribute"; echo $_POST['rowid']; print"\" class=\"form-control\" required></div>
            <div class=\"col-md-2\"><input type=\"text\" value=\"\" placeholder=\"Color Code\" name=\"color_code[]\" class=\"form-control\"></div>
            <div class=\"col-md-3\"><input type=\"text\" value=\"\" placeholder=\"Tool Tips\" name=\"tooltip[]\" class=\"form-control\"></div>
            <div class=\"col-md-3\"><input type=\"file\" value=\"\" name=\"files_1[]\" class=\"form-control\">
                <!--Default Parameters -->
                <input type=\"hidden\" name=\"mul[]\" value=\"\"/>
		        <input type=\"hidden\" name=\"user[]\" value=\""; echo $_SESSION['myusername']; print"\"/>    
                <!--Default Parameters -->
            </div>
            
            <!--Remove Inserted Row Button -->
            <div class=\"col-md-1\" id=\"rem_append"; echo $_POST['rowid']; print"\">
                <button class=\"btn btn-danger btn-xs remove_row\" id=\"row"; echo $_POST['rowid']; print"\"><i class=\"fa fa-times\"></i></button>
            </div>
            <!--Remove Inserted Row Button -->
            
            <div class=\"clearfix\"></div>
        </div>";
	?>