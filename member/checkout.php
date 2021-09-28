<?php
require "../includes/functions.php";
include 'includes/header.php';
include 'includes/navbar.php';
// retrive the plan deetails from plans.php
$planId = $_SESSION['planId'];
$planName = $_SESSION['planName'];
$planDescription = $_SESSION['planDescription'];
$planPrice = (int) $_SESSION['planPrice'];
$planValidity = (int) $_SESSION['planValidity'];

//payment processing 
if (isset($_POST['paymentId']) && isset($_POST['id']) && isset($_POST['amount'])) {
   
    $memberId=$_POST['id'];
    $name=$_POST['name'];
    $amount=$_POST['amount'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $paymentId=$_POST['paymentId'];

    $table="payments";
    $columns="(
        member_id,
        name,
        amount,
        contact,
        email_id,
        payment_id 
        )";
    $values=array(
        $memberId,
        $name,
        $amount,
        $contact,
        $email,
        $paymentId
    );
    $checkPayment=insertData($columns, $table, $values);

    //insert data into member_subscription table
    if(isset($checkPayment)){
$startDate=date("Y-m-d");
    $endDatedate('Y-m-d', strtotime($startDate. " + $planValidity days"));
    $tableMs = "member_subscription";
    $columnsMS = '(
        member_id,
        plan_id,
        plan_name,
        plan_description,
        plan_start_date,
        plan_end_date
    )';
    $valuesMS = array(
        $memberId,
        $planId,
        $planName,
        $planDescription,
        $startDate,
        $endDate,
    );
    $checkSubscription = insertData($columnsMS, $tableMs, $valuesMS);
    }
    
    exit;
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Checkout</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!-- <section class="content"> -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <form>
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Your cart</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Plan name: <?= $planName ?></h6>
                                    <small class="text-muted">Description: <?= $planDescription ?></small>
                                </div>
                                <span class="text-muted">Rs.<?= $planPrice ?></span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total</span>
                                <strong>Rs.<?= $planPrice ?></strong>
                            </li>
                            <button id="rzp-button1" class="btn btn-primary btn-lg btn-block" type="submit">Pay now</button>
                        </ul>
                    </form>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <!-- </section> -->
    <!-- /.content -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var name = '<?= $_SESSION['firstName'] . " " . $_SESSION['lastName'] ?>';
        var id = <?= $_SESSION['member_id'] ?>;
        var amount = <?= $planPrice ?>;
        var contact = <?= $_SESSION['contact'] ?>;
        var email = '<?= $_SESSION['email'] ?>';

        var options = {
            "key": "rzp_test_38gFWnFsR2lIpA", // Enter the Key ID generated from the Dashboard
            "amount": amount * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "Gym Management",
            "description": "Plan name: <?= $planName ?>",
            "image": "https://example.com/your_logo",

            "handler": function(response) {
                console.log(response);
                $.ajax({
                    type: "post",
                    url: '<?= $_SERVER['PHP_SELF'] ?>',
                    data: {
                        "name": name,
                        "id": id,
                        "amount": amount,
                        "contact": contact,
                        "email": email,
                        "paymentId": response.razorpay_payment_id,
                    },
                    success: function(result) {
                        alert(" Payment successfull Your payment Id is " + response.razorpay_payment_id)
                    }
                });
            }
        };
        var rzp1 = new Razorpay(options);
        document.getElementById('rzp-button1').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
        }
    </script>
    <?php
    include 'includes/footer.php';
    ?>