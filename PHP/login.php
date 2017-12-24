<?php

	session_start();

	$id = $_POST['username'];
	$pw = $_POST['password'];
	$user_id_sql = "SELECT * FROM USER WHERE user_id='$id' AND user_pw=MD5('$pw');";

    include_once('./dbconfig.php');

	$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$result = $conn->query($user_id_sql);

	$success = false;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			//echo "{\"name\" : \"$row[user_name]\", \"type\" : \"$row[user_type]\"}";
			if($row['user_id'] === $id && $row['user_pw'] === MD5($pw)) {
				$username = $row[user_name];
				$usertype = $row[user_type];
				$_SESSION['user_idx'] = $row['idx'];
				$_SESSION['user_id'] = $id;
				$_SESSION['user_name'] = $row['user_name'];
				$_SESSION['user_type'] = $row['user_type'];
				$success = true;
				//header("Location: ../admin_main.php");
			}
		}
	}
	$conn->close();
	if($success) {
		echo "<script>location.replace('/');</script>";
    }else{
		echo "<script>location.replace('/login.php');</script>";
    }
?>