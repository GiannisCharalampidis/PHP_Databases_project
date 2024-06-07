<?php

require_once('../functions/databaseFunctions.php');
require_once('../functions/genericFunctions.php');

if(!isRequestMethodPost()) {
    redirectTo('../');
}

startSession();

$blogToDelete = ($_POST['blog']);

$sql = "DELETE blogs.*, users_blogs.*, blogs_comments.*, users_comments.*, comments.*
        FROM blogs
        LEFT JOIN users_blogs ON blogs.id = users_blogs.blog_id
        LEFT JOIN blogs_comments ON blogs.id = blogs_comments.blog_id
        LEFT JOIN users_comments ON blogs_comments.comment_id = users_comments.comment_id
        LEFT JOIN comments ON blogs_comments.comment_id = comments.id
        WHERE blogs.id = '{$blogToDelete}'";

executeQuery($sql);

redirectTo('../');

?>