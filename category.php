<?php
include_once 'connect-db.php';
$connect = db_connect();
$category_name = $_POST['Cname'];
$category_id = $_POST['category_id'] ? $_POST['category_id'] : 'null';

if (!empty($category_name)) {
    $sql = $connect->query("INSERT INTO `categories`(`name`,`category_id`) VALUES ('$category_name',$category_id)");
    redirect_page('category-ui.php?status=addsubcat');
} else {
    redirect_page('category-ui.php?status=empty');
}
