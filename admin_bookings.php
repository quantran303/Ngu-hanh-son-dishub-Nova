<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit;
}
include "database.php";
$res = $conn->query("SELECT id, name, phone, people, tour, created_at FROM bookings ORDER BY created_at DESC");
?>
<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Admin - Bookings</title>
    <style>table{border-collapse:collapse;width:100%}td,th{border:1px solid #ddd;padding:8px}</style>
</head>
<body>
<h1>Danh sách Booking</h1>
<p><a href="admin_wishes.php">Xem wishes</a> | <a href="admin_logout.php">Đăng xuất</a></p>
<table>
    <thead><tr><th>ID</th><th>Tên</th><th>Phone</th><th>People</th><th>Tour</th><th>Created</th></tr></thead>
    <tbody>
    <?php while($row = $res->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['phone']); ?></td>
            <td><?php echo htmlspecialchars($row['people']); ?></td>
            <td><?php echo htmlspecialchars($row['tour']); ?></td>
            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
</body>
</html>
<?php $conn->close(); ?>