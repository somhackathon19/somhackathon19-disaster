<?php
	$dbLocation = "localhost";
	$dbUser = "hackathon";
	$dbPass = "Thos2000";
	$dbName = "hackathon";
	$dbConn = mysqli_connect($dbLocation, $dbUser, $dbPass, $dbName);
	if (mysqli_connect_errno()) {exit;}
?>