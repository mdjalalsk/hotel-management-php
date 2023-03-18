<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
$page = "Rooms";

use App\db;

$conn = db::connect();

function getAvailableRooms($checkin_date, $checkout_date, $adults, $children)
{

    $conn = $GLOBALS['conn'];
    // Escape user input to prevent SQL injection attacks
    $checkin_date = $conn->real_escape_string($checkin_date);
    $checkout_date = $conn->real_escape_string($checkout_date);
    $adults = $conn->real_escape_string($adults);
    $children = $conn->real_escape_string($children);

    // Query database for available rooms
    $sql = "SELECT r.capacity as capacity, r.id as room_id,r.amenities_id , rt.image as roomtype_image, r.name as room_name, a.name as amenity_name, rt.name as roomtype_name, rt.rate as rate 
    FROM rooms r 
    INNER JOIN amenities a ON r.amenities_id = a.id 
    INNER JOIN roomtypes rt ON r.roomtype_id = rt.id 
    WHERE r.capacity >= $adults+$children 
    AND r.id NOT IN (
        SELECT room_id FROM bookings 
        WHERE start_date <= '$checkout_date' 
        AND end_date >= '$checkin_date'
    ) ";

    // echo $sql;
    $result = $conn->query($sql);

    // Check for errors
    if (!$result) {
        die("Error executing query: " . $conn->error());
    }

    // Build array of available rooms
    $available_rooms = array();
    while ($row = $result->fetch_assoc()) {
        $amenities = "SELECT * FROM `amenities` WHERE `id` in (" . $row['amenities_id'] . ")";
        // echo "<h1>".$amenities."</h1>";
        $r = $conn->query($amenities);
        $am = [];
        if ($r->num_rows) {
            while ($amrow = $r->fetch_assoc()) {
                $am[] = $amrow['name'];
            }
        }
        $row['am_names'] = $am;
        $available_rooms[] = $row;
    }

    // Close database connection
    $conn->close();

    // Return array of available rooms
    return $available_rooms;
}

?>

<?php require __DIR__ . '/components/header.php'; ?>
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

    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                <?php
                // Get query parameters
                if (isset($_GET['check'])) {
                    $checkin_date = $_GET['checkin'];
                    $checkout_date = $_GET['checkout'];
                    $adults = $_GET['adult'];
                    $children = $_GET['children'];
                    //    echo  $checkin_date;
                    //    exit;

                    $_SESSION['start_date'] = $checkin_date;
                    $_SESSION['end_date'] = $checkout_date;
                    $_SESSION['adults'] = $adults;
                    $_SESSION['childs'] = $children;

                    // Check availability and get list of available rooms
                    $available_rooms = getAvailableRooms($checkin_date, $checkout_date, $adults, $children);

                    // Display list of available rooms to user
                    if ($available_rooms) {

                        foreach ($available_rooms as $room) { //var_dump($room); 
                ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="room-item">
                                    <img src="<?= settings()['homepage'] ?>admin/assets/roomimage/<?= $room['roomtype_image'] ?>" alt="">
                                    <div class="ri-text">
                                        <h4><?= $room['roomtype_name'] ?></h4>
                                        <h3><?= $room['rate'] ?>$<span>/Pernight</span></h3>
                                        <table>
                                            <tbody>

                                                <tr>
                                                    <td class="r-o">Capacity:</td>
                                                    <td>Max person <?= $room['capacity'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="r-o">Room:</td>
                                                    <td><?= $room['room_name'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="r-o">Services:</td>
                                                    <td>
                                                        <?php
                                                        foreach ($room['am_names'] as $am) {
                                                            echo "<li>" . $am . "</li>";
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="d-flex justify-content-between">
                                            <a href="room-details.php?id=<?= $room['room_id'] ?>" class="primary-btn">More Details</a>
                                            <a style="display: inline-block;
                                                    color: #ffffff;
                                                    font-size: 13px;
                                                    text-transform: uppercase;
                                                    font-weight: 700;
                                                    background: #dfa974;
                                                    padding: 14px 28px 13px;" href="guests.php?id=<?= $room['room_id'] ?>">Booking Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                <?php
                        }
                    } else {
                        echo "<p>Sorry, there are no rooms available for the selected dates.</p>";
                    }
                }
                ?>

                <div class="col-lg-12">
                    <div class="room-pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">Next <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>

            </div>


        </div>
    </section>
    <!-- Rooms Section End -->

    <!-- Footer Section Begin -->
    <?php require __DIR__ . "/components/footer.php"; ?>