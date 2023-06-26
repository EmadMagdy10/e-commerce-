<?php
include_once './nav.php';
include_once 'connect-db.php';
$connect = db_connect();
$name = $connect->query("SELECT * FROM products");


?>

<h1 class="m-3"><?= $lang['Welcome'] ?> <?= $_SESSION['user']['name'] ?></h1>
<h1 class=" ms-3 mb-5"><?= $lang['Products'] ?></h1>
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
    <div id="alertDiv" class="alert alert-success" role="alert">
        <strong>delete product</strong>
    </div>
<?php } ?>

<form class="container" action="search.php" method="post">
    <div class="d-flex mb-3">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <input class="btn btn-outline-success" type="submit" name="search"></input>

    </div>

</form>
<style>
    .img {
        height: 400px;
        width: 80%;
    }
</style>
<div class="container">
    <div class="row justify-content-start">
        <?php while ($products = $name->fetch()) {
            $product_id = $products['id'];
            $img_select = $connect->query("SELECT * FROM `product_images` WHERE product_id= $product_id");
            $img = $img_select->fetch(PDO::FETCH_ASSOC);


        ?>
            <div class="col-md-4 mb-4 justify-content-center">
                <div class="arrow arrow-left"></div>
                <a href="img-change.php?product_id=<?= $products['id'] ?>">
                    <i class="fa fa-arrow-left fs-3 me-2"></i></a>
                <img class="card-img img" src="<?= $img['url'] ?>" alt="image-product">
                <a href="img-change.php"> <i class="fa fa-arrow-right fs-3 me-2"></i></a>
                <h3 class="card-title text-primary "><?= $products['name'] ?></h3>
                <h5 class="card-title text-primary">price: <?= $products['price'] ?></h5>
                <h6 class="card-title "><?= $products['comment'] ?></h6>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="products-ui.php?edit=<?= $products['id'] ?>">
                        <i class="fa fa-plus fs-3 me-2" style="color: #a81a1a;font-size: 18px;"></i>
                    </a>
                    <a href="delete.php?img_id=<?= $img['id'] ?>">

                        <i class="fa fa-trash fs-3 fa-shake me-3" style="color:  #a81a1a;font-size: 18px"></i>
                    </a>
                </div>
                <a href="cart.php" class="btn btn-primary">buy</a>
            </div>
        <?php } ?>
    </div>
</div>