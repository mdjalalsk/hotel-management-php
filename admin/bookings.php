<?php

require __DIR__ . '/../vendor/autoload.php';
$page = "Bookings";

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
            <main>
                <!--  End guests form > -->
                <!-- show gueats table value start  -->
                <div class="container">
                    <div class="row">
                        <div class="column">
                            <h1 class="text-center my-3">Bookings Table</h1>
                            <table class="table table-primary table-striped">
                                <tr>
                                    <th>Id</th>
                                    <th>Room_id</th>
                                    <th>Guest_id</th>
                                    <!-- <th>Password</th> -->
                                    <th>Start_date</th>
                                    <th>End_date</th>
                                    <th>Adults</th>
                                    <th>Child</th>
                                    <th>Payment From</th>
                                    <th>Payment Method</th>
                                    <th>Trxid</th>
                                    <th>Status</th>

                                    <th>Action</th>
                                </tr>
                                <?php
                                //       $db = new MysqliDb();
                                //     $guests=$db->get("guests");
                                // //    $db = new mysqli("localhost", "root", "", "hotelreservation");
                                $sq = "select * from bookings where 1";
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
                                        echo "<td>" . $test["room_id"] . "</td>";
                                        echo "<td>" . $test["guest_id"] . "</td>";

                                        echo "<td>" . $test["start_date"] . "</td>";
                                        echo "<td>" . $test["end_date"] . "</td>";
                                        echo "<td>" . $test["adults"] . "</td>";
                                        echo "<td>" . $test["childs"] . "</td>";
                                        echo "<td>" . $test["payment_from"] . "</td>";
                                        echo "<td>" . $test["payment_method"] . "</td>";
                                        echo "<td>" . $test["trxid"] . "</td>";
                                        echo '<td>
                                        <select name="book_status" onchange="changeBgColor(this)" class=" shadow-none  form-select form-select-lg mb-3" aria-label=".form-select-lg example" style="
                                        width: 125px">             
               <option ' . ($test['book_status'] == "2" ? "selected" : "") . ' value="2">Pending</option>
               <option ' . ($test['book_status'] == "1" ? "selected" : "") . ' value="1">Booked</option>
               <option ' . ($test['book_status'] == "0" ? "selected" : "") . ' value="0">Cancel</option>
               
           </select>
                                        </td>';

                                        echo "<td><a href='bookings-edit.php?id=" . $test['id'] . "'><i class='fa-solid fa-pen-to-square'></i></a> | <a onclick='return confirm(\"Are you sure you want to delete this item?\");' href='bookings-delete.php?id=" . $test['id'] . "'><i class='fa-regular fa-trash-can'></i></a></td>";
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
    <script>
        function changeBgColor(selectElement) {
            var value = selectElement.value;
            if (value == "1") {
                selectElement.style.backgroundColor = "#007bff";
                selectElement.style.color = "#fff";
            } else if (value == "2") {
                selectElement.style.backgroundColor = "#6c757d";
                selectElement.style.color = "#fff";
            } else if (value == "0") {
                selectElement.style.backgroundColor = "#dc3545";
                selectElement.style.color = "#fff";
            }
        }
    </script>