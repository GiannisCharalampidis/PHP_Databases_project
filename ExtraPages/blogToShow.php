<?php

require_once('../functions/databaseFunctions.php');
require('../functions/genericFunctions.php');

$blog_id = $_GET['id'];
$id = $_GET['id'];

$sql = "SELECT image, title , content , category  
        FROM blogs
        WHERE id = $id";

$result = selectFromDbArray($sql);
$data = $result->fetch_assoc();

$image = $data['image'];
$title = $data['title'];
$content = $data['content'];
$category = $data['category'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link  rel="stylesheet" href="../css/blogToShow.css">
</head>
<body>
    <button class="homeButton" onclick="window.location.href = '../index.php';">HOME</button>
    <div class="titleAndCategory">
    <?php
    echo "<h1 class='title'>$title</h1>";
    echo "<h3 class='category'>$category</h3>";
    ?>
    <div class="imageAndContent">
        <?php
        echo "<img class='image' src='". $image ."'>";
        echo "<div class='content'>";
        echo "<p class='content'>$content</p>";
        echo "</div>";
        ?>
    </div>
    </div>
    <div class="commentSection">
        <form action="../Servers/createComment.php" method="POST">
            <input type="hidden" name="blogid" value="<?php echo $blog_id; ?>">
            <input type="text" class="commentInput" name="comment" placeholder="Leave a comment about the blog">
            <input type="submit" class="commentButton" value="Comment">
        </form>
        <br><br>
        <h3 style="text-align: center; text-decoration: underline;">Comments</h3>
        <br<br>
        <?php
            $data = require_once('../Servers/displayComments.php');
                $commentsArray = $data['comments'];
                $userNamesArray = $data['user_names'];

                for ($i = 0; $i < count($commentsArray); $i++) {
                    echo "<div class='commentDiv'>";
                    echo "<p class='comment'>$userNamesArray[$i] commented : $commentsArray[$i]</p>";
                    echo "</div>";
                }

        ?>
    </div>
</body>
</html>

