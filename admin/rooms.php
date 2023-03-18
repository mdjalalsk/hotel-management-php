<?php
require __DIR__ . '/../vendor/autoload.php';
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }


use App\auth\Admin;
use App\db;

if (!Admin::Check()) {
    header('location: ./../login.php');
    exit;
}

$conn = db::connect();
// if(!Admin::Check()){
//     header('HTTP/1.1 503 Service Unavailable');
//     exit;
// }

if (isset($_POST['submit'])) {
    $name = ($_POST['name']);
    $roomtypeid = ($_POST['roomtype']);


    $amenitiesids = ($_POST['amenities']);
    // var_dump($amenitiesids); exit();
    $amenities =  join(",", $amenitiesids);
    // var_dump($amenitiesids); 
    $status = ($_POST['status']);
    $capacity = ($_POST['capacity']);
    $icon = $name . ".png";
    if (is_array($_FILES['image'])) {
        move_uploaded_file($_FILES['image']['tmp_name'], "assets/roomimage/" . $icon);
    };
    $insertquery = "INSERT INTO `rooms`(`name`, `roomtype_id`, `amenities_id`,`capacity`, `images`, `status`) VALUES( '" . $name . "', '" . $roomtypeid . "','" . $amenities . "','" . $capacity . "', '" . trim($icon, " ") . "','" . $status . "')";
    $result = $conn->query($insertquery);
}
?>

<?php require __DIR__ . '/components/header.php'; ?>
</head>

<body class="sb-nav-fixed">
    <?php require __DIR__ . '/components/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php require __DIR__ . '/components/sidebar.php'; ?>
        <div id="layoutSidenav_content">

            <!-- start roomtypes form  -->
            <main class="mt-5">

                <button type="button" class="btn btn-primary shadow-none ms-3" data-bs-toggle="modal" data-bs-target="#roomModal">
                    Add Room
                </button>

                <!-- Modal -->
                <div class="modal fade" id="roomModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Room </h1>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-8  offset-md-1">
                                            <div class="form-group mb-2">
                                                <label class="form-label">Name:</label>
                                                <input type="text" name="name" class="form-control shadow-none" value="">

                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="form-label">Room Type ID:</label>

                                                <select name="roomtype" class="form-select shadow-none">
                                                    <?php
                                                    $query = "select * from roomtypes where 1";
                                                    $result = $conn->query($query);
                                                    while ($rows = $result->fetch_assoc()) {

                                                        echo '<option value="' . $rows['id'] . '">' . $rows['name'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group mb-2">
                                                <label class="form-label">Amenities:</label>
                                                <div class="btn-group d-flex flex-wrap" role="group" aria-label="Basic checkbox toggle button group">
                                                    <?php
                                                    $qcheck = "select * from amenities where 1";
                                                    $res = $conn->query($qcheck);
                                                    while ($ro = $res->fetch_assoc()) {
                                                        echo ' <input type="checkbox" name="amenities[]" value=' . $ro['id'] . ' class="btn-check" id=' . $ro['id'] . ' autocomplete="off">
                                                    <label class="btn btn-outline-primary shadow-none me-1 mb-1" for=' . $ro['id'] . '>' . $ro['name'] . '</label>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="form-label">Capacity:</label>
                                                <input type="number" name="capacity" class="form-control shadow-none">

                                            </div>

                                            <div class="form-group mb-2">
                                                <label class="form-label">Image:</label>
                                                <input type="file" name="image" class="form-control  shadow-none" value="">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="form-label">Status:</label>

                                                <select name="status" id="status" class="form-select shadow-none">
                                                    <option value="1">Active</option>
                                                    <option value="2">Inactive</option>


                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary shadow-none" value="Submit" name="submit">
                                                <input type="reset" class="btn btn-secondary shadow-none ml-2" value="Reset">
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>

                <!-- start roomtypes form  -->
                <!-- show rooms start  -->
                <div class="container">
                    <div class="row">
                        <div class="column">
                            <h1 class="text-center my-3">Rooms Condition </h1>
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Room type ID</th>
                                    <th>Amenities Id</th>
                                    <th>Capacity</th>
                                    <th>Images</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                $selectQ = "select * from rooms where 1";
                                $records = $conn->query($selectQ);
                                while ($row = $records->fetch_assoc()) {
                                    $status = "";
                                    if ($row['status'] == 1) {
                                        $status = "<p class='btn btn-primary'>Active</p>";
                                    } else {
                                        $status = "<p class='btn btn-danger '>Inactive</p>";
                                    }
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['roomtype_id'] . "</td>";
                                    echo "<td>" . $row['amenities_id'] . "</td>";
                                    echo "<td>" . $row['capacity'] . "</td>";
                                    echo "<td><img class='iconimage' width='100' src='./assets/roomimage/" . $row['images'] . "' /></td>";
                                    echo "<td>" . $status . "</td>";
                                    echo "<td>" . $row['created_at'] . "</td>";
                                    echo "<td><a href='rooms-edit.php?id=" . $row['id'] . "'><i class='fa-solid fa-pen-to-square'></i></a> | <a onclick='return confirm(\"Are you sure you want to delete this item?\");' href='rooms-delete.php?id=" . $row['id'] . "'><i class='fa-regular fa-trash-can'></i></a></td>";
                                    echo "</tr>";
                                }
                                $records->free();
                                $conn->close();
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <?php require __DIR__ . '/components/footer.php'; ?>
    <!-- show rooms end  -->