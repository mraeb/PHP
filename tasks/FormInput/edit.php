<!-- <?php
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
    $department = $_POST['department']; 
    $terms = isset($_POST['terms']) ? 1 : 0;

    $conn->query("UPDATE persons SET uname='$uname', age='$age', gender='$gender', mobile='$mobile', email='$email' WHERE id=$id");
    header("Location: display.php");
    exit();
}
?>
 -->

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
    $department_id = $_POST['department']; 
    $terms = isset($_POST['terms']) ? 1 : 0;

    // Fetch dept_name from departments table
    $dept_sql = "SELECT dept_name FROM departments WHERE id = ?";
    $stmt_dept = $conn->prepare($dept_sql);
    $stmt_dept->bind_param("i", $department_id);
    $stmt_dept->execute();
    $dept_result = $stmt_dept->get_result();
    $dept_row = $dept_result->fetch_assoc();
    $dept_name = $dept_row['dept_name'];
    $stmt_dept->close();

    // Update persons table with dept_name and terms
    $stmt = $conn->prepare("UPDATE persons 
        SET uname=?, age=?, gender=?, mobile=?, email=?, Department=?, terms=? 
        WHERE id=?");
    $stmt->bind_param("sissssii", $uname, $age, $gender, $mobile, $email, $dept_name, $terms, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: display.php");
    exit();
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Edit Person</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h2>Edit Person Details</h2>
        <form method="POST" autocomplete="off">
            <table>


<table>
                <tr>
                    <td><label for="uname">Name: </label></td>
                    <td>
                        <input id="uname" type="text" name="uname" value="<?php echo $row['uname']; ?>" placeholder="Enter Your Name..." >
                        <span id="nameErr" class="error"><?php echo $nameErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="age">Age: </label></td>
                    <td>
                        <input type ="text" id="age" name="age" value="<?php echo $row['age']; ?>" placeholder="Enter your age..." >
                        <span id="ageErr" class="error"><?php echo $ageErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="gender">Gender: </label></td>
                    <td>
                        <input type="radio" value="M" id="male" <?php if($row['gender']=='M') echo 'checked';?> name = "gender" >
                        <label for="male">Male</label>
                        <input type="radio" value="F" id="female" <?php if($row['gender']=='F') echo 'checked';?> name="gender" >
                        <label for="female">Female</label>
                        <span id="genderErr" class="error"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="mobile">Mobile No: </label></td>
                    <td><input type="tel" id="mobile" name="mobile" value="<?php echo $row['mobile']; ?>" placeholder="Enter your Mobile..." >
                    <span id="mobileErr" class="error"><?php echo $mobileErr; ?></span>
                </td>
                </tr>
                <tr>
                    <td><label for="email">Email ID: </label></td>
                    <td><input type="text" id="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Enter your Email...">
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
                            <option value="<?php echo $row['dept_name']; ?>">-- Select Department --</option> 
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
            <button type="submit">Update</button>
        </form>
    </body>
</html>

