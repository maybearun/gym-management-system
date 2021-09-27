<?php
require "../includes/functions.php";
include 'includes/header.php';
include 'includes/navbar.php';
$table = 'membership_plans';
$check = fetchData('*', $table);

if (isset($_POST['planName'])) {
    $_SESSION['planId']=$_POST['planId'];
    $_SESSION['planName'] = $_POST['planName'];
    $_SESSION['planDescription'] = $_POST['planDescription'];
    $_SESSION['planPrice'] = $_POST['planPrice'];
    $_SESSION['planValidity'] = $_POST['planValidity'];
    echo '<script>window.location="/code/member/checkout.php"</script>';

}

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
                                    <td><button class="buyBtn btn btn-primary btn-sm" onclick="getData('<?= $row['plan_id'] ?>','<?= $row['plan_name'] ?>','<?= $row['plan_description'] ?>',<?= $row['plan_price'] ?>,<?= $row['plan_validity'] ?>)">Buy</button></td>
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

<script>
    $().ready(function() {
        $('#viewPlans').DataTable();
    });

    function getData(planId,planName, planDescription, planPrice, planValidity) {
        var data = {
            planId:planId,
            planName: planName,
            planDescription: planDescription,
            planPrice: planPrice,
            planValidity: planValidity,
        }
        $.post("<?= $_SERVER['PHP_SELF']?>",data);
    }
</script>
<?php
include 'includes/footer.php';
?>