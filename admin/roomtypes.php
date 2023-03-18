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
    $rate = ($_POST['rate']);
    $icon = $name . ".png";
    if (is_array($_FILES['image'])) {
        move_uploaded_file($_FILES['image']['tmp_name'], "assets/roomimage/" . $icon);
    }

    $insertquery = "INSERT INTO `roomtypes`(`name`, `rate`, `image`) VALUES( '" . $name . "', '" . $rate . "', '" . $icon . "')";
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

                <button type="button" class="btn btn-primary shadow-none ms-3" data-bs-toggle="modal" data-bs-target="#roomtypesmodal">
                    Add Room Type
                </button>

                <!-- Modal -->
                <div class="modal fade" id="roomtypesmodal" tabindex="-1" aria-labelledby="roomtypesmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="roomtypesmodalLabel">Room Types</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                <label class="form-label">Rate:</label>
                                                <input type="text" name="rate" class="form-control shadow-none" value="">

                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="form-label">Image:</label>
                                                <input type="file" name="image" class="form-control mb-2 shadow-none" value="">

                                            </div>


                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary shadow-none" value="Submit" name="submit">
                                                <input type="reset" class="btn btn-secondary ml-2 shadow-none" value="Reset">
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
                        <div class="col">
                            <h1 class="text-center">Room Types </h1>
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Rate</th>
                                    <th>Image</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                $selectQ = "select * from roomtypes where 1";
                                $records = $conn->query($selectQ);
                                while ($row = $records->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['rate'] . "</td>";
                                    echo "<td><img class='iconimage' width='100' src='assets/roomimage/" . $row['image'] . "'/></td>";
                                    echo "<td>" . $row['created_at'] . "</td>";
                                    echo "<td><a href='roomtypes-edit.php?id=" . $row['id'] . "'><i class='fa-solid fa-pen-to-square'></i></a> | <a onclick='return confirm(\"Are you sure you want to delete this item?\");' href='roomtypes-delete.php?id=" . $row['id'] . "'><i class='fa-regular fa-trash-can'></i></a></td>";
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
    <!-- show rooms end  -->
    <?php require __DIR__ . '/components/footer.php'; ?>