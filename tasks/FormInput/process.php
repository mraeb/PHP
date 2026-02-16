<?php
session_start();
$conn = new mysqli("localhost", "balaji", "balaji@123", "mraeb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $dept_id = $_POST['department'];
    $terms = isset($_POST['terms']) ? 1 : 0;


    // Check for duplicates 
    $stmt = $conn->prepare("SELECT uname FROM persons WHERE mobile = ? OR email = ?"); 
    $stmt->bind_param("ss", $mobile, $email); 
    $stmt->execute(); 
    $stmt->store_result(); 
    if ($stmt->num_rows > 0) { 
        $_SESSION['message'] = "Duplicate entry: Mobile or Email already exists."; 
        header("Location: index.php"); // redirect back to form 
        exit;
    } else {
        $dept_id = $_POST['department']; 
        $dept_sql = "SELECT dept_name FROM departments WHERE id = ?"; 
        $stmt_dept = $conn->prepare($dept_sql); 
        $stmt_dept->bind_param("i", $dept_id); 
        $stmt_dept->execute(); 
        $dept_result = $stmt_dept->get_result(); 
        $dept_row = $dept_result->fetch_assoc(); 
        $dept_name = $dept_row['dept_name']; 
        $stmt_dept->close();
        
        
        $sql = "INSERT INTO persons (uname, age, gender, mobile, email, Department, terms, Added_On) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())"; 
        $stmt_insert = $conn->prepare($sql); 
        $stmt_insert->bind_param("sissssi", $uname, $age, $gender, $mobile, $email, $dept_name, $terms); 
        $stmt_insert->execute(); 
        $stmt_insert->close();
    }

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Added Details as follows...";
    } else {
        $_SESSION['message'] = "Error: " . $conn->error;
    }

    header("Location: display.php");
    exit();
}

// Initialize variables
$uname = $age = $gender = $mobile = $email = $department = $terms = "";
$nameErr = $ageErr = $genderErr = $mobileErr = $emailErr = $deptErr = $termsErr = "";

// Function to sanitize input
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Server-side validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Name
    if (empty($_POST["uname"])) {
        $nameErr = "Name is required.";
    } else {
        $name = clean_input($_POST["name"]);
        if (strlen($name) < 3) {
            $nameErr = "Name must be at least 3 characters.";
        }
    }

    // Age
    if (empty($_POST["age"])) {
        $ageErr = "Age is required.";
    } else {
        $age = clean_input($_POST["age"]);
        if (!ctype_digit($age) || $age < 1 || $age > 120) {
            $ageErr = "Enter a valid age between 1 and 120.";
        }
    }

    // Gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required.";
    } else {
        $gender = clean_input($_POST["gender"]);
    }

    // Mobile
    if (empty($_POST["mobile"])) {
        $mobileErr = "Mobile number is required.";
    } else {
        $mobile = clean_input($_POST["mobile"]);
        if (!preg_match("/^[0-9]{10}$/", $mobile)) {
            $mobileErr = "Enter a valid 10-digit mobile number.";
        }
    }

    // Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required.";
    } else {
        $email = clean_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format.";
        }
    }

    // Department 
    if (empty($_POST["department"])) { 
        $deptErr = "Department is required."; 
        } else { 
            $department = clean_input($_POST["department"]); 
            } 
            // Terms checkbox 
    if (empty($_POST["terms"])) { 
        $termsErr = "You must accept the terms."; 
        } else { 
            $terms = 1; // accepted 
        }

    // If no errors, process form
    if (empty($nameErr) && empty($ageErr) && empty($genderErr) && empty($mobileErr) && empty($emailErr)) {
        echo "<h3 style='color:green;'>Form submitted successfully!</h3>";
        echo "Name: $name<br>Age: $age<br>Gender: $gender<br>Mobile: $mobile<br>Email: $email";
        exit;
    }
}
?>