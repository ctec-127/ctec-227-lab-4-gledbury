<?php

$pageTitle = "Register";
require 'includes/header.inc.php';
require_once 'includes/db_connect.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $db->real_escape_string($_POST['email']);
    $first_name = $db->real_escape_string($_POST['first_name']);
    $last_name = $db->real_escape_string($_POST['last_name']);
    $password = hash('sha512', $db->real_escape_string($_POST['password']));
    $username = $db->real_escape_string($_POST['username']);
    $folder = $_POST['username'];
    $sql = "INSERT INTO user (email,first_name,last_name,password,username) 
                    VALUES('$email','$first_name','$last_name','$password','$username')";

    // echo $sql;
    $result = $db->query($sql);

    if (!$result) {
        echo "<div>There was a problem registering your account</div>";
    } else {
        if (!is_dir($folder)) {
            mkdir($folder);
            header('location: login.php');
        }
    }
}
?>
<div class="register-container">
<h1 class="gallery-registration">Image Gallery Registration</h1>
<div class="container-register-fluid">
<form action="register.php" method="POST">
    <div class="form-group">
        <label class="register-text" for="first_name">First Name <span style="color:red;font-weight:bold">*</span></label>
        <input type="text" class="form-control-sm" id="first_name" required name="first_name" placeholder="Enter first name">
    </div> 
    <div class="form-group">
        <label class="register-text" for="last_name">Last Name<span style="color:red;font-weight:bold">*</span></label>
        <input type="text" class="form-control-sm" id="last_name" required name="last_name" placeholder="Enter last name">
    </div>
    <div class="form-group">
        <label class="register-text" for="username">Username<span style="color:red;font-weight:bold">*</span></label>
        <input type="text" class="form-control-sm" id="username" required name="username" placeholder="Enter a username">
    </div>
    <div class="form-group">
        <label class="register-text" for="email">Email<span style="color:red;font-weight:bold">*</span></label>
        <input type="email" class="form-control-sm" id="email" required name="email" placeholder="Enter your email">
    </div>
    <div class="form-group">
        <label class="register-text" for="password">Password<span style="color:red;font-weight:bold">*</span></label>
        <input type="password" class="form-control-sm" id="password" required name="password" placeholder="Create a password">
    </div>
    <p class="required"> * required field</p>
    <button type="submit" class="btn btn-dark" title="click to register & login">Register & login</button>
</form>
</div>
</div>
