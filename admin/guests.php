<?php

require __DIR__ . '/../vendor/autoload.php';
$page = "Guest";

use App\db;
use App\auth\Admin;

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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $presentadd = $_POST['address1'];
    $permanentadd = $_POST['address2'];
    $nid = $_POST['nid'];
    $passport = $_POST['passport'];
    $country = $_POST['country'];

    // $db = new MysqliDb();

    $insertquery = "INSERT INTO `guests`(`name`, `email`, `password`, `phone`, `address1`, `address2`, `country`, `nid`, `passportno`) VALUES( '" . $name . "', '" . $email . "', '" . $password . "', '" . $phone . "', '" . $presentadd . "', '" . $permanentadd . "', '" . $country . "', '" . $nid . "', '" . $passport . "')";
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

            <!-- Button trigger modal -->
            <main class="mt-5">
                <button type="button" class="btn btn-primary shadow-none ms-3" data-bs-toggle="modal" data-bs-target="#guestsmodal">
                    Add Guest
                </button>

                <!-- Modal -->
                <div class="modal fade" id="guestsmodal" tabindex="-1" aria-labelledby="guestsmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="guestsmodalLabel">Guest registration</h1>
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
                                                <label class="form-label">Email:</label>
                                                <input type="text" name="email" class="form-control shadow-none" value="">

                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="form-label">Password:</label>
                                                <input type="password" name="password" class="form-control  shadow-none" value="">

                                            </div>

                                            <div class="form-group mb-2">
                                                <label class="form-label">Phone Number:</label>
                                                <input type="text" name="phone" class="form-control shadow-none" value="">

                                            </div>

                                            <div class="form-group mb-2">
                                                <label class="form-label"> Present Address:</label>
                                                <input type="text" name="address1" class="form-control shadow-none" value="">

                                            </div>
                                            <div class="form-group mb-2">
                                                <label class="form-label"> Permanent Address:</label>
                                                <input type="text" name="address2" class="form-control shadow-none" value="">

                                            </div>

                                            <div class="form-group mb-2">
                                                <label class="form-label">NID</label>
                                                <input type="text" name="nid" class="form-control shadow-none" value="">

                                            </div>

                                            <div class="form-group mb-2">
                                                <label class="form-label">Passport No:</label>
                                                <input type="text" name="passport" class="form-control shadow-none" value="">
                                            </div>

                                            <div class="form-group mb-2">
                                                <label class="form-label">Country:</label>
                                                <input type="text" name="country" class="form-control mb-2 shadow-none" value="">
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

                <!--  End guests form > -->
                <!-- show gueats table value start  -->
                <div class="container">
                    <div class="row">
                        <div class="column">
                            <h1 class="text-center my-3">Guests List</h1>
                            <table class="table table-primary table-striped">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <!-- <th>Password</th> -->
                                    <th>Phone</th>
                                    <th>Present Address</th>
                                    <th>Permanent Address</th>
                                    <th>Country</th>
                                    <th>NID</th>
                                    <th>Passport No</th>

                                    <th>Action</th>
                                </tr>
                                <?php
                                //       $db = new MysqliDb();
                                //     $guests=$db->get("guests");
                                // //    $db = new mysqli("localhost", "root", "", "hotelreservation");
                                $sq = "select * from guests where 1";
                                // $result = $db->query($s);
                                // var_dump($guests);
                                // echo $db->count;
                                //        if($db->count)
                                //             foreach($guests as $test){
                                $records = $conn->query($sq);
                                if ($records->num_rows > 0) {
                                    while ($test = $records->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $test["id"] . "</td>";
                                        echo "<td>" . $test["name"] . "</td>";
                                        echo "<td>" . $test["email"] . "</td>";

                                        echo "<td>" . $test["phone"] . "</td>";
                                        echo "<td>" . $test["address1"] . "</td>";
                                        echo "<td>" . $test["address2"] . "</td>";
                                        echo "<td>" . $test["country"] . "</td>";
                                        echo "<td>" . $test["nid"] . "</td>";
                                        echo "<td>" . $test["passportno"] . "</td>";

                                        echo "<td><a href='guest-edit.php?id=" . $test['id'] . "'><i class='fa-solid fa-pen-to-square'></i></a> | <a onclick='return confirm(\"Are you sure you want to delete this item?\");' href='guest-delete.php?id=" . $test['id'] . "'><i class='fa-regular fa-trash-can'></i></a></td>";
                                        echo "</tr>";
                                    }
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

    <!-- show gueats table value end  -->
    <?php require __DIR__ . '/components/footer.php'; ?>