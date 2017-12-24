<?php

    $servername = "localhost";
	$username = "root";
	$password = "kjw0102";
	$dbname = "Bitcoin";

    $db_sql = "CREATE DATABASE " . $dbname . " CHARACTER SET utf8 COLLATE utf8_general_ci;";

    $userSql = "CREATE TABLE USER (
        idx int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        user_id TEXT NOT NULL,
        user_pw TEXT NOT NULL,
        user_name TEXT NOT NULL,
        user_phone TEXT NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

    $marketSql = "CREATE TABLE Market (
        idx int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        market int NOT NULL,
        coin int NOT NULL,
        price int NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

    $alarmSql = "CREATE TABLE Alarm (
        idx int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        user_idx int NOT NULL,
        market_idx int NOT NULL,
        bound tinyint NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";


    $conn = new mysqli($servername, $username, $password);

    if ($conn->connect_error) {
        die("Connection Failed : " . $conn->connect_error);
    }

    //Create Database
    echo "<p>";
    if ($conn->query($db_sql) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating Database : " . $conn->error;
    }
    echo "</p>";
    echo "<br />";

    //Close Connection with Database
    $conn->close();

    $conn = new mysqli($servername, $username, $password, $dbname);

    //Create User Table
    echo "<p>";
    if ($conn->query($userSql) === TRUE) {
        echo "TABLE USER created successfully";
    } else {
        echo "Error creating Table USER : " . $conn->error;
    }
    echo "</p>";

    //Create Market Table
    echo "<p>";
    if ($conn->query($marketSql) === TRUE) {
        echo "TABLE Market created successfully";
    } else {
        echo "Error creating Table Market : " . $conn->error;
    }
    echo "</p>";

    //Create Alarm Table
    echo "<p>";
    if ($conn->query($alarmSql) === TRUE) {
        echo "TABLE Alarm created successfully";
    } else {
        echo "Error creating Table Alarm : " . $conn->error;
    }
    echo "</p>";

    for($i = 0;$i < 3;$i++)
        for($j = 0;$j < 5;$j++) {
            $coinSql = "INSERT INTO Market VALUES(0, '$i', '$j', '0');";
            echo "<p>";
            if ($conn->query($coinSql) === TRUE) {
                echo "Data $i, $j market inserted successfully";
            } else {
                echo "Error inserting Data $i, $j : " . $conn->error;
            }
            echo "</p>";
        }

    //Close Connection with Database
    $conn->close();

?>
