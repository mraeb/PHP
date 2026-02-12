<?php
    session_start();

    // echo "Name: " . ($_SESSION['name']) . "<br>";
    // echo "Age: " . ($_SESSION['age']) . "<br>";
    // echo "Gender: " . ($_SESSION['gender']) . "<br>";
    // echo "Mobile: " . ($_SESSION['mobile']) . "<br>";

    if (isset($_POST['delete'])) {
        session_unset();
        // session_destroy();
        header("Location: index.php");
        exit();
}
    if (isset($_POST['edit'])){
        header("Location: index.php");
        exit;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form method="post">
        <table>
            <tr>
                <td><label>Name: </label></td>
                <td><?php print '<p>'.($_SESSION['uname']).'</p>' ?></td>
            </tr>
            <tr>
                <td><label>Age: </label></td>
                <td><?php print '<p>'.($_SESSION['age']).'</p>' ?></td>
            </tr>
            <tr>
                <td><label>Gender: </label></td>
                <td><?php print '<p>'.($_SESSION['gender']).'</p>' ?></td>
            </tr>
            <tr>
                <td><label>Mobile: </label></td>
                <td><?php print '<p>'.($_SESSION['mobile']).'</p>' ?></td>
            </tr>
            <tr>
                <td><label>Email: </label></td>
                <td><?php print '<p>'.($_SESSION['email']).'</p>' ?></td>
        </table>
        <button id="edit" type='submit' name='edit'>Edit</button>
        <button id="delete" type='submit' name='delete'>Delete</button>
        </form>
    </body>
</html>