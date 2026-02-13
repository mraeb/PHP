<?php
session_start();
$conn = new mysqli("localhost", "balaji", "balaji@123", "mraeb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

    $sql = "INSERT INTO persons (uname, age, gender, mobile, email) 
            VALUES ('$uname', '$age', '$gender', '$mobile', '$email')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Added Details as follows...";
    } else {
        $_SESSION['message'] = "Error: " . $conn->error;
    }

    header("Location: display.php");
    exit();
}
?>
