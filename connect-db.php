<?php
const HOSTNAME = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'store';

function db_connect()
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=store", 'root','');
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return  $conn;
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
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
    $sql = $connect->query("SELECT `name`,`email`,`role` FROM users WHERE email = '$email' and password = md5('$password')");
     if ($user = $sql->fetch()) {

        if ($user['role'] == 'admin') {
            if (!empty($_POST['remember_me'])) {
                setcookie('name', $user['name'], time() + 60 * 60 + 24 * 30);
                setcookie('email', $user['email'], time() + 60 * 60 + 24 * 30);
                setcookie('role', $user['role'], time() + 60 * 60 + 24 * 30);
            }
            session_start();
            $_SESSION['user'] = $user;
            $connect = null;
            redirect_page('index.php');
        } else {
            redirect_page('login-ui.php?status=notadmin');
        }
    } else {
        redirect_page('login-ui.php?status=notfound');
    }
}

