<?php
header('Content-Type: application/json; charset=utf-8');
include "database.php";

$res = $conn->query("SELECT id, wish, created_at FROM wishes ORDER BY created_at DESC");
$out = [];
while ($row = $res->fetch_assoc()) {
    $out[] = $row;
}
echo json_encode($out, JSON_UNESCAPED_UNICODE);
$conn->close();
?>