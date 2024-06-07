<?php

require('../functions/databaseFunctions.php');
require('../functions/genericFunctions.php');

startSession();

if (isset($_SESSION['loggedUser']) && isset($_SESSION['loggedUserRole'])) { 
    
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create New Blog</title>
        <link rel="stylesheet" href="../css/createNewBlog.css">
    </head>
    <body>
        <h1>Create a New Blog Post</h1>
        <form id="createNewBlog" action="../Servers/createBlogServer.php" method="POST" enctype="multipart/form-data">
                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title" required>

                <label for="category">Choose a category :</label>
                <select type="text" id="category" name="category">
                    <option value="News">News</option>
                    <option value="Food">Food</option>
                    <option value="Fashion">Fashion</option>
                </select>
            <br><br>
            
            <label for="content">Content:</label><br>
            <textarea id="content" name="content" rows="4" cols="50" required></textarea><br><br>
            
            <label for="image" class="imageSubmit">Upload Image</label><br>
            <input type="file" id="image" name="image"><br><br>
            
            <input class="submit-btn" type="submit" value="Publication">
        </form>
        
    </body>
    </html>
<?php
} else {
    setError('Sign in to create a new blog');
    redirectTo('./errorPage.php');
}

?>