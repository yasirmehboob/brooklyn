<?php
  date_default_timezone_set('UTC');
  $start_date = "2012-10-01";
  $end_date = "2012-12-31";
  $next_date = $start_date;
 
  while(strtotime($next_date) <= strtotime($end_date))
  {
	echo "$next_date<br>";    
    $next_date = date ("Y-m-d", strtotime("+1 day", strtotime($next_date)));

  }
?>