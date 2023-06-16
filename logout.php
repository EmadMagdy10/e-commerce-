<?php

require_once 'connect-db.php';
session_start();
session_unset();
if (!empty($_COOKIE['name'])) setcookie('name', null, time());
if (!empty($_COOKIE['email'])) setcookie('email', null, time());
if (!empty($_COOKIE['role'])) setcookie('role', null, time());
redirect_page('login-ui.php');