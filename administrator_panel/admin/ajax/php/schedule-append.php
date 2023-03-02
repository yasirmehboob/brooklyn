<?php
$path  = '../../orna/';
require_once('../../orna/db.php');

$number = $_POST['rowid'];

print"<div id=\"row-".$_GET['day'].$_POST['rowid']."\" >

	<select class='form-control trainer_select' data-row='".$_GET['day']."-".$_POST['rowid']."' data-dt='".$_GET['day']."' data-day='".date('N', strtotime($_GET['day']))."' style='width:24%' required name='trainer_id[]'>
		<option value=''> Choose Trainer</option>";

		$sql_ct="SELECT 
					t.* 
						FROM 
							`trainers` t, 
							session_m sm 
								where 
									t.status='current' and 
									t.del='N' and 
									t.id=sm.trainer_id and 
									sm.day='".date('N', strtotime($_GET['day']))."' and sm.status='active'";

		$query_ct=mysql_query($sql_ct);
		while($ct=mysql_fetch_array($query_ct)){
			print "<option value='".$ct['id']."'>".$ct['f_name'].' '.$ct['l_name']." </option>";
		}
print"
	</select>


	<select class='form-control trainer_session' id='trainer-session-".$_GET['day']."-".$_POST['rowid']."' style='width:24%' required name='session_t[]'>
		<option value=''> No Trainer Selected</option>
	</select>

	<input type='text' style='width:40%' class='form-control' value='' placeholder='GYM Notes' name='gym_note[]'/>

	<input type='hidden' name='mul[]' value=''>
	<input type='hidden' name='status[]' class='status-".$_GET['day']."' value='pending'>
	<input type='hidden' name='rating[]' value='0'>
	<input type='hidden' name='schedule_m[]' value='".$_GET['mast_id']."'>


    <div id=\"rem_append-".$_GET['day'].$_POST['rowid']."\" style='display: inline-block;'>
        <button type=\"button\" class=\"remove_row btn btn-xs btn-danger\" data-value='".$_GET['day']."' id=\"remove_row-".$_GET['day'].$_POST['rowid']."\">
		<i class='fa fa-times'></i> Remove
		</button>
    </div>
	
</div>";
?>