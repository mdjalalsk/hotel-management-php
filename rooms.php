<?php require __DIR__ . '/vendor/autoload.php';
$page = "Rooms";

use App\db;

$conn = db::connect(); 


    // Query database for available rooms
    $sql = "SELECT r.capacity as capacity, r.id as room_id,r.amenities_id , rt.image as roomtype_image, r.name as room_name, a.name as amenity_name, rt.name as roomtype_name, rt.rate as rate 
    FROM rooms r 
    INNER JOIN amenities a ON r.amenities_id = a.id 
    INNER JOIN roomtypes rt ON r.roomtype_id = rt.id 
    WHERE 1
    AND r.id NOT IN (
        SELECT room_id FROM bookings 
        WHERE 1
    ) ";

    // echo $sql;
    $result = $conn->query($sql);

   

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
                if ($available_rooms) {

                    foreach ($available_rooms as $room) {

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
                                                <td class="r-o">Size:</td>
                                                <td>30 ft</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Capacity:</td>
                                                <td>Max persion <?= $room['capacity'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Room:</td>
                                                <td><?= $room['room_name'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Services:</td>
                                                <td> <?php
                                                        foreach ($room['am_names'] as $am) {
                                                            echo "<li>" . $am . "</li>";
                                                        }
                                                        ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-between">
                                        <a href="room-details.php?id=<?= $room['room_id'] ?>" class="primary-btn">More Details</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php
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