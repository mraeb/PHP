<?php
$conn = new mysqli("localhost", "balaji", "balaji@123", "mraeb");
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM persons WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

    $conn->query("UPDATE persons SET uname='$uname', age='$age', gender='$gender', mobile='$mobile', email='$email' WHERE id=$id");
    header("Location: display.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Person</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Person Details</h2>
    <form method="POST">
        <table>
            <tr>
                <td><label for="uname">Name:</label></td>
                <td><input type="text" name="uname" value="<?php echo $row['uname']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="age">Age:</label></td>
                <td><input type="number" name="age" value="<?php echo $row['age']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="gender">Gender:</label></td>
                <td>
                    <input type="radio" name="gender" value="M" <?php if($row['gender']=='M') echo 'checked'; ?>> Male
                    <input type="radio" name="gender" value="F" <?php if($row['gender']=='F') echo 'checked'; ?>> Female
                </td>
            </tr>
            <tr>
                <td><label for="mobile">Mobile:</label></td>
                <td><input type="tel" name="mobile" value="<?php echo $row['mobile']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" name="email" value="<?php echo $row['email']; ?>" required></td>
            </tr>
        </table>
        <button type="submit">Update</button>
    </form>
</body>
</html>

