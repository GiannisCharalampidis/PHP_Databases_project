<?php

print_r($_POST);

require('../functions/databaseFunctions.php');
require('../functions/genericFunctions.php');
require('../functions/userFunctions.php');

startSession();

    $comment = $_POST['comment'];
    $blogId = $_POST['blogid'];
    (existsLoggedUser()) ? $userId = $_SESSION['loggedUserId'] : $userId = 1;

    $sql1 = "INSERT INTO comments (comment)
             VALUES ('$comment')";

    executeQuery($sql1);

    $sql_id = "SELECT id FROM comments
                ORDER BY id DESC LIMIT 1";

    $comment_id = selectFromDbSimple($sql_id);

    $comment_id = $comment_id[0]['id'];

    $sql2 = "INSERT INTO blogs_comments 
             (blog_id, comment_id)
             VALUES ('$blogId', $comment_id)";

    executeQuery($sql2);

    $sql3 = "INSERT INTO users_comments
             (user_id, comment_id)
             VALUES ('$userId', $comment_id)";

    executeQuery($sql3);

    redirectTo('../ExtraPages/blogToShow.php?id=' . $blogId);

?>