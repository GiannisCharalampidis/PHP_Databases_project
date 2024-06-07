<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/IndexPage.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css">
</head>
<body>

        <nav class="mainMenu">
                <div class="CenterMenu">
                        <form method="POST">
                                <button name="menu" value="AllCategories">All Categories</button>
                                <button name="menu" value="News">News</button>
                                <button name="menu" value="Food">Food</button>
                                <button name="menu" value="Fashion">Fashion</button>
                        </form>
                </div>


                <?php
                        if(isset($_SESSION['loggedUser']) && (($_SESSION['loggedUserRole']) === 'admin' ) ) { 
                        echo '
                                <div class="Login">
                                <div class="WelmcomeUser">
                                        <h2>Welcome, ' . $_SESSION['loggedUser'] . '</h2>
                                </div>

                                        <div class="dropdown">
                                                <button id="ProfileButton" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-person-fill"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="./ExtraPages/createNewBlog.php">New Blog</a></li>
                                                <li><a class="dropdown-item" href="./ExtraPages/myBlogs.php">Edit/Delete Blog</a></li>
                                                <li><a class="dropdown-item" href="./ExtraPages/myComments.php">My Comments</a></li>
                                                </ul>
                                        </div>
                                        &nbsp
                                        &nbsp
                                        &nbsp
                                        <form action="./Servers/logoutServer.php" method="POST">
                                                <button id="SignOutAdmin">Sign Out</button>
                                        </form>
                                        &nbsp
                                        <form action="./ExtraPages/createNewAdmin.php" method="POST" style="display: inline;">
                                                <button>New User</button>
                                        </form>
                                </div>';
                        } elseif (isset($_SESSION['loggedUser']) && (($_SESSION['loggedUserRole']) === 'user' )) {
                        echo '  

                                
                                <div class="Login">
                                        <div class="WelmcomeUser">
                                                <h2>Welcome, ' . $_SESSION['loggedUser'] . '</h2>
                                        </div>

                                        <div class="dropdown">
                                                <button id="ProfileButton" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-person-fill"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="./ExtraPages/createNewBlog.php">New Blog</a></li>
                                                <li><a class="dropdown-item" href="./ExtraPages/myBlogs.php">Edit/Delete Blog</a></li>
                                                <li><a class="dropdown-item" href="./ExtraPages/myComments.php">My Comments</a></li>
                                                </ul>
                                        </div>
                                        &nbsp
                                        &nbsp
                                        &nbsp
                                        <form action="./Servers/logoutServer.php" method="POST">
                                                <button id="SignOutUser">Sign Out</button>
                                        </form>
                                </div>';

                        }
                         else {
                        echo '
                                <div class="Login"> 
                                        <form action="./ExtraPages/loginPage.php" method="POST">    
                                                <button id="SignIn">Sign In</button>
                                        </form>
                                        &nbsp
                                        <form action="./ExtraPages/createNewAdmin.php" method="POST">
                                                <button id="SignUp">Sign Up</button>
                                        </form>
                                </div> ';
                        }
                ?>
        </nav>

        <div class="blogs-displayed">
                <?php 
                        $data = require('Servers/displayImagesServer.php');
                        $imagesArray = $data['images'];
                        $titlesArray = $data['titles'];

                        $totalImages = count($imagesArray);
                        $totalPages = ceil($totalImages/6);
                        
                        foreach ($imagesArray as $id => $image) {
                                $imagePath = str_replace('../', '', $image);
                                echo '<div class="blog" style="display: none;">';
                                echo '<a href="ExtraPages/blogToShow.php?id=' . $id . '">';
                                echo '<img  class="blog-image" src="' . $imagePath . '" alt="Blog Image ' . $id . '">';
                                echo '<h2 class="blog-title">' . $titlesArray[$id] . '</h2>';
                                echo '</a>';
                                echo '</div>';
                            }
                            echo '<br>','<br>','<br>','<br>','<br>','<br>';
                            ?>
        </div>

                            <div class="pagination">
                                <?php
                        for ($page = 1; $page <= $totalPages; $page++) {
                                echo '<button onclick="goToPage(' . $page . ')">' . $page . '</button> &nbsp&nbsp&nbsp&nbsp';
                            }
                        ?>
                            </div>
    
</body>

<script>
var currentPage = parseInt(new URLSearchParams(window.location.search).get('page')) || 1;
var blogsPerPage = 6;
var blogs = document.getElementsByClassName('blog');

function showBlogs() {
    for (var i = 0; i < blogs.length; i++) {
        if (i >= (currentPage - 1) * blogsPerPage && i < currentPage * blogsPerPage) {
            blogs[i].style.display = 'block';
        } else {
            blogs[i].style.display = 'none';
        }
    }
}
showBlogs();

function goToPage(page) {
    currentPage = page;
    showBlogs();
}      
</script>
</html>