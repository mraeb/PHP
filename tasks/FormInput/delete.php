<?php
    $conn = new mysqli("localhost", "balaji", "balaji@123", "mraeb");
    $id = $_GET['id'];
    
    $conn->query("DELETE FROM persons WHERE id=$id");
    header("Location: display.php");
    exit();
?>
