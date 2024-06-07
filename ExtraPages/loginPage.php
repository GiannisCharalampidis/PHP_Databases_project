<?php

require('../functions/userFunctions.php');
require('../functions/genericFunctions.php');

startSession();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/loginPage.css">
</head>
<body>

    <button class="homeButton" onclick="window.location.href = '../index.php';">HOME</button>
    
    <form class="loginForm" action="../Servers/loginServer.php" method="POST">
        <input type="text" id="loginName" name="loginName" placeholder="Name" required><br><br>
        <input type="password" id="loginPassword" name="loginPassword" placeholder="Password" required><br><br>
        <input id="login-btn" type="submit" value="Login">
</form>
</body>

<?php
if (isset($_SESSION['message'])) {
    echo '<script>alert("Incorrect Name or Password")</script>';
}
unset($_SESSION['message']);
?>

</html>