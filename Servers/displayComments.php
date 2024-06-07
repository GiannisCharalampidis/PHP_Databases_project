<?php

require_once('../functions/databaseFunctions.php');


$sql = "SELECT comments.*, users.name AS user_name
        FROM comments
        JOIN blogs_comments ON comments.id = blogs_comments.comment_id
        JOIN blogs ON blogs.id = blogs_comments.blog_id
        JOIN users_comments ON comments.id = users_comments.comment_id
        JOIN users ON users.id = users_comments.user_id
        WHERE blogs.id = $blog_id
        ORDER BY comments.id DESC";

$result = selectFromDbArray($sql);    

$commentsArray = array();
$userNamesArray = array(); 

while ($row = mysqli_fetch_assoc($result)) {
    $commentsArray[] = $row['comment'];
    $userNamesArray[] = $row['user_name'];
}

return array('comments' => $commentsArray, 'user_names' => $userNamesArray);

?>