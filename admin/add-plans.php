<?php
require "../includes/functions.php";
include 'includes/header.php';
include 'includes/navbar.php';

if (isset($_POST['submit'])) {
    $planName = $_POST['planName'];
    $planDescription = $_POST['planDescription'];
    $planPrice = $_POST['planPrice'];
    $planValidity = $_POST['planValidity'];

    $table = 'membership_plans';
    $columns = '(
        plan_name,
        plan_description,
        plan_price,
        plan_validity
    )';
    $values = array(
        $planName,
        $planDescription,
        $planPrice,
        $planValidity
    );
   
    $check = insertData($columns, $table, $values);
    
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add plans</h1>
<?php                    if (isset($check)) {
        echo "<div class='alert alert-success' role='alert'>
    data $check inserted successfully  </div>";
    } else {
        if (isset($_SESSION['errors'])) {
            echo "<div class='alert alert-danger' role='alert'>
    data not inserted try again" . print_r($_SESSION['errors']) . "</div>";;
            unset($_SESSION['errors']);
        }
    }?>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Subscription Plans</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="addPlans" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="planName">Plan Name</label>
                                    <input type="text" class="form-control" id="planName" name="planName" placeholder="Enter plan name">
                                </div>
                                <div class="form-group">
                                    <label for="planDescription">Plan description</label>
                                    <textarea class="form-control" name="planDescription" id="planDescription" rows="2"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="planPrice">Plan Price</label>
                                    <input type="number" class="form-control" id="planPrice" name="planPrice" placeholder="Enter price">
                                </div>
                                <div class="form-group">
                                    <label for="planValidity">Plan Validity(in days)</label>
                                    <input type="number" class="form-control" id="planValidity" name="planValidity" placeholder="Enter validity">
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script>
    $().ready(function() {
        $('#addPlans').validate({
            rules: {
                planName: 'required',
                planDescription: 'required',
                planPrice: 'required',
                planValidity: 'required'

            },
            messages: {
                planName: 'This field is required',
                planDescription: 'This field is required',
                planPrice: 'This field is required',
                planValidity: 'This field is required'
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
<?php
include 'includes/footer.php';
?>