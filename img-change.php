<?php
include_once 'connect-db.php';
$connect = db_connect();
$arr=[];

if (!empty($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $sql =$connect->query("SELECT * FROM product_images WHERE product_id = $product_id");

    if($sql->rowCount() > 0) {
        while($row =$sql->fetch()) {
            array_push($arr , $row['url']);
            $url = $row['url'];
            echo "<pre>";
            var_dump( $url);
            echo "</pre>";
            // redirect_page("index.php?url=uploades/64959f32e9aff_offer-banner.png");
        }
     
}}

