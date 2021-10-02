<?php
require "../includes/functions.php";
include "includes/header.php";
include "includes/navbar.php";

$check = fetchData('*', 'payments');

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Payments</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">

            <div class="card-body p-0">
                <table id="viewPayment" class="table table-striped projects">
                    <thead>
                        <tr>
                            <td><b>Name</b></td>
                            <td><b>Amount</b></td>
                            <td><b>Contact</b></td>
                            <td><b>Payment Id</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($check as $row) { ?>
                            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                                <tr>
                                    <td id="paymentName<?= $row['id'] ?>"><?= $row['name'] ?></td>
                                    <td id="paymentAmt<?= $row['id'] ?>"><?= $row['amount'] ?></td>
                                    <td id="paymentContact<?= $row['id'] ?>"><?= $row['contact'] ?></td>
                                    <td id="paymentId<?= $row['id'] ?>"><?= $row['payment_id'] ?></td>
                                </tr>
                            </form>

                        <?php } ?>
                    </tbody>
                </table>
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