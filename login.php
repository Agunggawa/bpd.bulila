<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "bpd");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT username, password, role FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['role'] === 'admin') {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role']; 
            header("Location: Admin/admin.php");
            exit;
        }
    } else {
        echo "<script>alert('AKSES DIBATASI HANYA ADMIN YANG BISA MASUK.'); window.location='index.php';</script>";
    }
}
?>
