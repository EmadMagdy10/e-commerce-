<?php
include_once './nav.php';
include_once 'connect-db.php';
//delete product
if (!empty($_GET['img_id'])) {
    $connect = db_connect();
    $img_id = $_GET['img_id'];
    $sql = "SELECT `product_id` FROM product_images WHERE id = $img_id";
    $product_id = mysqli_query($connect, $sql)->fetch_object()->product_id; 

    if (
        mysqli_query($connect, "DELETE FROM `product_images` WHERE id = $img_id") &&
        mysqli_query($connect, "DELETE FROM `products` WHERE id = $product_id")
    ) {
        redirect_page('index.php?status=delete');
    } else {
        echo "Error in delete";
    }
    mysqli_close($connect);
}


