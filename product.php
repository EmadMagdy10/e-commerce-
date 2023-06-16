<?php
include_once'connect-db.php';
if(!empty($_POST['name'])&&!empty($_POST['price'])&&!empty($_POST['unit'])&&!empty($_POST['category'])&&!empty($_POST['description'])){
    $connect=db_connect();
    $productName=$_POST['name'];
    $productPrice=$_POST['price'];
    $productUnit=$_POST['unit'];
    $productDescription=$_POST['description'];
    $cate_id=$_POST['category'];
    // $img=$_FILES['image'];


    $query_insert = "insert into products (name , price , unit_price , comment ,category_id)
    VALUES ('$productName', '$productPrice', '$productUnit', '$productDescription' ,'$cate_id')";
    $result = mysqli_query($connect, $query_insert);
    
    // $product_id = mysqli_insert_id($connect);
    // if (!empty($_FILES['images'])) {
    //     $i = 1;
    //     foreach ($_FILES['images']['name'] as $key => $name) {
    //         $file_name = "assets/" . date('Ymdhis') . '_' . $i++ . "_" . $name;
    //         move_uploaded_file($_FILES['images']['tmp_name'][$key], $file_name);
    //         $product_image_qry = "insert into product_images(product_id, url) VALUES ('$product_id','$file_name')";
    //         $product_image_qry_result = mysqli_query($connect, $product_image_qry);
    //     }
    // }
    redirect_page('products-ui.php?status=done');

}else{
    redirect_page('products-ui.php?status=empty');
}
