<?php 
include_once 'connect-db.php';
$connect = db_connect();
$search =$_POST["search"];


if(!empty($search)){
    $sql = $connect->query("select * from products where name like '$search'");

    if ($$sql->rowCount() > 0){
        while($main_category = mysqli_fetch_assoc($result) ){
            echo $row["name"]."  ".$row["email"]." <br>";
        }}
        redirect_page("index.php?status=done");

}else {
    redirect_page("index.php?status=empty");
}
