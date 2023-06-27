<?php
include_once 'connect-db.php';
$connect = db_connect();
if (!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['unit']) && !empty($_POST['category']) && !empty($_POST['description'])) {
  $productName = $_POST['name'];
  $productPrice = $_POST['price'];
  $productUnit = $_POST['unit'];
  $productDescription = $_POST['description'];
  $cate_id = $_POST['category'];

  $query_insert = $connect->prepare("INSERT INTO products (name, price, unit_price, comment, category_id) VALUES (:name, :price, :unit_price, :comment, :category_id)");
  $query_insert->execute(array(
    'name' => $productName,
    'price' => $productPrice,
    'unit_price' => $productUnit,
    'comment' => $productDescription,
    'category_id' => $cate_id
  ));

  $sql = "SELECT id FROM products WHERE name = :name AND category_id = :category_id";
  $result = $connect->prepare($sql);
  $result->execute(array('name' => $productName, 'category_id' => $cate_id));
  $product = $result->fetch(PDO::FETCH_ASSOC);

  if ($product) {
    $product_id = $product['id'];
    if (isset($_FILES["images"]["name"][0])) {
      $insert_img = $connect->prepare("INSERT INTO product_images (url, product_id) VALUES (:url, :product_id)");
      for ($i = 0; $i < count($_FILES["images"]["name"]); $i++) {
        $fileName = uniqid() . "_" . $_FILES["images"]["name"][$i];
        $fileTmp = $_FILES["images"]["tmp_name"][$i];
        $destination = "uploades/" . $fileName;
        move_uploaded_file($fileTmp, $destination);
        // Modify the SQL query to insert the image URL and product ID
        $insert_img->execute(array(
          'url' => $destination,
          'product_id' => $product_id
        ));
      }
      redirect_page('products-ui.php?status=done');
    } else {
      redirect_page('products-ui.php?status=error');
    }
  }
  $connect = null;
}
