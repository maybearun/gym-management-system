<?php
require "../includes/functions.php";
include "includes/header.php";
include "includes/navbar.php";

$check = fetchData('*', 'products');

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
              <?php foreach($check as $row){ ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  <?=$row['product_type']?>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><?=$row['product_name']?></b></h2>
                      <p class="text-muted text-sm"><b>Description: </b> <?=$row['product_description']?> </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                      <?php $discount= $row['product_price']*($row['discount']/100);
                            $newPrice= $row['product_price']-$discount;?>
                        <li class="small"> <b>Price: Rs.</b> <del><?=$row['product_price']?></del><b> <?=$newPrice?></b></li>
                        <li class="small"> <b>Discount: <?=$row['discount']?> %</b></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="<?= $row['product_image']?>" alt="product_image" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm btn-primary"> Buy</a>
                  </div>
                </div>
              </div>
            </div>
            <?php }?>
          </div>
        </div>
        <!-- /.card-body -->
        
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
include 'includes/footer.php';
?>