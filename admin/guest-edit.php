<?php

require __DIR__ . '/../vendor/autoload.php';

use App\db;
use App\auth\Admin;

if (!Admin::Check()) {
    header('location: ./../login.php');
    exit;
}

$conn = db::connect();


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = "select * from guests where id ={$id} limit 1";
    $r = $conn->query($q);
    if ($r->num_rows) {
        // var_dump($r);
        $test = $r->fetch_assoc();
    } else {
        exit;
    }
} else exit;

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $presentadd = $_POST['address1'];
    $permanentadd = $_POST['address2'];
    $nid = $_POST['nid'];
    $passport = $_POST['passport'];
    $country = $_POST['country'];
    $updateQ = "update guests set name='" . $name . "',email='" . $email . "',password='" . $password . "',phone='" . $phone . "',address1='" . $presentadd . "',address2='" . $permanentadd . "',country='" . $country . "',nid='" . $nid . "',passportno='" . $passport . "' where id='" . $id . "'";
    $conn->query($updateQ);
    if ($conn->affected_rows) {
        header("location:guests.php");
    } else {
        header("Location:guests.php");
    }
}
?>

<?php require __DIR__ . '/components/header.php';

?>
</head>
<!-- start guests form  -->

<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <legend class="text-center">Edit Guests</legend>
            <div class="row">
                <div class="col-md-8 offset-md-1">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" value="<?= $test['name'] ?>" class="form-control">

                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" name="email" class="form-control" value="<?= $test['email'] ?>">

                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" name="password" class="form-control " value="<?= $test['password'] ?>">

                    </div>

                    <div class="form-group">
                        <label>Phone Number:</label>
                        <input type="text" name="phone" class="form-control" value="<?= $test['phone'] ?>">

                    </div>

                    <div class="form-group">
                        <label> Present Address:</label>
                        <input type="text" name="address1" class="form-control" value="<?= $test['address1'] ?>">

                    </div>
                    <div class="form-group">
                        <label> Permanent Address:</label>
                        <input type="text" name="address2" class="form-control" value="<?= $test['address2'] ?>">

                    </div>

                    <div class="form-group">
                        <label>NID</label>
                        <input type="text" name="nid" class="form-control" value="<?= $test['nid'] ?>">

                    </div>

                    <div class="form-group">
                        <label>Passport No:</label>
                        <input type="text" name="passport" class="form-control" value="<?= $test['passportno'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Country:</label>
                        <input type="text" name="country" class="form-control mb-2" value="<?= $test['country'] ?>">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Update" name="update">


                    </div>
                </div>
            </div>
        </form>

    </div>

    </div>
    </div>
    </div>
    </div>
    <!--  End guests form > -->

    <?php

    ?>

    </table>
    </div>

    <!-- footer -->
    <?php require __DIR__ . '/components/footer.php'; ?>
    </div>
    </div>
    <script src="<?= settings()['adminpage'] ?>assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= settings()['adminpage'] ?>assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="<?= settings()['adminpage'] ?>assets/demo/chart-area-demo.js"></script>
    <script src="<?= settings()['adminpage'] ?>assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="<?= settings()['adminpage'] ?>assets/js/datatables-simple-demo.js"></script>
</body>

</html>