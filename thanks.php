<?php
require __DIR__ . '/vendor/autoload.php';
$page = "Thanks";

use App\db;
use Carbon\Carbon;


$conn = db::connect();
if (isset($_POST['confirm'])) {
  $roomid = $_POST['roomid'];
  $guestid = $_POST['userid'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $adults = $_POST['adults'];
  $childs = $_POST['childs'];
  $paymentMethod = $_POST['payment_from'];
  $paymentNumber = $_POST['payment_number'];
  $trxid = $_POST['trxid'];
  $paymentStatus = "1";

  $bookingQuery = "INSERT INTO `bookings`(`room_id`,`guest_id`, `start_date`, `end_date`, `adults`, `childs`, `payment_from`, `payment_method`, `trxid`, `book_status`) VALUES( '" . $roomid . "','" . $guestid . "', '" . $start_date . "', '" . $end_date . "', '" . $adults . "', '" . $childs . "', '" . $paymentNumber . "', '" . $paymentMethod . "', '" . $trxid . "', '" . $paymentStatus . "')";
  $r = $conn->query($bookingQuery);
}

$s = "select * from roomtypes where id = (select roomtype_id from rooms where id = ".$_POST['roomid'].")";
$r = $conn->query($s);
$row = $r->fetch_assoc();

?>

<?php require __DIR__ . '/components/header.php'; ?>
<style>
  .thank {

    text-align: center;

  }

  .thank h1 {
    padding: 0 100px;
  }
</style>

</head>

<body>

  <?php require __DIR__ . '/components/menubar.php'; ?>
  <!-- Breadcrumb Section Begin -->
  <div class="breadcrumb-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb-text">
            <h2>Thank You</h2>
            <div class="bt-option">
              <a href="index.php">Home</a>
              <span>Thank You</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Section End -->


  <?php require __DIR__ . '/components/dismissalert.php'; ?>


  <div class="thank">
    <h1 class="h-font">Thanks For Booking</h1>
    <h3>Enjoy Your Day</h3>
  </div>

  <div class="conatainer">
    <div class="row">
    <div class="col-md-8 offset-md-2 order-md-2 mb-4 mt-4">
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
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Adults</h6>

                        </div>
                        <span class="text-muted"><?= $_POST['adults']?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Childs</h6>

                        </div>
                        <span class="text-muted"><?= $_POST['childs']?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Checkin Date</h6>

                        </div>
                        <span class="text-muted"><?= $_SESSION['start_date']?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Departure Date</h6>

                        </div>
                        <span class="text-muted"><?= $_SESSION['end_date']?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Total Days</h6>

                        </div>
                        <span class="text-muted"><?= $totalDays?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Payment Method</h6>

                        </div>
                        <span class="text-muted"><?= $_POST['payment_from']?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Payment Number</h6>

                        </div>
                        <span class="text-muted"><?= $_POST['payment_number']?></span>
                    </li>
                  
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>$<?= $totalDays*$row['rate']?></strong>
                    </li>
                </ul>

               
            </div>
    </div>
  </div>





  <script>

  </script>
  <?php require __DIR__ . '/components/footer.php'; ?>