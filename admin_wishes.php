<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit;
}
include "database.php";
$res = $conn->query("SELECT id, wish, created_at FROM wishes ORDER BY created_at DESC");
?>
<!doctype html>
<html lang="vi">
<head><meta charset="utf-8"><title>Admin - Wishes</title>
<style>table{border-collapse:collapse;width:100%}td,th{border:1px solid #ddd;padding:8px}</style>
</head>
<body>
<h1>Danh sách Wishes</h1>
<p><a href="admin_bookings.php">Xem bookings</a> | <a href="admin_logout.php">Đăng xuất</a></p>
<table>
    <thead><tr><th>ID</th><th>Wish</th><th>Created</th></tr></thead>
    <tbody>
    <?php while($row = $res->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['wish']); ?></td>
            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
</body>
</html>
<?php $conn->close(); ?>