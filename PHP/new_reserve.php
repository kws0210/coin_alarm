<?php

    session_start();

    $market = $_POST['market'];
    $coin = $_POST['coin'];
    $price = $_POST['price'];
    $bound = $_POST['bound'];

    include_once("./dbconfig.php");

    $newReserveSql = "INSERT INTO Alarm VALUES(0, ".$_SESSION['user_idx'].", ".($market * 5 + $coin).", $price, $bound)";

    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

    if($conn->query($newReserveSql) === TRUE) {
        echo "Success";
    } else {
        echo "Fail : " . $conn->error;
    }

?>
