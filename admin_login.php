<?php
session_start();
$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';
    // Mặc định: admin / admin123 (bạn có thể đổi)
    if ($user === 'admin' && $pass === 'admin123') {
        $_SESSION['admin'] = true;
        header('Location: admin_bookings.php');
        exit;
    } else {
        $err = 'Sai username hoặc password.';
    }
}
?>
<!doctype html>
<html lang="vi">
<head><meta charset="utf-8"><title>Admin Login</title></head>
<body>
<h2>Đăng nhập Admin</h2>
<?php if($err) echo '<p style="color:red;">'.htmlspecialchars($err).'</p>'; ?>
<form method="post">
    <label>Username: <input name="username" value="admin"></label><br>
    <label>Password: <input name="password" type="password"></label><br>
    <button type="submit">Đăng nhập</button>
</form>
</body>
</html>