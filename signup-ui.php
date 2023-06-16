<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
</head>
<body>
<div class="container py-5 h-100">
  <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
      <div class="card shadow-2-strong" style="border-radius: 1rem;">

        <form name="form" action="signup.php" method="post">

        <?php if (!empty($_GET['status']) && $_GET['status'] == 'empty') { ?>
                <div class="alert alert-danger" role="alert">
                    <strong>enter the empty field</strong>
                </div>
            <?php }?>

        <?php if (!empty($_GET['status']) && $_GET['status'] == 'invalidPass') { ?>
                <div class="alert alert-danger" role="alert">
                    <strong>Password not match</strong>
                </div>
            <?php }?>
        <?php if (!empty($_GET['status']) && $_GET['status'] == 'invalidEmail') { ?>
                <div class="alert alert-danger" role="alert">
                    <strong>invalid Email</strong>
                </div>
            <?php }?>
        <?php if (!empty($_GET['status']) && $_GET['status'] == 'not_found') { ?>
                <div class="alert alert-danger" role="alert">
                    <strong>not found</strong>
                </div>
            <?php }?>
        <?php if (!empty($_GET['status']) && $_GET['status'] == 'not_admin') { ?>
                <div class="alert alert-danger" role="alert">
                    <strong>not admin</strong>
                </div>
            <?php }?>

          <div class="card-body p-5 text-center">
            <h3 class="mb-5">sign-up</h3>
         
            <div class="form-outline mb-4">
              <input type="text" id='name' class="form-control form-control-lg" name="name" />
              <label class="form-label" for="name">name</label>
            </div>
            <div class="form-outline mb-4">
              <input type="email" id='email' class="form-control form-control-lg" name="email" />
              <label class="form-label" for="email">Email-Mobile</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id='pass' class="form-control form-control-lg" name="password" />
              <label class="form-label" for="pass">Password</label>
            </div>
            <div class="form-outline mb-4">
              <input type="password" id='repass' class="form-control form-control-lg" name="re_password" />
              <label class="form-label" for="repass">re-Password</label>
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="" name="remember_me"  />
              <label class="form-check-label" for=""> Remember password </label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">sign-up</button>
            <button class="btn btn-primary btn-lg btn-block" type="submit" onclick="form.action='login-ui.php';">Login</button>

          </div>
        </form>

      </div>
    </div>
  </div>
</div>
</body>
</html>
