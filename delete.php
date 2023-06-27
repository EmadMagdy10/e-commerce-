<?php
include_once './nav.php';
include_once 'connect-db.php';
//delete product
if (!empty($_GET['img_id'])) {
    $connect = db_connect();
    $img_id = $_GET['img_id'];
    $sql = $connect->query("SELECT * FROM product_images WHERE id = $img_id");
    $product_id = $sql->fetch();
    $p_id = $product_id['product_id'];
    $sql_p = $connect->query("SELECT * FROM product_images WHERE product_id = $p_id");
    var_dump($sql_p);
    while ($image = $sql_p->fetch()) {
        $image_id = $image['id'];
        $connect->query("DELETE FROM `product_images` WHERE id = $image_id");
    }
    $connect->query("DELETE FROM `products` WHERE id = $p_id");

    redirect_page('index.php?status=delete');
    $connect = null;
}
