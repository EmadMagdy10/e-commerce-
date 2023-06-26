<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/bootstrap.css">
  <script src="./javascript/bootstrap.bundle.js"></script>
  <link rel="stylesheet" href="./css/css.css">
  <link rel="stylesheet" href="./css/all.min.css">
  <link rel="stylesheet" href="./css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
  .img{
    background-image: url(./assets/back-login.jpg);
  }
  .background{
    background-color: aliceblue;
    opacity: .9;
  }
</style>
</html>
<body class="container img">
  <div class="row d-flex justify-content-center align-items-center vh-100 ">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5 ">
      <div class="card shadow-2-strong background my-card" style="border-radius: 1rem;">
        <form name="form" action="login.php" method="post" class="my-form">
          <?php if (!empty($_GET['status'])): ?>
            <?php $status = $_GET['status']; ?>
            <?php if ($status == 'empty'): ?>
              <div id="alertDiv" class="alert alert-danger" role="alert">
                <strong>Email - Mobile & Password Is required</strong>
              </div>
            <?php elseif ($status == 'notfound'): ?>
              <div id="alertDiv" class="alert alert-danger" role="alert">
                <strong>user not found</strong>
              </div>
            <?php elseif ($status == 'notadmin'): ?>
              <div id="alertDiv" class="alert alert-danger" role="alert">
                <strong>for admin only</strong>
              </div>
            <?php elseif ($status == 'notpassword'): ?>
              <div id="alertDiv" class="alert alert-danger" role="alert">
                <strong>Password not correct</strong>
              </div>
            <?php endif; ?>
          <?php endif; ?>
          <div class="card-body p-5 text-center">
            <h3 class="mb-5">Log in</h3>
            <div class="form-outline d-flex justify-content-start align-items-center m-1">
              <i class="fa fa-envelope fs-5 me-1"></i>
              <input type="email" id="typeEmailX-2" class="form-control form-control-lg my-input" name="email" />
            </div>
            <label class="form-label" for="typeEmailX-2">Email</label>
            <div class="form-outline d-flex justify-content-start align-items-center m-1">
              <i class="fa fa-lock fs-5 me-1"></i>
              <input type="password" id="typePasswordX-2" class="form-control form-control-lg my-input" name="password" />
            </div>
            <label class="form-label" for="typePasswordX-2">Password</label>
            <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="1" id="form1Example3" name="remember_me" />
              <label class="form-check-label ms-1" for="form1Example3"> Remember password </label>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            <button class="btn btn-primary btn-lg btn-block" type="submit" onclick="form.action='signup-ui.php';">sign-up</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
