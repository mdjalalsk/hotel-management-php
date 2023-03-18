<?php 
require __DIR__ . '/../vendor/autoload.php';

use App\db;
use App\auth\Admin;

$conn = db::connect();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $q = "delete from rooms where id='{$id}' limit 1";
    $conn->query($q);
    if($conn->affected_rows){
        header("location: rooms.php");
    }
    else{
        die("Error!! Error!!! Error!!!");
        exit;
    }
}
?>