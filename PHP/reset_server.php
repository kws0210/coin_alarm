<?php

    include_once("./dbconfig.php");

	$drop_database_sql = "DROP DATABASE Bitcoin;";

	//Open Connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	echo "<p>";
	if ($conn->query($drop_database_sql) === TRUE) {
		echo "Database Deleted\n";
	} else {
		echo "Error Deleting Database: " . $conn->error;
	}
	echo "</p>";

	include 'setup.php';

?>
