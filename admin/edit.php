<?php
require __DIR__ . '/../vendor/autoload.php';

use App\auth\Admin;
use App\db;

if (!Admin::Check()) {
    header('location: ./../login.php');
    exit;
}

$conn = db::connect();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = "select * from users where id ={$id} limit 1";
    $r = $conn->query($q);
    if ($r->num_rows) {
        $row = $r->fetch_assoc();
        // var_dump($row);
    } else {
        exit;
    }
} else exit;

if (isset($_POST['update'])) {
    $name = ($_POST['catname']);
    $description = ($_POST['catdesc']);
    $role = ($_POST['role']);
    $updateQ = "update users set name='" . $name . "',email='" . $description . "',role='" . $role . "' where id='" . $id . "'";
    $conn->query($updateQ);
    if ($conn->affected_rows) {
        header("Location:users.php");
    } else {
        header("Location:users.php");
    }
}
?>
<?php require __DIR__ . '/components/header.php'; ?>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1>Edit Users</h1>
                <div id="formContainer">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <div class="mb-2">
                            <label for="catname" class="form-label">Name</label>
                            <input type="text" class="form-control" id="catname" name="catname" placeholder="category name" required value="<?= $row['name'] ?>">
                        </div>
                        <div class="mb-2">
                            <label for="catdesc" class="form-label">Email</label>
                            <input type="text" class="form-control" id="catdesc" name="catdesc" placeholder="category name" required value="<?= $row['email'] ?>">
                        </div>

                        <div class="mb-2">
                            <label for="role" class="form-label">Role</label>
                            <input type="text" class="form-control" id="role" name="role" placeholder="Role" required value="<?= $row['role'] ?>">
                        </div>


                        <input class="btn btn-primary shadow-none" type="submit" value="Update" name="update">

                        <a href="users.php" class="btn btn-danger shadow-none" name="back">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>