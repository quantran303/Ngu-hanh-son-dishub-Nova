<?php
header('Content-Type: text/plain; charset=utf-8');
include "database.php";

$wish = isset($_POST['wish']) ? trim($_POST['wish']) : '';

if ($wish === '') {
    echo "error_missing";
    exit;
}

$stmt = $conn->prepare("INSERT INTO wishes (wish) VALUES (?)");
$stmt->bind_param("s", $wish);
if ($stmt->execute()) {
    echo "success";
} else {
    error_log($stmt->error);
    echo "error";
}
$stmt->close();
$conn->close();
?>