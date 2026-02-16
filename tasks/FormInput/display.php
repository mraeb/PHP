<?php
session_start();
$conn = new mysqli("localhost", "balaji", "balaji@123", "mraeb");
$result = $conn->query("SELECT id, uname, age, gender, mobile, email, Department, terms, DATE_FORMAT(Added_On, '%e %b %Y, %l:%i %p') as Added_On FROM persons");
$searchTerm = "";

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
        <form method="GET" id="search" action="search.php">
            <input type="text" id="searchBar" name="search" pattern="[a-zA-Z0-9 .]+" placeholder="Search" value="<?php echo htmlspecialchars($searchTerm); ?>">
            <input type="submit" id="search-btn" value="🔎">
            <?php
                if (isset($_SESSION['message'])) {
                    echo '<div class="error-message">'.$_SESSION['message'].'</div>';
                    unset($_SESSION['message']); // clear after showing
                }
            ?>
        </form>
        


        <a href="index.php" class='add-btn'>➕ Add Person</a>
        <table border="1" cellpadding="10">
            <tr>
                <th>S. No</th><th>Name</th><th>Age</th><th>Gender</th><th>Mobile</th><th>Email</th><th>Department</th><th>Terms</th><th>Added On</th><th>Actions</th>
            </tr>
            
            <?php $serial = 1; while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $serial; ?></td>
                <td><?php echo $row['uname']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['mobile']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td> <?php echo htmlspecialchars($row['Department']); ?> </td> 
                <td> <?php echo ($row['terms'] == 1) ? "Accepted" : "Not Accepted"; ?> </td>
                <td><?php echo $row['Added_On']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="action-btn edit-btn">Edit</a> |
                    <button id="delete-btn" class="action-btn delete-btn" onclick="showConfirmation(<?php echo $row['id']; ?>)">Delete</button>
                </td>
            </tr>
            <?php $serial++; } ?>
        </table>
        </div>
        <div id="popup-confirm">
            <p id="confirm">Are you sure to delete?</p>
            <a href="#" id="confirm-yes" class='confirm-btn yes'>Yes</a>
            <button onclick="hideConfirmation()" class='confirm-btn no'>No</button>
        </div>
        <script src="script.js"></script>
    </body>
</html>
<?php
// Close connection
if (isset($stmt)) $stmt->close();
$conn->close();
?>