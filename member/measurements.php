<?php
require "../includes/functions.php";
include 'includes/header.php';
include 'includes/navbar.php';

// Notice: Undefined index: timestamp in C:\xampp\htdocs\code\member\measurements.php on line 10

// Notice: Array to string conversion in C:\xampp\htdocs\code\member\measurements.php on line 11
$memberId = $_SESSION['member_id'];
$table = 'member_measurements';
$condition = "where member_id= $memberId";

if (isset($_POST['memberWeight'])&&$_POST['memberHeight']) {
    $memberId;
    $memberWeight = $_POST['memberWeight'];
    $memberHeight = $_POST['memberHeight'];
    $columns = '(
        member_id,
        height,
        weight
    )';
    $values = array(
        $memberId,
        $memberWeight,
        $memberHeight
    );
    // insertData($columns, $table, $values);
    $check = insertData($columns, $table, $values);
}
else{
    echo "fill all details";
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Member Mesurements</h1>
                    <?php
                    if (isset($check)) {
                        echo "<div class='alert alert-success' role='alert'>
    data inserted successfully  </div>";
                    } else {
                        if (isset($_SESSION['errors'])) {
                            echo "<div class='alert alert-danger' role='alert'>
    data not inserted try again" . print_r($_SESSION['errors']) . "</div>";;
                            unset($_SESSION['errors']);
                        }
                    } ?>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Your Mesurements</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="card-body">
                            <form id="addMesurements" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                <div class="form-group">
                                    <label for="memberWeight">Weight(in kgs)</label>
                                    <input type="number" step=0.01 class="form-control" id="memberWeight" name="memberWeight" placeholder="Enter your Current weight.">
                                </div>
                                <div class="form-group">
                                    <label for="memberHeight">Height(in cms)</label>
                                    <input type="number"  step=0.01 class="form-control" id="memberHeight" name="memberHeight" placeholder="Enter your Current Height.">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="submit" id="submit" class="btn btn-primary" onclick="clicked()">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body p-0">
                                <table id="memberMeasurements" class="table table-striped projects">
                                    <thead>
                                        <tr>
                                            <td><b>Weight</b></td>
                                            <td><b>Height</b></td>
                                            <td><b>Date</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $checkM = fetchData('*', $table, $condition);
                                        if (isset($checkM)) {
                                            foreach ($checkM as $row) { ?>
                                                <tr>
                                                    <td id="Weight<?= $row['member_id'] ?>"><?= $row['weight'] ?></td>
                                                    <td id="Height<?= $row['member_id'] ?>"><?= $row['height'] ?></td>
                                                    <td id="Date<?= $row['member_id'] ?>"><?= $date = date('Y-m-d', strtotime($row['timestamp'])); ?></td>
                                                </tr>
                                        <?php }
                                        } else {
                                            echo "no data in database";
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script>
        $(document).ready(function() {
            function getData(memberWeight, memberHeight){
                var data={
                    memberWeight:memberWeight,
                    memberHeight:memberHeight
                }
            
            $.ajax({
                type:'POST',
                url:'<?= $_SERVER['PHP_SELF']?>',
                data:data,
                success:function(response){
                    $("#memberMeasurements").load("<?= $_SERVER['PHP_SELF']?>")
                }
            });
        }
            // $('#memberMeasurements').DataTable();
        });
    </script>
    <?php
    include 'includes/footer.php';
    ?>