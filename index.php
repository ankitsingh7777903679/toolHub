<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include('./client/bootstrap.php');
    ?>

</head>

<body>
    <?php
    // IMPORTANT: This is not a secure way to check for an admin.
    // You should use a role-based system instead of hardcoding an email.
    if (isset($_SESSION['user']['email']) && $_SESSION['user']['email'] == "ankitsingh77779036@gmail.com" && isset($_SESSION['user']['password']) && $_SESSION['user']['password'] == "ankit@1234") {
        // If the user is an admin, only show the admin panel without th        
        include('./admin/admin.php');

    } else {
        // Otherwise, show the normal website for guests and regular users.
        include('./client/navbar.php');

        if (isset($_GET['pdf'])) {
            include('./client/pdf.php');
        } elseif (isset($_GET['home'])) {
            include('./client/home.php');
        } elseif (isset($_GET['write'])) {
            include('./client/write/index.php');
        } else {
            include('./client/home.php'); // Changed from './client/home.php#dropdown'
        }

        include './client/footer.php';
    }

   
        // Otherwise, show the normal website for guests and regular users.
       //  include('./client/navbar.php');

        // if (isset($_GET['pdf'])) {
        //     include('./client/pdf.php');
        // } elseif (isset($_GET['home'])) {
        //     include('./client/home.php');
        // }elseif (isset($_GET['admin'])) {
        //     include('./admin/admin.php');
        // } else {
        //     include('./client/home.php'); // Default to home page
        // }

        // include './client/footer.php';
    
    ?>

</body>

</html>