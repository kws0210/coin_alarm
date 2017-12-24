<?php

	session_start();

	$new_id = $_POST['username'];
	$new_pw = $_POST['password1'];
	$new_pw2 = $_POST['password2'];
	$new_nick = $_POST['nickname'];
    $new_phone = $_POST['phone'];

	$user_id_sql = "SELECT * FROM USER WHERE user_id='$new_id';";
	$new_user_sql = "INSERT INTO USER VALUES(0, '$new_id', MD5('$new_pw'), '$new_nick', '$new_phone');";

    $dbservername = "localhost";
	$dbusername = "root";
	$dbpassword = "kjw0102";
	$dbname = "Bitcoin";

    if ($new_pw != $new_pw2) echo "<script>location.replace('/register.php?error=1');</script>";
    else if (preg_match("/^[0-9]{3}[0-9]{4}[0-9]{4}$/", $new_phone)) echo "<script>location.replace('/register.php?error=3');</script>";
    else {
	$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$result = $conn->query($user_id_sql);
	if ($result->num_rows > 0) echo "<script>location.replace('/register.php?error=2');</script>";
	else
		if ($conn->query($new_user_sql) === TRUE) {
            echo "<script>location.replace('/login.php');</script>";
		} else {
            echo "<script>location.replace('/register.php?error=4');</script>";
        }
    }

?>