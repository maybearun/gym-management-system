<?php
require "includes/functions.php";

$showError = false;
$showAlert = false;
$errors = [];
if (isset($_POST['submit'])) {

  $loctionDir = "/code/upload/members/";
  $uploadProfile = $_FILES['uploadProductPic'];
  $fileDestination = uploadFile($loctionDir, $uploadProfile);

  // $password = $_POST['password'];
  // $rePassword = $_POST['rePassword'];

  // if ($password != $rePassword) {
  //   $showError = true;
  // } else {
  //   $hash = password_hash($password, PASSWORD_DEFAULT);
  // }

  //table details
  $table = 'products';
  $columns = '(
    product_name,
    product_type,
    product_description,
    product_image,
    product_price,
    discount,
    product_quantity
      )';
  $values = array(
    // collect data from form

    $productName = $_POST['productName'],
    $productType = $_POST['productType'],
    $productDesc = $_POST['productDesc'],
    $fileDestination,
    $price = $_POST['price'],
    $discount = $_POST['discount'],
    $quantity = $_POST['quantity']

  );

  insertData($columns, $table, $values);

  if (isset($_SESSION['errors'])) {
    print_r($_SESSION['errors']);
    unset($_SESSION['errors']);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

  <title>Product Registration</title>
</head>

<body>
  <style>
    body {
      margin: 10px;
    }
  </style>
  <center>
    <h2>Product Registration</h2>
  </center><br>
  <?php
  if (!empty($errors)){
    echo '<div class="alert alert-danger" role="alert">'.
          print_r($errors).
          '</div>';
  }
  else{
    echo '<div class="alert alert-success" role="alert">
          Registration successfull!
          </div>';
  }
  

?>
  <form method="POST" action="#" enctype="multipart/form-data">

    <!-- product name and description -->
    <div class="form-group col-md-6">
      <label for="productName">Product name</label>
      <input type="text" class="form-control" name="productName" id="productName" placeholder="Product name">
    </div>
    <div class="form-group col-md-6">
      <label for="productType">Product Type</label>
      <input type="text" class="form-control" name="productType" id="productType" placeholder="Product type">
    </div>
    <div class="form-group col-md-8">
      <label for="productDesc">Product description</label>
      <textarea class="form-control" name="productDesc" id="productDesc" rows="2"></textarea>
    </div><br>

    <!-- add product pic -->
    <div class="form-group">
      <Label for="uploadProductPic">Upload Prdouct Picture</Label><br>
      <input type="file" class="form-control-file" name="uploadProductPic" id="uploadProductPic">
    </div><br>

    <!-- price,discount and quantity -->

    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="price">Price</label>
        <input type="number" class="form-control" name="price" id="inputPrice">
      </div>

      <div class="form-group col-md-4">
        <label for="discount">Discount</label>
        <input type="number" class="form-control" name="discount" id="inputDiscount">
      </div>
    </div>
    <div class="form-group col-md-4">
      <label for="quantity">Quantity</label>
      <input type="number" class="form-control" name="quantity" id="inputQuantity">
    </div>
    </div><br>
    <!-- submit button -->
    <div class="col-sm-10">
      <button type="submit" name="submit" id="submit" class="btn btn-primary">Register</button>
    </div>
  </form>


</body>

</html>