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
    $q = "delete from guests where id='{$id}' limit 1";
    $conn->query($q);
    if ($conn->affected_rows) {
        header("location: guests.php");
    } else {
        die("Error!! Error!!! Error!!!");
        exit;
    }
}
