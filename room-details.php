<?php
require __DIR__ . '/vendor/autoload.php';

use App\auth\Admin;
use App\db;

$conn = db::connect();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = "SELECT rooms.id as room_id, rooms.capacity, amenities.description as amenity_desc, roomtypes.image, rooms.name as room_name, amenities.name as amenity_name, roomtypes.name as roomtype_name, roomtypes.rate FROM rooms INNER JOIN amenities ON rooms.amenities_id = amenities.id INNER JOIN roomtypes ON rooms.roomtype_id = roomtypes.id where rooms.id={$id} limit 1";
    $r = $conn->query($q);
    if ($r->num_rows) {
        $row = $r->fetch_assoc();
    } else {
        exit;
    }
} else exit;
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
                        <h2>Our Rooms</h2>
                        <div class="bt-option">
                            <a href="index.php">Home</a>
                            <span>Rooms</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Room Details Section Begin -->
    <section class="room-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="room-details-item">
                        <img src="<?= settings()['homepage'] ?>admin/assets/roomimage/<?= $row['image'] ?>" alt="">
                        <div class="rd-text">
                            <div class="rd-title">
                                <h3><?= $row['roomtype_name'] ?></h3>
                                <div class="rdt-right">
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star-half_alt"></i>
                                    </div>
                                    <a href="#checkAvailability" onclick="alert('Please check this room available or not. Fillup Reservation Form and Check availability')">Booking Now</a>
                                </div>
                            </div>
                            <h2><?= $row['rate'] ?>$<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>30 ft</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max persion <?= $row['capacity'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Room:</td>
                                        <td><?= $row['room_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td><?= $row['amenity_name'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="f-para"><?= $row['amenity_desc'] ?>
                            </p>
                        </div>
                    </div>
                    <div class="rd-reviews">
                        <h4>Reviews</h4>
                        <div class="review-item">
                            <div class="ri-pic">
                                <img src="<?= settings()['homepage'] ?>assets/images/room/avatar/avatar-1.jpg" alt="">
                            </div>
                            <div class="ri-text">
                                <span>27 Aug 2019</span>
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5>Brandon Kelley</h5>
                                <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                                    magnam.</p>
                            </div>
                        </div>
                        <div class="review-item">
                            <div class="ri-pic">
                                <img src="<?= settings()['homepage'] ?>assets/images/room/avatar/avatar-2.jpg" alt="">
                            </div>
                            <div class="ri-text">
                                <span>27 Aug 2019</span>
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5>Brandon Kelley</h5>
                                <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                                    magnam.</p>
                            </div>
                        </div>
                    </div>
                    <div class="review-add">
                        <h4>Add Review</h4>
                        <form action="#" class="ra-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name*">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email*">
                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <h5>You Rating:</h5>
                                        <div class="rating">
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star-half_alt"></i>
                                        </div>
                                    </div>
                                    <textarea placeholder="Your Review"></textarea>
                                    <button type="submit">Submit Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="room-booking">
                        <h3>Your Reservation</h3>
                        <form action="checkrooms.php" method="GET" id="checkAvailability">
                            <div class="check-date">
                                <label for="date-in">Check In:</label>
                                <input type="date" min="<?= date("Y-m-d") ?>" name="checkin" class="" id="date-in" required>

                                <!-- <input type="text" class="date-input" id="date-in">
                                <i class="icon_calendar"></i> -->
                            </div>
                            <div class="check-date">
                                <label for="date-out">Check Out:</label>
                                <input type="date" name="checkout" class="" id="date-out" required>
                                <!-- <input type="text" class="date-input" id="date-out">
                                <i class="icon_calendar"></i> -->
                            </div>
                            <div class="select-option">
                            <label for="adult">Adults:</label>
                            <select id="adult" name="adult">
                                <option value="1">1 Adults</option>
                                <option value="2">2 Adults</option>
                                <option value="3">3 Adults</option>
                            </select>
                        </div>
                        <div class="select-option">
                            <label for="children">Children:</label>
                            <select id="children" name="children">
                                <option value="0">Choose</option>
                                <option value="1">1 Children</option>
                                <option value="2">2 Children</option>
                            </select>
                        </div>
                            
                            <button name="check" type="submit">Check Availability</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Room Details Section End -->

    <!-- Footer Section Begin -->
    <?php require __DIR__ . "/components/footer.php"; ?>