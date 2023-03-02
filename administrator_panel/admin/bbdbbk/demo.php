<?php 
include ('dumper.php');

try {
	$acc_dumper = Shuttle_Dumper::create(array(
		'host' => 'localhost',
		'username' => 'root',
		'password' => '',
		'db_name' => 'acc',
	));
	
	// dump the database to plain text file
	$acc_dumper->dump('acc.sql');

	
} catch(Shuttle_Exception $e) {
	echo "Couldn't dump database: " . $e->getMessage();
}