<?php

    include_once("./dbconfig.php");

    $pk = $_POST['pk'];

    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

    $deleteAlarmSql = "DELETE FROM Alarm WHERE idx = $pk";

    if ($conn->query($deleteAlarmSql) === TRUE) {
        echo "성공적으로 삭제 되었습니다";
    } else {
        //echo "실패, 잠시 후에 다시 시도해 주세요.";
        echo $conn->error;
    }

?>
