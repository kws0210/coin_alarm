<?php

    include_once("./dbconfig.php");
    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
 	$select_sql = "SELECT user_phone FROM USER;";
	$result = mysqli_query($conn, $select_sql);
 	while($row_phone_no = $result->fetch_assoc()) {
        echo "<p>".str_ireplace("-", "", $row_phone_no['user_phone'])."</p>";
    }

?>
