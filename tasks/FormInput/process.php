<?php
    session_start();
    $_SESSION['uname'] = $_POST['uname'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['mobile'] = $_POST['mobile'];
    $_SESSION['email'] = $_POST['email'];
    header("Location: display.php");
?>
