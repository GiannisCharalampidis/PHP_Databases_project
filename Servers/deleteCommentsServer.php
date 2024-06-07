<?php

require_once('../functions/databaseFunctions.php');
require_once('../functions/genericFunctions.php');

if(!isRequestMethodPost()) {
    redirectTo('../');
}

startSession();

$commentToDelete = ($_POST['commentId']);

$sql = "DELETE comments.*, users_comments.*, blogs_comments.*
        FROM comments
        LEFT JOIN users_comments ON comments.id = users_comments.comment_id
        LEFT JOIN blogs_comments ON comments.id = blogs_comments.comment_id
        WHERE comments.id = '{$commentToDelete}'";

executeQuery($sql);

redirectTo('../');

?>