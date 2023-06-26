<?php
include_once 'connect-db.php';
if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    if ($_POST['password'] == $_POST['re_password']) {
        $connect = db_connect();
        $filtered_email = htmlspecialchars(trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)));
        if ($valid_email = filter_var($filtered_email, FILTER_VALIDATE_EMAIL)) {
            $name = $_POST['name'];
            $email = $valid_email;
            $password = htmlspecialchars($_POST['password']);           
            $query_insert = $connect->query("INSERT INTO users (name, email, password)
             VALUES ('$name', '$email', md5('$password'))");
            user_found();
        } else {
            redirect_page('index.php?status=invalidEmail');
        }
    } else {
        redirect_page('signup-ui.php?status=invalidPass');
    }
} else {
    redirect_page('signup-ui.php?status=empty');
}


$connect->close();
