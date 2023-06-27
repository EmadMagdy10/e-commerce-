<?php
include_once 'connect-db.php';
$connect = db_connect();

if (!empty($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $selectAllImages = $connect->query("SELECT `url` FROM `product_images` WHERE product_id= $product_id ");
    $imageUrls = [];

    if ($selectAllImages->rowCount() > 0) {
        while ($row = $selectAllImages->fetch()) {
            $imageUrls[] = $row['url'];
        }
    }

}
$connect = null;

