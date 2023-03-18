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
    $description = ($_POST['desc']);
    $insertquery = "INSERT INTO `amenities`(`name`, `description`) VALUES( '" . $name . "', '" . $description . "')";
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
            <main class="mt-5">

                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-primary shadow-none ms-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Amenities
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Amenities</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-8  offset-md-1">
                                                    <div class="form-group">
                                                        <label>Name:</label>
                                                        <input type="text" name="name" class="form-control" value="">
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label>Description:</label>
                                                        <!-- <input type="text" name="desc" class="form-control mb-2" value=""> -->
                                                        <textarea class="form-control" name="desc" id="" cols="30" rows="10"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                                                        <input type="reset" class="btn btn-secondary ml-2" value="Reset">
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
                                    <h1 class="text-center my-3">Amenities</h1>
                                    <table class="table table-primary table-striped">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Discrioption</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php
                                        $selectQ = "select * from amenities where 1";
                                        $records = $conn->query($selectQ);
                                        while ($row = $records->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['description'] . "</td>";
                                            echo "<td>" . $row['created_at'] . "</td>";
                                            echo "<td><a href='amenities-edit.php?id=" . $row['id'] . "'><i class='fa-solid fa-pen-to-square'></i></a> | <a onclick='return confirm(\"Are you sure you want to delete this item?\");' href='amenities-delete.php?id=" . $row['id'] . "'><i class='fa-regular fa-trash-can'></i></a></td>";
                                            echo "</tr>";
                                        }
                                        $records->free();
                                        $conn->close();
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <!-- show rooms end  -->

                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- <script>
    function amenities() {
        if (document.getElementById("amenities").style.display == "none") {
            document.getElementById("amenities").style.display = "block";
        } else {
            document.getElementById("amenities").style.display = "none";

        }
    }
</script> -->
    <?php require __DIR__ . '/components/footer.php'; ?>