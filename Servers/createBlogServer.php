<?php

require('../functions/databaseFunctions.php');
require('../functions/genericFunctions.php');

startSession();

if (isRequestMethodPost()) {
    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
        $filename = $_FILES["image"]["name"];
        $filetype = $_FILES["image"]["type"];
        $filesize = $_FILES["image"]["size"];

        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (!array_key_exists($ext, array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png"))) {
            die("Error: Please select a valid file format.");
        }

        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) {
            die("Error: File size is larger than the allowed limit.");
        }

        $upload_dir = "../database/images/";

        move_uploaded_file($_FILES["image"]["tmp_name"], $upload_dir . $filename);

        $filepath = $upload_dir . $filename;

        $blogData = [
                    'title'    => addslashes($_POST['title']),
                    'category' => ($_POST['category']),
                    'content'  => addslashes($_POST['content']),
                    'image'    =>  $filepath
                    ];



        require ('../db_conn.php');

        $fields = "";
        $values = "";

        foreach($blogData as $field => $value) {
            if(!empty($value)) {
                $fields .= "$field, ";
                $values .= "'$value', ";
            }
        }
    
        $fields = rtrim($fields, ', ');
        $values = rtrim($values, ', ');
    
        $sql = "INSERT INTO blogs ({$fields}) 
                VALUES ({$values})";

        executeQuery($sql);

        $sql_id = "SELECT id FROM blogs
                   ORDER BY id DESC 
                   LIMIT 1";

        $blog_id = selectFromDbSimple($sql_id);

        $blog_id = $blog_id[0]['id'];

        $sql = "INSERT INTO users_blogs (user_id, blog_id) 
                VALUES ({$_SESSION['loggedUserId']}, ({$blog_id}))";

        executeQuery($sql);
        
    } else {
    setError("Tried to send data without 'POST' method!");
    redirectTo("../ExtraPages/errorPage.php");
}
}
?>
