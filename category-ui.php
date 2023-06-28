<?php
include_once 'nav.php';
include_once 'connect-db.php';
$connect = db_connect();
$get_main_categories_result = $connect->query("select * from categories where category_id is null");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Category</title>
</head>

<body>
  <div class="container-fluid">
    <h1 class="m-5"><?= $lang['Categories'] ?></h1>
    <div class="container">
      <h4 class="mb-5">if product is sub-categories .. please select main category</h4>

      <form class="row g-3" action="category.php" method="post">
        <?php if (!empty($_GET['status']) && $_GET['status'] == 'empty') { ?>
          <div id="alertDiv" class="alert alert-danger" role="alert">
            <strong>complete requires</strong>
          </div>
        <?php } ?>
        <?php if (!empty($_GET['status']) && $_GET['status'] == 'addsubcat') { ?>
          <div id="alertDiv" class="alert alert-success" role="alert">
            <strong>add sub-category</strong>
          </div>
        <?php } ?>
        <?php if (!empty($_GET['status']) && $_GET['status'] == 'addcat') { ?>
          <div id="alertDiv" class="alert alert-success" role="alert">
            <strong>add new category...</strong>
          </div>
        <?php } ?>
        <div class="col-md-6">
          <label for="product-name" class="form-label">Category name</label>
          <input type="text" class="form-control" id="product-name" name="Cname">
        </div>
        <div class="col-md-4">
          <label for="category" class="form-label">category</label>
          <select id="category" class="form-select" name="category_id">
            <option selected value=" ">Select one</option>
            <?php while ($main_category = $get_main_categories_result->fetch()) {
              $main_category_name = $main_category['name'];
              $main_category_id = $main_category['id'];
              echo "<option value='$main_category_id'>$main_category_name</option>";
            } ?>
          </select>
        </div>
        <div class="col-12 ">
          <button type="submit" class="btn btn-primary ">add category</button>
        </div>
      </form>
    </div>
  </div>

</body>

</html>