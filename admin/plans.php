<?php


require "../includes/functions.php";
include 'includes/header.php';
include 'includes/navbar.php';
$table = 'membership_plans';
$check = fetchData('*', $table);
// print_r($check);

// if (isset($check)) {
//     echo "<div class='alert alert-success' role='alert'>
//     data $check inserted successfully  </div>";
//   } else {
//     if (isset($_SESSION['errors'])) {
//       echo "<div class='alert alert-danger' role='alert'>
//     data not inserted try again" . print_r($_SESSION['errors']) . "</div>";;
//       unset($_SESSION['errors']);
//     }
//   }
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
                        <?php

                        echo '
                                <tr>
                                    <td>' . $check[0]['plan_name'] . '</td>
                                    <td>' . $check[0]['plan_description'] . '</td>
                                    <td>' . $check[0]['plan_price'] . '</td>
                                    <td>' . $check[0]['plan_validity'] . ' days</td>
                                </tr>
                            ';
                        ?>
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
<script>
    $().ready(function() {
        $('#viewPlans').DataTable();
    });
</script>
<?php
include 'includes/footer.php';
?>