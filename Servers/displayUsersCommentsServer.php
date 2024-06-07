<?php

require_once('../functions/databaseFunctions.php');
require_once('../functions/genericFunctions.php');

startSession();

$loggedUser = $_SESSION['loggedUser'];

$sql = "SELECT comments.comment, blogs.title , comments.id
        FROM comments
        JOIN blogs_comments ON comments.id = blogs_comments.comment_id
        JOIN users_comments ON comments.id = users_comments.comment_id
        JOIN blogs ON blogs_comments.blog_id = blogs.id
        JOIN users ON users_comments.user_id = users.id
        WHERE users.name = '$loggedUser'";

$result = selectFromDbArray($sql);

$commentsArray = array();
$titlesArray = array();
$commentsIdsArray = array();

while ($row = mysqli_fetch_assoc($result)) {
    $commentsArray[] = $row['comment'];
    $titlesArray[] = $row['title'];
    $commentsIdsArray[] = $row['id'];
}

return array('comments' => $commentsArray, 'titles' => $titlesArray, 'commentsIds' => $commentsIdsArray);

?>