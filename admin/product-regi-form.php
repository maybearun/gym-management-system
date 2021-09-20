<?php
require "../includes/functions.php";
include "includes/header.php";
include "includes/navbar.php";

if (isset($_POST['submit'])) {

  $loctionDir = "/code/upload/products/";
  $uploadProfile = $_FILES['uploadProductPic'];
  $fileDestination = uploadFile($loctionDir, $uploadProfile);
  $productName = $_POST['productName'];
  $productType = $_POST['productType'];
  $productDesc = $_POST['productDesc'];
  $fileDestination;
  $price = $_POST['price'];
  $discount = $_POST['discount'];
  $quantity = $_POST['quantity'];

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
    $productName,
    $productType,
    $productDesc,
    $fileDestination,
    $price,
    $discount,
    $quantity
  );

  insertData($columns, $table, $values);
  $check = insertData($columns, $table, $values);
  if (isset($check)) {
    echo "<div class='alert alert-success' role='alert'>
    data $check inserted successfully  </div>";
  } else {
    if (isset($_SESSION['errors'])) {
      echo "<div class='alert alert-danger' role='alert'>
    data not inserted try again" . print_r($_SESSION['errors']) . "</div>";;
      unset($_SESSION['errors']);
    }
  }
}
?>
<!-- Content Wrapper. Contains page content --> -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h2>Product Registration</h2>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
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
        </div><br>
        <!-- submit button -->
        <div class="col-sm-10">
          <button type="submit" name="submit" id="submit" class="btn btn-primary">Register</button>
        </div>
      </form>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
$(document).ready(function() {
    $('#employeeRegistration').validate({
      rules: {
        productName: 'required',
        productType: 'required',
        productDesc: 'required',
        uploadProductPic: 'required',
        price: 'required',
        discount: 'required',
        quantity: 'required',
      },
      messages: {
        productName: 'This field is required',
        productType: 'This field is required',
        productDesc:'This field is required',
      
        uploadProductPic: 'This field is required',
        price: 'This field is required',
        discount: 'This field is required',
        quantity: 'This field is required',
      },
      submitHandler: function(form) {
        
          form.submit();
      }
    });
   
  });
</script>

<?php include "includes/footer.php" ?>