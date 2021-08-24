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
        body{
            margin: 10px;
        }
    </style>
    <center><h2>Product Registration</h2></center><br>
    <form method="" action="#">

        <!-- product name and description -->
        <div class="form-group col-md-6">
            <label for="inputProductName4">Product name</label>
            <input type="text" class="form-control" id="inputProductName4" placeholder="Product name">
          </div>
          <div class="form-group col-md-6">
            <label for="inputProductType4">Product Type</label>
            <input type="text" class="form-control" id="inputProductType4" placeholder="Product type">
          </div>
          <div class="form-group col-md-8">
            <label for="inputProductDesc4">Product description</label>
            <textarea class="form-control" id="inputProductDesc4" rows="2"></textarea>
          </div><br>
          
          <!-- add product pic -->
          <div class="form-group">
            <Label for="uploadProductPic">Upload Prdouct Picture</Label><br>
            <input type="file" class="form-control-file" id="uploadProductPic">
          </div><br>
          
        <!-- price,discount and quantity -->
        
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputPrice">Price</label>
            <input type="text" class="form-control" id="inputPrice">
          </div>
          
          <div class="form-group col-md-4">
            <label for="inputDiscount">Discount</label>
            <input type="text" class="form-control" id="inputDiscount">
          </div>
        </div>
          <div class="form-group col-md-4">
            <label for="inputQuantity">Quantity</label>
            <input type="text" class="form-control" id="inputQuantity">
          </div>
        </div><br>
          <!-- submit button -->
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
    </form>
    

</body>
</html>
