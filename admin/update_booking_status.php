<?php
require __DIR__ . '/../vendor/autoload.php';

use App\db;
use App\auth\Admin;

if (!Admin::Check()) {
    header('location: ./../login.php');
    exit;
}
$bookingId = $_POST['booking_id'];
$bookStatus = $_POST['book_status'];

$conn = db::connect();
$bookingId = $_POST['booking_id'];
$bookStatus = $_POST['book_status'];
$sql = "UPDATE bookings SET book_status='$bookStatus' WHERE id='$bookingId'";
if ($conn->query($sql) === TRUE) {
    echo "Booking status updated successfully";
} else {
    echo "Error updating booking status: " . $conn->error;
}

$conn->close();
