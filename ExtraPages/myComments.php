<?php

require_once('../functions/databaseFunctions.php');
require('../functions/userFunctions.php');
require('../functions/genericFunctions.php');

startSession();

if (!isset($_SESSION['loggedUser'])) {
    header('Location: ../');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Comments</title>
    <link  rel="stylesheet" href="../css/myComments.css">
</head>
<body>
    
    <button class="homeButton" onclick="window.location.href = '../index.php';">HOME</button>

    <?php
    $user_id = $_SESSION['loggedUser'];
    $data = require('../Servers/displayUsersCommentsServer.php');

    $commentsArray = $data['comments'];
    $titlesArray = $data['titles'];
    $commentsIdsArray = $data['commentsIds'];

    for ($i = 0; $i < count($commentsArray); $i++) {
        $id = $commentsIdsArray[$i];
        ?>
        <div class="CommentsDiv">
        <form  method="POST" action="../Servers/updateCommentsServer.php">
        <?php
        echo "<div class='comment'>";
        echo "<div class='title'>" . "Blog : " . $titlesArray[$i] . "</div>";
        echo "<textarea id='comment' name='comment' class='comment'>". $commentsArray[$i] ."</textarea>";
        echo "<input type='hidden' name='commentId' value='$id'>";
        echo "</div>";
        ?>
        <input type="submit" class="updateBtn" value="Update">
        <input type="submit" class="deleteBtn" value="Delete" formaction="../Servers/deleteCommentsServer.php">
        </form>
        </div>
        <?php
        
    }
    ?>

</body>
</html>
