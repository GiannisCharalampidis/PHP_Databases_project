<?php

require('../functions/databaseFunctions.php');
require('../functions/genericFunctions.php');

    startSession();

    if (isRequestMethodPost()) {
        $LoginName     = $_POST['loginName'];
        $LoginPassword = $_POST['loginPassword'];

        if (isset($LoginName) && isset($LoginPassword)) {
            $sql = "SELECT name, password , role , id
                    FROM users
                    WHERE name = '{$LoginName}' AND password = '{$LoginPassword}';";

            $data = selectFromDb($sql);
        

            if(empty($data)) {
                $_SESSION['message'] = 'Wrong password or username';
                redirectTo('../ExtraPages/loginPage.php');
            } else {
                $userData = $data[0];
                $_SESSION['loggedUser']     = $userData['name'];
                $_SESSION['loggedUserRole'] = $userData['role'];
                $_SESSION['loggedUserId']   = $userData['id'];
                redirectTo('../index.php');
            }

        }   else {
            header("Location:../ExtraPages/loginPage.php");
            exit();
        }

    } else {
        redirectTo('../ExtraPages/loginPage.php');
        exit();
    }

?>