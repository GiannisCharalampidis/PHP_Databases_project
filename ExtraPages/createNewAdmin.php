<?php

require('../functions/genericFunctions.php');

startSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a new account</title>
    <link rel="stylesheet" href="../css/createNewAdmin.css">
</head>
<body>
    
    <button class="homeButton" onclick="window.location.href = '../index.php';">HOME</button>

    <form class="createUser" action="../Servers/createUserServer.php" onsubmit="return confirmPassword()" method="POST">
    <label for="accname">Account's name:</label><br>
    <input type="text" id="accname" name="accname" placeholder="Choose your name" required><br><br>
    <label for="email">E-mail:</label><br>
    <input type="text" id="email" name="email" placeholder="Your e-mail" required><br><br>
    <label for="password">Your password:</label><br>
    <input type="password" id="password" name="password" placeholder="Choose your password" required><br><br>
    <label for="confirmpassword">Confirm your password:</label><br>
    <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm your password" required><br>
    <?php
        if(isset($_SESSION['loggedUserRole']) && $_SESSION['loggedUserRole'] === "admin") {
            echo '<br>
            <label>Choose your Role:</label><br><br>
                <div id="roleSelection" class="createUserOrAdmin">
                    <input type="radio" id="new_role_admin" name="new_role" value="admin" required>
                    <label for="new_role_admin">Admin</label> &nbsp&nbsp
                    <input type="radio" id="new_role_user" name="new_role" value="user" required>
                    <label for="new_role_user">User</label><br>
                </div>';
        }
    ?>
    <br>
    <input id="create-btn" type="submit" value="Create">
    </form> 

    
</body>

<script>
    function confirmPassword() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmpassword").value;
        if (password !== confirmPassword) {
            alert("Password and Confirm Password do not match!");
            return false;
        } else {
        return true;
        }
    }
</script>

</html>