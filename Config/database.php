<?php
// MySQL Connection Info
$DATABASE_HOST = '127.0.0.1';
$DATABASE_USER = DB_USER;
$DATABASE_PASS = DB_PASSWORD;
$DATABASE_NAME = 'NaturalHr';

// Connect to database
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
// If there is an error
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>