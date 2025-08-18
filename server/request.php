<?php
session_start();
include('../common/db.php');

if (isset($_POST['signup'])) {
    print_r($_POST);
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $address = $_POST['address'];

    $user = $conn->prepare("insert into users
    (id,username,email,password)
    values(NULL,'$username','$email','$password');");

    $result = $user->execute();
    echo $user->insert_id;
    if ($result) {
        echo "new user registred";
        $_SESSION["user"] = ["username" => $username, "email" => $email,"password" => $password , "user_id" => $user->insert_id];
        header("location: /toolHub");
    } else {
        echo "error";
    }
} else if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = '';
    $user_id = '';
    print_r($_POST);
    $query = " select * from users where email = '$email' and password = '$password' ";
    $result = $conn->query($query);

    // echo $result->num_rows;
    if ($result->num_rows == 1) {
        foreach ($result as $row) {
            // print_r($row);
            $username = $row['username'];
            ?> <p>name: <?php echo $username ?> </p> <?php

            $user_id = $row['id'];
            echo $user_id;

        }
       $_SESSION["user"] = ["username" => $username, "email" => $email,"password" => $password , "user_id" => $user_id];
      
        header("location: /toolHub");
    } else {
        echo "new user not registered";
    }
} else if (isset($_GET['logout'])) {
    session_unset();
    header("location: /toolHub");
}else if (isset($_POST['addtool'])) {
    // print_r($_POST);
    $toll_name = $_POST['tool_name'];
    $icon_class_name = $_POST['icon_class_name'];
    $icon_color = $_POST['icon_color'];
    $bg_icon_color = $_POST['bg_icon_color'];
    $tool_category = $_POST['tool_category'];
    $tool_description = $_POST['tool_description'];
    $tool_link = $_POST['tool_link'];

    $user = $conn->prepare("insert into tools
    (id,toll_name,icon_class_name,icon_color,bg_icon_color,tool_category,tool_description,tool_link)
    values(NULL,'$toll_name','$icon_class_name','$icon_color','$bg_icon_color','$tool_category','$tool_description','$tool_link');");

    $result = $user->execute();
    echo $user->insert_id;
    if ($result) {
        echo "new tool $toll_name added";
        // $_SESSION["user"] = ["username" => $username, "email" => $email,"password" => $password , "user_id" => $user->insert_id];
        // header("location: /toolHub");
        header("Location: /toolHub/?admin=true&page=addtool");
    } else {
        echo "error";
    }

    
}
?>