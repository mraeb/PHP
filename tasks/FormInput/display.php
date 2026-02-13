<?php
session_start();
$conn = new mysqli("localhost", "balaji", "balaji@123", "mraeb");
$result = $conn->query("SELECT id, uname, age, gender, mobile, email, DATE_FORMAT(Added_On, '%e %b %Y, %l:%i %p') as Added_On FROM persons");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Display Persons</title>
        <link rel="stylesheet" type="text/css" href="display.css">
    </head>
    <body>
        <div class="content">
        <h2>Persons List</h2>
        <?php if(isset($_SESSION['message'])) { echo "<p>".$_SESSION['message']."</p>"; unset($_SESSION['message']); } ?>
        <a href="index.php" class='add-btn'>➕ Add Person</a>
        <table border="1" cellpadding="10">
            <tr>
                <th>Name</th><th>Age</th><th>Gender</th><th>Mobile</th><th>Email</th><th>Added On</th><th>Actions</th>
            </tr>
            <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['uname']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['mobile']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['Added_On']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="action-btn edit-btn">Edit</a> |
                    <!-- <a href="delete.php?id=<?php echo $row['id']; ?>" id="delete-btn" class="action-btn delete-btn">Delete</a> -->
                     <button id="delete-btn" class="action-btn delete-btn" onclick="showConfirmation()">Delete</button>
                </td>
            </tr>
            <?php } ?>
        </table>
        </div>
        <div id="popup-confirm">
            
            <p id="confirm">Are you sure to delete?</p>
            <a href="delete.php?id=<?php echo $row['id']; ?>" class='confirm-btn yes'>Yes</a>
            <button onclick="hideConfirmation()" class='confirm-btn no'>No</button>
            
        </div>

        <script src="script.js"></script>
    </body>
</html>
