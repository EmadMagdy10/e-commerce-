<?php
include_once 'connect-db.php';

if (!empty($_POST['company_name']) && !empty($_POST['phone']) && !empty($_POST['country']) && !empty($_POST['address'])) {
    $connect = db_connect();
    $company_name = $_POST['company_name'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $get_user_id = $connect->query("SELECT id , role FROM users");
    $resurlt = $get_user_id->fetch();
    $user_id = $resurlt['id'];
    $sql_insert = $connect->prepare("INSERT INTO adimn (company_name, user_id,address_company, phone, country) 
    VALUES (:company_name, :user_id, :address, :phone, :country)");
    $sql_insert->bindParam(':company_name', $company_name);
    $sql_insert->bindParam(':user_id', $user_id);
    $sql_insert->bindParam(':address', $address);
    $sql_insert->bindParam(':phone', $phone);
    $sql_insert->bindParam(':country', $country);
    $sql_insert->execute();
    $sql_updata_user = $connect->query("UPDATE `users` SET `role`='admin' WHERE id = $user_id");
    redirect_page("index.php");
} else {
    echo "not done";
}
$conn = null;
