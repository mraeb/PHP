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

            if (!is_numeric($number)) {
                echo "<p>Please enter a valid number.</p>";
            } else {

                echo "<p>Number: $number</p>";

                // Even or Odd
                if ($number % 2 == 0) {
                    echo "<p>Type: Even</p>";
                } else {
                    echo "<p>Type: Odd</p>";
                }

                // Positive / Negative / Zero
                if ($number > 0) {
                    echo "<p>Nature: Positive</p>";
                } elseif ($number < 0) {
                    echo "<p>Nature: Negative</p>";
                } else {
                    echo "<p>Nature: Zero</p>";
                }
            }
        }
    ?>
</body>
</html>