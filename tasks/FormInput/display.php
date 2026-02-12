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

    </head>
    <body>
        <form method="post">
        <table>
            <tr>
                <td><lable>Name: </label></td>
                <td><?php print '<p>'.($_SESSION['name']).'</p>' ?></td>
            </tr>
            <tr>
                <td><lable>Age: </label></td>
                <td><?php print '<p>'.($_SESSION['age']).'</p>' ?></td>
            </tr>
            <tr>
                <td><lable>Gender: </label></td>
                <td><?php print '<p>'.($_SESSION['gender']).'</p>' ?></td>
            </tr>
            <tr>
                <td><lable>Mobile: </label></td>
                <td><?php print '<p>'.($_SESSION['mobile']).'</p>' ?></td>
            </tr>
        </table>
        <button id="edit" type='submit' name='edit'>Edit</button>
        <button id="delete" type='submit' name='delete'>Delete</button>
        </form>
    </body>
</html>