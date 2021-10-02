<?php


require "../includes/functions.php";
include 'includes/header.php';
include 'includes/navbar.php';
$table = 'membership_plans';
$check = fetchData('*', $table);

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Subscription Plans</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
                
            <div class="card-body p-0">
                <table id="viewPlans" class="table table-striped projects">
                    <thead>
                        <tr>
                            <td><b>Plan Name</b></td>
                            <td><b>Plan Description</b></td>
                            <td><b>Plan Price</b></td>
                            <td><b>Plan Validity</b></td>
                        </tr>

                    </thead>
                    <tbody>
                    <?php foreach ($check as $row) { ?>
                            <form action="checkout.php">
                                <tr>
                                    <td id="planName<?= $row['plan_id'] ?>"><?= $row['plan_name'] ?></td>
                                    <td id="planDescription<?= $row['plan_id'] ?>"><?= $row['plan_description'] ?></td>
                                    <td id="planPrice<?= $row['plan_id'] ?>"><?= $row['plan_price'] ?></td>
                                    <td id="planValidity<?= $row['plan_id'] ?>"><?= $row['plan_validity'] ?> days</td>
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
</div>
<script>
    $().ready(function() {
        $('#viewPlans').DataTable();
    });
</script>
<?php
include 'includes/footer.php';
?>