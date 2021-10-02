<?php
require "../includes/functions.php";
include "includes/header.php";
include "includes/navbar.php";

$check = fetchData('*', 'employees');
if (isset($_POST['employeeId'])) {
    $employeeId = $_POST['employeeId'];
    echo $memberId;
    $table = 'employees';
    $condition = "employee_id= ?";
    $param = [$employeeId];
    $check = deleteData($table, $condition, $param);
    print_r($check);
    if (isset($_SESSION['errors'])) {
        echo "<div class='alert alert-danger' role='alert'>
data not inserted try again" . print_r($_SESSION['errors']) . "</div>";
        unset($_SESSION['errors']);
    }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employees</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">

            <div class="card-body p-0">
                <table id="viewEmployees" class="table table-striped projects">
                    <thead>
                        <tr>
                            <td><b>Name</b></td>
                            <td><b>Gender</b></td>
                            <td><b>Date of Birth</b></td>
                            <td><b>Contact Number</b></td>
                            <td><b>Alternate Contact Number</b></td>
                            <td><b>Email id</b></td>
                            <td><b>Address</b></td>
                            <td><b>city</b></td>
                            <td><b>state</b></td>
                            <td><b>country</b></td>
                            <td><b>pincode</b></td>
                            <td><b></b></td>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($check as $row) { ?>
                            <form action="<?= $_SERVER['PHP_SELF'] ?>">
                                <tr>
                                    <td id="memberName<?= $row['employee_id'] ?>"><?= $row['first_name'] . " " . $row['last_name'] ?></td>
                                    <td id="memberGender<?= $row['employee_id'] ?>"><?= $row['gender'] ?></td>
                                    <td id="memberDob<?= $row['employee_id'] ?>"><?= $row['date_of_birth'] ?></td>
                                    <td id="memberContact<?= $row['employee_id'] ?>"><?= $row['contact_number'] ?></td>
                                    <td id="memberAltContact<?= $row['employee_id'] ?>"><?= $row['alternate_contact_number'] ?></td>
                                    <td id="memberEmail<?= $row['employee_id'] ?>"><?= $row['email_id'] ?></td>
                                    <td id="memberAddress<?= $row['employee_id'] ?>"><?= $row['address_line_1'] . " " . $row['address_line_2'] ?></td>
                                    <td id="memberCity<?= $row['employee_id'] ?>"><?= $row['city'] ?></td>
                                    <td id="memberState<?= $row['employee_id'] ?>"><?= $row['state'] ?></td>
                                    <td id="memberCountry<?= $row['employee_id'] ?>"><?= $row['country'] ?></td>
                                    <td id="memberPincode<?= $row['employee_id'] ?>"><?= $row['pincode'] ?></td>
                                    <td><button class="btn btn-danger btn-sm" onclick="getData(<?= $row['employee_id'] ?>)">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                    </td>
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
<script>
    $().ready(function() {
        $('#viewEmployees').DataTable({
            "sScrollX": "100%",
        });
    });

    function getData(employeeId) {

        $.ajax({
            data: {
                "employeeId": employeeId
            },
            type: "POST",
            url: "<?= $_SERVER['PHP_SELF'] ?>",
            success: function(response) {
                console.log(response);
            }
        });
        $(document).ajaxStop(function() {
            window.location.reload();
        });
    }
</script>
<?php
include 'includes/footer.php';
?>