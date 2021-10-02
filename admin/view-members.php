<?php
require "../includes/functions.php";
include "includes/header.php";
include "includes/navbar.php";

$check = fetchData('*', 'members');
// var_dump($_POST);
if (isset($_POST['memberId'])) {
    $memberId = $_POST['memberId'];
    echo $memberId;
    $table = 'members';
    $condition = "member_id= ?";
    $param = [$memberId];
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
                    <h1>Members</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">

            <div class="card-body p-0">
                <table id="viewMembers" class="table table-striped projects">
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
                            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                                <tr>
                                    <td id="memberName<?= $row['member_id'] ?>"><?= $row['first_name'] . " " . $row['last_name'] ?></td>
                                    <td id="memberGender<?= $row['member_id'] ?>"><?= $row['gender'] ?></td>
                                    <td id="memberDob<?= $row['member_id'] ?>"><?= $row['date_of_birth'] ?></td>
                                    <td id="memberContact<?= $row['member_id'] ?>"><?= $row['contact_number'] ?></td>
                                    <td id="memberAltContact<?= $row['member_id'] ?>"><?= $row['alternate_contact_number'] ?></td>
                                    <td id="memberEmail<?= $row['member_id'] ?>"><?= $row['email_id'] ?></td>
                                    <td id="memberAddress<?= $row['member_id'] ?>"><?= $row['address_line_1'] . " " . $row['address_line_2'] ?></td>
                                    <td id="memberCity<?= $row['member_id'] ?>"><?= $row['city'] ?></td>
                                    <td id="memberState<?= $row['member_id'] ?>"><?= $row['state'] ?></td>
                                    <td id="memberCountry<?= $row['member_id'] ?>"><?= $row['country'] ?></td>
                                    <td id="memberPincode<?= $row['member_id'] ?>"><?= $row['pincode'] ?></td>
                                    <!-- member_id	first_name	last_name	profile_picture	gender	date_of_birth	contact_number	alternate_contact_number	email_id	password	address_line_1	address_line_2	city	state	country	pincode	timestamp  -->
                                    <td><button name="deleteMember" class="btn btn-danger btn-sm" onclick="getData(<?= $row['member_id'] ?>)">
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
        $('#viewMembers').DataTable({
            "scrollX": true
        });

    });

    function getData(memberId) {

        $.ajax({
            data: {
                "memberId": memberId
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