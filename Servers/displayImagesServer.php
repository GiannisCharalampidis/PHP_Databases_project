<?php
require('functions/databaseFunctions.php');

if(isset($_POST['menu']) && $_POST['menu'] != 'AllCategories') {

    $menu = $_POST['menu'];

    $sql = "SELECT id, image, title 
            FROM blogs
            WHERE category = '$menu'
            ORDER BY id DESC";
} else {

    $sql = "SELECT id, image, title 
            FROM blogs
            ORDER BY id DESC";
}

$result = selectFromDbArray($sql);

$imagesArray = array();
$titlesArray = array();

while ($row = mysqli_fetch_assoc($result)) {
    $imagesArray[$row['id']] = $row['image'];
    $titlesArray[$row['id']] = $row['title'];
}

return array('images' => $imagesArray, 'titles' => $titlesArray);

?>