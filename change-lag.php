<?php
require_once 'connect-db.php';
if (!empty($_GET['lang'])) {
    setcookie('lang', $_GET['lang'], time() + 60 * 60 * 24 * 30);
    redirect_page($_SERVER['HTTP_REFERER']);
} else {
    redirect_page('index.php');
}
