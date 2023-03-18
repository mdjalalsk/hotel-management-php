<?php
require __DIR__ . '/../vendor/autoload.php';

use App\auth\Admin;
use App\db;

$conn = db::connect();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = "select * from rooms where id={$id} limit 1";
    $r = $conn->query($q);
    if ($r->num_rows) {
        $row = $r->fetch_assoc();
    } else {
        exit;
    }
} else exit;

if (isset($_POST['update'])) {

    $name = ($_POST['name']);
    $roomtypeid = ($_POST['roomtype']);
    $amenitiesid = ($_POST['amenities']);
    // var_dump($amenitiesid);
    // echo PHP_EOL;

    $amenities = join(",", $amenitiesid);
    // var_dump($amenities);
    // exit();
    $status = ($_POST['status']);
    $icon = $name . ".png";
    if ($_FILES['image']['error'] == "0") {
        move_uploaded_file($_FILES['image']['tmp_name'], "assets/roomimage/" . $icon);
        $updateQ = "update rooms set name='" . $name . "',roomtype_id='" . $roomtypeid . "',amenities_id='" . $amenities . "',images='" . $icon . "', status='" . $status . "' where id='" . $id . "'";
    } else {
        $updateQ = "update rooms set name='" . $name . "',roomtype_id='" . $roomtypeid . "',amenities_id='" . $amenities . "', status='" . $status . "' where id='" . $id . "'";
    }
    $conn->query($updateQ);
    if ($conn->affected_rows) {
        header("Location:rooms.php");
    } else {
        header("Location:rooms.php");
    }
}

?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>
    <div class="containter">
        <form action="" method="post" enctype="multipart/form-data">
            <h1 class="text-center">Edit Rooms </h1>
            <div class="row">
                <div class="col-md-6  offset-md-3">
                    <div class="form-group mb-2">
                        <label class="form-label">Name:</label>
                        <input type="text" name="name" class="form-control shadow-none" value="<?= $row['name'] ?>">


                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Room Type ID:</label>
                        <select class="form-select shadow-none" name="roomtype" id="">
                            <?php
                            $query = "select * from roomtypes where 1";
                            $result = $conn->query($query);
                            while ($rows = $result->fetch_assoc()) {
                                $selected = '';
                                if ($rows['id'] == $row['roomtype_id']) {
                                    $selected = 'selected';
                                }
                                echo '<option value="' . $rows['id'] . '" ' . $selected . '>' . $rows['name'] . '</option>';
                            }
                            ?>
                        </select>

                    </div>
                    <!-- ********** -->
                    <div class="form-group mb-2">
                        <label class="form-label">Amenities:</label>
                        <div class="btn-group d-flex flex-wrap" role="group" aria-label="Basic checkbox toggle button group">
                            <?php
                            $qcheck = "select * from amenities where 1";
                            $res = $conn->query($qcheck);
                            while ($ro = $res->fetch_assoc()) {
                                $amenity_id = $ro['id'];
                                $amenity_name = $ro['name'];
                                $checked = in_array($amenity_id, explode(',', $row['amenities_id'])) ? 'checked' : '';
                                echo '<input id="' . $amenity_id . '" class="btn-check shadow-none" type="checkbox" name="amenities[]" value="' . $amenity_id . '" ' . $checked . '>';
                                echo '<label for="' . $amenity_id . '" class="btn btn-outline-primary me-1 mb-1 shadow-none">' . $amenity_name . '</label><br>';
                            }
                            ?>
                        </div>
                    </div>
                    <!-- ********** -->


                    <div class="form-group mb-2">
                        <label class="form-label">Image:</label>
                        <img width="150px" src="assets/roomimage/<?= $row['images']  ?>" alt="">
                        <input type="file" name="image" class="form-control">
                        <!-- <input type="file" name="image" class="form-control  shadow-none" value="<?= $row['images'] ?>"> -->
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label">Status:</label>
                        <select name="status" class="form-control mb-2 form-select shadow-none">
                            <option value="1" <?= ($row['status'] == 1) ? "selected" : "" ?>>Active</option>
                            <option value="2" <?= ($row['status'] == 2) ? "selected" : "" ?>>Inactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary shadow-none" value="Update" name="update">
                        <input type="reset" class="btn btn-secondary ml-2 shadow-none" value="Reset">
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>