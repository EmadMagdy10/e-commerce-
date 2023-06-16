<?php
include_once './nav.php';
include_once 'connect-db.php';
$connect = db_connect();
$name = mysqli_query($connect, "SELECT * FROM products");

?>

<h1 class="m-5"><?=$lang['Products']?></h1>
<h1 class="m-5"><?=$lang['Welcome']?> <?= $_SESSION['user']['name'] ?></h1>

<?php if (!empty($_GET['status']) && $_GET['status'] == 'empty') { ?>
    <div class="alert alert-danger" role="alert">
        <strong>search empty</strong>
    </div>
<?php } ?>
<?php if (!empty($_GET['status']) && $_GET['status'] == 'done') { ?>
    <div class="alert alert-success" role="alert">
        <strong>done...</strong>
    </div>
<?php } ?>
<?php if (!empty($_GET['status']) && $_GET['status'] == 'delete') { ?>
    <div class="alert alert-success" role="alert">
        <strong>delete product</strong>
    </div>
<?php } ?>

<form class="d-flex" action="search.php" method="post">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
    <input class="btn btn-outline-success" type="submit" name="search"></input>

</form>
<div class="container">

    <?php while ($products = mysqli_fetch_assoc($name)) {
    ?>
        <div class="m-2">
            <div class="row">

                <div class="col-md-4 mb-2">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="card-title text-primary"><?= $products['name'] ?></h3>
                                    <h5 class="card-title text-primary">price: <?= $products['price'] ?></h5>
                                    <h6 class="card-title "><?= $products['comment'] ?></h6>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <a href="categories_ui.php?edit_cat_id=<?= $products['id'] ?>">
                                        <i class="fa fa-plus fs-3" style="color: #a81a1a;font-size: 18px;"></i>
                                    </a>
                                    <a href="delete.php?del_cat_id=<?= $products['id'] ?>">
                                        <i class="fa fa-trash fs-3 fa-shake me-3" style="color:  #a81a1a;font-size: 18px"></i>
                                    </a>
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary">buy</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>