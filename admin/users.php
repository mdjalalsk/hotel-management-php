<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../vendor/autoload.php';

use App\auth\Admin;

if (!Admin::Check()) {
    header('Location: ../login.php');
    exit;
}
?>
<?php require __DIR__ . '/components/header.php'; ?>


</head>

<body class="sb-nav-fixed">
    <?php require __DIR__ . '/components/navbar.php'; ?>
    <div id="layoutSidenav">
        <?php require __DIR__ . '/components/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <main class="container">
                <div class="row">

                    <div class="col-md-12">
                        <h1 class=" text-center my-3">Users</h1>
                        <table class="table table-primary table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Date</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php



                                require __DIR__ . '/../vendor/autoload.php';

                                use App\db;

                                $conn = db::connect();


                                // $db = new MysqliDb ();
                                // $conn = new mysqli("localhost","root","","hotelreservation");
                                $seletQuery = "SELECT * FROM users";
                                $result = $conn->query($seletQuery);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['role'] . "</td>";
                                        echo "<td>" . $row['created_at'] . "</td>";
                                        echo "<td><a href='edit.php?id=" . $row['id'] . "'><input class='btn btn-primary shadow-none' type='submit' value='Edit'></a> | <a onclick='return confirm(\"Are you sure you want to delete this item?\");' href='delete.php?id=" . $row['id'] . "'><input class='btn btn-danger shadow-none' type='submit' value='Delete'></a></td>";




                                        echo "</tr>";
                                    }
                                } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </main>

        </div>
        <!-- changed content  ends-->


    </div>

    <!-- footer -->
    <?php require __DIR__ . '/components/footer.php'; ?>