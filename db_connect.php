<?php
    $server = "localhost";
    $username = "balaji";
    $password = "balaji@123";
    $db = "mraeb";

    $conn = new mysqli($server, $username, $password, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
// Close connection
    $conn->close();
?>