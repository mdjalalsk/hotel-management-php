<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';
$page = "Guests";

use App\db;
use App\auth\Admin;

/* if (!Admin::Check()) {
    header('location: login.php');
    exit;
} */

$conn = db::connect();

// use App\auth\Admin;
// if(!Admin::Check()){
//     header('HTTP/1.1 503 Service Unavailable');
//     exit;
// }
if (isset($_GET['id'])) {
    $_SESSION['room_id'] = $_GET['id'];
}

?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>
<?php require __DIR__ . '/components/menubar.php'; ?>
<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Guest Details</h2>
                    <!-- <?php echo $_SESSION['start_date']; ?> -->
                    <div class="bt-option">
                        <a href="index.php">Home</a>
                        <span>Guest Details</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->
<!-- start guests form  -->

<div class="container">
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
        $q = "select * from users where id='" . $_SESSION['userid'] . "' limit 1";
        $info = $conn->query($q);
        $info = $info->fetch_assoc();
    ?>
        <form action="payment.php" method="POST">
            <input type="hidden" name="roomid" value="<?= $_GET['id']; ?>">
            <input type="hidden" name="start_date" value="<?= $_SESSION['start_date']; ?>">
            <input type="hidden" name="end_date" value="<?= $_SESSION['end_date']; ?>">

            <div class="row">
                <div class="col-md-8  offset-md-1">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control" value="<?= $info['name'] ?>" required>


                    </div>

                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control" value="<?= $info['email'] ?>" required>

                    </div>

                    <input type="hidden" name="password" value="<?= $info['password'] ?>" required>



                    <div class="form-group">
                        <label>Phone Number:</label>
                        <input type="text" name="phone" class="form-control" value="">

                    </div>

                    <div class="form-group">
                        <label> Present Address:</label>
                        <input type="text" name="address1" class="form-control" value="">

                    </div>
                    <div class="form-group">
                        <label> Permanent Address:</label>
                        <input type="text" name="address2" class="form-control" value="">

                    </div>

                    <div class="form-group">
                        <label>NID</label>
                        <input type="text" name="nid" class="form-control" value="">

                    </div>

                    <div class="form-group">
                        <label>Passport No:</label>
                        <input type="text" name="passport" class="form-control" value="">
                    </div>

                    <div class="form-group">
                        <label>Country:</label>
                        <input type="text" name="country" class="form-control" value="">
                    </div>

                    <div class="form-group">

                        <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                        <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                    </div>
                </div>
            </div>
        </form>
    <?php
    } else {
    ?>
        <h3>You are not registered yet, please <a href="login.php">Login</a> or <a href="registration.php">Register</a> first</h3>
    <?php

    }
    ?>

</div>
<!-- End guests form  -->

<!-- footer -->
<?php require __DIR__ . '/components/footer.php'; ?>