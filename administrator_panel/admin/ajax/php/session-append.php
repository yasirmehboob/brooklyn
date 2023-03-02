<?php
$path  = '../../orna/';
require_once('../../orna/db.php');

$number = $_POST['rowid'];

print"<div id=\"row-".$_GET['day']. $_POST['rowid']."\" >

    <input type='text' class='form-control' value='".$_GET['day'].' '.$number."' placeholder='Title' name='title[]' readonly/> 
	<input type='time' class='form-control' value='' placeholder='Time Start' required name='time_start[]'/>
	<input type='time' class='form-control' value='' placeholder='Time End' required name='time_end[]'/>
	<input type='number' min='30' step='30' class='form-control' value='' placeholder='Duration' required name='durration[]'/>
	<input type='number' min='1' step='1' class='form-control' value='' placeholder='Booking Capacity' required name='booking_capacity[]'/>

	<input type='hidden' name='mul[]' value=''>
	<input type='hidden' name='status[]' class='status-".$_GET['day']."' value='working'>
	<input type='hidden' name='rating[]' value='0'>
	<input type='hidden' name='session_m_id[]' value='".$_GET['mast_id']."'>


    <div id=\"rem_append-".$_GET['day'].$_POST['rowid']."\" style='display: inline-block;'>
        <button type=\"button\" class=\"remove_row btn btn-xs btn-danger\" data-value='".$_GET['day']."' id=\"remove_row-".$_GET['day'].$_POST['rowid']."\">
		<i class='fa fa-times'></i> Remove
		</button>
    </div>
	
</div>";
?>