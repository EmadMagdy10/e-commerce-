<?php
include_once 'nav.php';
include_once 'connect-db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <h1 class="m-5">let's become a new vendor</h1>
        <div class="container">
            <h4 class="m-5">after complete all requirment can view your products in site</h4>
            <form class="row g-3" action="vendor.php" method="post">
                <div class="col-md-6">
                    <label for="company_name" class="form-label">Company Name</label>
                    <input required type="text" class="form-control" id="company_name" name="company_name" value="">
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">phone</label>
                    <input required type="number" class="form-control" id="phone" name="phone">
                </div>
                <div class="col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input required type="text" class="form-control" id="address" name="address">
                </div>
                <div class="col-md-4">
                    <label for="country" class="form-label">Country</label>
                    <select required id="country" class="form-select" name="country">
                        <option selected value="">select one</option>
                        <option >Egypt</option>
                        <option >Austria</option>
                        <option >Belize</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-5">Submit</button>
            </form>
            </form>
        </div>
    </div>

</body>

</html>