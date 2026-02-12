<?php
    session_start();
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
    $age = isset($_SESSION['age']) ? $_SESSION['age'] : '';
    $gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
    $mobile = isset($_SESSION['mobile']) ? $_SESSION['mobile'] : '';
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form method="post" action="http://localhost/mraeb/php/tasks/FormInput/process.php">
            <table>
                <tr>
                    <td><label for="name">Name: </label></td>
                    <td><input id="name" type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required></td>
                </tr>
                <tr>
                    <td><label for="age">Age: </label></td>
                    <td><input type ="number" id="age" name="age" value="<?php echo htmlspecialchars($age); ?>" required></td>
                </tr>
                <tr>
                    <td><label for="gender">Gender: </label></td>
                    <td>
                        <input type="radio" value="M" id="male" name = "gender" <?php if ($gender==='M') echo 'checked'; ?>>
                        <label for="male">Male</label>
                        <input type="radio" value="F" id="female" name="gender" <?php if ($gender==='F') echo 'checked';?>>
                        <label for="female">Female</label>
                    </td>
                <tr>
                    <td><label for="mobile">Mobile No: </label></td>
                    <td><input type="tel" id="mobile" name="mobile" value ="<?php echo htmlspecialchars($mobile); ?>" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email ID: </label></td>
                    <td><input type="email" id="email" name="email" value = "<?php echo htmlspecialchars($email); ?>"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="Submit" value = "submit" onclick="showSuccess()"></td>
                </tr>
            </table>
        </form>
        <div>
            <p id="successmessage" style="display: none;">Form submitted successfully!</p>
        </div>
        <script>
            function showSuccess() {
                // Handle form submission
                // event.preventDefault(); // Prevent the default form submission
                // document.getElementById("successmessage").style.display='block';
                alert("Form submitted successfully!"); // Show a success message
                // submit();
            }
        </script>
    </body>
</html>