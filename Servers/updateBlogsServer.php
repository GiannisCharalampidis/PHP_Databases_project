<?php

require_once('../functions/databaseFunctions.php');
require_once('../functions/genericFunctions.php');

if(!isRequestMethodPost()) {
    redirectTo('../');
}

startSession();

$blogToUpdate = ($_POST['blog']);
$title = ($_POST['title']);
$content = ($_POST['content']);


$sql = "UPDATE blogs
        SET title = '{$title}', content = '{$content}'
        WHERE id = '{$blogToUpdate}'";

executeQuery($sql);

redirectTo('../');

?>