<?php
const HOSTNAME = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'store';

function db_connect()
{
    return mysqli_connect(HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
}
function redirect_page($url)
{
    header('location:' . $url);
    exit();
}

function user_found()
{
    $connect = db_connect();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT `name`,`email`,`role` FROM users WHERE email = '$email' and password = md5('$password')";
    $result = mysqli_query($connect, $sql);

    if ($user = mysqli_fetch_assoc($result)) {
        if ($user['role'] == 'admin') {
            if (!empty($_POST['remember_me'])) {
                setcookie('name', $user['name'], time() + 60 * 60 + 24 * 30);
                setcookie('email', $user['email'], time() + 60 * 60 + 24 * 30);
                setcookie('role', $user['role'], time() + 60 * 60 + 24 * 30);
            }
            session_start();
            $_SESSION['user'] = $user;
            redirect_page('products-ui.php');
        } else {
            redirect_page('login-ui.php?status=notadmin');
        }
    } else {
        redirect_page('login-ui.php?status=notfound');
    }
}
