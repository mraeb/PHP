<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Form Input Post</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h2>Enter Details</h2>        
        <form method="post" id="form" action="http://localhost/mraeb/php/tasks/FormInput/process.php" autocomplete="off">
            <table>
                <tr>
                    <td><label for="uname">Name: </label></td>
                    <td><input id="uname" type="text" name="uname" pattern="[a-zA-Z .]+" placeholder="Enter Your Name..." required></td>
                </tr>
                <tr>
                    <td><label for="age">Age: </label></td>
                    <td><input type ="text" id="age" name="age" pattern ="\d{2}" placeholder="Enter your age..." required></td>
                </tr>
                <tr>
                    <td><label for="gender">Gender: </label></td>
                    <td>
                        <input type="radio" value="M" id="male" name = "gender" >
                        <label for="male">Male</label>
                        <input type="radio" value="F" id="female" name="gender" >
                        <label for="female">Female</label>
                    </td>
                <tr>
                    <td><label for="mobile">Mobile No: </label></td>
                    <td><input type="tel" id="mobile" name="mobile" pattern="[6-9][0-9]{9}" placeholder="Enter your Mobile..." required></td>
                </tr>
                <tr>
                    <td><label for="email">Email ID: </label></td>
                    <td><input type="email" id="email" name="email" pattern="[a-z0-9.]+@[a-z]{5,}.[a-z]{2,}" placeholder="Enter your Email..." required></td>
                </tr>
                
                
            </table>
            <button type="submit">Submit</button>
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