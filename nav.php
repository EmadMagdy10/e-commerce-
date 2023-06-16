<?php
session_start();
include_once 'connect-db.php';


  if (empty($_SESSION['user'])) {
    if (!empty($_COOKIE['name']) && !empty($_COOKIE['email']) && !empty($_COOKIE['role'])) {
        $_SESSION['user']['name'] = $_COOKIE['name'];
        $_SESSION['user']['email'] = $_COOKIE['email'];
        $_SESSION['user']['role'] = $_COOKIE['role'];
    }
    else {
        redirect_page('login-ui.php');
    }
  }

if (!empty($_COOKIE['lang']) && $_COOKIE['lang'] == 'ar') {
  require_once 'lag-ar.php';
} else {
  require_once 'lag-eg.php';
}
?>
<!DOCTYPE html>
<html lang="<?= $lang['lang'] ?>" dir="<?= $lang['dir'] ?>" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Store</title> -->
    <?php if ($lang['lang'] == 'ar') { ?>
        <link href="css/bootstrap.rtl.css" rel="stylesheet">
    <?php } else { ?>
        <link href="./css/bootstrap.css" rel="stylesheet">
    <?php } ?>
    <script src="./javascript/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="./css/css.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">E-commerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php"><?= $lang['Home'] ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="products-ui.php"><?=$lang['Products']?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="category-ui.php"><?= $lang['Categories'] ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php"><?= $lang['Logout'] ?></a>
        </li>
        <li class="nav-item bg-secondary">
        <a href="change-lag.php?lang=<?= $lang['lang_change_key'] ?>" class="btn  fw-bold"><?= $lang['lang_btn'] ?></a>
        </li>
       
      </ul>
    </div>
  </div>
</nav>
</body>
</html>