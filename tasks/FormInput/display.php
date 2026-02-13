<?php
session_start();
$conn = new mysqli("localhost", "balaji", "balaji@123", "mraeb");
$result = $conn->query("SELECT * FROM persons");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display Persons</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <link rel="stylesheet" type="text/css" href="display.css">
</head>
<body>
    <h2>Persons List</h2>
    <?php if(isset($_SESSION['message'])) { echo "<p>".$_SESSION['message']."</p>"; unset($_SESSION['message']); } ?>
    <a href="index.php" class='add-btn'>➕ Add Person</a>
    <table border="1" cellpadding="10">
        <tr>
            <th>Name</th><th>Age</th><th>Gender</th><th>Mobile</th><th>Email</th><th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['uname']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>" class="action-btn edit-btn" class=''>Edit</a> |
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="action-btn delete-btn" class=''>Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
