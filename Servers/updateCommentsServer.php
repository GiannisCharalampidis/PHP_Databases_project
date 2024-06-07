<?php

require_once('../functions/databaseFunctions.php');
require_once('../functions/genericFunctions.php');

if(!isRequestMethodPost()) {
    redirectTo('../');
}

startSession();

$commentToUpdate = ($_POST['commentId']);
$comment = ($_POST['comment']);

$sql = "UPDATE comments
        SET comment = '{$comment}'
        WHERE id = '{$commentToUpdate}'";

executeQuery($sql);

redirectTo('../');

?>