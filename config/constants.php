<?php 
	//Start Session
	session_start();
	

	//Crete Constants to Store Non Repeating Values
	define('SITEURL', 'http://localhost/logistics/');

	$hostname = 'localhost';
	$port = 3306;
	$database = 'logistics';
	$username = 'kien';
	$password = '123456';

    $conn = new mysqli(
    $hostname, 
    $username, 
    $password, 
    $database, 
    $port
	);

    if ($conn->connect_error) {
            die($conn->connect_error);
	}
?>