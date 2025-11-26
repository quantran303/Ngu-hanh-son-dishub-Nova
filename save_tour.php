<?php
header('Content-Type: text/plain; charset=utf-8');
include "database.php";

$name  = isset($_POST['name']) ? trim($_POST['name']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$people = isset($_POST['people']) ? intval($_POST['people']) : 0;
$tour  = isset($_POST['tour']) ? trim($_POST['tour']) : '';

if ($name === '' || $phone === '') {
    echo "error_missing";
    exit;
}

$stmt = $conn->prepare("INSERT INTO bookings (name, phone, people, tour) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $name, $phone, $people, $tour);
if ($stmt->execute()) {
    echo "success";
} else {
    error_log($stmt->error);
    echo "error";
}
$stmt->close();
$conn->close();
?>