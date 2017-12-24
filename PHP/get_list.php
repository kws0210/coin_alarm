<?php

    $servername = "localhost";
	$username = "root";
	$password = "kjw0102";
	$dbname = "Bitcoin";

	$load_videos_url = "SELECT * FROM Market ORDER BY idx ASC";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if($conn->connect_error) {
		die("DB Connection Failed:" . $conn->connect_error);
	}

    $arrCon = array();
	$arrlist = array();
    $result = $conn->query($load_videos_url);
    $pre = 0;
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
            $arr = array('price'=>$row['price']);
            if ($pre == 5) {
                array_push($arrCon, $arrlist);
                $arrlist = array();
                $pre = 0;
            }
            $pre += 1;
			array_push($arrlist, $arr);
		}
        array_push($arrCon, $arrlist);
	}

	echo json_encode($arrCon);

?>
