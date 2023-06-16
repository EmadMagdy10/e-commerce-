<?php
include_once './nav.php';
include_once 'connect-db.php';

$connect = db_connect();
$get_main_categories_result = mysqli_query($connect, "select * from categories where category_id is null");

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
    <form class="row g-3" action="product.php" method="post">

      <?php if (!empty($_GET['status']) && $_GET['status'] == 'empty') { ?>
        <div class="alert alert-danger" role="alert">
          <strong>complete all requires</strong>
        </div>
      <?php } ?>
      <?php if (!empty($_GET['status']) && $_GET['status'] == 'done') { ?>
        <div class="alert alert-success" role="alert">
          <strong>done...</strong>
        </div>
      <?php } ?>

      <div class="col-md-6">
        <label for="product-name" class="form-label">product-name</label>
        <input type="text" class="form-control" id="product-name" name="name">
      </div>
      <div class="col-md-6">
        <label for="product-price" class="form-label">price</label>
        <input type="text" class="form-control" id="product-price" name="price">
      </div>
      <div class="col-md-4">
        <label for="formControlInput" class="form-label">Images</label>
        <input name="images[]" multiple class="form-control" type="file" id="formFile">
      </div>
      <div class="col-md-4">
        <label for="unit-price" class="form-label">unit-price</label>
        <select required id="unit-price" class="form-select" name="unit">
          <option selected>select one</option>
          <option>Kg</option>
          <option>liter</option>
          <option>piece</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="category" class="form-label">category</label>
        <select id="category" class="form-select" name="category">
          <option selected>Select one</option>
          <?php while ($main_category = mysqli_fetch_assoc($get_main_categories_result)) {
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
        <button type="submit" class="btn btn-primary ">add product</button>
      </div>
    </form>
  </div>
</body>

</html>