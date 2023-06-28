<?php
include_once './nav.php';
include_once 'connect-db.php';

$connect = db_connect();
$get_main_categories_result = $connect->query( "select * from categories where category_id is null");
$product_name = '';
if (!empty($_GET['edit'])) {
    $product_id = $_GET['edit'];
    $product =$connect->query("SELECT * FROM products WHERE id = $product_id");
    $result = $stmt->fetch();
    if ($result) {
        $product_name = $result['name'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
</head>

<body>
  <h1 class="m-5"><?= $lang['Products'] ?></h1>
  <div class="container">
    <form class="row g-3" action="product.php" method="post" enctype="multipart/form-data">

      <?php if (!empty($_GET['status']) && $_GET['status'] == 'empty') { ?>
        <div id="alertDiv" class="alert alert-danger" role="alert">
          <strong><?= $lang['Complete all requires'] ?></strong>
        </div>
      <?php } ?>
      <?php if (!empty($_GET['status']) && $_GET['status'] == 'okay') { ?>
        <div  class="alert alert-danger" role="alert">
          <strong><?= $product_name ?></strong>
        </div>
      <?php } ?>

      <?php if (!empty($_GET['status']) && $_GET['status'] == 'done') { ?>
        <div id="alertDiv" class="alert alert-success" role="alert">
          <strong>done...</strong>
        </div>
      <?php } ?>
      <?php if (!empty($_GET['status']) && $_GET['status'] == 'error') { ?>
        <div id="alertDiv" class="alert alert-success" role="alert">
          <strong>error...</strong>
        </div>
      <?php } ?>

      <div class="col-md-6">
        <label for="product-name" class="form-label"><?= $lang['Product-name'] ?></label>
        <input type="text" class="form-control" id="product-name" name="name" value="">
      </div>
      <div class="col-md-6">
        <label for="product-price" class="form-label"><?= $lang['Price'] ?></label>
        <input type="text" class="form-control" id="product-price" name="price">
      </div>
      <div class="col-md-4">
        <label class="form-label">Images</label>
        <input name="images[]" value="count" accept="image/*" multiple class="form-control" type="file">
      </div>
      <div class="col-md-4">
        <label for="unit-price" class="form-label">unit-price</label>
        <select required id="unit-price" class="form-select" name="unit">
          <option selected value="">select one</option>
          <option>Kg</option>
          <option>liter</option>
          <option>piece</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="category" class="form-label">category</label>
        <select required id="category" class="form-select" name="category">
          <option selected>Select one</option>
          <?php while ($main_category = $get_main_categories_result->fetch()) {
            $main_category_name = $main_category['name'];
            $main_category_id = $main_category['id'];
            echo "<option value='$main_category_id'>$main_category_name</option>";
          } ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">description</label>
        <textarea class="form-control" id="description" name="description"></textarea>
      </div>
      <div class="col-12 ">
        <?php if (!empty($_GET['edit'])) { ?>
          <button type="submit" class="btn btn-primary">edit product</button>
        <?php } else { ?>
          <button type="submit" class="btn btn-primary">add product</button>
        <?php } ?>
      </div>
    </form>
  </div>
</body>

</html>