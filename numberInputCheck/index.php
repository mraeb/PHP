<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Number Input</title>
</head>
<body>
    <form method="post" action="index.php">
        <label for="number">Enter a number:</label>
        <input type="text" id="number" name="number">
        <input type="submit" value="Submit">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $number = $_POST['number'];
        if (is_numeric($number) && $number%2==0) {
            echo "<p>The input is a even number: $number</p>";
        } else {
            echo "<p>The input is a odd number.</p>";
        }
        if($number<0) {
            echo "<p>The input is a negative number.</p>";
        } else {
            echo "<p>The input is a positive number.</p>";
        }
    }
    ?>
</body>
</html>