<?php
    session_start();
    $conn = new mysqli("localhost", "balaji", "balaji@123", "mraeb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, dept_name FROM departments ORDER BY dept_name ASC"; 
    $result = $conn->query($sql); 

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Form Input Post</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h2>Enter Details</h2>        
        <form method="post" id="form" action="http://localhost/mraeb/php/tasks/FormInput/process.php" onsubmit="return validateForm();" autocomplete="off">
            <table>
                <tr>
                    <td><label for="uname">Name: </label></td>
                    <td>
                        <input id="uname" type="text" name="uname" placeholder="Enter Your Name..." >
                        <span id="nameErr" class="error"><?php echo $nameErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="age">Age: </label></td>
                    <td>
                        <input type ="text" id="age" name="age" placeholder="Enter your age..." >
                        <span id="ageErr" class="error"><?php echo $ageErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="gender">Gender: </label></td>
                    <td>
                        <input type="radio" value="M" id="male" name = "gender" >
                        <label for="male">Male</label>
                        <input type="radio" value="F" id="female" name="gender" >
                        <label for="female">Female</label>
                        <span id="genderErr" class="error"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="mobile">Mobile No: </label></td>
                    <td><input type="tel" id="mobile" name="mobile" placeholder="Enter your Mobile..." >
                    <span id="mobileErr" class="error"><?php echo $mobileErr; ?></span>
                </td>
                </tr>
                <tr>
                    <td><label for="email">Email ID: </label></td>
                    <td><input type="text" id="email" name="email" placeholder="Enter your Email...">
                    <span id="emailErr" class="error"><?php echo $emailErr; ?></span>
                </td>
                </tr>

                <!-- Dropdown --> 
                <tr> 
                    <td>
                        <label for="department">Department:</label>
                    </td> 
                    <td> 
                        <select id="department" name="department"> 
                            <option value="">-- Select Department --</option> 
                            <?php $sql = "SELECT id, dept_name FROM departments ORDER BY dept_name ASC"; 
                            $result = $conn->query($sql); 
                            if ($result && $result->num_rows > 0) { 
                                while ($row = $result->fetch_assoc()) { 
                                    echo '<option value="'.$row['id'].'">'.htmlspecialchars($row['dept_name']).'</option>'; 
                                    } } 
                        else { 
                            echo '<option value="">No departments found</option>'; 
                            } ?> </select>
                        <span id="deptErr" class="error"></span> 
                    </td> 
                </tr> 
                <!-- Checkbox --> 
                 <tr> 
                    <td>
                        <label for="terms">Accept Terms:</label>
                    </td> 
                    <td> 
                        <input type="checkbox" id="terms" name="terms" value="1"> 
                        <label for="terms">I agree to the terms and conditions</label> 
                        <span id="termsErr" class="error"></span> 
                    </td> 
                </tr>
            </table>
            <button type="submit">Submit</button>
        </form>
        <div class="duplicate">
            <p id="successmessage" style="display: none;">Form submitted successfully!</p>
            <p class="error duplicate"><?php echo $_SESSION['message'] ;
            $_SESSION['message'] ='';
            ?></p>
        </div>
        <script src="script.js"> </script>
    </body>
</html>