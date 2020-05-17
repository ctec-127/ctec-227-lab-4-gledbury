<?php
// home.php
$pageTitle = 'Home';
require 'includes/header.inc.php';
?>

 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-nav">    
<a class="text-white bg-dark" href="register.php" id="register" title="click to register">Register</a>
<a class="text-white bg-dark" href="login.php" id="login" title="click to login">Login</a>
</div>
</nav>
<div class="container-home">
    <p class="welcome">Welcome to the Image Gallery!</p>
    <p class="directions">Register or login to upload your images and display them in a gallery.</p>
    <!-- <p class="access">Please register or login to access the site.</p> -->
    <!-- <img class="img-responsive center-block" src="images/image1.jpg" alt="image"> -->
    
</div>


<!-- <h1>Welcome to the image gallery site. <?= isset($_SESSION['first_name']) ? $_SESSION['first_name'] : '<p>Please register if you are a new user or login to access your images.</p>' ?></h1>
<div id="message"></div> -->

<script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script defer src="js/script.js"></script>

<?php require 'includes/footer.inc.php' ?>