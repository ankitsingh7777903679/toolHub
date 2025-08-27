<?php
session_start();
include('../common/db.php');

if (isset($_POST['signup'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $address = $_POST['address'];

    $user = $conn->prepare("insert into users
    (id,username,email,password)
    values(NULL,'$username','$email','$password');");

    $result = $user->execute();

    if ($result) {

        $_SESSION["user"] = ["username" => $username, "email" => $email, "password" => $password, "user_id" => $user->insert_id];
        header("location: /toolHub");
    } else {
        echo "Error: " . $user . "<br>" . $conn->error;
    }
} else if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = '';
    $user_id = '';

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        foreach ($result as $row) {
            $username = $row['username'];
            $user_id = $row['id'];
        }
        $_SESSION["user"] = ["username" => $username, "email" => $email, "password" => $password, "user_id" => $user_id];
        header("location: /toolHub");
    } else {
        
        header("location: /toolHub");
        $_SESSION['error'] = "Invalid email or password";
    }
} else if (isset($_GET['logout'])) {
    session_unset();
    header("location: /toolHub");
} else if (isset($_POST['addtool'])) {
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

    if ($result) {
        echo "new tool $toll_name added";
        // $_SESSION["user"] = ["username" => $username, "email" => $email,"password" => $password , "user_id" => $user->insert_id];
        // header("location: /toolHub");
        header("Location: /toolHub/?admin=true&page=addtool");
    } else {
    }
} else if (isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    if ($stmt->execute()) {
        header("Location: /toolHub/?admin=true&page=users");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $stmt->close();
}
