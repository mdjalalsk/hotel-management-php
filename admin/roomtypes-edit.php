<?php
require __DIR__ . '/../vendor/autoload.php';

use App\auth\Admin;
use App\db;

$conn = db::connect();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = "select * from roomtypes where id ={$id} limit 1";
    $r = $conn->query($q);
    if ($r->num_rows) {
        $row = $r->fetch_assoc();
        // var_dump($row);
    } else {
        exit;
    }
} else exit;


if (isset($_POST['update'])) {
    // $id = $_POST['id'];
    // var_dump($id); exit;
    $name = $_POST['name'];
    $rate = $_POST['rate'];
    $icon = $name . ".png";
    // var_dump($_FILES['image']);exit;
    if ($_FILES['image']['error'] == "0") {
        move_uploaded_file($_FILES['image']['tmp_name'], "assets/roomimage/" . $icon);
        $updateQ = "update roomtypes set name='" . $name . "',rate='" . $rate . "',image='" . $icon . "' where id='" . $id . "'";
    } else {
        $updateQ = "update roomtypes set name='" . $name . "',rate='" . $rate . "' where id='" . $id . "'";
    }
    $conn->query($updateQ);
    if ($conn->affected_rows) {
        header("Location:roomtypes.php");
    } else {
        header("Location:roomtypes.php");
    }
}
?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">

            <h1 class="text-center">Edit Roomtypes</h1>

            <div class="row">
                <div class="col-md-6  offset-md-3">
                    <div class="form-group mb-2">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control" value="<?= $row['name'] ?>">

                    </div>
                    <div class="form-group mb-2">
                        <label>Rate:</label>
                        <input type="text" name="rate" class="form-control" value="<?= $row['rate'] ?>">

                    </div>
                    <div class="form-group mb-2">
                        <label>Image:</label>
                        <img width="150px" src="assets/roomimage/<?= $row['image']  ?>" alt="">
                        <input type="file" name="image" class="form-control">
                        <!-- <input type="file" name="image" class="form-control " value='src="/assets/roomimage/<?= $row['image'] ?>'> -->
                    </div>

                    <div class="form-group mb-2">
                        <input type="submit" class="btn btn-primary" value="Update" name="update">

                    </div>
                </div>
            </div>
        </form>

    </div>

</body>

</html>