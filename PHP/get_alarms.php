<?php

    session_start();

    include_once("./dbconfig.php");

    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

    $loadAlarms = "SELECT * FROM Alarm WHERE user_idx=".$_SESSION['user_idx']." ORDER BY idx DESC";

	$arrlist = array();
    $result = $conn->query($loadAlarms);
    $pre = 0;
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
            $arr = array('idx'=>$row['idx'], 'market'=>$row['market_idx'], 'price'=>$row['price'], 'bound'=>$row['bound']);
			array_push($arrlist, $arr);
		}
	}

	echo json_encode($arrlist);

 ?>
