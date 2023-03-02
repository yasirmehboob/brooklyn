<?php


/**
 function: find the aDays in the time period
   usage:
    getDays($start, $duration, $aDays, $fFormat) 
 where:  
   $start = 'YYYY';   
   $iDays =  365;  // maximum  
   $aDays = ['Mon', 'Wed', 'Fri'];  //  3xchar  
*/

function getDays(
    $start  ='2019-07-01', 
    $iDays  = 365, 
    $aDays  = ['Sun', 'Wed', 'Sat'],
    $format = 'D, M jS Y'
) 
{
  $dStart = date('d', strtotime($start));
  $YM     = substr($start, 0, 8);

  for($i=$dStart; $i<=$iDays; $i++)
  {
    $ok   = strtotime($YM.$i);
    if($ok)
    {
      $date = date('D', $ok);
      foreach($aDays as $day)
      {
        $date = strtolower($date);         
        $day  = strtolower($day);         
        if( $date===$day )
        {
          echo '<br>' .date($format, $ok);
        }
      }//foreach 
    }//$ok
  }
}//endfunc

getDays($str = '2019-07-25', 42, $aDays = ['Mon','Sat','Sun'],'Y M D jS');


$week_start = strtotime('last Sunday', time());
$week_end = strtotime('next Sunday', time());

$month_start = strtotime('first day of this month', time());
$month_end = strtotime('last day of this month', time());

$year_start = strtotime('first day of January', time());
$year_end = strtotime('last day of December', time());

echo "<br><br>Week Start   ".date('D, M jS Y', $week_start).'<br/>';
echo "Week Ended   ".date('D, M jS Y', $week_end).'<br/>';

echo "Month Start   ".date('D, M jS Y', $month_start).'<br/>';
echo "Month Start   ".date('D, M jS Y', $month_end).'<br/>';

echo "Year Start   ".date('D, M jS Y', $year_start).'<br/>';
echo "Year Start   ".date('D, M jS Y', $year_end).'<br/>';



for($d=1;$d<=31;$d++){
	$date_is=date('d n Y', strtotime(' + '.$d.' days'))."<br>";
	//echo $date_is;
}

//get available sessions
/*

SELECT 
	sess_t.* 
    	FROM 
        	session_t sess_t,
            session_m sess_m  
            WHERE 
            	sess_m.trainer_id='8' AND
                sess_t.session_m_id = sess_m.id AND
                sess_m.day='5' AND
                sess_m.status = 'active' AND
                sess_t.booking_capacity>(SELECT count(*) from schedule_t st, schedule_m sm  
											where 
												st.session_t='47'  and 
												sm.id=st.schedule_m and
												sm.dt='2019-08-05' and 
												st.trainer_id='8')
*/
?>