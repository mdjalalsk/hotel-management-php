<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';
$page = "Payment";

use App\auth\Admin;
use App\db;
use Carbon\Carbon;

$conn = db::connect();
if (isset($_POST['submit']) && (isset($_POST['roomid']))) {

    //dont use session
    $_SESSION['roomid'] = $_POST['roomid'];
    $_SESSION['g_name'] = $_POST['name'];
    $_SESSION['g_email'] = $_POST['email'];
    $_SESSION['g_pass'] = $_POST['password'];
    $_SESSION['g_phone'] = $_POST['phone'];
    $_SESSION['g_address1'] = $_POST['address1'];
    $_SESSION['g_address2'] = $_POST['address2'];
    $_SESSION['g_nid'] = $_POST['nid'];
    $_SESSION['g_passport'] = $_POST['passport'];
    $_SESSION['g_country'] = $_POST['country'];

    $insertquery = "INSERT INTO `guests`(`user_id`,`name`, `email`, `password`, `phone`, `address1`, `address2`, `country`, `nid`, `passportno`) VALUES( '" . $_SESSION['userid'] . "','" . $_SESSION['g_name'] . "', '" . $_SESSION['g_email'] . "', '" . $_SESSION['g_pass'] . "', '" . $_SESSION['g_phone'] . "', '" . $_SESSION['g_address1'] . "', '" . $_SESSION['g_address2'] . "', '" . $_SESSION['g_country'] . "', '" . $_SESSION['g_nid'] . "', '" . $_SESSION['g_passport'] . "')";
    $result = $conn->query($insertquery);
    // if ($result->affected_rows()) {
    //     echo "Success";
    // }

    $s = "select * from roomtypes where id = (select roomtype_id from rooms where id = ".$_POST['roomid'].")";
     $r = $conn->query($s);
     $row = $r->fetch_assoc();
    //  print_r($row);


}




?>
<?php require __DIR__ . "/components/header.php"; ?>
</head>

<body>
    <?php require __DIR__ . '/components/menubar.php'; ?>

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Online Payment</h2>
                        <div class="bt-option">
                            <a href="index.php">Home</a>
                            <span>Payment</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->


    <div class="container mb-5">

        <div class="row">
            <div class="col-md-5 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your Order Details</span>
                    <span class="badge badge-secondary badge-pill">1 Room</span>
                </h4>
                <h4>Total Days: <span class="totalDays">
                        <?php
                        $sdate = Carbon::parse($_SESSION['start_date']);
                        $edate = Carbon::parse($_SESSION['end_date']);
                        $totalDays = $sdate->diffInDays($edate) + 1;
                        echo  $totalDays;
                        ?></span>(From <?= $_SESSION['start_date'] ?> to <?= $_SESSION['end_date'] ?> )
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Name</h6>

                        </div>
                        <span class="text-muted"><?= $_SESSION['g_name'] ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Room Name</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted"><?= $row['name']?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Room Price</h6>

                        </div>
                        <span class="text-muted">$<?= $row['rate']?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0">Promo code</h6>
                            <small>BrideGroom</small>
                        </div>
                        <span class="text-success">$0</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>$<?= $totalDays*$row['rate']?></strong>
                    </li>
                </ul>

                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-7 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" method="POST" action="thanks.php">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="firstName">Full name</label>
                            <input type="text" class="form-control shadow-none" id="firstName" placeholder="" value="<?= $_SESSION['g_name'] ?>" required>
                            <input type="hidden" name="roomid" value="<?= $_SESSION['roomid']; ?>">
                            <input type="hidden" name="start_date" value="<?= $_SESSION['start_date']; ?>">
                            <input type="hidden" name="end_date" value="<?= $_SESSION['end_date']; ?>">
                            <input type="hidden" name="adults" value="<?= $_SESSION['adults']; ?>">
                            <input type="hidden" name="childs" value="<?= $_SESSION['childs']; ?>">
                            <input type="hidden" name="userid" value="<?= $_SESSION['userid']; ?>">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control shadow-none" id="email" placeholder="you@example.com" value="<?= $_SESSION['g_email'] ?>">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control shadow-none" id="address" placeholder="1234 Main St" value="<?= $_SESSION['g_address1'] ?>" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input name="address2" type="text" class="form-control shadow-none" id="address2" value="<?= $_SESSION['g_address2'] ?>" placeholder="Apartment or suite">
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="country">Country</label>
                            <select name="country" class="custom-select d-block w-100 shadow-none" id="country" required>
                                <option selected><?= $_SESSION['g_country'] ?></option>
                                <option>USA</option>
                                <option>Canada</option>
                                <option>Germany</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>


                    </div>
                    <hr class="mb-4">
                    <!-- <div class="custom-control custom-checkbox">
                        <input name="payment_status" type="checkbox" class="custom-control-input shadow-none" id="same-address" value="1">
                        <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                    </div> -->

                    <hr class="mb-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="d-block my-3">



                        <div class="custom-control custom-radio">
                            <input id="cash" name="payment_from" type="radio" class="custom-control-input shadow-none" value="cash">
                            <label class="custom-control-label" for="cash">Cash</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input onclick="alert('Please complete your Payment And full fill your given criteria. Marchant Account: 01857495682')" id="bkash" name="payment_from" type="radio" class="custom-control-input shadow-none" value="bkash">
                            <label class="custom-control-label" for="bkash">bKash</label>
                        </div>
                    </div>
                    <div class="row" style="display:none" id="bkash-payment">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">bkash Payment Number</label>
                            <input name="payment_number" type="text" class="form-control shadow-none" id="cc-name" placeholder="" >


                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Transaction Id</label>
                            <input name="trxid" type="text" class="form-control shadow-none" id="cc-number" placeholder="" >

                        </div>
                    </div>

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block shadow-none" type="submit" name="confirm">Confirm Booking</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer Section Begin -->
    <?php require __DIR__ . "/components/footer.php"; ?>
    <script>
        let bkashPayment = document.getElementById("bkash-payment");
        let bkash = document.getElementById("bkash");
        let cash = document.getElementById("cash");
        bkash.addEventListener("click", ()=>{
            bkashPayment.style.display = "block"; 
        })
        cash.addEventListener("click", ()=>{
            bkashPayment.style.display = "none"; 
        })
        

    </script>