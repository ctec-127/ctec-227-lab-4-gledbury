<?php session_start();
require_once 'includes/functions.inc.php';
require "includes/code.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag/Drop File Upload Demo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/51a20dfcb9.js" crossorigin="anonymous"></script>
</head>
    
<body>
<h2 class="intro">Image Gallery</h2>
<a href="logout.php" class="btn btn-outline-dark btn-sm active" title="click to logout">Logout</a>

<div class="container-gallery-fluid">
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-gallery-container">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">                           
                            <p>Upload Your Favorite Images</p>                           
                            <div class="dropzone-wrapper">
                                <div class="dropzone-desc">
                                    <p class="fas fa-file-image fa-2x"> Choose an image file or drag it here.</p>
                                </div>
                                <input type="file" name="file_upload" class="dropzone">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10">
                        <button class="fas fa-file-upload fa-lg" type="submit" title="click to upload image"> Upload Your Image</button>
                        <?php
                        if (!empty($message)) {
                            echo "<p id=\"alert\" class=\"alert alert-primary mt-4\">{$message}</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </form>
        <?php require "includes/code.inc.php"; ?>
        <div class="image-container">
            <div class="row">
                <div class="col-10 d-flex flex-wrap flex-row align-items-center justify-content-between">
                    <?php display_images(); ?>
                </div>
            </div>
        </div>
</div>
    <footer>Created by George Ledbury for CTEC 227 Spring 2020</footer>
    <script src="js/script.js"></script>
</body>

</html>