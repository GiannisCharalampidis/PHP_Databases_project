<?php

require_once('../functions/databaseFunctions.php');
require_once('../functions/genericFunctions.php');

startSession();

$loggedUser = $_SESSION['loggedUser'];

$sql = "SELECT blogs.image, blogs.title, blogs.content, blogs.category, blogs.id
        FROM blogs 
        INNER JOIN users_blogs ON users_blogs.blog_id = blogs.id 
        INNER JOIN users ON users.id = users_blogs.user_id 
        WHERE users.name = '$loggedUser'";


$result = selectFromDbArray($sql);

$imagesArray = array();
$titlesArray = array();
$contentsArray = array();
$categoriesArray = array();
$blogsIdsArray = array();

while ($row = mysqli_fetch_assoc($result)) {
    $imagesArray[] = $row['image'];
    $titlesArray[] = $row['title'];
    $contentsArray[] = $row['content'];
    $categoriesArray[] = $row['category'];
    $blogsIdsArray[] = $row['id'];
}

return array('images' => $imagesArray, 'titles' => $titlesArray, 'contents' => $contentsArray, 'categories' => $categoriesArray, 'blog_ids' => $blogsIdsArray);

?>