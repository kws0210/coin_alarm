<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        /*
        $market = $_POST['market'];
        $coin = $_POST['coin'];
        $price = $_POST['price'];
        */

        $jobject = json_decode(file_get_contents('php://input'), TRUE);

        $dbservername = "localhost";
	    $dbusername = "root";
	    $dbpassword = "kjw0102";
	    $dbname = "Bitcoin";

        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

        if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
        }

        $updateSql = "UPDATE Market SET price=".$jobject['price']." WHERE market=".$jobject['market']." AND coin=".$jobject['coin'].";";

        if ($conn->query($updateSql) === TRUE)
            echo "Success";
        else
            echo $conn->error;

    }

?>
