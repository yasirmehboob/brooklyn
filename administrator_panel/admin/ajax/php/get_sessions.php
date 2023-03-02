<?php
$path = '../../orna/';
require_once('../../orna/db.php');

$sql ="SELECT 
		sess_t.* 
			FROM 
				session_t sess_t,
				session_m sess_m
				WHERE
					sess_m.trainer_id='".$_POST['trainer_id']."' AND
					sess_t.session_m_id = sess_m.id AND
					sess_m.day='".$_POST['day']."' AND
					sess_m.status = 'active' AND
					sess_t.booking_capacity>(SELECT count(*) from schedule_t st, schedule_m sm  
												where 
													st.session_t=sess_t.id  and 
													sm.id=st.schedule_m and
													sm.dt='".$_POST['dt']."' and 
													st.trainer_id='".$_POST['trainer_id']."')
						ORDER BY sess_t.id ASC";

$query = mysql_query($sql);

$count=mysql_num_rows($query);
if($count>=1){
	$options  = "<option value=\"\">Choose Option</option>";
	while($dropdown = mysql_fetch_array($query)){
		$options.= "<option value=\"".$dropdown['id']."\">".$dropdown['time_start'].' -- '.$dropdown['time_end'].'  ('.$dropdown['durration']." Mins)</option>";
	}
	echo $options;
}else{
	echo "<option value=\"\">No Session is Available</option>";
}



?>