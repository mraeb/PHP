<?php
    session_start();
    $uname = isset($_SESSION['uname']) ? $_SESSION['uname'] : '';
    $age = isset($_SESSION['age']) ? $_SESSION['age'] : '';
    $gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
    $mobile = isset($_SESSION['mobile']) ? $_SESSION['mobile'] : '';
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Form Input Post</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form method="post" id="form" action="http://localhost/mraeb/php/tasks/FormInput/process.php">
            <table>
                <tr>
                    <td><label for="uname">Name: </label></td>
                    <td><input id="uname" type="text" name="uname" value="<?php echo htmlspecialchars($uname); ?>" placeholder="Enter Your Name..." required></td>
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
                    <td><input type="email" id="email" name="email" value = "<?php echo htmlspecialchars($email); ?>" required></td>
                </tr>
                
                
            </table>
            <input type="submit" name="Submit" value = "Submit">
        </form>
        <div>
            <p id="successmessage" style="display: none;">Form submitted successfully!</p>
        </div>
        <!-- <script>
            function showSuccess() {
                // Handle form submission
                // event.preventDefault(); // Prevent the default form submission
                // document.getElementById("successmessage").style.display='block';
                alert("Form submitted successfully!"); // Show a success message
                // submit();
            }
        </script> -->
        <script src="script.js"> </script>
    </body>
</html>