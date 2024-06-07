<?php

require_once('../functions/databaseFunctions.php');
require('../functions/genericFunctions.php');
require('../functions/userFunctions.php');

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
    <title>My Blogs</title>
    <link  rel="stylesheet" href="../css/myBlogs.css">
</head>
<body>

    <button class="homeButton" onclick="window.location.href = '../index.php';">HOME</button>
        <?php
        $user_id = $_SESSION['loggedUser'];
        $data = require('../Servers/displayUsersBlogsServer.php');
    
        $imagesArray = $data['images'];
        $titlesArray = $data['titles'];
        $contentsArray = $data['contents'];
        $categoriesArray = $data['categories'];
        $blogsIdsArray = $data['blog_ids'];

        for ($i = 0; $i < count($imagesArray); $i++) {
            $id = $blogsIdsArray[$i];
            ?>
            <form  method="POST" action="../Servers/updateBlogsServer.php">
            <?php
            echo "<div class='blog'>";
            echo "<img class='image' src='". $imagesArray[$i] ."'>";
            echo "<div class='data'>";
            echo "<br>";
            echo "<div class='category'>". $categoriesArray[$i] ."</div>";
            echo "<label for='title'>Title</label>";
            echo "<input type='text' id='title' name='title' class='title' value='". $titlesArray[$i] ."'>";
            echo "<label for='content'>Content</label>";
            echo "<textarea id='content' name='content' class='content'>". $contentsArray[$i] ."</textarea>";
            echo "<input type='hidden' name='blog' value='$id'>";
            echo "</div>";
            ?>
            <input type="submit" class="updateBtn" value="Update">
            <input type="submit" class="deleteBtn" value="Delete" formaction="../Servers/deleteBlogServer.php">
            </form>
            <?php
            echo "</div>";
        }
        ?>
</body>
</html>