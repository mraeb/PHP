<?php
session_start();
$conn = new mysqli("localhost", "balaji", "balaji@123", "mraeb");

if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
    }

$searchTerm = $_GET['search'];

// if ($searchTerm === '') {
//     $_SESSION['message'] = "Please enter name, moblie or email to search";
//     echo '<h1>'.'Please enter name, moblie or email to search'.'</h1>';
//     exit;
// }

if ($searchTerm === '') {
    $_SESSION['message'] = "Please enter name, mobile or email to search";
    header("Location: display.php");
    exit;
}


if (isset($_GET['search'])) {
    $searchTerm = trim($_GET['search']);
    $stmt = $conn->prepare("SELECT id, uname, age, gender, mobile, email, DATE_FORMAT(Added_On, '%e %b %Y, %l:%i %p') as Added_On FROM persons WHERE uname LIKE ? OR email LIKE ? OR mobile LIKE ?");
    $likeTerm = "%" . $searchTerm . "%";
    $stmt->bind_param("sss", $likeTerm, $likeTerm, $likeTerm);
    $stmt->execute();
    $searchResult = $stmt->get_result();
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Search:<?php echo htmlspecialchars($_GET['search']) ?></title>
        <link rel="stylesheet" type="text/css" href="display.css">
    </head>
    <body>
        <?php if (isset($searchResult)): ?>
            <?php echo "<h2>Search Results for: " . htmlspecialchars($_GET['search']) . "</h2>"; ?>
                        <?php if ($searchResult->num_rows > 0): ?>
                            <table>
                                <tr>
                                    <th>S. No</th><th>Name</th><th>Age</th><th>Gender</th><th>Mobile</th><th>Email</th><th>Added On</th><th>Actions</th>
                                </tr>
                                <?php $serial = 1; while ($rows = $searchResult->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $serial; ?></td>
                                        <td><?php echo $rows['uname']; ?></td>
                                        <td><?php echo $rows['age']; ?></td>
                                        <td><?php echo $rows['gender']; ?></td>
                                        <td><?php echo $rows['mobile']; ?></td>
                                        <td><?php echo $rows['email']; ?></td>
                                        <td><?php echo $rows['Added_On']; ?></td>
                                        <td>
                                            <a href="edit.php?id=<?php echo $rows['id']; ?>" class="action-btn edit-btn">Edit</a> |
                                            <!-- <a href="delete.php?id=<?php echo $row['id']; ?>" id="delete-btn" class="action-btn delete-btn">Delete</a> -->
                                            <button id="delete-btn" class="action-btn delete-btn" onclick="showConfirmation(<?php echo $row['id']; ?>)">Delete</button>
                                        </td>
                                    </tr>
                                <?php $serial++; endwhile; ?>
                            </table>
                        <?php else: ?>
                            <p>No results found for "<strong><?php echo htmlspecialchars($searchTerm); ?></strong>".</p>
                        <?php endif; ?>
        <?php endif; ?>
    </body>
</html>