<?php
include_once 'connect-db.php';
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
       user_found();
    } else {
        redirect_page('login-ui.php?status=empty');
    }
