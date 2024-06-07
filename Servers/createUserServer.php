<?php

require('../functions/databaseFunctions.php');
require('../functions/genericFunctions.php');
require('../functions/userFunctions.php');

startSession();

if(isRequestMethodPost()) {
    if(isset($_POST['new_role'])) {
    $userData = [
        'name'      => addslashes($_POST['accname']),
        'email'     => addslashes($_POST['email']),
        'role'      => addslashes($_POST['new_role']),
        'password'  => addslashes($_POST['password'])
    ];
    } else {
    $userData = [
        'name'      => addslashes($_POST['accname']),
        'email'     => addslashes($_POST['email']),
        'role'      => 'user',
        'password'  => addslashes($_POST['password'])
    ];
    }

    $accountName  = $_POST['accname'];
    $accountEmail = $_POST['email'];

    $sql_name = "SELECT id
                 FROM users
                 WHERE name = '{$accountName}'";

    $sql_email = "SELECT id
                  FROM users
                  WHERE email = '{$accountEmail}'";          

    $data = selectFromDbSimple($sql_name);

    if(!empty($data)) {
        exit("There is already a user with this username: $accountName");
    }

    $data = selectFromDbSimple($sql_email);

    if(!empty($data)) {
        exit("There is already a user with this email: $accountEmail");
    }

    $fields = "";
    $values = "";

    foreach($userData as $field => $value) {
        if(!empty($value)) {
            $fields .= "$field, ";
            $values .= "'$value', ";
        }
    }

    $fields = rtrim($fields, ', ');
    $values = rtrim($values, ', ');

    $sql = "INSERT INTO users ({$fields}) 
            VALUES ({$values})";

    executeQuery($sql);

    redirectTo('../ExtraPages/loginPage.php');
} else {
    setError("Tried to send data without 'Post' Method!");
    redirectTo("../ExtraPages/errorPage.php");
}


?>