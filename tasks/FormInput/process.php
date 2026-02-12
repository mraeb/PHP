<?php
    session_start();
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['mobile'] = $_POST['mobile'];
    header("Location: display.php");
?>
