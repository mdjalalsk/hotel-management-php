<?php
require __DIR__ . '/../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


use App\db;
use App\auth\Admin;

if (!Admin::Check()) {
    header('location: ./../login.php');
    exit;
}

$conn = db::connect();
$su = "select * from users";
$ru = $conn->query($su);
$totalUsers = $ru->num_rows;

$sr = "select * from rooms";
$rr = $conn->query($sr);
$totalRooms = $rr->num_rows;

$sg = "select * from guests";
$rg = $conn->query($sg);
$totalGuests = $rg->num_rows;

$sb = "select * from bookings";
$rb = $conn->query($sb);
$totalBookings = $rb->num_rows;

?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body class="sb-nav-fixed">
    <?php require __DIR__ . '/components/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php require __DIR__ . '/components/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <!-- changed content -->
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body text-center">
                                    <h3>Total Users: </h2>
                                    <p style="font-size: 60px"><?= $totalUsers?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="users.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body text-center">
                                    <h3>Total Rooms: </h2>
                                    <p style="font-size: 60px"><?= $totalRooms?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="rooms.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body text-center">
                                    <h3>Total Guests: </h2>
                                    <p style="font-size: 60px"><?= $totalGuests?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="guests.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body text-center">
                                    <h3>Total Bookings: </h2>
                                    <p style="font-size: 60px"><?= $totalBookings?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="bookings.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- changed content  ends-->
            </main>

        </div>
    </div>
    <!-- footer -->
    <?php require __DIR__ . '/components/footer.php'; ?>