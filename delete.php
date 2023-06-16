<?php 
include_once './nav.php';
include_once 'connect-db.php';
//delete product
if (!empty($_GET['del_cat_id'])) {
    $connect = db_connect();
    if (mysqli_query($connect, "delete from products where id = " . $_GET['del_cat_id'])) {
        redirect_page('index.php?status=delete');
    } else {
        echo "Error in delete";
    }
    mysqli_close($connect);
    //update product
}elseif(!empty($_POST['edit_cat_id'])){
    $connect = db_connect();
    if (mysqli_query($connect, " update from products where id = " . $_POST['edit_cat_id'])) {
        redirect_page('category-ui.php?status=done');
    } else {
        redirect_page('login.php');

        echo "Error in update";
    }
}
?>