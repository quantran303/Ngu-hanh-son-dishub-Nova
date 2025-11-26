<?php
// Trả về JSON danh sách bookings
header('Content-Type: application/json; charset=utf-8');
include "database.php";

$res = $conn->query("SELECT id, name, phone, people, tour, created_at FROM bookings ORDER BY created_at DESC");
$out = [];
while ($row = $res->fetch_assoc()) {
    $out[] = $row;
}
echo json_encode($out, JSON_UNESCAPED_UNICODE);
$conn->close();
?>