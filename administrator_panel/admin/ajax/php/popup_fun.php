<?php
$path='../../orna/';
require_once('../../orna/db.php');

$id=$_POST['id'];
$t_name=$_POST['tname'];

$sql="select * from ".$t_name." where id='".$id."'";
$query=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($query);
if($count>=1){
    $result=mysql_fetch_array($query);
    
    if($result['del']=='N'){
        $status="<button type=\"button\" class=\"btn btn-success btn-xs\">Active</button>"; }
    else{ $status="<button type=\"button\" class=\"btn btn-danger btn-xs\">Inactive</button>"; }
    
    
    
    $title= 'Post by '.$result['user'].' '.$status;
    $body="
        <img src=\"http://www.purehealth.ae/dashboard/images/".$result['dir'].$result['files_1']."\" alt=\"Post Photo\" style=\"width:100%\"/> <br>
        <p>".$result['descp']."
        <br>
            <hr>
                <small>Published on: ".date('d-M-Y', $result['dt'])." <br>
                Posted By: ".$result['user']."</small>
                
            </div>
        </p>";
    
    
    if($result['status']=='approved'){
        $body.="<button class=\"btn btn-success\" disabled><i class=\"fa fa-check\"></i> Approved</button><br><small>Approved By ".$result['approved_by']."</small>";
    }
    else if($result['status']=='pending'){
        $body.="<button class=\"btn btn-info approve_fun\" data-id=\"".$id."\" data-user=\"".$_SESSION['myusername']."\" data-dt=\"".time()."\" >Approve this Post</button>";
    }
    
    echo json_encode(
				array('title' => $title, 'body' => $body)
				);
    
}else{
    echo json_encode(
				array('error' => 'error')
				);
}

?>