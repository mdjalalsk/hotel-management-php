<?php
require __DIR__ . '/../vendor/autoload.php';

use App\db;

$connect = db::connect();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = "delete from users where id='{$id}' limit 1";
    $connect->query($q);
    if ($connect->affected_rows) {
        header("location: users.php");
    } else {
        header("location: users.php");
        exit;
    }
}
